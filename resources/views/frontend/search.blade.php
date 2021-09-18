@extends('layouts.frontend-layout')
@section('title', $query.' |')

@section('content')
<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> {{ucfirst($query)}} </li>
        </ul>
    </div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container">

        <div class="contact-title">
            <h4>Search results for "{{$query}}"</h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar1" class="tab-pane fade active show">
                                <div class="row">
                                    {{-- @if ($products->isNotEmpty()) --}}
                                        @forelse ($products as $product)
                                        <div class="col-lg-6 col-md-6 col-xl-3">
                                            <div class="product-wrapper mb-30">
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
                                                    @endif                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <h5 class="text-center" style="margin: auto">
                                                No results found for  <strong>{{request()->query('query')}}</strong>
                                            </h5>
                                        @endforelse
                                    {{-- @endif --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$products->links('frontend/pagination_link')}}
            </div>
        </div>
    </div>
</div>
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