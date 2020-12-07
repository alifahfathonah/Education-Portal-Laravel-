<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar ">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{route('admin.mainpage')}}" title="Sleek Dashboard">
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
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#blog"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Blog</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/blog') show @endif @if($prefix === 'admin/blog/category') show @endif"  id="blog"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.blog.category.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.blog.category.index')}}">
                                    <span class="nav-text">Category</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.blog.category.trash') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.blog.category.trash')}}">
                                    <span class="nav-text">Category Trash</span>
                                </a>
                            </li>

                            <li class="@if($currentRouteName === 'admin.blog.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.blog.index')}}">
                                    <span class="nav-text">Index</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.blog.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.blog.create')}}">
                                    <span class="nav-text">Add Blog</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.blog.trash.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.blog.trash.index')}}">
                                    <span class="nav-text">Trash</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#partner"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Partner</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/partner') show @endif"  id="partner"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.partner.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.partner.index')}}">
                                    <span class="nav-text">Index</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.partner.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.partner.create')}}">
                                    <span class="nav-text">Add Partner</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.partner.trash.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.partner.trash.index')}}">
                                    <span class="nav-text">Trash</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#team"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">SOE Team</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/team') show @endif @if($prefix === 'admin/team/panel-name') show @endif"  id="team"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.team.panel.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.team.panel.index')}}">
                                    <span class="nav-text">Panel Name</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.team.panel.trash') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.team.panel.trash')}}">
                                    <span class="nav-text">Panel Name Trash</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.team.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.team.index')}}">
                                    <span class="nav-text">Index</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.team.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.team.create')}}">
                                    <span class="nav-text">Add Team</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.team.trash.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.team.trash.index')}}">
                                    <span class="nav-text">Trash</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#event"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Event/Campaign</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/event-campaign') show @endif @if($prefix === 'admin/team/panel-name') show @endif"  id="event"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.event.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.event.index')}}">
                                    <span class="nav-text">Index</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.event.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.event.create')}}">
                                    <span class="nav-text">Add Event</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#media"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Media</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/media/video-gallery') show @endif"  id="media"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.video.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.video.index')}}">
                                    <span class="nav-text">Video Index</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.video.create') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.video.create')}}">
                                    <span class="nav-text">Add Video</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#single"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Single Component</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/single-component/success-story' || $prefix === 'admin/single-component/slider' || $prefix === 'admin/single-component/photo-gallery') show @endif"  id="single"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.story.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.story.index')}}">
                                    <span class="nav-text">Success Story</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.slider.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.slider.index')}}">
                                    <span class="nav-text">Slider</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.photo.gallery.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.photo.gallery.index')}}">
                                    <span class="nav-text">Photo Gallery</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ouractivity"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Our Activity</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/our-activity/activity') show @elseif($prefix === 'admin/our-activity/activity-panel') show @elseif($prefix === 'admin/our-activity/activity-post') show @endif"  id="ouractivity"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="@if($currentRouteName === 'admin.activity.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.activity.index')}}">
                                    <span class="nav-text">Activity</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.activity.panel.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.activity.panel.index')}}">
                                    <span class="nav-text">Activity Panel</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.activity.post.index') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.activity.post.index')}}">
                                    <span class="nav-text">Activity Post</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#document"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Upload Document</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse @if($prefix === 'admin/document-upload/user-upload') show @endif"  id="document"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="@if($currentRouteName === 'admin.document.user.pending') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.document.user.pending')}}">
                                    <span class="nav-text">Pending List</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.document.user.approve') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.document.user.approve')}}">
                                    <span class="nav-text">Approved List</span>
                                </a>
                            </li>
                            <li class="@if($currentRouteName === 'admin.document.user.reject') active @endif">
                                <a class="sidenav-item-link" href="{{route('admin.document.user.reject')}}">
                                    <span class="nav-text">Rejected List</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
