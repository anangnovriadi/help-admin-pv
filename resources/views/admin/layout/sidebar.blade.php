<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('admin/images/users/profile.png') }}" alt="user" />
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>Markarn Doe</h5>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Topic</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('create.topic') }}">Add Topic</a></li>
                        <li><a href="{{ route('view.topic') }}">List Topic</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Category</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('create.category') }}">Add Category</a></li>
                        <li><a href="{{ route('view.category') }}">List Category</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>