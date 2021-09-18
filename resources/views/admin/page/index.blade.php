@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Pages</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{route('page.create')}}">
                        <button class="btn btn-success">Add New Page</button>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">All Pages</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            @if ($pages->count() > 0)

                            <table class="table table-shopping">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Cover Image</th>
                                        <th>Page Name</th>
                                        <th>Slug</th>
                                        <th>Title</th>
                                        <th>Priority/Order</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pages as $page)            
                                    <tr class="info">
                                        <td class="text-center">
                                            {{$loop->index+1}}
                                        </td>
                                        <td>
                                            <div class="img-container" style="height: 40px; width: 40px;">
                                            <img src="{{asset('/storage/pages/'.$page->image)}}" alt="...">
                                            </div>
                                        </td>
                                        <td>                                                
                                            {{$page->name}}
                                        </td>
                                        <td>                                                
                                            {{$page->slug}}
                                        </td>
                                        <td>                                                
                                            {{$page->title}}
                                        </td>
                                        <td>                                                
                                            {{$page->order ?? 'Null'}}
                                        </td>
                                        <td class="td-actions text-right">
                                                <a href="{{route('page.edit', $page->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-success">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <button type="button" rel="tooltip" class="btn btn-danger" onclick="handleDelete({{$page->id}})">
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
                            <h3 class="text-center">No page To Display Yet!</h3>
                            @endif
                        </div>
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
        form.action = "/admin/page/"+id;

        // call modal
        $('#deleteModal').modal('show');
    }

</script>
@endsection