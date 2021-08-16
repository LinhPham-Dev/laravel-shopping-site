<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="mailto: phamlinhaz229@gmail.com" class="welcome-msg">Email: phamlinhaz229@gmail.com</a>
            </div>
            <div class="header-right">
                <div class="dropdown">
                    <a href="#currency">USD</a>
                    <ul class="dropdown-box">
                        <li><a href="#USD">USD</a></li>
                        <li><a href="#EUR">EUR</a></li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <div class="dropdown ml-5">
                    <a href="#language">ENG</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD">ENG</a>
                        </li>
                        <li>
                            <a href="#EUR">FRH</a>
                        </li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <span class="divider"></span>
                @if (Auth::check())
                <span class="mr-1">{{ Auth::user()->name }}</span>
                <a href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt fa-1x"></i></a>
                @else
                <a class="login-link-form" href="{{ route('user.show_login_form') }}">
                    <i class="d-icon-user mr-2"></i>Sign in</a>
                <span class="delimiter">/</span>
                <a class="register-link-form ml-0" href="{{ route('user.show_register_form') }}">Register</a>
                @endif
                <!-- End of Login -->
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{asset('asset-frontend')}}/images/logo.png" alt="logo" width="153" height="44" />
                </a>
                <!-- End Logo -->

                <div class="header-search hs-simple">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search..."
                            required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
                <!-- End Header Search -->
            </div>
            <div class="header-right">
                <a href="tel:#" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Call Us :</h4>
                        <p>(+84) 123-456-789</p>
                    </div>
                </a>
                <span class="divider"></span>
                <a href="" class="wishlist">
                    <i class="d-icon-heart"></i>
                </a>
                <span class="divider"></span>
                <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                    <a href="" class="cart-toggle label-block link">
                        <i class="d-icon-bag"><span class="cart-count">{{ $cart->getTotalQuantity() }}</span></i>
                    </a>
                    <div class="cart-overlay"></div>
                    <!-- End Cart Toggle -->
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <h4 class="cart-title">Shopping Cart</h4>
                            <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                    class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                        </div>
                        <div class="products scrollable">
                            @foreach ($cart->content() as $item)
                            <div class="product product-cart">
                                <figure class="product-media">
                                    <a href="{{ route('product_detail', $item['product']->slug ) }}">
                                        <img src="{{  asset('uploads/products/product_avatar') . '/'.  $item['product']->image }}"
                                            alt="product" width="80" height="88" />
                                    </a>
                                    <button class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i><span class="sr-only">Close</span>
                                    </button>
                                </figure>
                                <div class="product-detail">
                                    <a href="{{ route('product_detail', $item['product']->slug ) }}"
                                        class="product-name">{{ $item['name'] }}</a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{ $item['color'] }}</span>
                                        <span class="product-quantity">{{ $item['size'] }}</span>
                                        <span class="product-quantity">{{ $item['quantity'] }}</span>
                                        <span class="product-price">${{ number_format($item['price'], 2, ',') }}</span>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            <!-- End of Cart Product -->
                        </div>
                        <!-- End of Products  -->
                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">${{ number_format($cart->getTotalAmount(), 2, ',') }}</span>
                        </div>
                        <!-- End of Cart Total -->
                        <div class="cart-action">
                            <a href="{{ route('cart.show') }}" class="btn btn-dark btn-link">View Cart</a>
                            <a href="{{ route('checkout') }}" class="btn btn-dark"><span>Go To Checkout</span></a>
                        </div>
                        <!-- End of Cart Action -->
                    </div>
                    <!-- End Dropdown Box -->
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom d-lg-show">
        <div class="container">
            <div style="margin: 0 auto" class="header-menu">
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('category') }}">Products</a>
                        </li>
                        <li>
                            <a href="{{ route('cart.show') }}">Cart</a>
                        </li>
                        <li>
                            <a href="{{ route('category') }}">Wishlist</a>
                        </li>
                        <li>
                            <a href="">Contact Us</a>
                        </li>
                        <li>
                            <a href="">Blogs</a>
                        </li>
                        <li>
                            <a href="">About Us</a>
                        </li>
                        <li><a href="">FAQs</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
