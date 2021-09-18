@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{route('category.create')}}">
                        <button class="btn btn-success">Add New Category</button>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">All Categories</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            @if ($categories->count() > 0)

                            <table class="table table-shopping">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Cover Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Priority Order</th>
                                        <th>Product Count</th>
                                        <th>Feature</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)            
                                    <tr class="info">
                                        <td class="text-center">
                                            {{$loop->index+1}}
                                        </td>
                                        <td>
                                            <div class="img-container" style="height: 40px; width: 40px;">
                                            <img src="{{asset('/storage/categories/'.$category->image)}}" alt="...">
                                            </div>
                                        </td>
                                        <td>                                                
                                            {{$category->name}}
                                        </td>
                                        <td>                                                
                                            {{$category->slug}}
                                        </td>
                                        <td style="width: 10%">
                                                @if (!empty($category->priority))
                                                    {{$category->priority}}
                                                @else
                                                    NULL
                                                @endif
                                        </td>
                                        <td>
                                            @if ($category->children->count() == 0)
                                            {{$category->products->count()}}     
                                            @endif
                                        </td>
                                        <td style="width: 10%">
                                            {{-- {{($category->feature) ===1 ? 'Yes' : 'No' }} --}}
                                            @if ($category->children->isEmpty())
                                                
                                                <form action="{{route('category.feature', $category->id)}}" method="POST">
                                                    @csrf
                                                    <div class="togglebutton">
                                                        <label>
                                                            <input type="hidden" value="0" name="feature">
                                                            <input type="checkbox" value="1" name="feature" 
                                                                @if($category->feature===1 ) 
                                                                    checked 
                                                                @endif
                                                                    {{old('feature') == '1' ? 'checked' : ''}} 
                                                                onChange="this.form.submit()"
                                                                >
                                                        </label>
                                                    </div>
                                                </form>

                                            @endif

                                        </td>
                                        <td class="td-actions text-right">
                                                <a href="{{route('category.edit', $category->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-success">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <button type="button" rel="tooltip" class="btn btn-danger" onclick="handleDelete({{$category->id}})">
                                                    <i class="material-icons">close</i>
                                                </button>
                                        </td>
                                    </tr>
                                    @foreach ($category->children as $child)
                                    <tr class="ml-5">
                                        <td class="text-center">
                                            <span class="material-icons">
                                                subdirectory_arrow_right
                                            </span>
                                            {{$loop->index+1}}
                                        </td>
                                        <td>
                                            <div class="img-container" style="height: 40px; width: 40px;">
                                            <img src="{{asset('/storage/categories/'.$child->image)}}" alt="...">
                                            </div>
                                        </td>
                                        <td>                                                
                                            {{$child->name}}
                                        </td>
                                        <td>                                                
                                            {{$child->slug}}
                                        </td>
                                        <td style="width: 10%">
                                                @if (!empty($child->priority))
                                                    {{$child->priority}}
                                                @else
                                                    NULL
                                                @endif
                                        </td>
                                        <td>
                                            {{$child->products->count()}}
                                        </td>
                                        <td style="width: 10%">
                                            {{-- {{($child->feature) ===1 ? 'Yes' : 'No' }} --}}
                                            <form action="{{route('category.feature', $child->id)}}" method="POST">
                                                @csrf
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="hidden" value="0" name="feature">
                                                        <input type="checkbox" value="1" name="feature" 
                                                            @if($child->feature===1 ) 
                                                                checked 
                                                            @endif
                                                                {{old('feature') == '1' ? 'checked' : ''}} 
                                                            onChange="this.form.submit()"
                                                            >
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="td-actions text-right">
                                                <a href="{{route('category.edit', $child->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-success">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <button type="button" rel="tooltip" class="btn btn-danger" onclick="handleDelete({{$child->id}})">
                                                    <i class="material-icons">close</i>
                                                </button>
                                        </td>
                                    </tr>
                                    @endforeach

                                @endforeach

                                </tbody>
                            </table>

                            <div class="col-md-6">
                                                     <!--
					color-classes: "pagination-primary", "pagination-info", "pagination-success", "pagination-warning", "pagination-danger"
	            -->
                            </div>

                            @else
                            <h3 class="text-center">No Category To Display Yet!</h3>
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
                    <p class="text-center text-bold">
                        All the content related with this category will be deleted. Are your sure you want to delete this content?
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
        form.action = "/admin/category/"+id;

        // call modal
        $('#deleteModal').modal('show');
    }

</script>
@endsection