@extends('frontend.layouts.app')

@section('css-option')

<link rel="stylesheet" type="text/css" href="{{asset('asset-frontend')}}/css/style.min.css">

@endsection

@section('content')

<main class="main">
    <div class="page-header"
        style="background-image: url('{{asset('asset-frontend')}}/images/shop/page-header-back.jpg'); background-color: #3C63A4;">
        <h1 class="page-title">Riode Shop</h1>
        <ul class="breadcrumb">
            <li><a href="/"><i class="d-icon-home"></i></a></li>
            <li class="delimiter">/</li>
            <li>Riode Shop</li>
        </ul>
    </div>
    <!-- End PageHeader -->
    <div class="page-content mb-10 pb-3">
        <div class="container">
            <div class="row main-content-wrap gutter-lg">
                <aside class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                            <div class="filter-actions mb-4">
                                <a href="#"
                                    class="sidebar-toggle-btn toggle-remain btn btn-outline btn-primary btn-icon-right btn-rounded">Filter<i
                                        class="d-icon-arrow-left"></i></a>
                                <a href="#" class="filter-clean">Clean All</a>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">All Categories</h3>
                                <ul class="widget-body filter-items search-ul">
                                    <li><a href="#">Accessosries</a></li>
                                    <li>
                                        <a href="#">Electronics</a>
                                        <ul>
                                            <li><a href="#">Computer</a></li>
                                            <li><a href="#">Gaming & Accessosries</a></li>
                                        </ul>
                                    </li>
                                    @foreach ($categories as $category)
                                    <li><a
                                            href={{route('category', $category->slug ) }}>{{ Str::title($category->name) }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Filter by Price</h3>
                                <div class="widget-body mt-3">
                                    <form action="#">
                                        <div class="filter-price-slider"></div>
                                        <div class="filter-actions">
                                            <div class="filter-price-text mb-4">From:
                                                <input type="text" class="form-control my-2" name="from"
                                                    placeholder="From ...">
                                                <span class="filter-price-range"></span>
                                            </div>
                                            <div class="filter-price-text mb-4">To:
                                                <input type="text" class="form-control" name="to" placeholder="To ...">
                                                <span class="filter-price-range"></span>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-dark btn-filter btn-rounded">Filter</button>
                                        </div>
                                    </form><!-- End Filter Price Form -->
                                </div>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Size</h3>
                                <ul class="widget-body filter-items">
                                    @foreach ($sizes as $size)
                                    <li><a href="#">{{ $size->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Color</h3>
                                <ul class="widget-body filter-items">
                                    @foreach ($colors as $color)
                                    <li><a href="#">{{ $color->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#"
                                class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary btn-rounded btn-icon-right d-lg-none">Filter<i
                                    class="d-icon-arrow-right"></i></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default">Default</option>
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Average rating</option>
                                    <option value="date">Latest</option>
                                    <option value="price-low">Sort forward price low</option>
                                    <option value="price-high">Sort forward price high</option>
                                    <option value="">Clear custom sort</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box text-dark">
                                <label>Show :</label>
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-list.html" class="d-icon-mode-list btn-layout"></a>
                                <a href="shop.html" class="d-icon-mode-grid btn-layout active"></a>
                            </div>
                        </div>
                    </nav>
                    <div class="row cols-2 cols-sm-3 product-wrapper">
                        @if(count($products) > 0)
                        @foreach ($products as $product)
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{ route('product_detail', $product->slug) }}">
                                        <img src="{{asset('uploads/products/product_avatar' . '/' . $product->image )}}"
                                            alt="{{ $product->name }}" width="280" height="315">
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">new</label>
                                        @if($product->sale_price > 0)
                                        <label
                                            class="product-label label-sale">{{ 100 - ceil($product->sale_price / $product->price * 100) }}%
                                            OFF</label>
                                        @endif
                                    </div>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="#addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a>
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                                class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                            View</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="shop-grid-3col.html">{{ $product->category->name }}</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="{{ route('product_detail', $product->slug ) }}">{{ $product->name }}</a>
                                    </h3>
                                    @if($product->sale_price > 0)
                                    <div class="product-price">
                                        <ins class="new-price">${{ number_format($product->sale_price, 2, ',') }}</ins><del class="old-price">${{ number_format($product->price, 2, ',')}}</del>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span class="price">${{ number_format($product->price, 2, ',') }}</span>
                                    </div>
                                    @endif
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:60%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="" class="rating-reviews">( {{ rand(4, 20) }} reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <nav class="toolbox toolbox-pagination">
                        <p class="show-info">Showing<span>{{ $products->firstItem() }} to
                                {{ $products->lastItem() }}</span> of {{ $products->total() }} Products</p>
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <i class="d-icon-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next<i class="d-icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    @else
                    <div class="show-alert col-12 py-5">
                        <h4 class="text-center my-5">No any products in this category !</h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
