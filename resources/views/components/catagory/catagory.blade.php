<div class="axil-mainmenu aside-category-menu">
    <div class="container">
        <div class="header-navbar">
            <div class="header-nav-department">
                <aside class="header-department">
                    <button class="header-department-text department-title">
                        <span class="icon"><i class="fa fa-bars"></i></span>
                        <span class="text">Categories</span>
                    </button>
                    <nav class="department-nav-menu">
                        <button class="sidebar-close"><i class="fa fa-times"></i></button>
                        <ul class="nav-menu-list">
                            @foreach ($categories as $cat)
                                <li>
                                    <a href="#"
                                        class="nav-link {{ $cat->subCategories->isNotEmpty() ? 'has-megamenu' : '' }}">
                                        <span class="menu-text">{{ $cat->name }}</span>
                                    </a>

                                    @if ($cat->subCategories->isNotEmpty())
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    @foreach ($cat->subCategories as $subCat)
                                                        <div class="department-submenu">

                                                            <h3 class="submenu-heading">{{ $subCat->name }}</h3>
                                                            <ul>
                                                                @foreach ($subCat->products as $product)
                                                                    <li><a
                                                                            href={{ route('viewproduct', ['id' => $product->id]) }}>{{ $product->name }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </li>
                            @endforeach



                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div>
</div>
