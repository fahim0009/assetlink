    <!-- header -->
    <section class="siteHeader">
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light py-0 bg-light ">

                    <a class="navbar-brand" href="{{ route('assetmanager')}}">
                        <img src="{{ asset('admin/images/brand.png')}}" class="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="iconify text-white fs-3" data-icon="gg:menu-grid-o"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto navCustom">
                            <!-- "me-auto" for left align | "ms-auto" for right align | "mx-auto" for center align--->
                            <li class="nav-item">
                                <a class="nav-link" href="">dashboard</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownItem" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Groups
                                </a>
                                <ul class="dropdown-menu border-0 shadow-lg" aria-labelledby="dropdownItem">
                                    <li><a class="dropdown-item" href="#">Introduction</a></li>
                                    <li><a class="dropdown-item" href="#">Mission</a></li>
                                    <li><a class="dropdown-item" href="#">Vission</a></li>
                                    <li><a class="dropdown-item" href="#">Certificate</a></li>
                                </ul>
                            </li> -->


                            <li class="nav-item">
                                <a class="nav-link" href="{{route('assetmanager')}}">Asset Manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.users')}}">All Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Brand</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" ">Vendors</a>
                            </li>
                            
                            <li class="nav-item dropdown" name="permission">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownItem" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('admin/images/user.png')}}" width="25px" class="rounded-circle" alt="">
                                </a>
                                <ul class="dropdown-menu  border-0 shadow-lg" aria-labelledby="dropdownItem" >
                                    <li><a class="dropdown-item" href="{{ route('profile')}}">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">menus</a></li> 
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                           
                             
                        </ul>
                    </div>

                </nav>

            </div>
        </div>

    </section>