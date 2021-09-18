@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.index')}}">All Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{isset($order) ? 'Edit order' : 'Create order'}}
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
                    </a>

                    <form method="POST" action="{{ isset($order) ? route('order.update', $order->id) : ''}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if (isset($order))
                            @method('PUT')
                        @endif
                        <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">{{isset($order) ? 'Edit Order' : ''}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Order Number <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of order" name="order_number" value="{{isset($order)? $order->order_number : old('order_number')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Select Order Status <small style="color:red;">*</small></label>

                                <div class="col-lg-3 col-md-4 col-sm-3">
                                    <select class="selectpicker" data-style="btn btn-primary btn-round"  data-size="7" name="status" id="status">
                                        <option disabled>Select Status</option>
                                            <option value="pending" @if ($order->status === "pending")
                                                selected                                                    
                                            @endif>
                                            Pending
                                            </option>
                                            <option value="processing" @if ($order->status === "processing")
                                                selected                                                    
                                            @endif>Processing</option>
                                            <option value="completed" @if ($order->status === "completed")
                                                selected                                                    
                                            @endif>Completed</option>
                                            <option value="declined" @if ($order->status === "declined")
                                                selected                                                    
                                            @endif>Declined</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Grand Total <small style="color:red;">*</small></label>
                                <div class="col-lg-4 col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        Rs.<input class="form-control" type="number" name="grand_total" number="true" value="{{isset($order)? $order->grand_total : old('grand_total')}}"/>
                                    </div>
                                </div>

                                <label class="col-sm-2 label-on-left">Total Items <small style="color:red;">*</small></label>
                                <div class="col-lg-4 col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="number" name="item_count" number="true" value="{{isset($order)? $order->item_count : old('item_count')}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Is Paid? </label>
                                <div class="col-sm-10">
                                        
                                        <div class="togglebutton" style="margin-top: 25px;">
                                            <label>
                                            <input type="hidden" value="0" name="is_paid">
                                            <input type="checkbox" value="1" name="is_paid" 
                                
                                            @if(isset($order)) 
                                                @if($order['is_paid']===1 ) 
                                                    checked 
                                                @endif
                                            @else
                                                {{old('is_paid') === '1' ? 'checked' : ''}} 
                                            @endif
                                            >
                                                Turn On if payment is done.
                                            </label>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Fullname <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Billing Fullname" name="bill_fullname" value="{{isset($order)? $order->billing_fullname : old('bill_fullname')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Address <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Billing Address" name="bill_address" value="{{isset($order)? $order->billing_address : old('bill_address')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Address2 <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Billing Address 2" name="bill_address2" value="{{isset($order)? $order->billing_address2 : old('billing_address2')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing City <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of billing city" name="bill_city" value="{{isset($order)? $order->billing_city : old('billing_city')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Phone <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Billing Phone Number" name="bill_phone" value="{{isset($order)? $order->billing_phone : old('billing_phone')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Notes </label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <textarea type="text" class="form-control" placeholder="Write your notes" name="notes">
                                        {{isset($order)? $order->notes : old('notes')}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-2 label-on-left"></label>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">Ordered Items</h4>
                                    </div>
                                    <div class="card-content">
                                    <table class="table">
                                        <thead>
                                            <th style="margin: 5px;">Product Name</th>
                                            <th style="margin: 5px;">Quantity</th>
                                            <th style="margin: 5px;">Price</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->products as $product)
                                                <tr>
                                                    <td scope="row" style="margin: 5px;">{{$product->name}}</td>
                                                    <td style="margin: 5px;">{{$product->pivot->quantity}}</td>
                                                    <td style="margin: 5px;">Rs. {{$product->pivot->price}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    
                                    <strong> Total: Rs. {{$order->grand_total}}
                                    </strong>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left"></label>
                                <div class="col-sm-2">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-success">{{isset($order) ? 'Update Order' : 'Update Add'}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="referer" value="{{ request()->headers->get('referer')}}">

                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script>
$('form').on('focus', 'input[type=number]', function (e) {
    $(this).on('wheel.disableScroll', function (e) {
      e.preventDefault()
    })
  })
  $('form').on('blur', 'input[type=number]', function (e) {
    $(this).off('wheel.disableScroll')
  })

</script>
    
@endsection