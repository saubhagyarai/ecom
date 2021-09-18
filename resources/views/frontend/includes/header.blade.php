<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>@yield('title') {{ucfirst(config('app.name'))}} </title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Favicon -->
        @if (!empty(setting()->favicon))
        <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{setting()->favicon ? asset('storage/settings/'.setting()->favicon) : ''}}"
        />            
        @endif

        <!-- all css here -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/themify-icons.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/pe-icon-7-stroke.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/icofont.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.min.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bundle.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
        <script src="{{asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('frontend/assets/css/toastr.min.css')}}">

        @yield('css')

    </head>

        <body>
        <header>
            <div class="header-top-wrapper-2 border-bottom-2">
                <div class="header-info-wrapper pl-200 pr-200">
                    <div class="header-contact-info">
                        <ul>
                            <li><i class="pe-7s-call"></i>
                                <a href="tel:{{(!empty(setting()->phone)) ? setting()->phone : ''}}">

                                    {{(!empty(setting()->phone)) ? setting()->phone : ''}}
                                </a>
                            </li>
                            <li><i class="pe-7s-mail"></i> <a href="mailto:{{(!empty(setting()->email)) ? setting()->email : ''}}">{{(!empty(setting()->email)) ? setting()->email : ''}}</a></li>
                        </ul>
                    </div>
                    <div class="electronics-login-register">
                        <ul>
                            @auth
                            <li><a href="{{route('wishlist.index')}}"><i class="pe-7s-like"></i>Wishlist</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="pe-7s-users"></i>
                                    {{ Auth::user()->name }} 
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('home')}}">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                            @endauth
                            @guest
                            <li><a href="{{route('login')}}"><i class="ti-user"></i>Login</a></li>
                            <li><a href="{{route('register')}}"><i class="ti-settings"></i>Sign Up</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-bottom ptb-40 clearfix">
                <div class="header-bottom-wrapper pr-200 pl-200">
                    <div class="logo-3">
                        <a href="{{route('index')}}">
                            <img src="{{(!empty(setting()->logo)) ? asset('storage/settings/'.setting()->logo) : ''}}" alt="" height="50" width="300"/>
                            
                        </a>
                    </div>
                    <div class="categories-search-wrapper categories-search-wrapper2">
                        <div class="categories-wrapper">
                            <form action="{{route('product.search')}}" method="GET" >
                                <input placeholder="Enter Your key word" type="text" name="query" value="{{request()->query('query')}}"/>                                
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="header-cart-3">
                        <a href="{{route('cart.index')}}">
                            <i class="ti-shopping-cart"></i>My Cart
                            <span id="cart-count">{{Cart::content()->count()}}</span>
                        </a>
                    </div>
                    <div class="mobile-menu-area mobile-menu-none-block electro-2-menu">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li>
                                        <a href="#">HOME</a>
                                        <ul>
                                            <li>
                                                <a href="index.html">Fashion</a>
                                            </li>
                                            <li>
                                                <a href="index-fashion-2.html"
                                                    >Fashion style 2</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-fruits.html"
                                                    >Fruits</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-book.html"
                                                    >book</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-electronics.html"
                                                    >electronics</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="index-electronics-2.html"
                                                    >electronics style 2</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-food.html"
                                                    >food & drink</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-furniture.html"
                                                    >furniture</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-handicraft.html"
                                                    >handicraft</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-smart-watch.html"
                                                    >smart watch</a
                                                >
                                            </li>
                                            <li>
                                                <a href="index-sports.html"
                                                    >sports</a
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">pages</a>
                                    </li>
                                    <li>
                                        <a href="#">shop</a>
                                        <ul>
                                            <li>
                                                <a href="shop-grid-2-col.html">
                                                    grid 2 column</a
                                                >
                                            </li>
                                            <li>
                                                <a href="shop-grid-3-col.html">
                                                    grid 3 column</a
                                                >
                                            </li>
                                            <li>
                                                <a href="shop.html"
                                                    >grid 4 column</a
                                                >
                                            </li>
                                            <li>
                                                <a href="shop-grid-box.html"
                                                    >grid box style</a
                                                >
                                            </li>
                                            <li>
                                                <a href="shop-list-1-col.html">
                                                    list 1 column</a
                                                >
                                            </li>
                                            <li>
                                                <a href="shop-list-2-col.html"
                                                    >list 2 column</a
                                                >
                                            </li>
                                            <li>
                                                <a href="shop-list-box.html"
                                                    >list box style</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details.html"
                                                    >tab style 1</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-2.html"
                                                    >tab style 2</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="product-details-3.html"
                                                >
                                                    tab style 3</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-4.html"
                                                    >sticky style</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-5.html"
                                                    >sticky style 2</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-6.html"
                                                    >gallery style</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-7.html"
                                                    >gallery style 2</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-8.html"
                                                    >fixed image style</a
                                                >
                                            </li>
                                            <li>
                                                <a href="product-details-9.html"
                                                    >fixed image style 2</a
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">BLOG</a>
                                        <ul>
                                            <li>
                                                <a href="blog.html"
                                                    >blog 3 colunm</a
                                                >
                                            </li>
                                            <li>
                                                <a href="blog-2-col.html"
                                                    >blog 2 colunm</a
                                                >
                                            </li>
                                            <li>
                                                <a href="blog-sidebar.html"
                                                    >blog sidebar</a
                                                >
                                            </li>
                                            <li>
                                                <a href="blog-details.html"
                                                    >blog details</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                    href="blog-details-sidebar.html"
                                                    >blog details 2</a
                                                >
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        {{-- <a href="{{route('contact.index')}}"> Contact Us</a> --}}
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="categori-menu-wrapper2 clearfix">
            <div class="pl-200 pr-200">
                <div class="categori-style-2">
                    <div class="category-heading-2">
                        <h3>All Categories <i class="pe-7s-angle-down"></i></h3>
                        <div class="category-menu-list" style="{{ (request()->is('/')) ? 'display: block' : 'display: none' }}">                                
                            <ul>
                                @foreach (getCategories() as $cat)
                                <li>
                                    <a href="{{route('category', $cat->slug)}}">{{$cat->name}} 
                                        @if ($cat->children->isNotEmpty())
                                        <i class="pe-7s-angle-right"></i>
                                        @endif
                                    </a>
                                    @if ($cat->children->isNotEmpty())
                                    <div class="category-menu-dropdown">
                                        <div class="category-dropdown-style category-common4">
                                            <ul>
                                                @foreach ($cat->children as $child)
                                                <li><a href="{{route('category', $child->slug)}}"> {{$child->name}}</a></li>                                        
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>                            
                                    @endif
            
                                </li>                        
                                @endforeach
                            </ul>                            
                        </div>
                    </div>
                </div>
                <div class="menu-style-4 menu-hover">
                    <nav>
                        <ul>
                            <li><a href="{{route('index')}}">home </a></li>
                            @foreach (pages() as $page)
                            <li>
                                <a href="{{route('page.single', $page->slug)}}">{{$page->name}}</a>
                            </li>
                            @endforeach

                            <li><a href="{{route('contact.page')}}">contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>