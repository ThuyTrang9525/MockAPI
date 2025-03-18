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
            <!-- Phần hiển thị sản phẩm -->
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-5">
                        <img src="source/source/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-7">
                        <div class="single-item-body">
                            <p class="single-item-title">{{ $sanpham->name }}</p>
                            <p class="single-item-price">
                                <span>${{ number_format($sanpham->unit_price, 2) }}</span>
                            </p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-desc">
                            <p>{{ $sanpham->description }}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <p>Options:</p>
                        <div class="single-item-options">
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
                        <li><a href="#tab-reviews">Reviews ({{ $sanpham->comments->count() }})</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{ $sanpham->description }}</p>
                    </div>

                    <div class="panel" id="tab-reviews">
                        @if (!$sanpham->comments->isEmpty())
                            @foreach ($sanpham->comments as $comment)
                                <p>{{ $comment->username }}: {{ $comment->comment }}</p>
                            @endforeach
                        @else
                            <p>Chưa có đánh giá nào</p>
                        @endif
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
                                        <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
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
                                        <a class="add-to-cart pull-left" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a class="beta-btn primary" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
                                            Details <i class="fa fa-chevron-right"></i>
                                        </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Phần Best Sellers & New Products -->
            <div class="col-sm-4">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        @foreach ($bestSellers as $product)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
                                    <img src="source/source/image/product/{{ $product->image }}" alt="{{ $product->name }}">
                                </a>
                                <div class="media-body">
                                    {{ $product->name }}
                                    <span class="beta-sales-price">${{ number_format($product->unit_price, 2) }}</span>
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
