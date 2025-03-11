@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        <li class="is-active"><a href="#">Custom callout box</a></li>
                        <li><a href="#">Page section</a></li>
                        <li><a href="#">Mini callout box</a></li>
                        <li><a href="#">Content box</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{ count($newProducts) }} sản phẩm mới</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($newProducts as $product)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
                                                <img src="source\source\image\product\{{$product->image}}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $product->name }}</p>
                                            <p class="single-item-price">
                                                <span>${{ number_format($product->unit_price, 2) }}</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{ count($topProducts) }} sản phẩm hàng đầu</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($topProducts as $product)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
                                                <img src="source\source\image\product\{{$product->image}}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $product->name }}</p>
                                            <p class="single-item-price">
                                                <span>${{ number_format($product->unit_price, 2) }}</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection
