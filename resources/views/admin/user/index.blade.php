@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Registered Users</li>
            </ol>
        </nav>
        <div class="row">
            
            <div class="col-md-12">


                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <h4 class="card-title">All Users</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive" style="width: 100%">
                            
                            @if ($users->isNotEmpty())
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registered At</th>
                                        <th>Total Orders</th>
                                        <th>Total Expenses</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key => $user)
                                        
                                    <tr>
                                        <td>{{$key + $users->firstItem()}}</td>
                                        <td>{{$user->id ?? ''}}</td>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$user->email ?? ''}}</td>
                                        <td>{{$user->created_at ?? ''}}</td>
                                        <td>{{$user->orders->count() ?? ''}}</td>
                                        <td>Rs. {{$user->totalExpenses()}}</td>
                                                
        
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            @else
                                <h2>No Content Yet!</h2>
                            @endif
                        </div>
                        </div>
                        {{$users->links()}}
                        <p style="margin: -10px 0 5px 10px;">
                            {{$users->total().' '.Str::plural('item', $users->total())}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

