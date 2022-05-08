
@extends('layouts.signin')
@section('title')
@endsection
@section('content')
    <div class="container">
      <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-7">
          <img src="{{asset('storage/images/HealthyMed.png')}}" class="w-50">
          <h3>Before get we get started let’s create you’re account.</h3>
        </div>
        <div class="col-md-5">
          <form class="needs-validation" action="/register" method="post">
            @csrf

            <div class="mb-3">
                <input type="text" class="form-control" for="name" placeholder="Name" name="name" id="name" 
                required>
              </div>

            <div class="mb-3">
              <input type="text" class="form-control" for="username" placeholder="Email address or phone number" name="email" id="email"
                required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" for="password" placeholder="Password" name="password" id="password"
                required>
            </div>
            <button type="submit" class="btn btn-custom btn-lg btn-block mt-3">Create Account</button>
            <div class="text-center pt-3 pb-3">
              <a href="#" class="">Forgotten password?</a>
              <hr>
              <p> Already have an account ? <br> <button class="ajx" type="button">Signin here</button> </p>
            </div>
          </form>
        </div>
      </div>
    </div> 

@section('script')
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $(".container").load("/login");
        });
    });
    </script>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body>
    <form action="/register" method="post">
    @csrf

        <label for="name">Name : </label>
        <input type="text" name="name" id="name">

        <br>

        <label for="username">Email :</label>
        <input type="text" name="email" id="email">

        <br>

        <label for="password">Password :</label>
        <input type="password" name="password" id="password">

        <br>
        <br>

        <input type="submit">
    </form>
</body>
</html> --}}