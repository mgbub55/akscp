<style>
    .file-wrapper {
  position: relative;
  overflow: hidden;
}
.files {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
</style>
<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
        <div class=" d-flex d-md-flex d-sm-flex justify-content-between mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            Add Member
        </button>
        <form action="{{ route('importpdf') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="file btn btn-lg btn-primary file-wrapper">
                Import
                <input type="file" name="file" class="files" onchange="this.form.submit()"/>
            </div>

            {{-- <div class="div text">
            <input type="file" name="file" id="">
            </div> --}}
            {{-- <button class="btn btn-primary">Upload</button> --}}
        </form>
        </div>
        <!-- Modal -->


        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Add Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="d-md-flex">
                                <div class="form-group w-100">
                                    <label for="formGroupExampleInput">First Name</label>
                                    <input type="text"
                                        class="form-control @error('first_name') border border-danger @enderror"
                                        id="formGroupExampleInput" name="first_name" required>
                                </div>
                                <div class="form-group w-100 ml-lg-2">
                                    <label for="formGroupExampleInput2">Last Name</label>
                                    <input type="text"
                                        class="form-control @error('last_name') border border-danger @enderror"
                                        id="formGroupExampleInput2" name="last_name" required>
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group w-100">
                                    <label for="formGroupExampleInput3">Phone Number</label>
                                    <input type="text"
                                        class="form-control @error('phone_number') border border-danger @enderror"
                                        id="formGroupExampleInput3" name="phone_number" required>
                                </div>
                                <div class="form-group w-100 ml-lg-2">
                                    <label for="formGroupExampleInput4">Email</label>
                                    <input type="email"
                                        class="form-control @error('email') border border-danger @enderror"
                                        id="formGroupExampleInput3" name="email" required>
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group  w-100">
                                    <label for="formGroupExampleInput5">Gender</label>
                                    <select class="form-control form-control-sm" name="gender" id="" required>
                                        <option></option>
                                        <option>Eunuch</option>
                                        <option>Female</option>
                                        <option>Intersex</option>
                                        <option>Male</option>
                                        <option>Non-Conforming</option>
                                        <option>Trans</option>
                                        <option>Personal</option>
                                    </select>
                                </div>
                                <div class="form-group w-100 ml-lg-2">
                                    <label for="formGroupExampleInput2">Position</label>
                                    <select class="form-control form-control-sm" name="position" id="" required>
                                        <option></option>
                                        <option>Exco</option>
                                        <option>Group Leader</option>
                                        <option>Member</option>
                                        <option>Party Leader</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group  w-100">
                                    <label for="formGroupExampleInput7">Local Government</label>
                                    <select class="form-control form-control-sm" name="village" id="" required>
                                        <option></option>
                                        <option>Abak</option>
                                        <option>Eket</option>
                                        <option>Eastern Obolo</option>
                                        <option>Essien Udim</option>
                                        <option>Etim Ekpo</option>
                                        <option>Etinan</option>
                                        <option>Esit Eket</option>
                                        <option>Ibeno</option>
                                        <option>Ibesikpo Asutan</option>
                                        <option>Ibiono Ibom</option>
                                        <option>IKA</option>
                                        <option>Ikono</option>
                                        <option>Ikot Abasi</option>
                                        <option>Ikot Ekpene</option>
                                        <option>Mkpa Enin</option>
                                        <option>Nsit Atai</option>
                                        <option>Nsit Ibom</option>
                                        <option>Nsit Ubium</option>
                                        <option>Obot Akara</option>
                                        <option>Okobo</option>
                                        <option>Onna</option>
                                        <option>Oron</option>
                                        <option>Oruk Anam</option>
                                        <option>Udung Uko</option>
                                        <option>Ukanafun</option>
                                        <option>Uruan</option>
                                        <option>Urue offong/oruko</option>
                                        <option>Uyo</option>
                                    </select>
                                </div>
                                <div class="form-group w-100 ml-lg-2">
                                    <label for="formGroupExampleInput2">Services</label>
                                    <select class="form-control form-control-sm" name="services" id="" required>
                                        <option></option>
                                        <option>other</option>
                                        <option>Training</option>
                                        <option>Workshops (stakeholders)</option>
                                        <option>Financial management</option>
                                        <option>Budgeting</option>
                                        <option>Peer support and mentoring</option>
                                        <option>Equipment Purchase</option>
                                        <option>Research on SRHR and SGBV</option>
                                        <option>Setting up and maintenance of Web</option>
                                        <option>Monitoring State budgets on SRHR and GBV</option>
                                        <option>Evidence gathering/visits to health centres</option>
                                        <option>Health & Community Services</option>
                                        <option>Education (Step it up campaign)</option>
                                        <option>Education (Public meetings)</option>
                                        <option>Education (Essay Competitions)</option>
                                        <option>Design and production of IEC materials</option>
                                        <option>Dissemination of IEC materials</option>
                                        <option>Media (Drama, Jingles, Newsletters, Radio, Television)</option>
                                        <option>Mapping of State Laws on GBV and SRHR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group w-100">
                                    <label for="formGroupExampleInput9">Unit</label>
                                    <input type="text"
                                        class="form-control @error('unit') border border-danger @enderror"
                                        id="formGroupExampleInput3" name="unit" required>
                                </div>
                                <div class="form-group w-100 ml-lg-2">
                                    <label for="formGroupExampleInput8">Ward</label>
                                    <input type="number"
                                        class="form-control @error('ward') border border-danger @enderror"
                                        id="formGroupExampleInput3" name="ward" required>
                                </div>
                                <div class="form-group w-100 ml-lg-2">
                                    <label for="formGroupExampleInput2">Disability</label>
                                    <select class="form-control form-control-sm" name="disability" id="" required>
                                        <option></option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="bo text-center mx-auto">
                                <button type="submit" class="btn btn-primary">Add Member</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Members</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">Name</th>
                                <th class="border-0">Phone</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Gender</th>
                                <th class="border-0">Services</th>
                                <th class="border-0">Position</th>
                                <th class="border-0">State</th>
                                <th class="border-0">LGA</th>
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
                                    <td>{{ $user->services }}</td>
                                    <td>{{ $user->position }}</td>
                                    <td>{{ $user->state }}</td>
                                    <td>{{ $user->village }}</td>  <!--LGA-->
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

{{--                                        </button>--}}
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






