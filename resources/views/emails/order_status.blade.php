<div>
    Invoice for Entry - {{$entry->id}}

    <h2>Order Information </h2> <hr>
    @if(count($entry->orders)  > 0)
    <table>
        <thead>
            <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Amount</th>
            <th scope="col">KG</th>
            <th scope="col">country</th>
            <th scope="col">Transport mode</th>
            <th scope="col">date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entry->orders as $order)
                {{$order->name}}
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>#{{ $order->total_cost }}</td>
                    <td>{{$order->weight}}</td>
                    <td>{{$order->country}}</td>
                    <td>{{$order->transport}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <strong>Total Cost - #{{$entry->orders->sum('total_cost')}}</strong> <hr>
    

    <p>Click the button below to view previous orders</p>
    <a href="{{$url}}"><button>Existing orders</button></a>
    @else

    @endif
</div>