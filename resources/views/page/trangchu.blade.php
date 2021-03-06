@extends('master')
@section('noidung')
	<div class="rev-slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >
		    <div class="banner" >
				<ul>
						<!-- THE FIRST SLIDE -->
				@foreach($slide as $sl)
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
			            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
										</div>
							</div>

			        </li>
				@endforeach
					</ul>
				</div>
			</div>

			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_products)}} sản phẩm</p>
								<div class="clearfix"></div>

							</div>
							<div class="row">
							<div class="pull-right">
								
							        <input type="text" name="search" id="search" placeholder="Nhập từ khóa..." />
							        <button class="btn btn-default" type="button" id="searchbutton">Tìm</button>
								
							</div>
							</div>
							<div class="space20">&nbsp;</div>
							<div class="row">
							<?php
								$products = $new_products->values()->toArray();
								//print_r($products); die;
							?>
								@for($i=0;$i<count($products);$i++)

								<div class="col-sm-3" style="margin-bottom: 15px">

									<div class="single-item">
									@if($products[$i]['promotion_price']!=0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$products[$i]['image']}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$products[$i]['name']}}</p>
											<p class="single-item-price" style="font-size: 18px">
											@if($products[$i]['promotion_price']!=0)
												<span class="flash-del">{{number_format($products[$i]['unit_price'])}} đồng</span>
												<span class="flash-sale">{{number_format($products[$i]['promotion_price'])}} đồng</span>
											@else 
												<span class="flash-sale">{{number_format($products[$i]['unit_price'])}} đồng</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-to-cart',[$products[$i]['id'],1])}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endfor
							</div>
							<div class="row">{{$new_products->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){			
			$('#searchbutton').click(function(){
				var keyword = $('#search').val();
				$.ajax({
					url: "{{route('search')}}",
					type:"get",
					data: {keyword:keyword},
					success:function(data){
						console.log(data)
					}
				})
			})
			
		})

	</script>
@endsection
