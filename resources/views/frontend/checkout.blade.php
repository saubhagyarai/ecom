@extends('layouts.frontend-layout')
@section('title', 'Checkout |')
@section('content')

<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> Checkout </li>
        </ul>
    </div>
</div>

<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        @foreach($errors as $error)
            <p>{{$error}}</p>
        @endforeach
        <form action="{{route('order.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    {{-- <form action="{{route('order.store')}}" method="POST">
                        @csrf --}}
                        <div class="checkbox-form">						
                            <h3>Billing Details</h3>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Full Name <span class="required">*</span></label>
                                        <input type="text" placeholder="Full Name" name="bill_fullname" value="{{old('bill_fullname')}}"/>
                                        <small style="color: red">{{$errors->first('bill_fullname')}}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="Street address" name="bill_address" value="{{old('bill_address')}}"/>
                                        <small style="color: red">{{$errors->first('bill_address')}}</small>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">									
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="bill_address2" value="{{old('bill_address2')}}"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" value="{{old('bill_city')}}" name="bill_city" placeholder="City or Town Name"/>
                                        <small style="color: red">{{$errors->first('bill_city')}}</small>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone  <span class="required">*</span></label>										
                                        <input type="text" name="bill_phone" value="{{old('bill_phone')}}" placeholder="Phone Number"/>
                                        <small style="color: red">{{$errors->first('bill_phone')}}</small>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email  <span class="required">*</span></label>										
                                        <input type="text" name="bill_email" value="{{old('bill_email')}}" placeholder="Email"/>
                                        <small style="color: red">{{$errors->first('bill_email')}}</small>

                                    </div>
                                </div>
                            </div>
                                
                            <div class="different-address">
                            {{-- 
                                <div class="ship-different-title">
                                    <h3>
                                        <label>Ship to a different address?</label>
                                        <input id="ship-box" name="ship-box" type="checkbox" value="1" {{old('ship-box') == '1' ? 'checked' : ''}}/>
                                    </h3>
                                </div>
                                <div id="ship-box-info" class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Full Name <span class="required">*</span></label>
                                            <input type="text" placeholder="Full Name" name="ship-fullname"  value="{{old('ship-fullname')}}"/>
                                            <small style="color: red">{{$errors->first('ship-fullname')}}</small>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" placeholder="Street address" name="ship-address" value="{{old('ship-address')}}"/>
                                            <small style="color: red">{{$errors->first('ship-address')}}</small>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">									
                                            <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="ship-address2" value="{{old('ship-address2')}}"/>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" value="{{old('ship-city')}}" name="ship-city"/>
                                            <small style="color: red">{{$errors->first('ship-city')}}</small>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>										
                                                <input type="email" value="{{old('ship-email')}}" name="ship-email"/>
                                                <small style="color: red">{{$errors->first('ship-email')}}</small>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="checkout-form-list">
                                                <label>Phone  <span class="required">*</span></label>										
                                                <input type="text" value="{{old('ship-phone')}}" name="ship-phone"/>
                                                <small style="color: red">{{$errors->first('ship-phone')}}</small>

                                            </div>
                                        </div>           
                                    </div>                       
                                </div>
                            --}}
                                <div class="order-notes">
                                    <div class="checkout-form-list mrg-nn">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." name="notes" >{{old('notes')}}</textarea>
                                    </div>									
                                </div>
                            </div>													 
                        </div>
                    {{-- </form> --}}
                </div>	
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>							
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $product)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$product->name}} <strong class="product-quantity"> × {{$product->qty}}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">Rs. {{$product->total(0,'.','')}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    {{-- <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">£215.00</span></td>
                                    </tr> --}}
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">Rs. {{Cart::total(0,'.','')}}</span></strong>
                                        </td>
                                    </tr>								
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="faq">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Direct Bank Transfer.</a></h5>
                                        </div>
                                        <div id="payment-1" class="panel-collapse collapse show">
                                            <div class="panel-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque Payment</a></h5>
                                        </div>
                                        <div id="payment-2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
                                        </div>
                                        <div id="payment-3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" value="Place order" />
                                </div>								
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
<!-- checkout-area end -->	
@endsection