@extends('components.header')
@section('content')
    <main class="container mt-4">
        <div class="bg-light p-5 rounded">
            <h1>Entry - {{$entry->name}}</h1>
            <div class="row">
            <div class="col-md-12 text-right">
                <form method="post" action="{{ route('entry.addorder', ['id'=>$entry->id]) }}">
                @csrf
                <fieldset>

                    <!-- Form Name -->
                    <legend>PRODUCTS</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
                    <div class="col-md-4">
                    <input id="product_name" name="name" placeholder="product_name" class="form-control input-md" required="" type="text">
                        
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product_weight">Weight(kg)</label>  
                    <div class="col-md-4">
                    <input id="product_weight" name="weight" placeholder="Product weight" class="form-control input-md" required="" type="number">
                        
                    </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="transport_mode">Mode of transport</label>
                    <div class="col-md-4">
                        <select id="transport_mode" name="transport" class="form-control" required>
                            <option value="">---</option>
                            <option value="air">Air</option>
                            <option value="sea">Sea</option>
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="country">From which country</label>
                    <div class="col-md-4">
                        <select id="country" name="country" class="form-control" required>
                            <option value="">---</option>
                            <option value="uk">UK</option>
                            <option value="us">US</option>
                        </select>
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group mt-3">
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add new Order</button>
                    </div>
                    </div>

                    </fieldset>
                </form>
            </div>
            </div>
            @if(count($entry->orders) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">KG</th>
                        <th scope="col">country</th>
                        <th scope="col">Transport mode</th>
                        <th scope="col">date</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($entry->orders as $order)

                        <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>#{{ $order->total_cost }}</td>
                        <td>{{$order->weight}}</td>
                        <td>{{$order->country}}</td>
                        <td>{{$order->transport}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a href="" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            @else
                <h2>No orders available for this entry</h2>
            @endif

            <div class="row">
                <div class="col-md-12 ">
                    <form action="{{ route('entry.checkout_order') }}" method="post">
                        @csrf
                        <input type="hidden" name="entry_id" value="{{$entry->id}}">
                        <button class="btn btn-dark btn-lg btn-block">Proceed to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
        
   