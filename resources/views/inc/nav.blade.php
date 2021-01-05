<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{ asset('app-assets/images/backgrounds/02.jpg') }}">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="brand-logo" alt="Skooleo logo" src="{{ asset('favicon.png') }}"/>
                <h3 class="brand-text">SKOOLEO CC</h3>
            </a>
        </li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="la la-dashboard"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>

            {{-- @can('payouts requery') --}}
                <li class=" nav-item">
                    <a href="#">
                        <i class="la la-building"></i>
                        <span class="menu-title" data-i18n="">Schools</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Request::is('schools') || Request::is('schools/*') ? 'active':'' }}">
                            <a class="menu-item" href="{{ route('schools') }}">View</a>
                        </li>
                    </ul>
                </li>
            {{-- @endcan --}}

            <li class=" nav-item">
                <a href="#">
                    <i class="la la-file-text"></i>
                    <span class="menu-title" data-i18n="">Invoices</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('invoices')?'active':'' }}">
                        <a class="menu-item" href="{{ route('invoices') }}">View</a>
                    </li>
                </ul>
            </li>

            {{-- @can('view balances') --}}
                <li class="{{ Request::is('academic-session')?'active':'' }}">
                    <a href="{{ route('academic.session') }}">
                        <i class="la la-certificate"></i>
                        <span class="menu-title" data-i18n="">Academic Session</span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- @can('view balances') --}}
                <li class="{{ Request::is('web-settings')?'active':'' }}">
                    <a href="{{ route('web.settings') }}">
                        <i class="la la-cog"></i>
                        <span class="menu-title" data-i18n="">Web Settings</span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- @can('view balances') --}}
                <li class="{{-- Request::is('view-balance')?'active':'' --}}">
                    <a href="{{-- route('view.balance') --}}">
                        <i class="la la-bank"></i>
                        <span class="menu-title" data-i18n="">Gateway Balance</span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- @can('add users') --}}
                <li class="nav-item {{ Request::is('add-user') ? 'active' : '' }}">
                    <a href="{{ route('adduser') }}">
                        <i class="la la-user-plus"></i>
                        <span class="menu-title" data-i18n="">Users</span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- @can('roles and permissions') --}}
                <li class="nav-item">
                    <a href="#">
                        <i class="la la-share-alt"></i>
                        <span class="menu-title" data-i18n="">Roles/Permissions</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Request::is('set-roles') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('roles') }}">Set Roles</a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="{{ Request::is('set-permissions') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('permissions') }}">Set Permissions</a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="{{ Request::is('assign-permissions-to-roles') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('roles.permissions') }}">Permissions to Roles</a>
                        </li>
                    </ul>
                </li>
            {{-- @endcan --}}

            {{-- @can('view audit logs') --}}
                <li class="nav-item {{ Request::is('audit-logs') ? 'active' : '' }}">
                    <a href="{{ route('audit') }}">
                        <i class="la la-newspaper-o"></i>
                        <span class="menu-title" data-i18n="">Audit Logs</span>
                    </a>
                </li>
            {{-- @endcan --}}

            {{-- @can('view audit logs') --}}
                <li class="nav-item {{ Request::is('audit-logs') ? 'active' : '' }}">
                    <a href="{{ route('audit') }}">
                        <i class="la la-chain"></i>
                        <span class="menu-title" data-i18n="">Cron Jobs</span>
                    </a>
                </li>
            {{-- @endcan --}}

            <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="la la-power-off"></i>
                    <span class="menu-title" data-i18n="">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
  </div>
  <!-- END: Main Menu-->
