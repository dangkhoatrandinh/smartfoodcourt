@extends('layout2')
<link rel="shortcut icon" href="../frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="../frontend/images/ico/apple-touch-icon">
@section('content') 
<div class="col-sm-9 padding-right">
		@foreach($product_data as $key => $value)
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="../upload/product/{{$value->product_image}}" alt="" />
							</div>
							
						</div>
						<div class="col-sm-7">
							
							<div class="product-information"><!--/product-information-->
								<img src="../frontend/images/product-details/new.jpg" class="newarrival" alt="" />
								
								<h2>{{$value->product_name}}</h2>
								<img src="../frontend/images/product-details/rating.png" alt="" />
								
								<p><b>Category:</b> {{$value->category_name}}</p>
								<p><b>Brand:</b> {{$value->brand_name}}</p>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<span>
									<span>{{$value->product_price}}$</span>
									<form action="{{URL::to('/addgiohang')}}" method="post">
										{{csrf_field()}}
									<label>Quantity:</label>
									<input type="number" min="1" value="1" name="soluong" />
									<input type="hidden" value="{{$value->product_id}}" name="hidden_id" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									</form>
								</span>
								<a href=""><img src="../frontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
							
						</div>
					</div><!--/product-details-->
				
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12" style="padding: 0 20px">
									<p>{{$value->product_desc}}</p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>{{$value->product_content}}</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
		@endforeach				
</div>


 @endsection