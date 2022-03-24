<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Ward;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function indexComponents()
    {
        $users = User::latest()->paginate(100);
        $wards = Ward::latest()->paginate(100);
        $roles = Role::latest()->paginate(100);

        $members = DB::table('users')->where('deleted_at', NULL)->count();
        $females = DB::table('users')->where('gender','Female')->where('deleted_at', NULL)->count();
        $males = DB::table('users')->where('gender','Male')->where('deleted_at', NULL)->count();
        $excos = DB::table('users')->where('position','Exco')->where('deleted_at', NULL)->count();

        return compact('users','wards','roles', 'members', 'females', 'males','excos');

    }

    public function index()
    {
        $uArray = $this->indexComponents();
        $uArray['source'] = 'users';
        return view('users', $uArray);
    }

    public function dashboard()
    {
        $uArray = $this->indexComponents();
        $uArray['source'] = 'dashboard';
        $filter_components = $this->getComponentsForFilter();
        // dd($filter_components);
        $uArray['lgas'] = $filter_components['lgas'];
        $uArray['wards'] = $filter_components['wards'];
        $uArray['units'] = $filter_components['units'];
        // dd($uArray);

        return view('dashboard', $uArray);
    }


    public function store(Request $request)
    {
        //store a request
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'position' => 'required',
            'gender' => 'required',
            'village' => 'required',
            'services' => 'required',
            'ward' => 'required',
            'unit' => 'required',
            'disability' => 'required',

        ]);

        $credentials = collect($request)->only(['email']);
        // dd($credentials, User::where('email', $request->only(['email']))->get()->first() );
        if (User::where('email', $request['email'])->get()->first()) {

            return redirect()->route('dashboard')->with('danger', 'Email Has ALready Been Taken');
        }

        try {
            $user = new User();
            $user->first_name = ucfirst($request->input('first_name'));
            $user->last_name = ucfirst($request->input('last_name'));
            $user->phone_number = $request->input('phone_number');
            $user->email = $request->input('email');
            $user->gender = $request->input('gender');
            $user->position = $request->input('position');
            $user->state = "Aks";
            $user->village = $request->input('village');
            $user->services = $request->input('services');
            $user->ward = $request->input('ward');
            $user->unit = ucfirst($request->input('unit'));
            $user->disability = $request->input('disability');

            $user->save();
        } catch (\Illuminate\Database\QueryException $th) {
            //throw $th;
            return redirect()->route('dashboard')->with('success', 'Email Has ALready Been Taken');

        }

        return redirect()->route('users')->with('success', 'Member added successfully!');
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', 'Member updated successfully!');
    }


    public function destroy($id)
    {
        $user = User::where("id",$id)->delete();
        return redirect()->route('dashboard')->with('success', 'Member Deleted Successfully!');
    }

    public function searchGender(Request $request, $source) {
        // dd($source);
        $request->validate([
            'gender' => 'required',
        ]);

        $query = (object) $request->only(['gender']);

        $final_array = User::where('gender', 'like', "{$query->gender}%")
            ->orWhere('ward', 'like', "{$query->gender}%")
            ->orWhere('village', 'like', "{$query->gender}%")
            ->orWhere('position', 'like', "{$query->gender}%")
            ->orWhere('unit', 'like', "{$query->gender}%")->paginate(100);
        $indexComponents = $this->indexComponents();
        $indexComponents['users'] = $final_array;
        $indexComponents['source'] = $source;
        if(count($final_array) <1 )
        {
            $indexComponents['error_message'] = 'gender not found';
        }
        if($source === "users"){
            return view('users',$indexComponents);

        }
        elseif($source === "dashboard"){
            return view('dashboard',$indexComponents);
        }
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportPdf() {
        $user = User::all();
        view()->share('user', $user);
        $pdf = PDF::loadView('export.userspdf', ['user' => $user]);
        return $pdf->download('users.pdf');
    }

    public function importPdf(Request $request) {
        Excel::import(new UsersImport, $request->file);
        return redirect()->back()->with('success', 'All good!');
    }


    public function getComponentsForFilter()
    {
        $lgas = [];
        $wards = [];
        $units = [];

        $users = User::get();

        if(count($users) < 1)
        {
            return "no users";
        }

        foreach($users as $user)
        {
            in_array($user->village, $lgas) ? : array_push($lgas, $user->village);
            in_array($user->ward, $wards) ? : array_push($wards, $user->ward);
            in_array($user->unit, $units) ? : array_push($units, $user->unit);
        }

        return [
            'lgas' => $lgas,
            'wards' => $wards,
            'units' => $units,
        ];
    }
    public function filterUsers(Request $request, $source)
    {
        // dd($source);
        $fields = (object) $request->only(['village', 'ward', 'unit']);

        // all three filter fields being all means the user has not specified a filter but clicked filter
        if($fields->village === 'all' && $fields->ward === 'all' && $fields->unit === 'all'){
            if($source === 'dashboard'){
                return $this->dashboard();
            }
        }

        // if the village/lga field is all and at one or both of the other fields are not all
        elseif($fields->village === 'all'){
            if($fields->ward === 'all'){
                return User::where('unit', $fields->unit)->get();
            }
            elseif($fields->unit === 'all'){
                return User::where('ward', $fields->ward)->get();
            }
            else{
                return User::where('ward', $fields->ward)->where('unit', $fields->unit)->get();
            }
        }

        // if the ward field is all and one or both of the other fields are not all
        elseif($fields->ward === 'all'){
            if($fields->village === 'all'){
                return User::where('unit', $fields->unit)->get();
            }
            elseif($fields->unit === 'all'){
                return User::where('village', $fields->village)->get();
            }
            else{
                return User::where('village', $fields->village)->where('unit', $fields->unit)->get();
            }
        }


        // if the unit field is all and one or both of the other two fields are not all
        elseif($fields->unit === 'all'){
            if($fields->ward === 'all'){
                return User::where('village', $fields->village)->get();
            }
            elseif($fields->village === 'all'){
                return User::where('ward', $fields->ward)->get();
            }
            else{
                return User::where('village', $fields->village)->where('ward', $fields->ward)->get();
            }
        }

        // if all the fields are not carrying 'all'
        else{
            return User::where('village', $fields->village)->where('ward', $fields->ward)->where('unit', $fields->unit)->get();
        }

    }
}
