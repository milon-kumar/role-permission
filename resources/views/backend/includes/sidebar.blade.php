<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>
        @can("Dashboard.View")
            <li>
                <a href="{{route('dashboard')}}" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-dashboards">Dashboards</span>
                </a>
            </li>
        @endcan
        @can('User.List')
            <li>
                <a href="{{route('user.index')}}" class="waves-effect">
                    <i class="bx bx-layout"></i>
                    <span key="t-layouts">User</span>
                </a>
            </li>
        @endcan
        @can('Role.List')
            <li>
                <a href="{{ route('role-permission.index') }}" class="waves-effect">
                    <i class="bx bx-layout"></i>
                    <span key="t-layouts">Role</span>
                </a>
            </li>
        @endcan
    </ul>
</div>
