<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Virtual Organization</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">VO</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('home.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>
            @if (Auth::user()->role_id == '1')
            <li class="{{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('user.index') }}"><i class="far fa-user"></i> <span>User</span></a>
            </li>
            <li class="{{ Request::is('companies') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('companies.index') }}"><i class="far fa-building"></i> <span>Unit Destinasi</span></a>
            </li>
            <li class="{{ Request::is('positions') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('positions.index') }}"><i class="far fa-list-alt"></i> <span>Position</span></a>
            </li>
            <li class="{{ Request::is('invitations') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('invitations.index') }}"><i class="far fa-envelope"></i> <span>Invitation</span></a>
            </li>
            @endif

            <li class="{{ Request::is('tasks') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('tasks.index') }}"><i class="far fa-clipboard"></i> <span>Task</span></a>
            </li>

        </ul>
    </aside>
</div>
