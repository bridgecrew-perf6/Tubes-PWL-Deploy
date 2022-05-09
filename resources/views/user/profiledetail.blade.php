
@extends('layouts.navbar')
@extends('layouts.signin')
@section('navbar')
<a href="/" class="nav-item nav-link"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
<a href="/liked" class="nav-item nav-link"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>	
<a href="/my_article" class="nav-item nav-link active"><i class="material-icons">&#xe80b;</i><span>My Article</span></a>
@endsection

@section('content')
    <div class="container">
      <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-7">
          <img src="{{asset('storage/images/HealthyMed.png')}}" class="w-50">
          <h3> Edit Profile </h3>
        </div>
        <div class="col-md-5">
          {{-- <form class="login-form" action="/profile" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" for="name" placeholder="Name" name="name" required>
                required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" for="username" placeholder="Email address or phone number" name="email"
                required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" for="password" placeholder="Password" name="password"
                required>
            </div>
            <button class="btn btn-outline-danger" type="submit" class="tombol">Login</button>
          </form> --}}
          <form class="needs-validation" novalidate action="/profile" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="username">Name</label>
                <input type="text" class="form-control" for="name" placeholder="Name" name="name" id="name" value='{{ $profile->name }}' required>
                <div class="invalid-feedback">Please enter your name</div>
              </div>
            <div class="mb-3">
                <label class="form-label" for="username">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" for="username" name="email" value='{{ $profile->email }}'required>
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
            <button class="btn btn-outline-danger" type="submit" class="tombol">Change</button>
            <div class="text-center pt-3 pb-3">
             
            </div>
        </form>
        </div>
      </div>
    </div>


@section('script')
@endsection