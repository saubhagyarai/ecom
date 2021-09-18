@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Update Setting
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ url()->previous() }}">
                        <button class="btn btn-info pull-right" style="margin-right: 15px;">Back</button>
                    </a>

                    @foreach ($settings as $setting)
                    <form method="POST" action="{{route('setting.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">Update Setting</h4>
                        </div>
                        <div class="card-content">
                            
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Favicon</label>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($setting) ? '/storage/settings/'.$setting->favicon : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="favicon" id="featured_image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div>
                            <div class="row"> --}}
                                <label class="col-sm-2 label-on-left">Logo</label>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($setting) ? '/storage/settings/'.$setting->logo : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="logo" id="featured_image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Phone Number</label>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Name of setting" name="phone" value="{{isset($setting)? $setting->phone : old('phone')}}">
                                    </div>
                                </div>
                            {{-- </div>
                            <div class="row"> --}}
                                <label class="col-sm-2 label-on-left">Email</label>
                                <div class="col-sm-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{isset($setting)? $setting->email : old('email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Address</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{isset($setting)? $setting->address : old('address')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Map</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Google map link" name="map" value="{{isset($setting)? $setting->map : old('map')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Top Banner 1 Image</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($setting) ? '/storage/settings/'.$setting->top_ad1_img : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="top_ad1_img" id="featured_image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Top Banner 1 Text</label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="top_ad1_text" id="description" rows="90">{{isset($setting)? $setting->top_ad1_text : old('top_ad1_text')}}</textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Top Banner 2 Image</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($setting) ? '/storage/settings/'.$setting->top_ad2_img : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="top_ad2_img" id="featured_image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Top Banner 2 Text</label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="top_ad2_text" id="description2" rows="90">{{isset($setting)? $setting->top_ad2_text : old('top_ad2_text')}}</textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Top Banner 3 Image</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($setting) ? '/storage/settings/'.$setting->top_ad3_img : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="top_ad3_img" id="featured_image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Top Banner 3 Text</label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="top_ad3_text" id="description3" rows="90">{{isset($setting)? $setting->top_ad3_text : old('top_ad3_text')}}</textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">Bottom Banner Image</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ isset($setting) ? '/storage/settings/'.$setting->bottom_ad_img : asset('front/assets/img/placeholder.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="bottom_ad_img" id="featured_image" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Bottom Banner Text</label>
                                <div class="col-sm-10">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label> 
                                        <textarea class="form-control" placeholder="Create description of the album" name="bottom_ad_text" id="description4" rows="90">{{isset($setting)? $setting->bottom_ad_text : old('bottom_ad_text')}}</textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left"></label>
                                <div class="col-sm-2">
                                    <div class="form-group form-button">
                                        <button type="submit" class="btn btn-fill btn-success">{{isset($setting) ? 'Update' : 'Add'}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="referer" value="{{ request()->headers->get('referer')}}">

                        </div>
                    </form>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('description');
    CKEDITOR.replace('description2');
    CKEDITOR.replace('description3');
    CKEDITOR.replace('description4');
    CKEDITOR.config.height = 500;

    // function readURL(input, e) {
	// 		// if (input.files && input.files[0]) {
	// 		// 	var reader = new FileReader();
	// 		// 	reader.onload = function(e) {
	// 		// 		$('#ppImage').attr('src', e.target.result);
	// 		// 	}
	// 		// 	reader.readAsDataURL(input.files[0]); 
    // 		// 	// convert to base64 string
    //         // }
    //         console.log(input.files);
    //         console.log(e);
    //         console.log(input)
    // 	}
    // 	$("#featured_image").change(function(e) {
    // 		readURL(this, e);
    // 	});
    
    $(document).ready(function() {
        $('.cats').select2();
        // width: 'resolve'; // need to override the changed default

    });
</script>


@endsection

@section('css')
    {{-- select2 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection