@extends('layout3')
<link rel="shortcut icon" href="/frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="/frontend/images/ico/apple-touch-icon">
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
					$content = Cart::content(); 
					//echo '<pre>';
    				//print_r($content);
    				//echo '</pre>';
    				Cart::setGlobalTax(10);
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $key => $value)
						<tr>
							<td class="cart_product">
								<a href="#"><img style="max-width: 110px" src="upload/product/{{$value->options->image}}" alt="" />
								</a>
							</td>
							<td class="cart_description">
								<h4><a href="{{URL::to('/xemproduct/'.$value->id)}}">{{$value->name}}</a></h4>
								<p>ID: {{$value->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{$value->price}}$</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('updatecart/'.$value->rowId)}}" method="post">
										{{csrf_field()}}
									<input style="width: 47px; height: 32.85px; background-color: #fff; border: solid 1px #ccc; border-radius: 4px;" class="cart_quantity_input" type="number" min = "1" name="quantity" value="{{$value->qty}}" autocomplete="off" size="2">
									
									<input type="submit" value="Update" name ="newqty" class="btn btn-default btn-small">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$value->qty * $value->price}}$</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('deletecart/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		</section>


		<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Thanh toán</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::subtotal()}}$</span></li>
							<li>Thuế <span>{{Cart::tax()}}$</span></li>
							<li>Thành tiền <span>{{Cart::total()}}$</span></li>
						</ul>
							<a class="btn btn-default update" href="{{URL::to('/showcheckout')}}">Check out</a>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection