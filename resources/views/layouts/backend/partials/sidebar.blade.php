<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('storage/profile/'.Auth::user()->image) }}" width="50" height="50" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">

                    <li>
                        <a href="{{ Auth::user()->role->id == 1 ? route('admin.settings') : route('author.settings') }}">
                            <i class="material-icons">settings</i> Settings
                        </a>
                    </li>

                    <li role="separator" class="divider"></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>{{ __('Sign Out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="p">MAIN NAVIGATION</li>

            {{--Admin Part--}}
            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard')? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/category*')? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <i class="material-icons">apps</i>
                        <span>Category</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/tag*')? 'active' : '' }}">
                    <a href="{{ route('admin.tag.index') }}">
                        <i class="material-icons">label</i>
                        <span>Tag</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/post*')? 'active' : '' }}">
                    <a href="{{ route('admin.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/pending/post')? 'active' : '' }}">
                    <a href="{{ route('admin.post.pending') }}">
                        <i class="material-icons">hourglass_empty</i>
                        <span>Pending Posts</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/favourite')? 'active' : '' }}">
                    <a href="{{ route('admin.favourite.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favourite Posts</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/comments')? 'active' : '' }}">
                    <a href="{{ route('admin.comments.index') }}">
                        <i class="material-icons">comment</i>
                        <span>Comments</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/authors')? 'active' : '' }}">
                    <a href="{{ route('admin.author.index') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Authors</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/subscriber')? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <i class="material-icons">subscriptions</i>
                        <span>Subscribers</span>
                    </a>
                </li>

                <li class="header">System</li>

                <li>
                    <a target="_blank" href="{{ route('home') }}">
                        <i class="material-icons">home</i>
                        <span>View Site</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/settings')? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i><span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            @endif
            {{--Admin Part End--}}


            {{--Author Part--}}
            @if(Request::is('author*'))
                <li class="{{ Request::is('author/dashboard')? 'active' : '' }}">
                    <a href="{{ route('author.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('author/post*')? 'active' : '' }}">
                    <a href="{{ route('author.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li class="{{ Request::is('author/favourite')? 'active' : '' }}">
                    <a href="{{ route('author.favourite.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favourite Posts</span>
                    </a>
                </li>

                <li class="{{ Request::is('author/comments')? 'active' : '' }}">
                    <a href="{{ route('author.comments.index') }}">
                        <i class="material-icons">comment</i>
                        <span>Comments</span>
                    </a>
                </li>

                <li class="header">System</li>

                <li>
                    <a target="_blank" href="{{ route('home') }}">
                        <i class="material-icons">home</i>
                        <span>View Site</span>
                    </a>
                </li>

                <li class="{{ Request::is('author/settings')? 'active' : '' }}">
                    <a href="{{ route('author.settings') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i><span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            @endif
            {{--Author Part End--}}


        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">MI SHAJIB</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
