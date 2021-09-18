@extends('layouts.frontend-layout')
@section('title', $product->name.' |')
@section('content')

<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> {{$product->name}} </li>
        </ul>
    </div>
</div>
<div class="product-details ptb-60 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-70">
                        <div class="product-details-large tab-content">
                            <div class="tab-pane active show fade" id="pro-details1" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('storage/featured_images/'.$product->featured_image)}}">
                                        <img src="{{asset('storage/featured_images/'.$product->featured_image)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            
                            @if (json_decode($product->images))
                            @php
                                $count = 1;
                            @endphp
                            @foreach (json_decode($product->images) as $image)
                            @php
                                $count++;
                            @endphp
                            <div class="tab-pane fade" id="pro-details-{{$count}}" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('storage/product_images/'.$image)}}">
                                        <img src="{{asset('storage/product_images/'.$image)}}" alt="">
                                    </a>
                                </div>
                            </div>

                            @endforeach
                            @endif
                            {{--
                            <div class="tab-pane fade" id="pro-details3" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('frontend/assets/img/product-details/bl3.jpg')}}">
                                        <img src="{{asset('frontend/assets/img/product-details/l3.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pro-details4" role="tabpanel">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{asset('frontend/assets/img/product-details/bl4.jpg')}}">
                                        <img src="{{asset('frontend/assets/img/product-details/l4.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="product-details-small nav mt-12" role=tablist>
                            <a class="active mr-12" href="#pro-details1" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{asset('storage/featured_images/'.$product->featured_image)}}" alt="" style="height: 100px; width:100px;">
                            </a>
                            
                            @if (json_decode($product->images))
                            @php
                                $count = 1;
                            @endphp
                            @foreach (json_decode($product->images) as $image)
                            @php
                                $count++;
                            @endphp
                            <a class="mr-12" href="#pro-details-{{$count}}" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{asset('storage/product_images/'.$image)}}" alt="" style="height: 100px; width:100px;">
                            </a>
                            @endforeach                                
                            @endif

                            
                            {{-- <a class="mr-12" href="#pro-details-68768" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{asset('frontend/assets/img/product-details/s3.jpg')}}" alt="" style="height: 10px; width:10px;">
                            </a>
                            <a class="mr-12" href="#pro-details-6769" data-toggle="tab" role="tab" aria-selected="true">
                                <img src="{{asset('frontend/assets/img/product-details/s4.jpg')}}" alt="">
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{$product->name}}</h3>
                    <div class="details-price">
                        <span>Rs. {{$product->sale_price ? $product->sale_price : $product->price}}</span>
                        @if ($product->sale_price)
                        <h5 style="text-decoration-line: line-through;">Rs. {{$product->price}}</h5>
                        @endif
                    </div>
                    {!!$product->description!!}
                    
                    <div class="quickview-plus-minus">
                        <form action="{{route('cart.add',$product->id)}}" method="POST" class="d-flex">
                            @csrf
                            <div class="cart-plus-minus">
                                <input type="text" value="1" name="qty" class="cart-plus-minus-box">
                            </div>
                            <div class="quickview-btn-cart">
                                <a class="btn-hover-black" href="#" onclick="$(this).closest('form').submit(); e.preventDefault();"
                                @if(in_array( $product->id, Cart::content()->pluck('id')->toArray()))
                                style="background-color: #000; pointer-events: none;"
                                @endif
                                >
                                @if(in_array( $product->id, Cart::content()->pluck('id')->toArray()))
                                in cart
                                @else
                                add to cart
                                @endif
                                </a>

                            </div>
                        </form>
                        {{-- Wishlist --}}
                        <div class="quickview-btn-wishlist">
                            @if (Auth::check())
                            <form action="{{route('addToWishlist', $product->id)}}" method="POST">
                                @csrf
                                <a class="btn-hover" title="Wishlist" href="#" onclick="this.parentNode.submit()"
                                @if (in_array($product->id, $wishlistProducts->toArray()))
                                style="background-color: #333; color: #fff; cursor: default; pointer-events: none;"
                                @endif
                                >
                                    <i class="pe-7s-like"></i>
                                </a>
                            </form>
                            @else
                            <a class="btn-hover wishlist-notify" id="wishlist-notify" title="Wishlist" href="#">
                                <i class="pe-7s-like"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            @if ($product->categories->isNotEmpty())
                                
                            <li class="categories-title">Categories :</li>
                            @foreach ($product->categories as $cat)
                                
                            <li><a href="{{route('category', $cat->slug)}}">{{$cat->name}}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product area start -->
@if ($catProducts != null)

<div class="product-area pb-95">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>Related products</h2>
        </div>
        <div class="product-style">
            <div class="related-product-active owl-carousel">

                @foreach ($catProducts->first()->products->take(3) as $product)
                    
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="{{route('product.single', $product->slug)}}">
                            <img src="{{asset('storage/featured_images/'.$product->featured_image)}}" alt="">
                        </a>

                        @if ($product->sale_price)                
                        <span style="background-color: #666;
                                        border-radius: 100%;
                                        color: #fff;
                                        display: inline-block;
                                        font-size: 14px;
                                        font-weight: normal;
                                        height: 40px;
                                        left: 20px;
                                        letter-spacing: 1px;
                                        line-height: 40px;
                                        position: absolute;
                                        text-align: center;
                                        text-transform: uppercase;
                                        top: 20px;
                                        width: 40px;"
                                        >
                            @php
                            // get the discount percent
                            if($product->sale_price)
                            {
                                echo '-'.round((($product->price - $product->sale_price)/$product->price)*100).'%';
                            }
                            @endphp
                        </span>
                    @endif       
                        <div class="product-action-right">
                            <a class="animate-top rapid-add" title="Add To Cart" href="#" 
                            @if(in_array( $product->id, Cart::content()->pluck('id')->toArray()))
                            style="background-color: #333; color: #fff; cursor: default; pointer-events: none;"
                            @endif                                                   
                            >
                                    <i class="pe-7s-cart"></i>
                            </a>

                            @if (Auth::check())
                            <form action="{{route('addToWishlist', $product->id)}}" method="POST">
                                @csrf
                                <a class="animate-left" title="Wishlist" href="#" onclick="this.parentNode.submit()"
                                @if (in_array($product->id, $wishlistProducts->toArray()))
                                style="background-color: #333; color: #fff; cursor: default; pointer-events: none;"
                                @endif
                                >
                                    <i class="pe-7s-like"></i>
                                </a>
                            </form>
                            @else
                            <a class="animate-left wishlist-notify" id="wishlist-notify" title="Wishlist" href="#">
                                <i class="pe-7s-like"></i>
                            </a>
                            @endif

                            <input type="hidden" class="product_id" value="{{$product->id}}">
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="{{route('product.single', $product->slug)}}">{{$product->name}}</a></h4>
                        <span>Rs. {{$product->sale_price ? $product->sale_price : $product->price}}</span>
                        @if ($product->sale_price)
                        <h6 style="text-decoration-line: line-through;">Rs. {{$product->price}}</h6>
                        @endif
                    </div>
                </div>
                
                @endforeach                    

            </div>
        </div>
    </div>
</div>
@endif


@endsection

@section('js')
<script>
    // Rapid add to cart
    $(document).ready(function(){

        $('.rapid-add').click(function(e){
            e.preventDefault();
            let activeId = $(this).parent().find('.product_id').val();

            $.ajax({
                type: 'get',
                url: '{{url('cart/rapid-add')}}'+'/'+activeId,
                success:function(response) {
                    var cartCount = response.count;
                    var msg = response.success;
                    document.getElementById("cart-count").innerHTML = cartCount;
                    console.log(this);

                    
                    toastr.success(msg,"",
                    {
                    "positionClass": "toast-bottom-left",
                    });
                }
            });
            // disable the add to cart button
            $(this).css({"background-color":"#333","color":"#fff","cursor": "default", "pointer-events": "none"})
        });


        // Show error if unauth user clicks wishlist
        $('.wishlist-notify').on('click', function() {
            // show when the button is clicked
            toastr.error("Please log in to save product!","",
            {
            "positionClass": "toast-top-center",
            // "progressBar" = "true",
            });
        });
    });
</script>    
@endsection
