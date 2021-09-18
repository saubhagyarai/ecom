@extends('layouts.admin-layout')

@section('title', ' | Dashboard')
    
@section('content')
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card" data-background-color="rose">
                            <div class="card-content">
                                <p class="category">Total Revenue</p>
                                <h3 class="card-title">Rs. {{$data['revenue']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6" >
                        <div class="card" style="background-color: #ff9800">
                            <div class="card-content">
                                <p class="category" style="color: #fff">Pending Orders</p>
                                <h3 class="card-title"  style="color: #fff">{{$data['pendingCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{route('order.status', 'pending')}}" style="color: #fff">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6" >
                        <div class="card" style="background-color: #00bcd4">
                            <div class="card-content">
                                <p class="category" style="color: #fff">Processing Orders</p>
                                <h3 class="card-title"  style="color: #fff">{{$data['processingCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{route('order.status', 'processing')}}" style="color: #fff">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6" >
                        <div class="card" style="background-color: #4caf50">
                            <div class="card-content">
                                <p class="category" style="color: #fff">Completed Orders</p>
                                <h3 class="card-title"  style="color: #fff">{{$data['completedCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{route('order.status', 'completed')}}" style="color: #fff">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6" >
                        <div class="card" style="background-color: #e91e63">
                            <div class="card-content">
                                <p class="category" style="color: #fff">Cancle Request Orders</p>
                                <h3 class="card-title"  style="color: #fff">{{$data['order_cancle_requestCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{route('order.status', 'order_cancle_request')}}" style="color: #fff">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6" >
                        <div class="card" style="background-color: #f44336">
                            <div class="card-content">
                                <p class="category" style="color: #fff">Declined Orders</p>
                                <h3 class="card-title"  style="color: #fff">{{$data['declinedCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="{{route('order.status', 'declined')}}" style="color: #fff">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">wallpaper</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Sliders</p>
                                <h3 class="card-title">{{$data['sliderCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">add_box</i>
                                    <a href="{{route('slider.create')}}">Add New</a>
                                </div>
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('slider.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">inventory_2</i>
                            </div>
                            <div class="card-content">
                                <p class="category">All Products</p>
                                <h3 class="card-title">{{$data['productCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">add_box</i>
                                    <a href="{{route('product.create')}}">Add New</a>
                                </div>
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('product.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">category</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Categories</p>
                                <h3 class="card-title">{{$data['productCatCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">add_box</i>
                                    <a href="{{route('category.create')}}">Add New</a>
                                </div>
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('category.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">article</i>
                            </div>
                            <div class="card-content">
                                <p class="category">All Pages</p>
                                <h3 class="card-title">{{$data['pageCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">add_box</i>
                                    <a href="{{route('page.create')}}">Add New</a>
                                </div>
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('page.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <div class="card-content">
                                <p class="category">All Orders</p>
                                <h3 class="card-title">{{$data['orderCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('order.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="card-content">
                                <p class="category">All Users</p>
                                <h3 class="card-title">{{$data['userCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('user.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">mail</i>
                            </div>
                            <div class="card-content">
                                <p class="category">All Messages</p>
                                <h3 class="card-title">{{$data['messageCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('contact.index')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">settings</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Settings</p>
                                <h3 class="card-title">{{$data['settingCount']}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="spacer"></div>
                                <div class="stats">
                                    <i class="material-icons text-danger">devices</i>
                                    <a href="{{route('setting.get')}}">Manage All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
      
@endsection