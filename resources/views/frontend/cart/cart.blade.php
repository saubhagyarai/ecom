@extends('layouts.frontend-layout')
@section('title', 'Cart |')
@section('content')

<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> Cart </li>
        </ul>
    </div>
</div>

<!-- shopping-cart-area start -->
<div class="cart-main-area pt-95 pb-100" id="updateDiv">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if (Cart::count() > 0)
                <h1 class="cart-heading">My Cart</h1>                    
                @endif
                    <div class="table-content table-responsive">
                        @if (Cart::count() > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::content() as $product)
                                <tr>
                                    <td class="product-remove"><a href="{{route('cart.delete', $product->rowId)}}"><i class="pe-7s-close"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="{{route('product.single', $product->options->slug)}}"><img src="{{asset('storage/featured_images/'.$product->options->featured_image)}}" alt=""></a>
                                    </td>

                                    <td class="product-name"><a href="{{route('product.single', $product->options->slug)}}">{{$product->name}}</a></td>
                                    <td class="product-price-cart"><span class="amount">Rs. {{round($product->price)}}</span></td>
                                    <td class="product-quantity">
                                        {{-- <input value="{{$product->qty}}" type="number"> --}}
                                        <div class="rapid-cart-plus-minus">
                                            <input type="text" value="{{$product->qty}}" name="qty" class="rapid-cart-plus-minus-box" disabled>
                                            <input type="hidden" value="{{$product->rowId}}" id="rowId" class="rowId">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">Rs. {{$product->total(0,'.','') }}</td>
                                </tr>                                            
                                @endforeach

                            </tbody>
                        </table>                        
                        @else
                        <h3>
                        Cart is Empty! <a href="{{route('index')}}" style="color: #1786ac;">Shop Now</a>
                        </h3>
                        @endif

                    </div>
                    @if (Cart::count() > 0)
                        
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    {{-- <li>Subtotal<span>100.00</span></li> --}}
                                    <li>Total<span id="grand-total">Rs. {{Cart::total(0, '.', '')}}</span></li>
                                </ul>
                                @guest
                                
                                <a href="{{route('login')}}">Login to proceed checkout</a>
                                @else
                                <a href="{{route('checkout')}}">Proceed to checkout</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                                        
                    @endif
            </div>
        </div>
    </div>            
</div>
@endsection


@section('js')
<script>
    /*----------------------------
    Cart Plus Minus Button
    ------------------------------ */
    $(".rapid-cart-plus-minus").prepend('<div class="dec rapid-qtybutton">-</div>');
    $(".rapid-cart-plus-minus").append('<div class="inc rapid-qtybutton">+</div>');
    $(".rapid-qtybutton").on("click", function () {
        var $button = $(this);
        // var oldValue = $button.parent().find("input").val();
        var qty = $button.parent().find(".rapid-cart-plus-minus-box").val();
        var id = $button.parent().find("#rowId").val();

        // For Quantity Increment with AJAX
        if ($button.text() == "+") {

            $.ajax({
                type: 'get',
                url: '{{url('cart/incr')}}/'+id+'/'+qty,
                success:function(response) {
                    // console.log(response);
                    var newQty = response.product['qty'];
                    var newSubTotal = response.productSubTotal;
                    var newGrandTotal = response.grandTotal;
                    var msg = response.success;

                    $button.parent().find(".rapid-cart-plus-minus-box").val(newQty);
                    $button.parents("tr").find(".product-subtotal").text('Rs. ' + newSubTotal);
                    document.getElementById("grand-total").innerHTML = 'Rs. ' + newGrandTotal;
                    toastr.success(msg,"",
                    {
                    "positionClass": "toast-bottom-left",
                    });
                } 
            });
        }
        else
        {
            // Don't allow decrementing below zero
            if (qty > 1) {
                $.ajax({
                type: 'get',
                url: '{{url('cart/decr')}}/'+id+'/'+qty,
                success:function(response) {
                    // console.log(response);
                    var newQty = response.product['qty'];
                    var newSubTotal = response.productSubTotal;
                    var newGrandTotal = response.grandTotal;
                    var msg = response.success;


                    $button.parent().find(".rapid-cart-plus-minus-box").val(newQty);
                    $button.parents("tr").find(".product-subtotal").text('Rs. ' + newSubTotal);
                    document.getElementById("grand-total").innerHTML = 'Rs. ' + newGrandTotal;
                    toastr.success(msg,"",
                    {
                    "positionClass": "toast-bottom-left",
                    });
                    } 
                });
            } 
            else
            {
                newQty = 1;
            }
        }
    });

</script>
    
@endsection