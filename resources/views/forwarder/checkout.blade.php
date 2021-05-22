@extends('components.header')
@section('content')
<div class="container">
    <h2 class="mt-4">Checkout form</h2>

  <div class="row">
    <div class="col-md-6 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      @if(count($entry->orders) > 0)
        <ul class="list-group mb-3">
          @foreach($entry->orders as $order)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$order->name}}</h6>
                <small class="text-muted"><b>Weight </b>- {{$order->weight}}, <b> Country </b> - {{$order->country}}, <b> Transport mode </b> - {{$order->transport}} </small>
              </div>
              <span class="text-muted">#{{$order->total_cost}}</span>
            </li>
          @endforeach
          <!-- <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
          </li> -->
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (NGN)</span>
            <strong>#{{$entry->orders->sum('total_cost')}}</strong>
          </li>
        </ul>
      @else
        <h3>No product added to entry</h3>
      @endif
    </div>
    <div class="col-md-6 order-md-1">
      <h4 class="mb-3">User Information</h4>
      <form method="post" action="{{ route('pay') }}" accept-charset="UTF-8">
      
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="first_name" placeholder="" value="{{$entry->user->name}}" disabled>
          </div>
          <!-- <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" placeholder="" value="" disabled>
          </div> -->
        </div>
        
        <input type="hidden" class="form-control" name="amount" value="{{$entry->orders->sum('total_cost') * 100 }}">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="orderID" value="{{$entry->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
        <input type="hidden" name="metadata" value="{{ json_encode($array = ['name' => $entry->user->name,'entry_id' => $entry->id]) }}" >

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">- {{$entry->user->email}}</span></label>
          <input type="hidden" class="form-control" name="email" value="{{$entry->user->email}}">
        </div>
        <hr class="mb-4">
        <button class="btn btn-success btn-lg btn-block" type="submit">Proceed to Payment</button>
      </form>
    </div>
  </div>
        
  @endsection