@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Products</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{route('product.create')}}">
                        <button class="btn btn-success">Add New Product</button>
                    </a>
                </div>
                <form class="navbar-form navbar-left" role="search" style="margin:0px" method="GET" >
                    <div class="form-group form-search is-empty">
                        <input type="text" class="form-control" placeholder="Search" name="query" value="{{request()->query('query')}}">
                        <span class="material-input"></span>
                    </div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">{{(request()->query('query')) ? 'Search reasult for "'.request()->query('query').'"' : 'All Products'}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            @if ($products->count() > 0)

                            <table class="table table-shopping">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Cover Image</th>
                                        <th>Name</th>
                                        <th>Categories</th>
                                        <th>Price</th>
                                        <th>Sale Price</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        
                                    <tr>
                                    <td class="text-center">{{$key + $products->firstItem()}}</td>
                                    <td>
                                        <div class="img-container" style="width: 65px; max-height: 50px; overflow: hidden;
                                        display: block;">
                                        <img src="{{asset('/storage/featured_images/'.$product->featured_image)}}" alt="...">
                                        </div>
                                    </td>
                                        <td>                                                
                                            {{$product->name}}
                                        </td>
                                        <td>                        
                                            @foreach ($product->categories as $cat)
                                            <a href="{{route('category.edit', $cat->id)}}" class="btn btn-primary btn-xs">{{$cat->name}}</a>
                                            
                                            @endforeach                        
                                        </td>
                                        <td style="width: 10%">
                                            Rs. {{$product->price}}
                                        </td>
                                        <td style="width: 10%">
                                            @if (!empty($product->sale_price))
                                                Rs. {{$product->sale_price}}
                                            @else
                                                NULL
                                            @endif

                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('product.edit', $product->id)}}">
                                                <button type="button" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                            <button type="button" rel="tooltip" class="btn btn-danger" onclick="handleDelete({{$product->id}})">
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

                                {{-- {{$products->links()}} --}}
                            </div>

                            @else
                            <h3 class="text-center">No Product To Display Yet!</h3>
                            @endif
                        </div>
                        {{$products->links()}}
                        <p style="margin: -10px 0 5px 10px;">
                            {{$products->total()." ".Str::plural('item', $products->total())}}
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
                        Are your sure you want to delete this content?
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
        form.action = "/admin/product/"+id;

        // call modal
        $('#deleteModal').modal('show');
    }

</script>
@endsection