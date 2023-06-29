<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
       <span class="brand-text font-weight-light">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/user/image/default.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Taher Mahmud</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('adminHome')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('groupby')}}" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>View Batch</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Student Module
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('student1')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('active')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('studentPending')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Student</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Fees Module
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('unpaidBatch')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('unpaid')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unpaid</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('paidList')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('daymake.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Day</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('maketime.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('messageUnpaid')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create SMS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('lessen.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            PRINT MCQ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('notes.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Class Notes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('editor.index')}}" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            HTML Editor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('showResult')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Online Exam
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="pl-3 text-info" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">



                        <i class="nav-icon fas fa-power-off"></i> {{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
