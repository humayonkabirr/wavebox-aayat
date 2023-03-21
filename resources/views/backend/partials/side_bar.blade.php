<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ route('dashboard.index') }}" data-active="{{ Request::is('dashboard') ? 'true' : '' }}"
                    class="dropdown-toggle">
                    <div class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-active="{{ Request::is('admin/product/*') ? 'true' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Products</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="product" data-parent="#accordionExample">
                    <li class="{{ Request::is('admin/product') ? 'active' : '' }}">
                        <a href="{{ route('product.index') }}"> All Products </a>
                    </li>
                    <li class="{{ Request::is('admin/product/create') ? 'active' : '' }}">
                        <a href="{{ route('product.create') }}"> Add Product </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-active="{{ Request::is('admin/orders/*') ? 'true' : '' }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Orders</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="orders" data-parent="#accordionExample">
                    <li class="{{ Request::is('admin/orders') ? 'active' : '' }}">
                        <a href="{{ route('orders.index') }}"> All orders </a>
                    </li>
                    <li class="{{ Request::is('admin/orders/order-padding') ? 'active' : '' }}">
                        <a href="{{ route('order.padding') }}"> Orders Panding </a>
                    </li>
                    <li class="{{ Request::is('admin/orders/order-complete') ? 'active' : '' }}">
                        <a href="{{ route('order.complete') }}"> Orders Complete </a>
                    </li>
                    <li class="{{ Request::is('admin/orders/order-rejected') ? 'active' : '' }}">
                        <a href="{{ route('order.rejected') }}"> Orders Rejected </a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="{{ route('dashboard.index') }}" data-active="{{ Request::is('dashboard') ? 'true' : '' }}"
                    class="dropdown-toggle">
                    <div class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Setting</span>
                    </div>
                </a>
            </li>

        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
