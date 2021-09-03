@extends('frontend.layouts.app')

@section('content')

<main class="main">
    <!-- Banner -->
    <section class="intro-section">
        <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
            data-owl-options="{
                                'nav': false,
                                'dots': true,
                                'loop': false,
                                'items': 1,
                                'autoplay': false,
                                'autoplayTimeout': 8000
                            }">
            <div class="banner banner-fixed intro-slide1" style="background-color: #46b2e8;">
                <figure>
                    <img src="{{asset('asset-frontend')}}/images/demos/demo1/slides/slide1.jpg" alt="intro-banner"
                        width="1903" height="630" style="background-color: #34ace5;" />
                </figure>
                <div class="container">
                    <div class="banner-content y-50">
                        <h4 class="banner-subtitle font-weight-bold ls-l">
                            <span class="d-inline-block slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">Buy
                                2 Get</span>
                            <span class="d-inline-block label-star bg-white text-primary slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.4s'}">1
                                Free</span>
                        </h4>
                        <h2 class="banner-title font-weight-bold text-white lh-1 ls-md slide-animate"
                            data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                            Fashionable</h2>
                        <h3 class="font-weight-normal lh-1 ls-l text-white slide-animate"
                            data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                            Collection</h3>
                        <p class="slide-animate text-white ls-s mb-7"
                            data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                            Get Free Shipping on all orders over $99.00</p>
                        <a href="shop.html" class="btn btn-dark btn-rounded slide-animate"
                            data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Shop
                            Now<i class="d-icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="banner banner-fixed intro-slide2" style="background-color: #dddee0;">
                <figure>
                    <img src="{{asset('asset-frontend')}}/images/demos/demo1/slides/slide2.jpg" alt="intro-banner"
                        width="1903" height="630" style="background-color: #d8d9d9;" />
                </figure>
                <div class="container">
                    <div class="banner-content y-50 ml-auto text-right">
                        <h4 class="banner-subtitle ls-s mb-1 slide-animate"
                            data-animation-options="{'name': 'fadeInUp', 'duration': '.7s'}"><span
                                class="d-block text-uppercase mb-2">Coming soon</span><strong
                                class="font-weight-semi-bold ls-m">Riode Birthday</strong></h4>
                        <h2 class="banner-title mb-2 d-inline-block font-weight-bold text-primary slide-animate"
                            data-animation-options="{'name': 'fadeInRight', 'duration': '1.2s', 'delay': '.5s'}">
                            Sale</h2>
                        <p class="slide-animate font-primary ls-s text-dark mb-4"
                            data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '1.2s'}">
                            Up to 70% off on all products <br />online &amp; Free Shipping over $90</p>
                        <a href="shop.html" class="btn btn-dark btn-rounded slide-animate"
                            data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '1.4s'}">Shop
                            Now<i class="d-icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="banner banner-fixed video-banner intro-slide3" style="background-color: #dddee0;">
                <figure>
                    <video src="{{asset('asset-frontend')}}/video/memory-of-a-woman.mp4" width="1903"
                        height="630"></video>
                </figure>
                <div class="container">
                    <div class="banner-content x-50 y-50 text-center">
                        <h4 class="banner-subtitle text-white text-uppercase mb-3 ls-normal slide-animate"
                            data-animation-options="{'name': 'fadeIn', 'duration': '.7s'}">Check out our
                        </h4>
                        <h2 class="banner-title mb-3 text-white font-weight-bold text-uppercase ls-m slide-animate"
                            data-animation-options="{'name': 'fadeInUp', 'duration': '.7s', 'delay': '.5s'}">
                            Summer Season's</h2>
                        <p class="slide-animate mb-7 text-white ls-s font-primary "
                            data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '.8s'}">
                            Up to 50% Off this Season’s &amp; Get free shipping<br />on all orders over
                            $199.00</p>
                        <a href="shop.html" class="btn btn-dark btn-rounded slide-animate mb-1"
                            data-animation-options="{'name': 'fadeInLeft', 'duration': '1s', 'delay': '1.5s'}">Shop
                            Now<i class="d-icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-6 appear-animate">
            <div class="service-list">
                <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                                            'items': 3,
                                            'nav': false,
                                            'dots': false,
                                            'loop': true,
                                            'autoplay': false,
                                            'autoplayTimeout': 5000,
                                            'responsive': {
                                                '0': {
                                                    'items': 1
                                                },
                                                '576': {
                                                    'items': 2
                                                },
                                                '768': {
                                                    'items': 3,
                                                    'loop': false
                                                }
                                            }
                                        }">
                    <div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'delay': '.3s'
                                            }">
                        <i class="icon-box-icon d-icon-truck"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-capitalize ls-normal lh-1">Free Shipping &amp;
                                Return
                            </h4>
                            <p class="ls-s lh-1">Free shipping on orders over $99</p>
                        </div>
                    </div>

                    <div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'delay': '.4s'
                                            }">
                        <i class="icon-box-icon d-icon-service"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-capitalize ls-normal lh-1">Customer Support 24/7
                            </h4>
                            <p class="ls-s lh-1">Instant access to perfect support</p>
                        </div>
                    </div>

                    <div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
                                                'name': 'fadeInRightShorter',
                                                'delay': '.5s'
                                            }">
                        <i class="icon-box-icon d-icon-secure"></i>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-capitalize ls-normal lh-1">100% Secure Payment
                            </h4>
                            <p class="ls-s lh-1">We ensure secure payment!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ banner -->

    <!-- List Categories-->
    <section class="pt-10 mt-7 appear-animate" data-animation-options="{
                            'delay': '.3s'
                        }">
        <div class="container">
            <h2 class="title title-center mb-5">Our Categories</h2>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-xs-6 col-lg-3 mb-4">
                    <div class="category category-default1 category-absolute banner-radius overlay-zoom">
                        <a href="{{ route('category', $category->slug ) }}">
                            <figure class="category-media">
                                <img src="{{asset('uploads/categories') .'/'. $category->image }}" alt="category"
                                    width="280" height="280" style="background-color: #8c8c8d;" />
                            </figure>
                        </a>
                        <div class="category-content">
                            <h4 class="category-name font-weight-bold ls-l">
                                <a href="{{ route('category', $category->slug ) }}">
                                    {{ $category->name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ./ List Categories-->

    <!-- Best Sellers -->
    <section class="product-wrapper container appear-animate mt-6 mt-md-10 pt-4 pb-8" data-animation-options="{
                    'delay': '.3s'
                }">
        <h2 class="title title-center mb-5">Best Sellers</h2>
        <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                        'items': 5,
                        'nav': false,
                        'loop': false,
                        'dots': true,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">
            @foreach ($best_sellers as $product)
            <div class="product text-center">
                <figure class="product-media">
                    <a href="{{ route('product_detail', $product->slug) }}">
                        <img src="{{ asset('uploads/products/product_avatar') . '/'. $product->image }}"
                            alt="Blue Pinafore Denim Dress" width="280" height="315"
                            style="background-color: #f2f3f5;" />
                    </a>
                    <div class="product-label-group">
                        <label class="product-label label-new">new</label>
                    </div>
                    <div class="product-action-vertical">
                        <a href="#"
                            onclick="addItemToOrder({{ $product->id . ','. $product->productColors()->first()->id. ','. $product->productSizes()->first()->id  }} )"
                            class="btn-product-icon" title="Add to cart"><i class="d-icon-bag"></i></a>
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                class="d-icon-heart"></i></a>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                    </div>
                </figure>
                <div class="product-details">
                    <div class="product-cat">
                        <a href="shop-grid-3cols.html">{{ $product->category->name }}</a>
                    </div>
                    <h3 class="product-name">
                        <a href="{{ route('product_detail', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    @if($product->sale_price > 0)
                    <div class="product-price">
                        <ins class="new-price">${{ number_format($product->sale_price, 2, ',') }}</ins><del
                            class="old-price">${{ number_format($product->price, 2, ',') }}</del>
                    </div>
                    @else
                    <div class="product-price">
                        <span class="price">${{ number_format($product->price, 2, ',') }}</span>
                    </div>
                    @endif
                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width:100%"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="" class="rating-reviews">( 12 reviews )</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- ./ Best Sellers -->

    <!-- Banner Group -->
    <section class="banner-group mt-4">
        <div class="container">
            <h2 class="title d-none">Banner Group</h2>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="banner banner-3 banner-fixed banner-radius content-middle appear-animate"
                        data-animation-options="{'name': 'fadeInLeftShorter', 'duration': '1s', 'delay': '.2s'}">
                        <figure>
                            <img src="{{asset('asset-frontend')}}/images/demos/demo1/banners/banner1.jpg" alt="banner"
                                width="380" height="207" style="background-color: #836648;" />
                        </figure>
                        <div class="banner-content">
                            <h3 class="banner-title text-white mb-1">For Men's</h3>
                            <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">
                                Starting at $29
                            </h4>
                            <hr class="banner-divider">
                            <a href="" class="btn btn-white btn-link btn-underline">Shop Now<i
                                    class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 order-lg-auto order-sm-last">
                    <div class="banner banner-4 banner-fixed banner-radius content-middle content-center appear-animate"
                        data-animation-options="{'name': 'fadeIn', 'duration': '1s', 'delay': '.2s'}">
                        <figure>
                            <img src="{{asset('asset-frontend')}}/images/demos/demo1/banners/banner2.jpg" alt="banner"
                                width="350" height="177" style="background-color: #1e1e1e;" />
                        </figure>
                        <div class="banner-content d-flex align-items-center w-100 text-left">
                            <div class="mr-auto mb-4 mb-md-0">
                                <h4 class="banner-subtitle text-white">
                                    Up to 20% Off<br><span class="ls-l">Black Friday</span>
                                </h4>
                                <h3 class="banner-title text-primary font-weight-bold lh-1 mb-0">Sale</h3>
                            </div>
                            <a href="" class="btn btn-primary btn-outline btn-rounded font-weight-bold text-white">Shop
                                Now<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="banner banner-5 banner-fixed banner-radius content-middle appear-animate"
                        data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                        <figure>
                            <img src="{{asset('asset-frontend')}}/images/demos/demo1/banners/banner3.jpg" alt="banner"
                                width="380" height="207" style="background-color: #97928b;" />
                        </figure>
                        <div class="banner-content">
                            <h3 class="banner-title text-white mb-1">Fashions</h3>
                            <h4 class="banner-subtitle text-uppercase font-weight-normal text-white">30% Off
                            </h4>
                            <hr class="banner-divider">
                            <a href="" class="btn btn-white btn-link btn-underline">Shop Now<i
                                    class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Banner Group -->

    <!-- Our Featured -->
    <section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container appear-animate" data-animation-options="{
                    'delay': '.6s'
                }">
        <h2 class="title title-center">Our Featured</h2>
        <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                        'items': 5,
                        'nav': false,
                        'loop': false,
                        'dots': true,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">
            @foreach ($our_featured as $product)
            <div class="product text-center">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="{{ asset('uploads/products/product_avatar') . '/'. $product->image }}"
                            alt="Blue Pinafore Denim Dress" width="220" height="245"
                            style="background-color: #f2f3f5;" />
                    </a>
                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon" onclick="addItemToOrder({{ $product->id . ','. $product->productColors()->first()->id. ','. $product->productSizes()->first()->id  }} )"
                            title="Add to cart"><i class="d-icon-bag"></i></a>
                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                class="d-icon-heart"></i></a>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                    </div>
                </figure>
                <div class="product-details">
                    <div class="product-cat">
                        <a href="shop-grid-3cols.html">{{ $product->name }}</a>
                    </div>
                    <h3 class="product-name">
                        <a href="product.html">{{ $product->category->name }}</a>
                    </h3>
                    @if($product->sale_price > 0)
                    <div class="product-price">
                        <ins class="new-price">${{ number_format($product->sale_price, 2, ',') }}</ins><del
                            class="old-price">${{ number_format($product->price, 2, ',') }}</del>
                    </div>
                    @else
                    <div class="product-price">
                        <span class="price">${{ number_format($product->price, 2, ',') }}</span>
                    </div>
                    @endif
                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width:40%"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="product.html" class="rating-reviews">( 15 reviews )</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    <!-- ./ Our Featured -->

    <!-- Banner sale off -->
    <section class="banner banner-background parallax text-center" data-option="{'offset': -60}"
        data-image-src="{{asset('asset-frontend')}}/images/demos/demo1/parallax.jpg" style="background-color: #2d2f33;">
        <div class="container">
            <div class="banner-content appear-animate"
                data-animation-options="{'name': 'blurIn', 'duration': '1s', 'delay': '.2s'}">
                <h4 class="banner-subtitle text-white font-weight-bold ls-l">
                    Extra<span class="d-inline-block label-star bg-dark text-primary ml-4 mr-2">30%
                        Off</span>Online
                </h4>
                <h3 class="banner-title font-weight-bold text-white">Summer Season Sale</h3>
                <p class="text-white ls-s">Free shipping on orders over $99</p>
                <a href="shop.html" class="btn btn-primary btn-rounded btn-icon-right">Shop Now<i
                        class="d-icon-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- ./ Banner sale off -->

    <!-- Featured Articles -->
    <section class="blog-post-wrapper mt-6 mt-md-10 pt-7 appear-animate"
        data-animation-options="{'name': 'fadeIn', 'duration': '1s'}">
        <div class="container">
            <h2 class="title title-center">Featured Articles</h2>
            <div class="owl-carousel owl-theme post-slider row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                            'nav': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '576': {
                                    'items': 2
                                },
                                '992': {
                                    'items': 3,
                                    'dots': false
                                }
                            }
                        }">
                <div class="blog-post mb-4">
                    <article class="post post-frame overlay-zoom">
                        <figure class="post-media">
                            <a href="post-single.html">
                                <img src="{{asset('asset-frontend')}}/images/blog/frame/1.jpg" alt="Blog post"
                                    width="340" height="206" style="background-color: #919fbc;" />
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">19</span>
                                <span class="post-month">JAN</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">20% Off Coupon for Cyber
                                    Week</a></h4>
                            <p class="post-content">Lorem ipsum dolor sit amet,onadipiscing elit, sedsd
                                doeiu smod tempo...</p>
                            <a href="post-single.html" class="btn btn-primary btn-link btn-underline">Read
                                More<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
                <div class="blog-post mb-4">
                    <article class="post post-frame overlay-zoom">
                        <figure class="post-media">
                            <a href="post-single.html">
                                <img src="{{asset('asset-frontend')}}/images/blog/frame/2.jpg" alt="Blog post"
                                    width="340" height="206" style="background-color: #e5e6e6;" />
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">19</span>
                                <span class="post-month">JAN</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">20% Off Coupon for Cyber
                                    Week</a></h4>
                            <p class="post-content">Lorem ipsum dolor sit amet,onadipiscing elit, sedsd
                                doeiu smod tempo...</p>
                            <a href="post-single.html" class="btn btn-primary btn-link btn-underline">Read
                                More<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
                <div class="blog-post mb-4">
                    <article class="post post-frame overlay-zoom">
                        <figure class="post-media">
                            <a href="post-single.html">
                                <img src="{{asset('asset-frontend')}}/images/blog/frame/3.jpg" alt="Blog post"
                                    width="340" height="206" style="background-color: #eaeef1;" />
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">19</span>
                                <span class="post-month">JAN</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">20% Off Coupon for Cyber
                                    Week</a></h4>
                            <p class="post-content">Lorem ipsum dolor sit amet,onadipiscing elit, sedsd
                                doeiu smod tempo...</p>
                            <a href="post-single.html" class="btn btn-primary btn-link btn-underline">Read
                                More<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Featured Articles -->

    <!-- Our Brand -->
    <section class="mt-2 pb-6 pt-10 pb-md-10 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
        <h2 class="title d-none">Our Brand</h2>
        <div class="container">
            <div class="owl-carousel owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                data-owl-options="{
                            'nav': false,
                            'dots': false,
                            'autoplay': true,
                            'margin': 20,
                            'loop': true,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                },
                                '992': {
                                    'items': 5
                                },
                                '1200': {
                                    'items': 6
                                }
                            }
                        }">
                <figure><img src="{{asset('asset-frontend')}}/images/brands/1.png" alt="brand" width="180"
                        height="100" />
                </figure>
                <figure><img src="{{asset('asset-frontend')}}/images/brands/2.png" alt="brand" width="180"
                        height="100" />
                </figure>
                <figure><img src="{{asset('asset-frontend')}}/images/brands/3.png" alt="brand" width="180"
                        height="100" />
                </figure>
                <figure><img src="{{asset('asset-frontend')}}/images/brands/4.png" alt="brand" width="180"
                        height="100" />
                </figure>
                <figure><img src="{{asset('asset-frontend')}}/images/brands/5.png" alt="brand" width="180"
                        height="100" />
                </figure>
                <figure><img src="{{asset('asset-frontend')}}/images/brands/6.png" alt="brand" width="180"
                        height="100" />
                </figure>
            </div>
        </div>
    </section>
    <!-- ./ Our Brand -->

    <!-- Recommended Products -->
    <section class="product-widget-wrapper pb-2 pb-md-10 appear-animate">
        <div class="container">
            <div class="row">
                {{-- Sale Product --}}
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'delay': '.5s'
                                }">
                        <h4 class="widget-title border-no lh-1 font-weight-bold">Popular</h4>
                        <div class="products-col">
                            @foreach ($sale_products as $product)
                            <div class="product product-list-sm">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ asset('uploads/products/product_avatar') . '/'. $product->image }}"
                                            alt="product" width="100" height="114" style="background-color: #f2f3f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('product_detail', $product->slug ) }}">{{ $product->name }}</a>
                                    </h3>
                                    @if($product->sale_price > 0)
                                    <div class="product-price">
                                        <ins class="new-price">${{ $product->sale_price }}</ins><del
                                            class="old-price">${{ $product->price }}</del>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span class="price">${{ $product->price }}</span>
                                    </div>
                                    @endif
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Latest Products --}}
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'delay': '.5s'
                                                }">
                        <h4 class="widget-title border-no lh-1 font-weight-bold">Latest Products</h4>
                        <div class="products-col">
                            @foreach ($latest_products as $product)
                            <div class="product product-list-sm">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ asset('uploads/products/product_avatar') . '/'. $product->image }}"
                                            alt="product" width="100" height="114" style="background-color: #f2f3f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('product_detail', $product->slug ) }}">{{ $product->name }}</a>
                                    </h3>
                                    @if($product->sale_price > 0)
                                    <div class="product-price">
                                        <ins class="new-price">${{ $product->sale_price }}</ins><del
                                            class="old-price">${{ $product->price }}</del>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span class="price">${{ $product->price }}</span>
                                    </div>
                                    @endif
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Best of the Week --}}
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'delay': '.5s'
                                                }">
                        <h4 class="widget-title border-no lh-1 font-weight-bold">Best of the Week</h4>
                        <div class="products-col">
                            @foreach ($best_of_the_week as $product)
                            <div class="product product-list-sm">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ asset('uploads/products/product_avatar') . '/'. $product->image }}"
                                            alt="product" width="100" height="114" style="background-color: #f2f3f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('product_detail', $product->slug ) }}">{{ $product->name }}</a>
                                    </h3>
                                    @if($product->sale_price > 0)
                                    <div class="product-price">
                                        <ins class="new-price">${{ $product->sale_price }}</ins><del
                                            class="old-price">${{ $product->price }}</del>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span class="price">${{ $product->price }}</span>
                                    </div>
                                    @endif
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Popular --}}
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="widget widget-products appear-animate" data-animation-options="{
                                                    'name': 'fadeInLeftShorter',
                                                    'delay': '.5s'
                                                }">
                        <h4 class="widget-title border-no lh-1 font-weight-bold">Sale Products</h4>
                        <div class="products-col">
                            @foreach ($popular as $product)
                            <div class="product product-list-sm">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{ asset('uploads/products/product_avatar') . '/'. $product->image }}"
                                            alt="product" width="100" height="114" style="background-color: #f2f3f5;" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('product_detail', $product->slug ) }}">{{ $product->name }}</a>
                                    </h3>
                                    @if($product->sale_price > 0)
                                    <div class="product-price">
                                        <ins class="new-price">${{ $product->sale_price }}</ins><del
                                            class="old-price">${{ $product->price }}</del>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span class="price">${{ $product->price }}</span>
                                    </div>
                                    @endif
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ RecommendedProducts -->
    </div>
</main>

@endsection
