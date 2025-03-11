@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Product</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="source/source/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{ $sanpham->name }}</p>
                            <p class="single-item-price">
                                <span>${{ number_format($sanpham->unit_price, 2) }}</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-desc">
                            <p>{{ $sanpham->description }}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <p>Options:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select" name="quantity">
                                <option>Qty</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>
                    <div class="panel" id="tab-description">
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit...</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    <div class="row">
                        @foreach ($relatedProducts as $product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('chitietsanpham', ['id' => $product->id])}}">
                                            <img src="source/source/image/product/{{ $product->image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $product->name }}</p>
                                        <p class="single-item-price">
                                            <span>${{ number_format($product->unit_price, 2) }}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('chitietsanpham', ['id' => $product->id])}}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a class="beta-btn primary" href="{{ route('chitietsanpham', ['id' => $product->id])}}">
                                            Details <i class="fa fa-chevron-right"></i>
                                        </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        @foreach (range(1, 4) as $i)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('chitietsanpham', ['id' => $sanpham->id])}}">
                                    <img src="source/source/assets/dest/images/products/sales/{{ $i }}.png" alt="">
                                </a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        @foreach ($newProducts as $product)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('chitietsanpham', ['id' => $product->id])}}">
                                    <img src="source/source/image/product/{{ $product->image }}" alt="">
                                </a>
                                <div class="media-body">
                                    {{ $product->name }}
                                    <span class="beta-sales-price">${{ number_format($product->unit_price, 2) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection