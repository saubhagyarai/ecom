@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('page.index')}}">All Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{isset($page) ? 'Edit Page' : 'Create Page'}}
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
                    </a>

                    <form method="POST" action="{{ isset($page) ? route('page.update', $page->id) : route('page.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if (isset($page))
                            @method('PUT')
                        @endif
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">{{isset($page) ? 'Edit Page' : 'Add Page'}}</h4>
                        </div>
                        <div class="card-content">

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Page Name <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of page" name="name" value="{{isset($page)? $page->name : old('name')}}">
                                    </div>
                                </div>
                            </div>

                            @isset($page)
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Page Slug <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Slug of page" name="slug" value="{{isset($page)? $page->slug : old('slug')}}">
                                    </div>
                                </div>
                            </div>
                            @endisset

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Page Title <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of page" name="title" value="{{isset($page)? $page->title : old('title')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Priority/Order</label>
                                <div class="col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="number" name="order" number="true" value="{{isset($page)? $page->order : old('order')}}"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Description<small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="description" id="description" rows="90">{{isset($page)? $page->description : old('description')}}</textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Featured Image <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($page) ? '/storage/pages/'.$page->image : asset('front/assets/img/placeholder.jpg')}}" alt="...">
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
                                        <button type="submit" class="btn btn-fill btn-success">{{isset($page) ? 'Update Page' : 'Add Page'}}</button>
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

<script type="text/javascript">
    CKEDITOR.replace( 'description' );
    CKEDITOR.config.height = 500;

    
    // $(document).ready(function() {
    //     $('.cats').select2();
    //     // width: 'resolve'; // need to override the changed default

    // });
</script>

@endsection