@extends('layout3')
<link rel="shortcut icon" href="../frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="../frontend/images/ico/apple-touch-icon">
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<?php
					$content = Cart::content(); 
					//echo '<pre>';
    				//print_r($content);
    				//echo '</pre>';
    				Cart::setGlobalTax(10);
			?>

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
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

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tổng</td>
										<td>{{Cart::subtotal()}}$</td>
									</tr>
									<tr>
										<td>Thuế</td>
										<td>{{Cart::tax()}}$</td>
									</tr>
									<tr>
										<td>Thành tiền</td>
										<td><span>{{Cart::total()}}$</span></td>
									</tr>
								</table>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
</section> <!--/#cart_items-->

@endsection