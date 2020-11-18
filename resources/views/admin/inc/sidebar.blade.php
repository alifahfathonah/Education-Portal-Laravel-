<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar ">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="#" title="Sleek Dashboard">
                <svg
                    class="brand-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid"
                    width="30"
                    height="33"
                    viewBox="0 0 30 33"
                >
                    <g fill="none" fill-rule="evenodd">
                        <path
                            class="logo-fill-blue"
                            fill="#7DBCFF"
                            d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                        />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name text-truncate">School of Engineers</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Skill Development</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/skill-development') show @endif"  id="dashboard"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.skill.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.skill.index')}}">
                                    <span class="nav-text">Index</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.skill.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.skill.create')}}">
                                    <span class="nav-text">Add Skill</span>

                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.skill.trash.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.skill.trash.index')}}">
                                    <span class="nav-text">Trash</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tips"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Tips and Tricks</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/tips-and-tricks') show @endif"  id="tips"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.tips.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.tips.index')}}">
                                    <span class="nav-text">Index</span>

                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.tips.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.tips.create')}}">
                                    <span class="nav-text">Add Tips and Tricks</span>

                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.tips.trash.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.tips.trash.index')}}">
                                    <span class="nav-text">Trash</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
