@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Orders</li>
            </ol>
        </nav>
        <div class="row">
            
            <div class="col-md-12">

                <div class="pull-right">

                    <a class="btn btn-warning btn-xs" href="{{route('order.status', 'pending')}}">Pending</a> ({{$data['pendingCount']}}) |
                    <a class="btn btn-info btn-xs" href="{{route('order.status', 'processing')}}">Processing</a> ({{$data['processingCount']}}) |
                    <a class="btn btn-success btn-xs" href="{{route('order.status', 'completed')}}">Completed</a> ({{$data['completedCount']}}) |
                    <a class="btn btn-rose btn-xs" href="{{route('order.status', 'order_cancle_request')}}">Cancle Request</a> ({{$data['order_cancle_requestCount']}}) |
                    <a class="btn btn-danger btn-xs" href="{{route('order.status', 'declined')}}">Declined</a> ({{$data['declinedCount']}})
                </div>

                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">All Orders</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            
                            @if ($data['orders']->isNotEmpty())
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Order No.</th>
                                        <th>User</th>
                                        <th>Order Status</th>
                                        <th>Cancle Request</th>
                                        <th>Grand Total</th>
                                        <th>Total Items</th>
                                        <th>Is Paid?</th>
                                        <th>Billing Name</th>
                                        <th>Billing Address</th>
                                        <th>Billing City</th>
                                        <th>Billing Email</th>
                                        <th>Billing Phone</th>
                                        <th>Notes</th>
                                        <th>Ordered Date</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data['orders'] as $key => $order)
                                        
                                    <tr>
                                        <td>{{$key + $data['orders']->firstItem()}}</td>
                                        <td>{{$order->order_number ?? ''}}</td>
                                        <td>{{$order->user->name ?? ''}}</td>
                                        <td style="margin-top: 44px;"> <span class=" label
                                        <?php
                                            echo($order->status == 'pending' ? 'label-warning' :
                                            ($order->status == 'processing' ? 'label-info':
                                            ($order->status == 'completed' ? 'label-success':
                                            ($order->status == 'declined' ? 'label-danger' : ''))));
                                            ?>
                                        ">
                                        {{$order->status ?? ''}}
                                        </span>
                                        </td>
                                        
                                        <td>{!!$order->order_cancle_request ? '<span class="label label-danger">Confirm ?</span>' : '-'!!}</td>
                                        <td>Rs. {{$order->grand_total ?? ''}}</td>
                                        <td>{{$order->item_count ?? ''}}</td>
                                        <td>
                                            <form action="{{route('order.paid', $order->id)}}" method="POST">
                                                @csrf
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="hidden" value="0" name="is_paid">
                                                        <input type="checkbox" value="1" name="is_paid" 
                                                            @if($order->is_paid===1 ) 
                                                                checked 
                                                            @endif
                                                                {{old('is_paid') == '1' ? 'checked' : ''}} 
                                                            onChange="this.form.submit()"
                                                            >
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{$order->billing_fullname ?? ''}}</td>
                                        <td>{{$order->billing_address ?? ''}}</td>
                                        <td>{{$order->billing_city ?? ''}}</td>
                                        <td>{{$order->billing_email ?? ''}}</td>
                                        <td>{{$order->billing_phone ?? ''}}</td>
                                        <td>{{$order->notes ?? ''}}</td>
                                        <td>{{$order->created_at ?? ''}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('order.show', $order->id)}}">
                                                <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </a>
                                            <a href="{{route('order.edit', $order->id)}}">
                                                <button type="button" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            @else
                                <h2>No Content Yet!</h2>
                            @endif
                        </div>
                        </div>
                        {{$data['orders']->links()}}
                        <p style="margin: -10px 0 5px 10px;">
                            {{$data['orders']->total().' '.Str::plural('item', $data['orders']->total())}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script type="text/javascript">

    function handleDelete(id)
    {
        // find the form
        var form = document.getElementById('deleteForm');
        // update the action
        form.action = "/admin/order/"+id;

        // call modal
        $('#deleteModal').modal('show');
    }
</script>
@endsection
