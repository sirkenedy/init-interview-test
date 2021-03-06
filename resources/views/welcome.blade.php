<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Freight - Inits </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SuperFreighters</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Thought Process</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Goods
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Cleared</a></li>
            <li><a class="dropdown-item" href="#">Pending</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Forward new goods</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto mr-4 mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="">
            Ayomide
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><small>Owoputikehinde@gmail.com</small></a></li>
            <li><hr class="dropdown-divider"></li>
            <li> <button class="btn btn-default">Logout</button> <li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container mt-4">
  <div class="bg-light p-5 rounded">
    <h1>Successful Transactions</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Forwarded ID</th>
                <th scope="col">Amount</th>
                <th scope="col">KG</th>
                <th scope="col">country</th>
                <th scope="col">Transport mode</th>
                <th scope="col">date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                <th scope="row">QXDHUFTY</th>
                <td>#80,000</td>
                <td>20.3</td>
                <td>UK, US</td>
                <td>Air, Sea</td>
                <td>14th May, 2021</td>
                <td>
                    <a href="" class="btn btn-success">view</a>
                </td>
                </tr>

            </tbody>
        </table>
  </div>
</main>
        
    <script src=//code.jquery.com/jquery-3.2.1.slim.min.js integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin=anonymous></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function(){
            console.log("yes")
            alert("I am an alert box!");
            //Perform Ajax request.
            $.ajax({
                url: 'test.html',
                type: 'get',
                success: function(data){
                    //If the success function is executed,
                    //then the Ajax request was successful.
                    //Add the data we received in our Ajax
                    //request to the "content" div.
                    $('#content').html(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Ajax request failed: ' + xhr.responseText;
                    $('#content').html(errorMsg);
                  }
            });
        });
    </script>
    </body>
</html>