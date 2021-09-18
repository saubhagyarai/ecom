@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.index')}}">All Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{$order->order_number}}
            </li>
            </ol>
        </nav>

        <div class="row">
            <a href="{{ url()->previous() }}">
                <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
            </a>
            <div class="col-md-6">
                <div class="card">
                        <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">Order Details</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Order Number <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                    <p>{{$order->order_number}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Order Status <small style="color:red;">*</small></label>

                                <div class="col-lg-3 col-md-4 col-sm-3">
                                    <p style="text-transform: uppercase">
                                        <span style="text-transform: uppercase" class="label 
                                        @php
                                        if ($order->status == 'pending') 
                                        {
                                            echo "label-warning";
                                        }   
                                        elseif ($order->status == 'processing') {
                                            # code...
                                            echo "label-info";
                                        }
                                        elseif ($order->status == 'completed') {
                                            # code...
                                            echo "label-success";
                                        }elseif ($order->status == 'declined') {
                                            # code...
                                            echo "label-danger";
                                        }
                                        @endphp
                                        ">{{$order->status}}</span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Grand Total <small style="color:red;">*</small></label>
                                <div class="col-lg-4 col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        Rs.{{$order->grand_total}}
                                    </div>
                                </div>

                                <label class="col-sm-2 label-on-left">Total Items <small style="color:red;">*</small></label>
                                <div class="col-lg-4 col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <p>{{$order->item_count}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Is Paid? </label>
                                <div class="col-sm-10">
                                    <span style="text-transform: uppercase" class="label {{($order->is_paid === 1) ? 'label-success' : 'label-danger'}}" >                                       
                                        {{($order->is_paid === 1) ? 'paid' : 'not paid'}}
                                        </span>                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Fullname <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        {{$order->billing_fullname}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Address <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        {{$order->billing_address}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Address2 <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <p>{{$order->billing_address2}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing City <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        {{$order->billing_city}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Billing Phone <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        {{$order->billing_phone}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Notes </label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        {{$order->notes}}
                                </div>
                            </div>
                            <hr>
                        </div>
                        <input type="hidden" name="referer" value="{{ request()->headers->get('referer')}}">

                        </div>

                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-text" data-background-color="rose">
                    <h4 class="card-title">Order Items</h4>
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