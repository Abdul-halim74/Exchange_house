<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('img/bankLogo/One_bank.jpg') }}" alt="onebank Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">Gate Pass</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Settings --}}
                <li class="nav-item @yield('settings')">
                    <a href="#" class="nav-link @yield('settings_a')">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.user_list') }}" class="nav-link @yield('user_list')">
                                <i class="fas fa-users nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user_create') }}" class="nav-link @yield('new_user')">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.branch_list') }}" class="nav-link @yield('branch')">
                                <i class="fas fa-code-branch nav-icon"></i>
                                <p>Branch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}" class="nav-link @yield('department')">
                                <i class="fas fa-building nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        {{-- @isset(auth()->user()->role->permission['permission']['agent']['view'])
                            <li class="nav-item">
                                <a href="{{ route('admin.agent_info_list') }}" class="nav-link @yield('agent')">
                                    <i class="fas fa-user-cog nav-icon"></i>
                                    <p>Agent Bank Setup</p>
                                </a>
                            </li>
                        @endisset
                        @isset(auth()->user()->role->permission['permission']['currency']['view'])
                            <li class="nav-item">
                                <a href="{{ route('admin.currency') }}" class="nav-link @yield('currency')">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Add New Currency</p>
                                </a>
                            </li>
                        @endisset
                        @isset(auth()->user()->role->permission['permission']['rate']['view'])
                            <li class="nav-item">
                                <a href="{{ route('admin.currency_rate') }}" class="nav-link @yield('currency-rate')">
                                    <i class="nav-icon fas fa-money-bill-alt"></i>
                                    <p>Currency Rate</p>
                                </a>
                            </li>
                        @endisset
                        @isset(auth()->user()->role->permission['permission']['fee']['view'])
                            <li class="nav-item">
                                <a href="{{ route('admin.transaction_charge_list') }}" class="nav-link @yield('trn-fee')">
                                    <i class="fab fa-cuttlefish nav-icon"></i>
                                    <p>Agent Bank Commission Setup</p>
                                </a>
                            </li>
                        @endisset --}}
                    </ul>
                </li>

                {{-- Visitor section --}}
                <li class="nav-item @yield('visitor')">
                    <a href="#" class="nav-link @yield('settings_a')">
                        <i class="fab fa-intercom nav-icon"></i>
                        <p>
                            Visitors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('visitors.index') }}" class="nav-link @yield('all-visitor')">
                                <i class="fas fa-users nav-icon"></i>
                                <p>All Visitor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('visitors.create') }}" class="nav-link @yield('new-visitor')">
                                <i class=" nav-icon fas fa-user-plus"></i>
                                <p>Add Visitor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Visitor Request --}}
                <li class="nav-item @yield('meeting_request')">
                    <a href="#" class="nav-link @yield('settings_a')">
                        {{-- <i class="nav-icon fas fa-tools"></i> --}}
                        <i class="fas fa-handshake nav-icon"></i>
                        <p>
                            Visitor Request
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.create-user-wise-visitor') }}" class="nav-link @yield('create-meeting')">
                                <i class=" nav-icon fas fa-user-plus"></i>
                                <p>Create visitor request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user-wise-new-request') }}" class="nav-link @yield('new-meeting')">
                                <i class=" nav-icon fas fa-user-plus"></i>
                                <p>New Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user-wise-request') }}" class="nav-link @yield('all-meeting')">
                                <i class="fas fa-users nav-icon"></i>
                                <p>All Request</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Reports --}}
                <li class="nav-item @yield('reports')">
                    <a href="#" class="nav-link @yield('settings_a')">
                        <i class="fas fa-flag-checkered nav-icon"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('reports_generate') }}" class="nav-link @yield('report_visitor')">
                                <i class=" nav-icon fas fa-user-plus"></i>
                                <p>Visitor Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Profile Setting --}}
                <li class="nav-item @yield('profileSetting')">
                    <a href="#" class="nav-link @yield('profileSetting')">
                        <i class="fas fa-address-card nav-icon"></i>
                        <p>
                            Profile Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('userProfile')}}" class="nav-link @yield('user_profile')">
                                <i class=" nav-icon far fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Customer info --}}
                @isset(auth()->user()->role->permission['permission']['customer']['view'])
                    <li class="nav-item @yield('c_info')">
                        <a href="#" class="nav-link @yield('c_info_a')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Customer info
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @isset(auth()->user()->role->permission['permission']['customer.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.customer_add') }}" class="nav-link @yield('c_add')">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>Customer Add</p>
                                    </a>
                                </li>
                            @endisset
                            @isset(auth()->user()->role->permission['permission']['customer.auth']['auth'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.customer_auth') }}" class="nav-link @yield('c_auth')">
                                        <i class="nav-icon fas fa-user-check"></i>
                                        <p>Customer Authorize</p>
                                    </a>
                                </li>
                            @endisset
                            @isset(auth()->user()->role->permission['permission']['customer.edit']['edit'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.customer_edit') }}" class="nav-link @yield('c_update')">
                                        <i class="nav-icon fas fa-user-edit"></i>
                                        <p>Customer Update</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                {{-- Account info --}}
                @isset(auth()->user()->role->permission['permission']['account']['view'])
                    <li class="nav-item @yield('a_info')">
                        <a href="#" class="nav-link @yield('a_info_a')">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Account info
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @isset(auth()->user()->role->permission['permission']['account.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.account_create') }}" class="nav-link @yield('a_add')">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>Account Create</p>
                                    </a>
                                </li>
                            @endisset
                            @isset(auth()->user()->role->permission['permission']['account.auth']['auth'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.account_authorize') }}" class="nav-link @yield('a_auth')">
                                        <i class="nav-icon fas fa-user-check"></i>
                                        <p>Account Authorize</p>
                                    </a>
                                </li>
                            @endisset
                            @isset(auth()->user()->role->permission['permission']['account.edit']['edit'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.account_edit') }}" class="nav-link @yield('a_update')">
                                        <i class="nav-icon fas fa-user-edit"></i>
                                        <p>Account Update</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                {{-- Transaction info --}}
                @isset(auth()->user()->role->permission['permission']['remittance']['view'])
                    <li class="nav-item @yield('t_info')">
                        <a href="#" class="nav-link @yield('t_info_a')">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Remittance info
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @isset(auth()->user()->role->permission['permission']['remittance.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.transaction_crate_search') }}" class="nav-link @yield('t_add')">
                                        <i class="nav-icon fas fa-wallet"></i>
                                        <p>Remittance</p>
                                    </a>
                                </li>
                            @endisset
                            @isset(auth()->user()->role->permission['permission']['remittance.auth']['auth'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.transaction_auth') }}" class="nav-link @yield('t_auth')">
                                        <i class="nav-icon fas fa-check-double"></i>
                                        <p>Remittance Authorize</p>
                                    </a>
                                </li>
                            @endisset
                            <li class="nav-item">
                                <a href="{{ route('admin.trackTransaction') }}" class="nav-link @yield('t_track')">
                                    <i class="nav-icon fas fa-map-pin"></i>
                                    <p>Track</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endisset

                {{-- Report --}}
                {{-- <li class="nav-item @yield('report')">
                    <a href="#" class="nav-link @yield('report_a')">
                        <i class="nav-icon fab fa-readme"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.transaction_report')}}" class="nav-link @yield('transaction')">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>Transaction Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.account_report')}}" class="nav-link @yield('account')">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Account Report</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- Role and permission Section --}}
                @isset(auth()->user()->role->permission['permission']['role']['view'])
                    <li class="nav-item  @yield('role_permission')">
                        <a href="#" class="nav-link @yield('role_permission_a')">
                            <i class="nav-icon fas fa-project-diagram"></i>
                            <p>Role & Permission <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @isset(auth()->user()->role->permission['permission']['role']['view'])
                                <li class="nav-item">
                                    @isset(auth()->user()->role->permission['permission']['role.index']['list'])
                                        <a href="{{ route('role.index') }}" class="nav-link @yield('role')">
                                            <i class="nav-icon fas fa-plus-circle"></i>
                                            <p>Create new role</p>
                                        </a>
                                    @endisset
                                </li>
                            @endisset

                            @isset(auth()->user()->role->permission['permission']['permission.index']['list'])
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}" class="nav-link @yield('permission')">
                                        <i class="nav-icon fas fa-parking"></i>
                                        <p>Permission List</p>
                                    </a>
                                </li>
                            @endisset

                            @isset(auth()->user()->role->permission['permission']['permission.index']['list'])
                                <li class="nav-item">
                                    <a href="{{ route('permission.create') }}" class="nav-link @yield('permission_create')">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p>Permission add</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                {{-- User Section --}}
                @isset(auth()->user()->role->permission['permission']['user']['view'])
                    <li class="nav-item  @yield('user')">
                        <a href="#" class="nav-link @yield('user_a')">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>User management<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @isset(auth()->user()->role->permission['permission']['user.index']['list'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.user_list') }}" class="nav-link @yield('user_list')">
                                        <i class="nav-icon fas fa-id-card"></i>
                                        <p>User list</p>
                                    </a>
                                </li>
                            @endisset

                            @isset(auth()->user()->role->permission['permission']['user.create']['create'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.user_create') }}" class="nav-link @yield('user_create')">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>User add</p>
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </li>
                @endisset

                {{-- Logout --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-power"></i> Sign Out
                    </a>
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
