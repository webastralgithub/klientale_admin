<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('dashboard')}}" class="navbar-brand mx-4 mt-3">
            <h3>Klientale Admin</h3>
        </a>
        <div class="navbar-nav w-100">
            <a class="nav-item nav-link {{ request()->is('*/dashboard') ? 'active' : '' }}"
                href="{{route('dashboard')}}">
                <img src="{{asset('img/side-icon1.svg')}}" class="img" /> Dashboard</a>
            @canany(['create-category', 'edit-category', 'delete-category','create-user', 'edit-user', 'delete-user,create-role', 'edit-role', 'delete-role'])
            <div class="nav-item dropdown">
                <a href="#" class="nav-item nav-link dropdown-toggle toggle-menu-dropdown" data-bs-toggle="dropdown">
                    <img src="{{asset('img/administration.svg')}}" class="img" /></i>Administration</a>
                <div class="dropdown-menu bg-transparent border-0 toggle-menu">
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                    <a class="nav-item nav-link {{ request()->is('*/users') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <img src="{{asset('img/8666755_users_group_icon.svg')}}" class="img" /></i> Manage Users</a>
                    @endcanany

                    @canany(['create-role', 'edit-role', 'delete-role'])
                    <a class="nav-item nav-link {{ request()->is('*/roles') ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        <img src="{{asset('img/4634467_category_interface_link_categories_icon.svg')}}"
                            class="img" /></i> Manage Roles</a>
                    @endcanany
                </div>
            </div>
            @canany(['create-category', 'edit-category', 'delete-category','create-user', 'edit-user', 'delete-user,create-role', 'edit-role', 'delete-role'])
            <a class="nav-item nav-link {{ request()->is('*/dashboard') ? 'active' : '' }}"
                href="{{route('membership.index')}}">
                <img src="{{asset('img/9043994_category_icon.svg')}}" class="img" /> Memberships</a>
                @endcanany
        </div>
    </nav>
</div>
<!-- Sidebar End -->