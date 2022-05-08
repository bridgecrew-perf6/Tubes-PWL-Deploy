
@extends('layouts.signin')
@section('title')
@endsection
@section('content')
    <div class="container">
      <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-7">
          <img src="{{asset('storage/images/HealthyMed.png')}}" class="w-50">
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sem a laoreet platea mollis lacus. Eu sed amet vivamus commodo, amet, orci diam mauris.</h3>
        </div>
        <div class="col-md-5">
          {{-- <form class="login-form" action="/login" method="post">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" for="username" placeholder="Email address or phone number" name="email"
                required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" for="password" placeholder="Password" name="password"
                required>
            </div>
            <button type="submit" class="btn btn-custom btn-lg btn-block mt-3">Login</button>
            <div class="text-center pt-3 pb-3">
              <a href="#" class="">Forgotten password?</a>
              <hr>
              <p> Don't have an account ? <br> <button class="ajx" type="button">Create Account</button> </p>
             
            </div>
          </form> --}}
          <form class="needs-validation" novalidate action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="username">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" for="username" name="email" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" for="password" name="password" required>
                <div class="invalid-feedback">Please enter your password to continue.</div>
            </div>
            {{-- <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkRemember">
                    <label class="form-check-label" for="checkRemember">Remember me</label>
                </div>
            </div> --}}
            <button type="submit" class="btn btn-custom btn-lg btn-block mt-3">Login</button>
            <div class="text-center pt-3 pb-3">
              <a href="#" class="">Forgotten password?</a>
              <hr>
              <p> Don't have an account ? <br> <button class="ajx" type="button">Create Account</button> </p>
             
            </div>
        </form>
        </div>
      </div>
    </div>


@section('script')
<script>
   (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $(document).ready(function(){
        $(".container .text-center .ajx").click(function(){
            $(".container").load("/register");
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
    <title>Login Page</title>
</head>
<body>
    <form action="/login" method="post">
        @csrf
        <label for="username">Email :</label>
        <input type="text" name="email">
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password">
        <br>
        <input type="submit">

        <br>
        <br>
        <a href="/register">Register</a>
    </form>
</body>
</html> --}}