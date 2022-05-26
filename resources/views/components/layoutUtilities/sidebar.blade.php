    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">
                {{Auth::User()->company_name}}
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{request()->path() == 'dashboard' ? 'active' : ''}}">
                    <a class="nav-link" href="dashboard">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{request()->path() == 'inventory' ? 'active' : ''}}">
                    <a class="nav-link" href="inventory">
                        <i class="material-icons">person</i>
                        <p>Inventory</p>
                    </a>
                </li>
                <li class="nav-item {{request()->path() == 'purchase' ? 'active' : ''}}">
                    <a class="nav-link" href="purchase">
                        <i class="material-icons">content_paste</i>
                        <p>Purchase</p>
                    </a>
                </li>
                <li class="nav-item {{request()->path() == 'sale' ? 'active' : ''}}">
                    <a class="nav-link" href="sale">
                        <i class="material-icons">library_books</i>
                        <p>Sale</p>
                    </a>
                </li>
                <li class="nav-item {{request()->path() == 'accounts' ? 'active' : ''}}">
                    <a class="nav-link" href="accounts">
                        <i class="material-icons">library_books</i>
                        <p>Accounts</p>
                    </a>
                </li>
                <li class="nav-item {{request()->path() == 'supplier' ? 'active' : ''}}">
                    <a class="nav-link" href="/supplier">
                        <i class="material-icons">library_books</i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item {{request()->path() == 'setting' ? 'active' : ''}}">
                    <a class="nav-link" href="/setting">
                        <i class="material-icons">bubble_chart</i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./map.html">
                        <i class="material-icons">location_ons</i>
                        <p>Maps</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./notifications.html">
                        <i class="material-icons">notifications</i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>



