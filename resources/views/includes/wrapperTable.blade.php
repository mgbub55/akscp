<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">

        <div class="d-flex d-md-flex d-sm-flex justify-content-between mb-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                            Export
                        </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="/users/exportexcel">EXCEL</a>
                    <a class="dropdown-item" href="/users/exportpdf">PDF</a>
                </div>
            </div>

            <!-- this would serve as the filter section -->
{{--            <div>--}}
{{--                <form action="{{route('users.filter', ['dashboard'])}}" method="post" class="d-flex justify-between">--}}
{{--                    @csrf--}}
{{--                    <div>Filter by:   </div>--}}
{{--                    <div class="mx-3 col-md-3 d-flex">--}}
{{--                        <label for="lga-select">LGA</label>--}}
{{--                        <select name="village" id="lga-select" class="col-md-10 ml-3">--}}
{{--                            <option value="all">all</option>--}}

{{--                            @foreach($lgas as $lga)--}}
{{--                                <option value="{{$lga}}">{{$lga}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="mx-3 col-md-3 d-flex">--}}
{{--                        <label for="ward-select">WARD</label>--}}
{{--                        <select name="ward" id="ward-select" class="col-md-10 ml-3 ">--}}
{{--                            <option value="all">all</option>--}}

{{--                            @foreach($wards as $ward)--}}
{{--                                <option value="{{$ward}}">{{$ward}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="mx-3 col-md-3 d-flex">--}}
{{--                        <label for="unit-select">UNIT</label>--}}
{{--                        <select name="unit" id="unit-select" class="col-md-10 ml-3 ">--}}
{{--                            <option value="all">all</option>--}}

{{--                            @foreach($units as $unit)--}}
{{--                                <option value="{{$unit}}">{{$unit}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-3">--}}
{{--                        <button type="submit">Filter</button>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
            <!-- end of filter section -->

            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createModalForSms">
                Send Bulk Sms
            </button>

            <!-- Modal -->
            <div class="modal fade" id="createModalForSms" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Bulk Sms</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="md-form">
                                    <textarea id="form103" class="md-textarea form-control" rows="5"></textarea>
                                    <label for="form103">Your message</label>
                                </div>
                                <div class="bo text-center mx-auto">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>


            {{--            <div class="button">--}}
{{--                <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true">--}}
{{--                        aria-expanded="false">--}}
{{--                            BULK SMS--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu" aria-labelledby="triggerId">--}}
{{--                    <a class="dropdown-item" href="#">EXCEL</a>--}}
{{--                    <a class="dropdown-item" href="#">PDF</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="card">
            <h5 class="card-header">Latest Members</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                        <tr class="border-0">
                            <th class="border-0">Name</th>
                            <th class="border-0">Phone</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Gender</th>
                            <th class="border-0">Position</th>
                            <th class="border-0">State</th>
                            <th class="border-0">LGA</th>
                            <th class="border-0">Services</th>
                            <th class="border-0">Ward</th>
                            <th class="border-0">Unit</th>
                            <th class="border-0">Disability</th>
                            <th class="border-0">Edit</th>
                            <th class="border-0">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->ofFullName() }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->state }}</td>
                                <td>{{ $user->village }}</td>
                                <td>{{ $user->services }}</td>
                                <td>{{ $user->ward }}</td>
                                <td>{{ $user->unit }}</td>
                                <td>{{ $user->disability }}</td>

                                <!--edit loop-->
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal{{$user->id}}">
                                        <i class="fas fa-edit    "></i>
                                    </button>
                                </td>
                                <!--edit loop ends-->
                                <!--edit modal-->
                                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url ('edit/'.$user->id)}}" method="POST" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}

                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">First Name</label>
                                                            <input type="text"
                                                                class="form-control @error('first_name') border border-danger @enderror"
                                                                id="formGroupExampleInput" name="first_name" value="{{ $user->first_name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput2">Last Name</label>
                                                            <input type="text"
                                                                class="form-control @error('last_name') border border-danger @enderror"
                                                                id="formGroupExampleInput2" name="last_name" value="{{$user->last_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput3">Phone Number</label>
                                                            <input type="text"
                                                                class="form-control @error('phone_number') border border-danger @enderror"
                                                                id="formGroupExampleInput3" name="phone_number" value="{{$user->phone_number}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput4">Email</label>
                                                            <input type="text"
                                                                class="form-control @error('email') border border-danger @enderror"
                                                                id="formGroupExampleInput3" name="email" value="{{ $user->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="bo text-center mx-auto">
                                                        <button type="submit" class="btn btn-primary">Edit
                                                            Member</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>


                                  <!-- delete loop-->
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                                    <i class="fas fa-trash    "></i>
                                </button>
                            </td>
                                    <!-- delete loop ends-->
                            <!-- -->
                            <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <div class="modal-header text-center mx-auto">
                                            <div class="modal-title" id="exampleModalLabel"><i class="fas fa-paw  shadow  "></i></div>

                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure you want to delete this Member? </p>
                                        </div>
                                        <div class="modal-footer text-center mx-auto">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{ $users->render() }}
    </div>
</div>






