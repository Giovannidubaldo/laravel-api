<div class="sidebar">
    <ul class=" list-unstyled ">
        <li>
            <a class="sidebarLink {{ Route::currentRouteName() == 'admin.dashboard' ? 'activeRoute' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a class="sidebarLink {{ Route::currentRouteName() == 'admin.projects.index' ? 'activeRoute' : '' }} ||
            {{ Route::currentRouteName() == 'admin.projects.create' ? 'activeRoute' : '' }} ||
            {{ Route::currentRouteName() == 'admin.projects.show' ? 'activeRoute' : '' }} ||
            {{ Route::currentRouteName() == 'admin.projects.edit' ? 'activeRoute' : '' }}"
                href="{{ route('admin.projects.index') }}">
                <i class="fa-solid fa-folder"></i>
                Projects
            </a>
        </li>
        <li>
            <a class="sidebarLink {{ Route::currentRouteName() == 'admin.types.index' ? 'activeRoute' : '' }} ||
            {{ Route::currentRouteName() == 'admin.types.show' ? 'activeRoute' : '' }}"
                href="{{ route('admin.types.index') }}">
                <i class="fa-solid fa-list"></i>
                Type
            </a>
        </li>
    </ul>
</div>
