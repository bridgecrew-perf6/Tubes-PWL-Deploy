<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- <link rel="stylesheet" href="scss/homepage.css"> --}}
<link rel="stylesheet" href={{asset('scss/homepage.css')}}>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head> 

<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<a href="/" class="navbar-brand"><i class="fa fa-med"></i>Healthy<b>Med</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">		
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			@yield('navbar')
			{{-- <a href="/" class="nav-item nav-link active"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
			<a href="/liked" class="nav-item nav-link"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>	
			<a href="/my_article" class="nav-item nav-link"><i class="material-icons">&#xe80b;</i><span>My Article</span></a> --}}
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="36px" viewBox="0 0 24 24" width="36px" fill="#ffffff"><g><rect fill="none" height="24" width="24"/><rect fill="none" height="24" width="24"/></g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M12,6c1.93,0,3.5,1.57,3.5,3.5S13.93,13,12,13 s-3.5-1.57-3.5-3.5S10.07,6,12,6z M12,20c-2.03,0-4.43-0.82-6.14-2.88C7.55,15.8,9.68,15,12,15s4.45,0.8,6.14,2.12 C16.43,19.18,14.03,20,12,20z"/></g></svg><b> {{auth()->user()->name}} <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="/profile" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
					<a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
					<div class="divider dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        {{-- <button class="logout" type="submit"><i class="material-icons">&#xE8AC;</i>logout</button> --}}
                         <button class="dropdown-item" type="submit"><i class="material-icons">&#xE8AC;</i> Logout</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</nav>
<body>
    @yield('content')
</body>