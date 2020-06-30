@extends('layout2')
<link rel="shortcut icon" href="frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="frontend/images/ico/apple-touch-icon">
@section('content') 
	<div class="features_items"><!--features_items-->
                        @foreach($brand_name as $key => $name)
                        <h2 class="title text-center">{{$name->brand_name}}</h2>
                        @endforeach
                        @foreach($product_data as $key => $product_temp)
                        <a href="{{URL::to('/xemproduct/'.$product_temp->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../upload/product/{{$product_temp->product_image}}" alt="Eror" />
                                            <h2>{{$product_temp->product_price}}$</h2>
                                            <p>{{$product_temp->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                        
                    </div><!--features_items-->
@endsection