@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.index')}}">All Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">All {{($order == 'order_cancle_request') ? 'Order Cancle Request' : ucfirst($order).' '.'Orders'}}</li>
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
                        <h4 class="card-title">{{($order == 'order_cancle_request') ? 'Order Cancle Request' : ucfirst($order).' '.'Orders'}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            
                            @if ($data['allOrders']->isNotEmpty())
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
                                    @foreach ($data['allOrders'] as $key => $order)
                                        
                                    <tr>
                                        <td>{{$key + $data['allOrders']->firstItem()}}</td>
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
                                                            @if($order->is_paid ===1 ) 
                                                                checked 
                                                            @endif
                                                                {{old('is_paid') == '1' ? 'checked' : ''}} 
                                                            onChange="this.form.submit()"
                                                            >
                                                    </label>
                                                </div>
                                            </form>
                                            <td>{{$order->billing_address ?? ''}}</td>
                                        </td>
                                        <td>{{$order->billing_fullname ?? ''}}</td>
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
                        {{$data['allOrders']->links()}}
                        <p style="margin: -10px 0 5px 10px;">
                            {{$data['allOrders']->total().' '.Str::plural('item', $data['allOrders']->total())}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal for Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold">
                        All the content related with this order will be deleted. Are your sure you want to delete this content?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </form>

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