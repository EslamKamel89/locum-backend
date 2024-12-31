<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{asset('dashboard/assets/images/users/1.jpg')}}" alt="users"
                                class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{Auth::guard('admin')->user()->name}}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="{{ route('admin.logout') }}" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">General</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="icon-Car-Wheel"></i>
                        <span class="hide-menu">Dashboards </span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Places</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">States</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.states.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.states.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new state</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">District</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.districts.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.districts.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new district</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Skills</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.skills.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.skills.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new Skills</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Langs</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.langs.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.langs.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new Langs</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Specialties</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.specialties.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.specialties.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new specialties</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Jobs</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.job_infos.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.job_infos.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new job</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Doctors</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.doctors.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.doctors.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new doctors</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Hospitals</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.hospitals.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('admin.hospitals.create') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">create new hospitals</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="icon-Mailbox-Empty"></i>
                        <span class="hide-menu">Job Applications</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.jobApplications.index') }}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">view all</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>