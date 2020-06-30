@extends('layout2')
<link rel="shortcut icon" href="frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="frontend/images/ico/apple-touch-icon">
@section('slide')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="frontend/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                    <img src="frontend/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="frontend/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="frontend/images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="frontend/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="frontend/images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
@endsection

@section('content')

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản phẩm</h2>
                        @foreach($product_data as $key => $product_temp)
                        <a href="{{URL::to('/xemproduct/'.$product_temp->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="upload/product/{{$product_temp->product_image}}" alt="Eror" />
                                            <h2>{{$product_temp->product_price}}$</h2>
                                            <p>{{$product_temp->product_name}}</p>
                                            
                                            <form action="{{URL::to('/addgiohang')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" min="1" value="1" name="soluong" />
                                                <input type="hidden" value="{{$product_temp->product_id}}" name="hidden_id" />
                                                <button type="submit" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                                </button>
                                                </form>      
                                        </div>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="frontend/images/home/product5.jpg" alt="" />
                                        <h2>Bản giao diện gốc</h2>
                                        <p>Để làm mẫu mốt còn sửa</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                            <a href="#">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="frontend/images/home/product5.jpg" alt="" />
                                        <h2>Làm gọn nhìn đỡ rối</h2>
                                        <p>Để làm mẫu mốt còn sửa</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </a>
                    </div><!--features_items-->
                    
                    
                    
                    

@endsection
