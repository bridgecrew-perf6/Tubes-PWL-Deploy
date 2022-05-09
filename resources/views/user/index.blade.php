@extends('layouts.navbar')
@section('navbar')
<a href="/" class="nav-item nav-link"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
<a href="/liked" class="nav-item nav-link"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>	
<a href="/my_article" class="nav-item nav-link active"><i class="material-icons">&#xe80b;</i><span>My Article</span></a>
@endsection
@section('content')

<body>
<div class="container">
	@auth
<div class="sort">
	<button>
		<i  class="material-icons">&#xe80e;</i>
		 Your Article
	</button>
</div>

<div class="sidenav">
	
	<a href="#about">Healthy lifestyle</a>
	<a href="#services">Science is fum</a>
	<a href="#clients">Yoga</a>
	<a href="#contact">Run</a>
  </div>

  <div id="hasil_search">

  </div>

  <div class="beritaList">

  </div>

    {{-- @foreach ($data as $item)
    <div class="berita-box">
		<p>Creator : {{ $item->author->name }}</p> ini gabisa bang 
        <p ><b>{{ $item->topic }}</b></p>
		
        <h4>{{  $item->judul  }}</h4>
        <p id="isi">{{ Str::limit($item->isi, 450) }}</p>
		<a href="/article/id/{{ $item->id }}">Lihat Selengkapnya</a>
		<p>{{ $item->gambar }}</p>
        <div class="keterangan">
			<a href='/like/{{ $item->id }}' class="liked"><i onclick="myFunction(this)" class="fa fa-heart-o"></i> {{ $item->total_like }}</a>
			<a href='/like/{{ $item->id }}' class="liked"><i onclick="myFunction(this)" class="material-icons">&#xe87e;</i> {{ $item->total_like }}</a>
                <p>Waktu : {{ $item->created_at->format('d-m-Y H:i:s') }}</p>
        </div>
		
		<script>
			function myFunction(x) {
				x.classList.toggle("fa-heart");
			}
		</script>
        <p>{{ $item->status_like }}</p>
    </div>
	@endforeach --}}

@endauth
</div>
	
    <script>
        var dataArtikel;
        $(document).ready(function(){
            $.ajax({
			    url: 'api/get_myarticle',
			    type: 'GET',
			    dataType: 'json',
			    success: function(data){
                    var beritaList = document.getElementsByClassName('beritaList')[0]
				    beritaList.innerHTML = ''
                    console.log(data.data.data)
                    data.data.data.forEach(element => {
										
					var berita_box = document.createElement('div')
					berita_box.className = 'berita'
					
					var img = document.createElement('img')
					img.src = "{{ URL::to('/') }}/gambar/"+element.gambar
					img.width = '400'
					berita_box.appendChild(img)
					
					var judul = document.createElement('h4')
					judul.innerHTML = element.judul
					berita_box.appendChild(judul)

					var selengkapnya = document.createElement('a')
					selengkapnya.innerHTML = 'Selengkapnya'
					selengkapnya.href = '/article/id/'+element.id
					berita_box.appendChild(selengkapnya)

					var br = document.createElement('br')
					berita_box.appendChild(br)

					var like = document.createElement('a')
					like.innerHTML = '<i onclick="myFunction(this)" class="fa fa-heart-o"></i> ' + element.total_like
					like.href = '/like/'+element.id
					berita_box.appendChild(like)

					var keterangan = document.createElement('div')
					keterangan.className = 'keterangan'
					keterangan.innerHTML = 'Waktu : ' + element.created_at
					berita_box.appendChild(keterangan)

					beritaList.appendChild(berita_box)
				});
                }
		    });
        })

    </script>
</body>
</html>
@endsection
