            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">PARAMA</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">PRM</a>
                    </div>
                    <ul class="sidebar-menu">
                    @if (auth()->user()->role_id == 1)
                        <li class="menu-header">Dashboard</li>
                        <li><a class="nav-link" href="/dashboard"><i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a></li>
                        <li><a class="nav-link" href="{{ route('news.index') }}"><i class="fas fa-newspaper"></i>
                                <span>News</span></a></li>
                        <li><a class="nav-link" href="{{ route('youtube.index') }}"><i class="fab fa-fw fa-youtube"></i>
                                <span>Youtube</span></a></li>
                    @endif

                        <li class="menu-header">Details</li>
                        <li><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-fw fa-users"></i>
                                <span>Users</span></a></li>
                        <li><a class="nav-link" href="{{ route('announcement.index') }}"><i
                                    class="fas fa-fw fa-paperclip"></i>
                                <span>Announcement</span></a></li>
                        <li><a class="nav-link" href="{{ route('bill.index') }}"><i class="fas fa-fw fa-money-bill-wave"></i>
                                <span>Bill</span></a></li>
                        <li><a class="nav-link" href="{{ route('complaint.index') }}"><i class="fas fa-fw fa-question-circle"></i>
                                <span>Complain</span></a></li>
                        <li><a class="nav-link" href="{{ route('sto.index') }}"><i class="fas fa-fw fa-layer-group"></i>
                                <span>Statement of Account</span></a></li>

                    @if (auth()->user()->role_id == 1)
                        <li class="menu-header">Content Management System</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-cog"></i><span>Home</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('header.index') }}">Section Header</a></li>
                                <li><a class="nav-link" href="{{ route('service.index') }}">Section Services</a></li>
                                <li><a class="nav-link" href="{{ route('about.index') }}">Section About</a></li>
                                <li><a class="nav-link" href="{{ route('info.index') }}">Section Info</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-fw fa-cog"></i><span>Product</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('unit.index') }}">Section Product</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-fw fa-cog"></i><span>Fasilities</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('facilities.index') }}">Section Fasilities</a></li>
                            </ul>
                        </li>

                        <li><a class="nav-link" href="{{ route('gallery.index') }}"><i class="fas fa-fw fa-image"></i>
                                <span>Gallery</span></a></li>
                        <li><a class="nav-link" href="{{ route('contact.index') }}"><i class="fas fa-fw fa-phone"></i>
                                <span>Contact Us</span></a></li>
                    @endif
                    </ul>
                </aside>
            </div>
