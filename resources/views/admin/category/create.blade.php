@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">All Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{isset($category) ? 'Edit Category' : 'Create Category'}}
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
                    </a>

                    <form method="POST" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">{{isset($category) ? 'Edit Category' : 'Add Category'}}</h4>
                        </div>
                        <div class="card-content">

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Category Name <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of Category" name="name" value="{{isset($category)? $category->name : old('name')}}">
                                    </div>
                                </div>
                            </div>

                            @isset($category)
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Category Slug <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Slug of Category" name="slug" value="{{isset($category)? $category->slug : old('slug')}}">
                                    </div>
                                </div>
                            </div>
                            @endisset

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Priority</label>
                                <div class="col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="number" name="priority" number="true" value="{{isset($category)? $category->priority : old('priority')}}"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Select Parent Category </label>

                                <div class="col-lg-5 col-md-6 col-sm-3">
                                    <select class="selectpicker" data-style="btn btn-primary btn-round"  data-size="7" name="parent_id" id="parent_id">
                                        <option disabled {{isset($category->parent)? '' : 'selected'}}>Select Category</option>
                                        <option value="">Make Parent Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" 
                                                @if (isset($category))
                                                    @if (!empty($category->parent))
                                                        @if ($cat->id == $category->parent->id)
                                                        selected
                                                        @endif
                                                    @endif
                                                @endif
                                            >
                                            {{$cat->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Feature </label>
                                <div class="col-sm-10">
                                    <div class="togglebutton" style="margin-top: 25px;">
                                        <label>
                                        <input type="hidden" value="0" name="feature">
                                        <input type="checkbox" value="1" name="feature" 
                            
                                        @if(isset($category)) 
                                            @if($category['feature']===1 ) 
                                                checked 
                                            @endif
                                        @else
                                            {{old('feature') == '1' ? 'checked' : ''}} 
                                        @endif
                                        >
                                            Turn On to feature category in front page.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Featured Image <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($category) ? '/storage/categories/'.$category->image : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image" id="image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left"></label>
                                <div class="col-sm-2">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-success">{{isset($category) ? 'Update' : 'Add'}}</button>
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
