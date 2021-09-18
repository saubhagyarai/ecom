@extends('layouts.frontend-layout')
@section('title',$page->name.' |')

@section('content')

<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> {{$page->name}} </li>
        </ul>
    </div>
    <div class="about-story pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="story-img">
                        <img src="{{asset('storage/pages/'.$page->image)}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="story-details pl-50">
                        <div class="story-details-top">
                            <h2>{{$page->title}}</h2>
                            {!!$page->description!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection