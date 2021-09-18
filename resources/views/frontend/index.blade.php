@extends('layouts.frontend-layout')

@section('css')
{{-- <style>
.category-menu-list
{
    display: block !important;
}
</style> --}}
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

@section('content')

{{-- Slider Area --}}
<div class="slider-area">
    <div class="slider-active owl-carousel">
        @if ($sliders->isNotEmpty())
        @foreach ($sliders as $slider)      
        <div class="single-slider-4 slider-height-4 bg-img" style="background-image: url('{{asset('storage/sliders/'.$slider->image)}}')">
            <div class="container">
                <div class="slider-content-4 fadeinup-animated">
                    {!!$slider->text!!}
                    @if ($slider->link)
                    <a class="electro-slider-btn btn-hover animated" href="{{$slider->link}}">buy now</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
{{-- End of Slider Area --}}

{{-- Top Banner --}}
<div class="banner-area wrapper-padding gray-bg-7 pt-60">
    <div class="container-fluid">
        <div class="row">
            @if (!empty(setting()->top_ad1_img))                
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="banner-wrapper-4 mb-30">
                        <img src="{{setting()->top_ad1_img ? asset('storage/settings/'.setting()->top_ad1_img) : '' }}" alt=""/>
                    <div class="banner-content4-style1" style="color: #fff">
                        {!!setting()->top_ad1_text ?? ''!!}
                    </div>
                </div>
            </div>
            @endif

            @if (!empty(setting()->top_ad2_img))                
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="banner-wrapper-4 mb-30">
                    <img src="{{setting()->top_ad2_img ? asset('storage/settings/'.setting()->top_ad2_img) : '' }}" alt=""
                    />
                    <div class="banner-content4-style2">
                        {!!setting()->top_ad2_text!!}
                    </div>
                </div>
            </div>
            @endif

            @if (!empty(setting()->top_ad3_img))                
            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="banner-wrapper-4 mb-30">
                    <img src="{{setting()->top_ad3_img ? asset('storage/settings/'.setting()->top_ad3_img) : '' }}" alt=""
                    />
                    <div class="banner-content4-style2">
                        {!!setting()->top_ad3_text!!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
{{-- End of Top Banner --}}

{{-- Featured/Top Products --}}
<div class="best-selling-area pb-95 gray-bg-7">
    <div class="section-title-4 text-center mb-60">
        <h2>Latest Products</h2>
    </div>
    <div class="best-selling-product">
        <div class="row no-gutters">

            @foreach ($products as $product)
                @if ($loop->first)                
                <div class="col-lg-5 col-md-5">
                    <div class="best-selling-left">
                        <div class="product-wrapper">
                            <div class="product-img-4">
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
                            <div class="product-content-5 text-center">
                                <h4>
                                    <a href="{{route('product.single', $product->slug)}}"
                                        >{{$product->name}}</a
                                    >
                                </h4>
                                <h5 >Rs. {{$product->sale_price ? $product->sale_price : $product->price}} 
                                </h5>
                                    @if ($product->sale_price)
                                    <h6 style="text-decoration-line: line-through;">Rs. {{$product->price}}</h6>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="best-selling-right">
                        <div class="custom-container">
                            <div class="coustom-row-3">
                @endif


                @if ($loop->first)
                @continue 
                @endif


                <div class="custom-col-style-3 custom-col-3">
                    <div class="product-wrapper mb-6">
                        <div class="product-img-4">
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
                        <div class="product-content-6">
                            <h4>
                                <a
                                    href="product-details.html"
                                    >{{$product->name}}</a
                                >
                            </h4>
                            <h5 >Rs. {{$product->sale_price ? $product->sale_price : $product->price}} 
                            </h5>
                                @if ($product->sale_price)
                                <h6 style="text-decoration-line: line-through;">Rs. {{$product->price}}</h6>
                                @endif                        
                        </div>
                    </div>
                </div>
            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Top Products --}}

{{-- Category with Products --}}
@if ($cats->isNotEmpty())
    @foreach ($cats as $cat)
        @if ($cat->children->isEmpty())
            <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
                <div class="container-fluid">
                    <div class="section-title-4 text-center mb-45">
                        <h2>
                        <a href="{{route('category', $cat->slug)}}">

                        {{$cat->name}}
                        </a>
                        </h2>

                    </div>
                    <div class="top-product-style">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="electro1" role="tabpanel">
                                <div class="custom-row-2">
                                    @foreach ($cat->products->take(8) as $product)
                                    <div class="custom-col-style-2 custom-col-4">
                                        <div class="product-wrapper product-border mb-24">
                                            <div class="product-img-3">
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
                                                >@php
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
                                                    @endif                                             >
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
                                            <div class="product-content-4 text-center">
                                                <h4><a href="{{route('product.single', $product->slug)}}">{{$product->name}}</a></h4>
                                                <h5 >Rs. {{$product->sale_price ? $product->sale_price : $product->price}} 
                                                </h5>
                                                    @if ($product->sale_price)
                                                    <h6 style="text-decoration-line: line-through;">Rs. {{$product->price}}</h6>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>                                    
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        @endif
    @endforeach    
@endif
{{-- End of Category with Products --}}

{{-- Footer Banner --}}

@if (!empty(setting()->bottom_ad_img))
<div class="banner-area wrapper-padding pt-15 pb-95 gray-bg-7">
    <div class="container-fluid">
        <div
            class="electro-fexible-banner bg-img"
            style="background-image: url('{{'storage/settings/'.setting()->bottom_ad_img}}')"
        >
            <div class="fexible-content fexible-content-2">
                {!!setting()->bottom_ad_text!!}
            </div>
        </div>
    </div>
</div>    
@endif

{{-- End of Footer Banner --}}

{{-- Random Products --}}
<div class="product-area-2 wrapper-padding pt-100 pb-70 gray-bg-7">
    <div class="container-fluid">
        <div class="row">
            @foreach ($randomProducts as $product)
            <div class="col-lg-6 col-md-6 col-sm-6 col-xl-4">
                <div
                    class="product-wrapper product-wrapper-border mb-30"
                >
                    <div class="product-img-5">
                        <a href="{{route('product.single', $product->slug)}}">
                            <img
                                src="{{asset('storage/featured_images/'.$product->featured_image)}}"
                                alt=""
                            />
                        </a>
                    </div>
                    <div class="product-content-7">
                        <h4>
                            <a href="{{route('product.single', $product->slug)}}"
                                >{{$product->name}}</a
                            >
                        </h4>
                        <h5>Rs. {{$product->sale_price ? $product->sale_price : $product->price}}</h5>
                        @if ($product->sale_price)
                        <h6 style="text-decoration-line: line-through;">Rs. {{$product->price}}</h6>
                        @endif
                        <div class="product-action-electro d-flex">
                            <a class="animate-top rapid-add" title="Add To Cart" href="#">
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
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- End of Random Products --}}

@endsection