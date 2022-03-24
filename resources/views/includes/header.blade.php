

    <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
         <nav class="navbar navbar-expand-lg bg-white fixed-top">
             <a class="navbar-brand" href="{{ route('dashboard') }}">AKSCP</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse " id="navbarSupportedContent">
                 <ul class="navbar-nav ml-auto navbar-right-top">
                     <li class="nav-item">
                         <form action="{{ route('users.search', $source) }}" method="POST">
                            @csrf
                            <div id="custom-search" class="top-search-bar d-md-flex">
                                <input class="form-control" type="text" placeholder="Search.." name="gender">
                                <button type="submit" class="btn btn-dark input-group-append"><i class="fas fa-search"></i></button>
                            </div>

                         </form>
                     </li>
                     <li class="nav-item dropdown nav-user">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" style="border: none; background-color:transparent; outline: 0;" class="nav-link nav-user-img">
                                <i class="fas fa-power-off mr-2"></i>
                            </button>
                        </form>
                     </li>
                 </ul>
             </div>
         </nav>
     </div>
