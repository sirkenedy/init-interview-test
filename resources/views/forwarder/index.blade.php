@extends('components.header')
@section('content')
  <main class="container mt-4">
    <div class="bg-light p-5 rounded">
      <h1>Entry</h1>
      <div class="row">
        <div class="col-md-12 text-right">
          <form method="post" action="{{url('/entries')}}">
            @csrf
            <button class="btn btn-primary">Create new entry</button>
          </form>
        </div>
      </div>
      @if(count($user->entries) > 0)
      <div class="table-responsive-sm">

          <table class="table table-striped">
              <thead>
                  <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">Amount</th>
                  <th scope="col">KG</th>
                  <th scope="col">No of orders</th>
                  <th scope="col">date</th>
                  <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>

              @foreach($user->entries as $entry)

                  <tr>
                  <th scope="row">{{$entry->name}}</th>
                  <td>#{{$entry->orders->sum('total_cost') }}</td>
                  <td>{{$entry->orders->sum('weight') }}</td>
                  <td>{{count($entry->orders) }}</td>
                  <td>{{$entry->created_at}}</td>
                  <td>
                      <a href="{{ url('/entries', ['entry'=>$entry->id]) }}" class="btn btn-info">View</a>
                      <button class="btn btn-danger">Delete</button>
                  </td>
                  </tr>

              @endforeach

              </tbody>
          </table>
          </div>
      @else
          <h2>No orders available for this entry</h2>
      @endif
    </div>
  </main>
@endsection
        
   