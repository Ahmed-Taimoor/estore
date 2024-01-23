<div class="axil-mainmenu">
    <div class="container">
        <div class="header-navbar">
            <div class="header-brand">
                <a href="/" class="logo logo-dark">
                    <img src="assets/images/logo.png" alt="Site Logo">
                </a>
                <a href="/" class="logo logo-light">
                    <img src="assets/images/logo-light.png" alt="Site Logo">
                </a>
            </div>
            <div class="header-main-nav">
                <!-- Start Mainmanu Nav -->
                <nav class="mainmenu-nav">
                    <button class="mobile-close-btn mobile-nav-toggler">
                        <i class="fas fa-times"></i>
                    </button>

                    <div class="mobile-nav-brand">
                        <a href="/" class="logo">
                            <img src="assets/images/logo.png" alt="Site Logo">
                        </a>
                    </div>
                    <ul class="mainmenu">
                        <li class="menu-item">
                            <a href="/">Home</a>

                        </li>
                        <li class="menu-item">
                            <a href="#">View All Products</a>
                        </li>
                        <li class="menu-item">
                            <a href="#newsletter">Subscribe</a>
                        </li>
                    </ul>
                </nav>

                <!-- End Mainmanu Nav -->
            </div>
            <div class="header-action">
                <ul class="action-list">
                    <li class="axil-search d-xl-block d-none">
                        <input type="search" class="placeholder product-search-input" name="search2" id="search2"
                            value="" maxlength="128" placeholder="What are you looking for?" autocomplete="off">
                        <button type="submit" class="icon wooc-btn-search">
                            <i class="flaticon-magnifying-glass"></i>
                        </button>
                    </li>
                    <li class="axil-search d-xl-none d-block">
                        <a href="javascript:void(0)" class="header-search-icon" title="Search">
                            <i class="flaticon-magnifying-glass"></i>
                        </a>
                    </li>

                    <li class="wishlist">
                        @include('components.nav.nav-components.wishlist')
                    </li>

                    <li class="shopping-cart">
                        @include('components.nav.nav-components.cart')

                    </li>

                    <li class="my-account">
                        @include('components.nav.nav-components.profile')

                    </li>

                    <li class="axil-mobile-toggle">
                        <button class="menu-btn mobile-nav-toggler">
                            <i class="flaticon-menu-2"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
