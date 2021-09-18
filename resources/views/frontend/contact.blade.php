@extends('layouts.frontend-layout')
@section('title','Contact |')

@section('content')

<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> Contact </li>
        </ul>
    </div>
</div>
        <!-- shopping-cart-area start -->
        <div class="contact-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-map-wrapper">
                            <div class="contact-map mb-40">
                                <div id="hastech2">
                                    {!!setting()->map!!}
                                </div>
                            </div>
                            <div class="contact-message">
                                <div class="contact-title">
                                    <h4>Contact Information</h4>
                                </div>
                                <form class="contact-form" action="{{route('contact.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Name*</label>
                                                <input name="name" value="{{old('name')}}"  type="text">
                                                <p class="text-danger">{{$errors->first('name')}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Email*</label>
                                                <input name="email" value="{{old('email')}}" type="email">
                                                <p class="text-danger">{{$errors->first('email')}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Phone</label>
                                                <input name="phone" value="{{old('phone')}}" type="text">
                                                <p class="text-danger">{{$errors->first('phone')}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>subject</label>
                                                <input name="subject" type="text" value="{{old('subject')}}">
                                                <p class="text-danger">{{$errors->first('subject')}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-textarea-style mb-30">
                                                <label>Message*</label>
                                                <textarea class="form-control2" name="message" >{{old('message')}}</textarea>
                                                <p class="text-danger">{{$errors->first('message')}}</p>

                                            </div>
                                            <button
                                             class="submit contact-btn btn-hover" 
                                            type="submit">
                                                Send Message 
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                {{-- <p class="form-messege"></p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-wrapper">
                            <div class="contact-title">
                                <h4>Location & Details</h4>
                            </div>
                            <div class="contact-info">
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Address:</span>  {{setting()->address}}</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="pe-7s-mail"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Email: </span> {{setting()->email}}</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="pe-7s-call"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Phone: </span>  {{setting()->phone}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shopping-cart-area end -->
@endsection