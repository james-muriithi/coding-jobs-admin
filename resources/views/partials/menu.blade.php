<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('job_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/jobs*") ? "c-show" : "" }} {{ request()->is("admin/posted-jobs*") ? "c-show" : "" }} {{ request()->is("admin/twitter-user-jobs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.jobManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('job_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.job.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('posted_job_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.posted-jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/posted-jobs") || request()->is("admin/posted-jobs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-twitter c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.postedJob.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('twitter_user_job_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.twitter-user-jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/twitter-user-jobs") || request()->is("admin/twitter-user-jobs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-envelope c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.twitterUserJob.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('twitter_user_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.twitter-users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/twitter-users") || request()->is("admin/twitter-users/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-user-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.twitterUser.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>