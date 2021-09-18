@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Messages</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">All Messages</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            @if ($contacts->count() > 0)

                            <table class="table table-shopping">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($contacts as $contact)            
                                    <tr class="info">
                                        <td class="text-center">
                                            {{$loop->index+1}}
                                        </td>
                                        <td>                             
                                            {{$contact->name}}
                                        </td>
                                        <td>                                     
                                            {{$contact->email}}
                                        </td>
                                        <td>                                     
                                            {{$contact->phone}}
                                        </td>
                                        <td>                                     
                                            {{$contact->subject}}
                                        </td>
                                        <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-primary" onclick="handleView({{$contact->id}})">
                                                    <i class="material-icons">visibility</i>
                                                </button>

                                                <button type="button" rel="tooltip" class="btn btn-danger" onclick="handleDelete({{$contact->id}})">
                                                    <i class="material-icons">close</i>
                                                </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="col-md-6">
                                                     <!--
					color-classes: "pagination-primary", "pagination-info", "pagination-success", "pagination-warning", "pagination-danger"
	            -->
                            </div>

                            @else
                            <h3 class="text-center">No Messages To Display Yet!</h3>
                            @endif
                        </div>
                        {{$contacts->links()}}
                        <p style="margin: 10px 0 5px 10px;">
                            {{$contacts->total().' '.Str::plural('item', $contacts->total())}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal for View -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="viewForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Delete Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left pt-3">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">
                                            </label>
                                            <div id="view-name"></div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Email</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>   
                                            <div id="view-email"></div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Phone</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div id="view-phone"></div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Subject</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>   
                                            <div id="view-subject"></div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Message</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div id="view-message"></div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
    
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>

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
                    <p class="text-center text-bold">Are your sure you want to delete this content?
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
        form.action = "/admin/contact/"+id;

        // call modal
        $('#deleteModal').modal('show');
    }

    function handleView(id)
    {

        
        $.ajax({
                type: 'get',
                url: '{{url('admin/contact')}}'+'/'+id,
                success:function(response){

                    $('#view-name').text(response.name);
                    $('#view-email').text(response.email);
                    $('#view-phone').text(response.phone);
                    $('#view-subject').text(response.subject);
                    $('#view-message').text(response.message);
                }
            });

        // call modal
        $('#viewModal').modal('show');
    }

</script>
@endsection