@if(getUser()->can('users'))
<li class="nav-item">
    <a href="{{ route('admin.user.index') }}" class="nav-link @yield("user")">
        <i class="nav-icon fa fa-users iCheck"></i>
        <p>Users</p>
    </a>
</li>
@endif
@if(getUser()->can('roles'))
<li class="nav-item">
    <a href="{{ route('admin.role.index') }}" class="nav-link @yield("role")">
        <i class="nav-icon fa fa-th-list iCheck"></i>
        <p>Roles</p>
    </a>
</li>
@endif

@can('sliders')
<li class="nav-item">
    <a href="{{ route('admin.slider.index') }}" class="nav-link @yield(" slider")">
        <i class="nav-icon fa fa-image iCheck"></i>
        <p>Sliders</p>
    </a>
</li>
@endcan

<li class="nav-item">
    <a href="{{ route('admin.about.index') }}" class="nav-link @yield(" about")">
        <i class="nav-icon fa fa-cog iCheck"></i>
        <p>About Section</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.service.index') }}" class="nav-link @yield(" service")">
        <i class="nav-icon fa fa-th-list iCheck"></i>
        <p>Service</p>
    </a>
</li>
@can('program')
<li class="nav-item">
    <a href="{{ route('admin.program.index') }}" class="nav-link @yield(" program")">
        <i class="nav-icon fa fa-calendar-alt iCheck"></i>
        <p>Program</p>
    </a>
</li>
@endcan
@can('district-eye-care-center')
<li class="nav-item">
    <a href="{{ route('admin.eyecenter.index') }}" class="nav-link @yield(" eyecenter")">
        <i class="nav-icon fa fa-clinic-medical iCheck"></i>
        <p>District Eye Care Center</p>
    </a>
</li>
@endcan
@can('partner')
<li class="nav-item">
    <a href="{{ route('admin.partner.index') }}" class="nav-link @yield(" partner")">
        <i class="nav-icon fa fa-users iCheck"></i>
        <p>Partner</p>
    </a>
</li>
@endcan
@can('resource-section')
<li class="nav-item {{ $resourceNav || $resdataNav ? $menu : '' }}">
    <a href="#" class="nav-link {{ $resourceNav || $resdataNav ? $active : '' }}">
        <i class="nav-icon fa fa-th-list iCheck"></i>
        <p>
            Resource Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.resource.category.index') }}" class="nav-link @yield(" resource_category")">
                <i class="nav-icon far fa-circle iCheck"></i>
                <p>Resource Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.resource.data.index') }}" class="nav-link @yield(" resource_data")">
                <i class="nav-icon far fa-circle iCheck"></i>
                <p>Resource Data</p>
            </a>
        </li>
    </ul>
</li>
@endcan
@can('gallery')
<li class="nav-item">
    <a href="{{ route('admin.gallery.index') }}" class="nav-link @yield(" gallery")">
        <i class="nav-icon fa fa-image iCheck"></i>
        <p>Gallery</p>
    </a>
</li>
@endcan
@can('news')
<li class="nav-item">
    <a href="{{ route('admin.news.index') }}" class="nav-link @yield(" news")">
        <i class="nav-icon fa fa-newspaper iCheck"></i>
        <p>News</p>
    </a>
</li>
@endcan
@can('member')
<li class="nav-item">
    <a href="{{ route('admin.member.index') }}" class="nav-link @yield(" member")">
        <i class="nav-icon fa fa-user iCheck"></i>
        <p>Member</p>
    </a>
</li>
@endcan
@can('academic-section')
<li class="nav-item {{ $academicNav || $subacademicNav ? $menu : '' }}">
    <a href="#" class="nav-link {{ $academicNav || $subacademicNav ? $active : '' }}">
        <i class="nav-icon fa fa-th-list iCheck"></i>
        <p>
            Academic Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.academic.index') }}" class="nav-link @yield(" academic")">
                <i class="nav-icon far fa-circle iCheck"></i>
                <p>Academic</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.subacademic.index') }}" class="nav-link @yield(" subacademic")">
                <i class="nav-icon far fa-circle iCheck"></i>
                <p>Sub Academic</p>
            </a>
        </li>
    </ul>
</li>
@endcan
@can('general-setting')
<li class="nav-item {{ $generalNav || $socialNav ? $menu : '' }}">
    <a href="#" class="nav-link {{ $generalNav || $socialNav ? $active : '' }}">
        <i class="nav-icon fa fa-cogs iCheck"></i>
        <p>
            General Settings
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.general.index') }}" class="nav-link @yield('general-setting')">
                <i class="nav-icon fa fa-building iCheck"></i>
                <p>Company Information</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.social.index') }}" class="nav-link @yield('social')">
                <i class="nav-icon fa fa-share-alt iCheck"></i>
                <p>Socials</p>
            </a>
        </li>
    </ul>
</li>
@endcan