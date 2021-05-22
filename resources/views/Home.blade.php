@extends('components.header')
@section('content')
<main class="container mt-4">
  <div class="bg-light p-5 rounded">
  <form class="form-horizontal" method="Post" action="{{url('guest-info')}}">
  <!-- {{csrf_field()}} -->
  @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Hello Guest, Enter your info</legend>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="name">NAME</label>  
    <div class="col-md-4">
    <input id="name" name="name" placeholder="name" class="form-control input-md" required="" type="text">
        
    </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="email">Email</label>  
    <div class="col-md-4">
    <input id="email" name="email" placeholder="email" class="form-control input-md" required="" type="email">
        
    </div>
    </div>

    <!-- Button -->
    <div class="form-group mt-3">
    <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Make Orders</button>
    </div>
    </div>

    </fieldset>
</form>
  </div>
</main>
 @endsection