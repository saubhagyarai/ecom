@component('mail::message')
# Your order has been placed

Here is your recipt

<table class="table">
    <thead>
        <th style="margin: 5px;">Product Name</th>
        <th style="margin: 5px;">Quantity</th>
        <th style="margin: 5px;">Price</th>
    </thead>
    <tbody>
        @foreach ($order->products as $product)
            <tr>
                <td scope="row" style="margin: 5px;">{{$product->name}}</td>
                <td style="margin: 5px;">{{$product->pivot->quantity}}</td>
                <td style="margin: 5px;">Rs. {{$product->pivot->price}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>

<strong> Total: Rs. {{$order->grand_total}}
</strong>


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
