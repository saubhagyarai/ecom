@extends('layouts.frontend-layout')
@section('title', 'Wishlist |')
@section('content')

<div class="container">
    <div class="breadcrumb-content text-left">
        <ul style="margin-top: 20px">
            <li><a href="{{route('index')}}">home</a></li>
            <li> Wishlist </li>
        </ul>
    </div>
</div>

<!-- shopping-cart-area start -->
<div class="cart-main-area pt-95 pb-100" id="updateDiv">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if ($wishlistProducts->isNotEmpty())
                <h1 class="cart-heading">My Wishlist</h1>                    
                @endif
                    <div class="table-content table-responsive">
                        @if ($wishlistProducts->isNotEmpty())
                        <table>
                            <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($wishlistProducts as $wishlist)
                                
                                <tr>
                                    <td class="product-remove"><a href="{{route('wishlist.remove', $wishlist->id)}}"><i class="pe-7s-close"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="{{route('product.single', $wishlist->product->slug)}}"><img src="{{asset('storage/featured_images/'.$wishlist->product->featured_image)}}" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="{{route('product.single', $wishlist->product->slug)}}">{{$wishlist->product->name}}</a></td>
                                    <td class="product-price-cart"><span class="amount">Rs. {{($wishlist->product->sale_price) ? $wishlist->product->sale_price : $wishlist->product->price}}</span></td>   
                                </tr>                                            
                                @endforeach

                            </tbody>
                        </table>                        
                        @else
                        <h3>
                        Wishlist is Empty! <a href="{{route('index')}}" style="color: #1786ac;">Shop Now</a>
                        </h3>
                        @endif

                    </div>
            </div>
        </div>
    </div>            
</div>
@endsection
