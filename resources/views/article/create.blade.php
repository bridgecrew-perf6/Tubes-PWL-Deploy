@auth
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href={{asset('scss/create.css')}}>

<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
    <a href="#" class="navbar-brand"><i class="fa fa-med"></i>Healthy<b>Med</b></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <form class="navbar-form form-inline">
            <div class="input-group search-box">
                <input type="text" id="search" class="form-control" placeholder="Search here...">
                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
            </div>
        </form>
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link active"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
            <a href="#" class="nav-item nav-link"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>
            <a href="#" class="nav-item nav-link"><i class="material-icons">&#xe7f4;</i><span>Notifications</span></a>
            <div class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><img src="{{asset('storage/images/img.jpg')}}" class="avatar" alt="Avatar"><b> {{auth()->user()->name}} <b class="caret"></b></a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
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
    <form id="form" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-topic">
            <input class="form-check-input" type="checkbox" name="healthy" value="1"><label class="form-check-label" for="healthy">Healthy</label>
            <input class="form-check-input" type="checkbox" name="sports" value="1"><label class="form-check-label" for="sports">Sports</label>
            <input class="form-check-input" type="checkbox" name="politics" value="1"><label class="form-check-label" for="politics">Politics</label>
            <input class="form-check-input" type="checkbox" name="entertainment" value="1"><label class="form-check-label" for="entertainment">Entertainment</label>
            <input class="form-check-input" type="checkbox" name="technology" value="1"><label class="form-check-label" for="technology">Technology</label>
            <input class="form-check-input" type="checkbox" name="science" value="1"><label class="form-check-label" for="science">Science</label>
        </div>

        <div class="judul">
            <input id="judul" class="judul" type="text" placeholder="Judul" name="judul">
            <div class="pesan"></div>
        </div>

        <div class="kalimat">
            <textarea id="isi" rows="25" cols="100" placeholder="isi" name="isi"></textarea>
            <div class="pesan"></div>
        </div>


        <div class="gambar">
            <input type="file" id="gambar" name="gambar">
            <div class="pesan"></div>
        </div>


        <button class="btn btn-outline-danger" type="submit" class="tombol">Buat Laporan</button>
    </form>
</body>

@else

@endauth