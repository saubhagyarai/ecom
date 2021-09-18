@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">All Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{isset($product) ? 'Edit Product' : 'Create Product'}}
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
                    </a>

                    <form method="POST" action="{{ isset($product) ? route('product.update', $product->id) : route('product.store')}}" class="dropzone form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if (isset($product))
                            @method('PUT')
                        @endif
                        <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">{{isset($product) ? 'Edit Product' : 'Add Product'}}</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Product Name <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of product" name="name" value="{{isset($product)? $product->name : old('name')}}">
                                    </div>
                                </div>
                            </div>
                            @isset($product)
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Product Slug <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Slug of product" name="slug" value="{{isset($product)? $product->slug : old('slug')}}">
                                    </div>
                                </div>
                            </div>
                            @endisset

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Select Product Category </label>

                                <div class="col-sm-10">
                                    <select name="cats[]" id="cats" class="cats" multiple="multiple" style="width: 100%; padding-top: 25px;">
                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}" 
                                                @if ($cat->children->count() != 0)
                                                    disabled
                                                @elseif(isset($product) && $cat->children->count() == 0)
                                                    @if ($product->hasCat($cat->id))
                                                        selected
                                                    @endif

                                                @endif
                                                >
                                                {{$cat->name}}
                                            </option>
                                            @if (!empty($cat->children))
                                                @foreach ($cat->children as $child)
                                                    <option value="{{$child->id}}"
                                                    @if(isset($product))
                                                        @if ($product->hasCat($child->id))
                                                            selected
                                                        @endif
                                                    @endif
                                                    >
                                                    &nbsp;&nbsp;&nbsp;{{ $child->name}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Price <small style="color:red;">*</small></label>
                                <div class="col-lg-4 col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="number" name="price" number="true" value="{{isset($product)? $product->price : old('price')}}"/>
                                    </div>
                                </div>

                                <label class="col-sm-2 label-on-left">Sale Price</label>
                                <div class="col-lg-4 col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="number" name="sale_price" number="true" value="{{isset($product)? $product->sale_price : old('sale_price')}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Description</label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="description" id="description" rows="90">{{isset($product)? $product->description : old('description')}}</textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Featured Image <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($product) ? '/storage/featured_images/'.$product->featured_image : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="featured_image" id="featured_image" multiple/>
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <label class="col-sm-2 label-on-left">Product Images</label>
                                <div class="col-sm-10">
                                
                                {{-- Display if it have images --}}
                                @if (json_decode($product->images) != NULL )
                                @foreach (json_decode($product->images) as $image)                                   
                                <div class="input-group control-group" >
                                    <img src="{{ isset($product) ? asset('storage/product_images/'.$image) : asset('front/assets/img/placeholder.jpg')}}" alt="" height="50" width="50" style="height: 70px; width: 70px; margin-bottom: 5px;">
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button" onclick="handleImage('{{$image}}')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg> Remove</button>
                                    </div>
                                </div>                                        
                                @endforeach
                                @endif

                                @if (json_decode($product->images) == NULL)
                                    
                                <div class="input-group control-group increment" >
                                    <input type="file" name="product_images[]" class="">
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-success btn-add" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>Add</button>
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="product_images[]" class="">
                                        <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg> Remove</button>
                                        </div>
                                    </div>
                                </div>

                                @elseif(count(json_decode($product->images)) < 3)

                                <div class="input-group control-group increment" >
                                    <input type="file" name="product_images[]" class="">
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-success btn-add" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>Add</button>
                                    </div>
                                </div>
                                <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="product_images[]" class="">
                                        <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg> Remove</button>
                                        </div>
                                    </div>
                                </div>

                                @endif


                                </div>

                            </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left"></label>
                                <div class="col-sm-2">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-success">{{isset($product) ? 'Update Product' : 'Add Product'}}</button>
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
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script type="text/javascript">
    CKEDITOR.replace( 'description' );
    CKEDITOR.config.height = 500;

    
    $(document).ready(function() {
        $('.cats').select2();
        // width: 'resolve'; // need to override the changed default

    });


    // Delete image with ajax and reload page
    function handleImage(image)
    {
        var product_id = {{$product->id}};
        var image = image;   

            $.ajax({
                type: 'get',
                url: '{{url('/admin/product/')}}'+'/'+product_id+'/'+'image/delete',
                data: {'image':image, 'demo': 12},
                success:function(response){
                    // console.log(response);
                    
                    location.reload();

                },                
                // error: function(response){
                //     alert('Error'+response);
                //     }            
            });
    }

    // Add and remove image tab
    $(document).ready(function() {
    
    var clicks = {{(json_decode($product->images) == null) ? 0 : count(json_decode($product->images)) }}

    $(".btn-success.btn-add").click(function(){ 
        if(clicks < 2)
        {
        clicks += 1;
        var html = $(".clone").html();
        $(".increment").after(html);
        }
        else 
        {
            $(this).addClass("disabled");
        }
    });
    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".control-group").remove();
        $(".increment .btn-success").removeClass("disabled");
        clicks -= 1;
    });
    });
</script>


@endsection

@section('css')
    {{-- select2 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection