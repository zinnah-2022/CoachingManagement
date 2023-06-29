<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('userHome')}}" class="brand-link text-center">
        <span class="brand-text font-weight-light">SCC Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/user/image/'.\Illuminate\Support\Facades\Auth::user()->image)}}"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('userHome')}}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(\Illuminate\Support\Facades\Auth::user()->status == '1')
                    <li class="nav-item">
                        <a href="{{route('userHome')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                DASHBOARD
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('exam.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                MCQ EXAM
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('profile')}}" class="nav-link">
                            <i class="nav-icon fas fa-pen-nib"></i>
                            <p>
                                RESULT VIEW
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('noteIndex')}}" class="nav-link">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>
                                ICT NOTES
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('economicIndex')}}" class="nav-link">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>
                                ECONOMICS NOTES
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('editor.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-code"></i>
                            <p>
                                HTML NOTEPAD
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
                @else
                    <li class="nav-header">Pending</li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
