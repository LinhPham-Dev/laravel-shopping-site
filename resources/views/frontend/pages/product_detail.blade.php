@extends('frontend.layouts.app')

@section('content')

<main class="main mt-6 single-product">
    <div class="page-content mb-10 pb-6">
        <div class="container">
            <div class="product product-single row mb-7">
                <div class="col-md-6 sticky-sidebar-wrapper">
                    <div class="product-gallery pg-vertical sticky-sidebar" data-sticky-options="{'minWidth': 767}">
                        <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                            @foreach ($product->productImages as $image)
                            <figure class="product-image">
                                <img src="{{ asset('uploads/products/product_details') . '/' . $image->image_name }}"
                                    data-zoom-image="{{asset('asset-frontend')}}/images/product/product-1-1-800x900.jpg"
                                    alt="Women's Brown Leather Backpacks" width="800" height="900">
                            </figure>
                            @endforeach
                        </div>
                        <div class="product-thumbs-wrap">
                            <div class="product-thumbs">
                                @foreach ($product->productImages as $image)
                                <div class="product-thumb active">
                                    <img src="{{ asset('uploads/products/product_details') . '/' . $image->image_name }}"
                                        alt="{{ $product->name }}" width="109" height="122">
                                </div>
                                @endforeach
                            </div>
                            <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                            <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <div class="product-label-group">
                            <label class="product-label label-new">new</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <div class="product-navigation">
                            <ul class="breadcrumb breadcrumb-lg">
                                <li><a href="/"><i class="d-icon-home"></i></a></li>
                                <li><a href="#" class="active">Products</a></li>
                                <li>Detail</li>
                            </ul>
                        </div>
                        {{-- Form --}}
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <h1 class="product-name">{{ $product->name }}</h1>
                            <div class="product-meta">
                                SKU: <span class="product-sku">{{ rand() }}</span>
                                BRAND: <span class="product-brand">{{ $product->category->name }}</span>
                                <a href="javascript:void()" class="onAddCart" onclick="onAddCart()">Add</a>
                            </div>
                            @if ($product->sale_price > 0)
                            <div class="product-price">${{ number_format($product->sale_price, 2, ',') }}<del
                                    style="color: gray; margin: 0 15px">${{ number_format($product->price, 2, ',') }}</del>
                            </div>
                            @else
                            <div class="product-price">${{ number_format($product->price, 2, ',') }}
                            </div>
                            @endif
                            <div class="ratings-container">
                                <div id="avg-rating"></div><span>{{ round($rating_avg, 1) }}</span>
                                <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{ $total_reviews }}
                                    reviews )</a>
                            </div>
                            <p class="product-short-desc">{{ $product->description }}</p>
                            <div class="product-form product-variations product-color">
                                <label>Color:</label>
                                <div class="select-box">
                                    <select name="color" class="form-control">
                                        <option value="" selected="selected">Choose an Color</option>
                                        @foreach ($product->productColors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="product-form product-variations product-size">
                                <label>Size:</label>
                                <div class="product-form-group">
                                    <div class="select-box">
                                        <select name="size" class="form-control">
                                            <option value="" selected="selected">Choose an Size</option>
                                            @foreach ($product->productSizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="clear-all my-2">
                                        <a href="#" class="product-variation-clean my-3">Clean All</a>
                                    </div>
                                </div>
                            </div>

                            <hr class="product-divider">

                            <div class="product-form product-qty">
                                <div class="product-form-group">
                                    <div class="input-group mr-2">
                                        <button type="button" class="quantity-minus d-icon-minus"></button>
                                        <input class="quantity form-control" type="number" name="quantity">
                                        <button type="button" class="quantity-plus d-icon-plus"></button>
                                    </div>
                                    <button type="submit"
                                        class="btn-product btn-cart-add text-normal ls-normal font-weight-semi-bold">
                                        <i class="d-icon-bag"></i>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- End Form --}}
                        <hr class="product-divider mb-3">

                        <div class="product-footer">
                            <div class="social-links mr-4">
                                <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                                <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                                <a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
                            </div>
                            <span class="divider d-lg-show"></span>
                            <a href="#" class="btn-product btn-wishlist mr-6"><i class="d-icon-heart"></i>Add to
                                wishlist</a>
                            <a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add
                                to
                                compare</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab tab-nav-simple product-tabs">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#product-tab-description">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product-tab-additional">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product-tab-size-guide">Size Guide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active in" id="product-tab-description">
                        <div class="row mt-6">
                            <div class="col-md-6">
                                <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
                                <p class="mb-2">
                                    Praesent id enim sit amet.Tdio vulputate eleifend in in tortor.
                                    ellus massa. siti iMassa ristique sit amet condim vel, facilisis
                                    quimequistiqutiqu amet condim Dilisis Facilisis quis sapien. Praesent id
                                    enim sit amet.
                                </p>
                                <ul class="mb-8">
                                    <li>Praesent id enim sit amet.Tdio vulputate</li>
                                    <li>Eleifend in in tortor. ellus massa.Dristique sitii</li>
                                    <li>Massa ristique sit amet condim vel</li>
                                    <li>Dilisis Facilisis quis sapien. Praesent id enim sit amet</li>
                                </ul>
                                <h5 class="description-title mb-3 font-weight-semi-bold ls-m">Specifications
                                </h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class="font-weight-semi-bold text-dark pl-0">Material</th>
                                            <td class="pl-4">Praesent id enim sit amet.Tdio</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-semi-bold text-dark pl-0">Claimed Size</th>
                                            <td class="pl-4">Praesent id enim sit</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-semi-bold text-dark pl-0">Recommended Use
                                            </th>
                                            <td class="pl-4">Praesent id enim sit amet.Tdio vulputate eleifend
                                                in in tortor. ellus massa. siti</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-semi-bold text-dark border-no pl-0">
                                                Manufacturer</th>
                                            <td class="border-no pl-4">Praesent id enim</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 pl-md-6 pt-4 pt-md-0">
                                <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description
                                </h5>
                                <figure class="p-relative d-inline-block mb-2">
                                    <img src="{{asset('asset-frontend')}}/images/product/product.jpg" width="559"
                                        height="370" alt="Product" />
                                    <a class="btn-play btn-iframe" href="video/memory-of-a-woman.mp4">
                                        <i class="d-icon-play-solid"></i>
                                    </a>
                                </figure>
                                <div class="icon-box-wrap d-flex flex-wrap">
                                    <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">
                                        <div class="icon-box-icon">
                                            <i class="d-icon-lock"></i>
                                        </div>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">2 year
                                                warranty</h4>
                                            <p>Guarantee with no doubt</p>
                                        </div>
                                    </div>
                                    <div class="divider d-xl-show mr-10"></div>
                                    <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">
                                        <div class="icon-box-icon">
                                            <i class="d-icon-truck"></i>
                                        </div>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title lh-1 pt-1 ls-s text-normal">Free shipping
                                            </h4>
                                            <p>On orders over $50.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="product-tab-additional">
                        <ul class="list-none">
                            <li><label>Brands:</label>
                                <p>SkillStar, SLS</p>
                            </li>
                            <li><label>Color:</label>
                                <p>Blue, Brown</p>
                            </li>
                            <li><label>Size:</label>
                                <p>Large, Medium, Small</p>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane " id="product-tab-size-guide">
                        <figure class="size-image mt-4 mb-4">
                            <img src="{{asset('asset-frontend')}}/images/product/size_guide.png" alt="Size Guide Image"
                                width="217" height="398">
                        </figure>
                        <figure class="size-table mt-4 mb-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>SIZE</th>
                                        <th>CHEST(IN.)</th>
                                        <th>WEIST(IN.)</th>
                                        <th>HIPS(IN.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>XS</th>
                                        <td>34-36</td>
                                        <td>27-29</td>
                                        <td>34.5-36.5</td>
                                    </tr>
                                    <tr>
                                        <th>S</th>
                                        <td>36-38</td>
                                        <td>29-31</td>
                                        <td>36.5-38.5</td>
                                    </tr>
                                    <tr>
                                        <th>M</th>
                                        <td>38-40</td>
                                        <td>31-33</td>
                                        <td>38.5-40.5</td>
                                    </tr>
                                    <tr>
                                        <th>L</th>
                                        <td>40-42</td>
                                        <td>33-36</td>
                                        <td>40.5-43.5</td>
                                    </tr>
                                    <tr>
                                        <th>XL</th>
                                        <td>42-45</td>
                                        <td>36-40</td>
                                        <td>43.5-47.5</td>
                                    </tr>
                                    <tr>
                                        <th>XXL</th>
                                        <td>45-48</td>
                                        <td>40-44</td>
                                        <td>47.5-51.5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </figure>
                    </div>
                    <div class="tab-pane " id="product-tab-reviews">
                        <div class="comments mb-8 pt-2 pb-2 border-no">
                            <ul>
                                @foreach ($reviews as $review)
                                <li>
                                    <div class="comment">
                                        <figure class="comment-media">
                                            <a href="#">
                                                <img src="{{asset('asset-frontend')}}/images/blog/comments/1.jpg"
                                                    alt="avatar">
                                            </a>
                                        </figure>

                                        <div class="comment-body">
                                            <div class="comment-rating ratings-container mb-0">
                                                <div class="ratings-full">
                                                    <span class="ratings"
                                                        style="width:{{ $review->rating / 5 * 100 }}%"></span>
                                                    <span class="tooltiptext tooltip-top">{{ $review->rating }}</span>
                                                </div>
                                            </div>
                                            <div class="comment-user">
                                                <span
                                                    class="comment-date text-body">{{ date_format($review->created_at, 'F d, Y \a\t g:i') }}</span>
                                                <h4><a href="#">{{ $review->user->name }}</a></h4>
                                            </div>

                                            <div class="comment-content">
                                                <p>{{ $review->message }}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Comments -->
                        <div class="reply">
                            <div class="title-wrapper text-left">
                                <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>
                            {{-- Reviews --}}
                            <form action="{{ route('product_review') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" id="start-number" name="rating">
                                <div class="rating-form">
                                    <label for="rateYo" class="text-dark">Your rating * </label>
                                    <div id="rateYo" data-rateyo-precision></div>
                                </div>
                                <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                                    placeholder="Comment *" name="message" required></textarea>
                                <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                                        class="d-icon-arrow-right"></i></button>
                            </form>
                        </div>
                        <!-- End Reply -->
                    </div>
                </div>
            </div>

            <section class="pt-3 mt-10">
                <h2 class="title justify-content-center">Related Products</h2>

                <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4" data-owl-options="{
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
                    @foreach ($related_products as $product)
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{ route('product_detail', $product->slug ) }}">
                                <img src="{{asset('uploads/products/product_avatar' . '/' . $product->image )}}"
                                    alt="{{ $product->name }}" width="280" height="315">
                            </a>
                            <div class="product-label-group">
                                <label class="product-label label-new">new</label>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                    data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                        class="d-icon-heart"></i></a>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a
                                    href="{{ route('category', $product->category->slug ) }}">{{ $product->category->name }}</a>
                            </div>
                            <h3 class="product-name">
                                <a href="{{ route('product_detail', $product->slug ) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="product-price">
                                @if($product->sale_price > 0)
                                <ins class="new-price">${{ number_format($product->sale_price, 2, ',') }}</ins><del
                                    class="old-price">${{ number_format($product->price, 2, ',') }}</del>
                                @else
                                <span class="price">${{ number_format($product->price, 2, ',') }}</span>
                                @endif
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">( <span class="review-count">12</span>
                                    reviews
                                    )</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</main>

@endsection

@section('css-option')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('javascript-option')

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    // Rating
    $(function () {
        $("#rateYo").rateYo({
        rating: 3.5,
        halfStar: true,
        multiColor: {
            "startColor": "#c0392b", // Start
            "endColor" : "#f1c40f" // End
        },
        onChange: function (rating, rateYoInstance) {
            $('#start-number').val(rating);
        }
    });

    // Avg Rating
    $("#avg-rating").rateYo({
        rating: {{ $rating_avg }},
        readOnly: true,
        starWidth: "20px"
        });
    });

    // Add to cart
    function onAddCart() {
        $.ajax({
            type: "POST",
            url: "/cart/add",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                console.log(response);
            }
        });
    }

</script>
@endsection
