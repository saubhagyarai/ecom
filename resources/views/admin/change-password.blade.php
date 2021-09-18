@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Change Admin Password
            </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">lock</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Change Admin Password</h4>
                        <form method="POST" 
                        action="{{route('password.post')}}"
                        >
                            @csrf
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Old Password</label>
                                <input type="text" class="form-control" name="old-password">
                            <span class="material-input"></span></div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">New Password</label>
                                <input type="text" class="form-control" name="new-password">
                            <span class="material-input"></span></div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Confirm New Password</label>
                                <input type="text" class="form-control" name="confirm-new-password">
                            <span class="material-input"></span></div>
                            <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

