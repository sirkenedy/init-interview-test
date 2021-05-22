@extends('components.header')
@section('content')
  <main class="container mt-4">
    <div class="bg-light p-5 rounded">
      <h1>Succesful Entry - Orders</h1>
      </div>
      @if(count($user->entries) > 0)
          <table class="table table-striped">
              <thead>
                  <tr>
                  <th scope="col">Entry ID</th>
                  <th scope="col">Amount</th>
                  <th scope="col">KG</th>
                  <th scope="col">No of orders</th>
                  <th scope="col">date</th>
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
                  </tr>

              @endforeach

              </tbody>
          </table>
      @else
          <h2>No orders available for this entry</h2>
      @endif
    </div>
  </main>
@endsection
        
   