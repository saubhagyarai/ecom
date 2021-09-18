@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('slider.index')}}">All Sliders</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{isset($slider) ? 'Edit slider' : 'Create slider'}}
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
                    </a>

                    <form method="POST" action="{{ isset($slider) ? route('slider.update', $slider->id) : route('slider.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if (isset($slider))
                            @method('PUT')
                        @endif
                        <div class="card-header card-header-text" data-background-color="rose">
                            <h4 class="card-title">{{isset($slider) ? 'Edit slider' : 'Add slider'}}</h4>
                        </div>
                        <div class="card-content">

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Slider Text</label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="text" id="text" rows="90">{{isset($slider)? $slider->text : old('text')}}</textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Slider Link </label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="link" class="form-control" placeholder="Slider Link" name="link" value="{{isset($slider)? $slider->link : old('link')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Priority</label>
                                <div class="col-sm-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="number" name="order" number="true" value="{{isset($slider)? $slider->order : old('order')}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Featured Image <small style="color:red;">*</small></label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($slider) ? '/storage/sliders/'.$slider->image : asset('front/assets/img/placeholder.jpg')}}" alt="...">
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
                                        <button type="submit" class="btn btn-fill btn-success">{{isset($slider) ? 'Update Slider' : 'Add Slider'}}</button>
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
    CKEDITOR.replace( 'text' );
    CKEDITOR.config.height = 500;

</script>
@endsection