@extends('layouts.frontend-layout')

@section('content')
        <!-- login-area start -->
        {{-- <div class="register-area ptb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">lorem ipsum20</div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">lorem ipsum20</div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">lorem ipsum20</div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">lorem ipsum20</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- login-area end -->

        <div class="container">
            <div class="breadcrumb-content text-left">
                <ul style="margin-top: 20px">
                    <li><a href="{{route('index')}}">home</a></li>
                    <li> {{Auth::user()->name}} </li>
                </ul>
            </div>
            <div class="about-story pt-95 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">My Profile</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Change Password</a>
                            </div>
                        </div>
                        <div class="col-md-8 ml-2">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                            </div>
                                        @endif
                                        <h5>Howdy, {{$userName}} !</h5>
                                        <br>
                                        @if ($userOrders->isNotEmpty())
                                        <table class="table">
                                            <thead>
                                                <h5>All Orders:</h5>
                                              <tr>
                                                <th scope="col">Order Number</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userOrders as $order)
                                                <tr>
                                                <td>{{$order->order_number}}</td>
                                                <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                <td>                                            
                                                    <span style="color: uppercase" class="label 
                                                    @php
                                                    if ($order->status == 'pending') 
                                                    {
                                                        echo "text-info";
                                                    }   
                                                    elseif ($order->status == 'processing') {
                                                        # code...
                                                        echo "text-primary";
                                                    }
                                                    elseif ($order->status == 'completed') {
                                                        # code...
                                                        echo "text-success";
                                                    }elseif ($order->status == 'declined') {
                                                        # code...
                                                        echo "text-danger";
                                                    }
                                                    @endphp
                                                    ">{{ucfirst($order->status)}}</span></td>
                                                <td>
                                                    @if ($order->status == 'declined')
                                                        <p class="text-danger">Order Cancled</p>
                                                    @elseif($order->status == 'completed')
                                                        <p class="text-success">Order completed</p>
                                                    @else
                                                        @if ($order->order_cancle_request != NULL)                                                             
                                                            <p class="text-danger">Order Cancle Request Sent</p>
                                                        @else
                                                        <form action="{{route('order.cancle', $order->id)}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="small btn btn-outline-danger btn-sm" style="cursor: pointer">Cancle Order</button></td>
                                                        </form>
                                                        @endif
                                                    @endif
                                                </tr>
                                                @endforeach                                                                                        
                                            </tbody>
                                          </table>

                                        @else
                                        <h6>
                                            You have not ordered anything yet! <a href="{{route('index')}}" class="text-info">Shop Now</a>
                                        </h6>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">Change Your Password</div>
                                        
                                                        <div class="card-body">
                                                            <form method="POST" action="{{route('user.password.change')}}">
                                                                @csrf
                                        
                                                                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                                                                <div class="form-group row">
                                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
                                        
                                                                    <div class="col-md-8">
                                                                        <input id="old_password" class="form-control @error('password') is-invalid @enderror" name="old_password" required autocomplete="old_password">
                                        
                                                                        <div class="text-danger">{{$errors->first('old_password')}}</div>

                                                                    </div>
                                                                </div>
                                        
                                                                <div class="form-group row">
                                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                        
                                                                    <div class="col-md-8">
                                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" required autocomplete="new_password">
                                                                        <div class="text-danger">{{$errors->first('new_password')}}</div>

                                                                    </div>
                                                                </div>
                                        
                                                                <div class="form-group row">
                                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                        
                                                                    <div class="col-md-8">
                                                                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="confirm_password">
                                                                        <div class="text-danger">{{$errors->first('confirm_password')}}</div>

                                                                    </div>
                                                                </div>
                                        
                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-6 offset-md-4">
                                                                        <button type="submit" class="btn btn-info" style="cursor: pointer">
                                                                            {{ __('Change Password') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="row">
        <div class="col-md-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
        </div>
    </div>
    <div class="col-md-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">user Dashboard</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            You are logged in as user!
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">lorem ipsum20</div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">lorem ipsum20</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">lorem ipsum20</div>
        </div>
        </div>
    </div>

    </div>
</div> --}}
@endsection

@section('css')
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #fff;
            background-color: var(--primary-color);
        }
    </style>
@endsection

