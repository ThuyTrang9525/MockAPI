@extends('master')
@section('content')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
						@foreach ($slide as $sl)
                        <!-- THE FIRST SLIDE -->
						<li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<img	 class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source\source\image\slide\{{$sl->image}}" data-src="source\source\assets\dest\images\thumbs\1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source\source\assets\dest\images\thumbs\1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
												</img>
											</div>

						        </li>
						@endforeach
						
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>New Products</h4>
						<div class="beta-products-details">
						<p class="pull-left">{{ $newProducts->count() }} styles found</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($newProducts as $product)
							<div class="col-sm-3">
								<div class="single-item">
									@if($product->promotion_price > 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif

									<div class="single-item-header">
										<a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
											<img src="source\source\image\product\{{$product->image}}" alt="">
										</a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $product->name }}</p>
										<p class="single-item-price">
											@if($product->promotion_price > 0)
												<span class="flash-del">${{ number_format($product->unit_price, 2) }}</span>
												<span class="flash-sale">${{ number_format($product->promotion_price, 2) }}</span>
											@else
												<span>${{ number_format($product->unit_price, 2) }}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<!-- Top Products -->
					<div class="beta-products-list">
						<h4>Top Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{ count($topProducts) }} styles found</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($topProducts as $product)
							<div class="col-sm-3">
								<div class="single-item">
									@if($product->promotion_price > 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif

									<div class="single-item-header">
										<a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
											<img src="source\source\image\product\{{$product->image}}" alt="">
										</a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $product->name }}</p>
										<p class="single-item-price">
											@if($product->promotion_price > 0)
												<span class="flash-del">${{ number_format($product->unit_price, 2) }}</span>
												<span class="flash-sale">${{ number_format($product->promotion_price, 2) }}</span>
											@else
												<span>${{ number_format($product->unit_price, 2) }}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div>
		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->

    @endsection