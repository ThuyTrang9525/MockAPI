<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="{{ route('dangky') }}">Đăng kí</a></li>
						<li><a href="{{ route('dangnhap') }}">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{ route('trang-chu') }}" id="logo"><img src="source/source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select">
								<i class="fa fa-shopping-cart"></i> Giỏ hàng 
								({{ Session::has('cart') ? Session('cart')->totalQty : 0 }}) 
								<i class="fa fa-chevron-down"></i>
							</div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart') && count($product_cart) > 0)
									@foreach($product_cart as $product)
									<div class="cart-item">
										<a class="cart-item-delete" href="{{ route('xoagiohang', $product['item']['id']) }}">
											<i class="fa fa-times"></i>
										</a>
										<div class="media">
											<a class="pull-left" href="#">
												<img src="source/source/image/product/{{ $product['item']['image'] }}" alt="">
											</a>
											<div class="media-body">
												<span class="cart-item-title">{{ $product['item']['name'] }}</span>
												<span class="cart-item-amount">
													{{ $product['qty'] }} X 
													@if($product['item']['promotion_price'] > 0)
														{{ number_format($product['item']['promotion_price'], 0, ',', '.') }} VNĐ
													@else
														{{ number_format($product['item']['unit_price'], 0, ',', '.') }} VNĐ
													@endif
												</span>
											</div>
										</div>
									</div>
									@endforeach
									<div class="cart-caption">
										<div class="cart-total text-right">
											Tổng tiền: 
											<span class="cart-total-value">
												{{ Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0' }} đồng
											</span>
										</div>
										<div class="center">
											<a href="" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></a>
										</div>
									</div>
								@else
									<p>Giỏ hàng trống!</p>
								@endif
							</div>
							</div>
						</div>
					</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ route('trang-chu') }}">Trang chủ</a></li>
						<li><a href="/type/1">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($type_product as $type)
									<li><a href="{{ route('loaisanpham', ['type_id' => $type->id]) }}">{{ $type->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('about') }}">Giới thiệu</a></li>
						<li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->