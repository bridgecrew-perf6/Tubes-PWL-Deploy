@extends('layouts.navbar')

@section('navbar')
<a href="/" class="nav-item nav-link active"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
<a href="/liked" class="nav-item nav-link"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>	
<a href="/my_article" class="nav-item nav-link"><i class="material-icons">&#xe80b;</i><span>My Article</span></a>

@endsection
@section('content')
<body>
<div class="container">
	@auth
<div class="card">
{{-- <p>{{ auth()->user()->id }}</p>
<p>{{ auth()->user()->email }}</p> --}}
<div class="text">
	<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="36px" viewBox="0 0 24 24" width="36px" fill="#FF6363"><g><rect fill="none" height="24" width="24"/><rect fill="none" height="24" width="24"/></g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M12,6c1.93,0,3.5,1.57,3.5,3.5S13.93,13,12,13 s-3.5-1.57-3.5-3.5S10.07,6,12,6z M12,20c-2.03,0-4.43-0.82-6.14-2.88C7.55,15.8,9.68,15,12,15s4.45,0.8,6.14,2.12 C16.43,19.18,14.03,20,12,20z"/></g></svg>
	{{-- <img src="{{asset('storage/images/img.jpg')}}" class="avatar" alt="Avatar"> --}}
	<a href="/article/create">
	{{-- <a class="openBtn" href="javascript:void(0)"> --}}
	<button>
		What do you think right now?
	</button>
	</a>
	{{-- <a href="/article/create">buat artikel</a> --}}
</div>
</div>
<div class="sort">
	<button>
		<i  class="material-icons">&#xe80e;</i>
		 Newest
	</button>
	{{-- <button> Gatau</button> --}}
</div>

<div class="sidenav">
	
	<a href="/topic/food">Food</a>
	<a href="/topic/sports">Sports</a>
	<a href="/topic/yoga">Yoga</a>
	<a href="/topic/therapy">Therapy</a>
	<a href="/topic/workout">Workout</a>
	<a href="/topic/nature">Nature</a>
	<a href="/topic/diet">Diet</a>
	<a href="/topic/lifestyle">Lifestyle</a>
	<a href="/topic/psychology">Psychology</a>
  </div>

  <div id="hasil_search">

  </div>

  <div class="beritaList">

  </div>

    <!-- {{-- @foreach ($data as $item)
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
	@endforeach --}} -->
	
@endauth
</div>
	
<script>

$(document).ready(function(){
		$.ajax({
			url: 'api/articles',
			type: 'GET',
			dataType: 'json',
			success: function(data){

				// console.log(data.data)
				var beritaList = document.getElementsByClassName('beritaList')[0]
				data.data.forEach(element => {
					// console.log(element)
					
					
					var berita_box = document.createElement('div')
					berita_box.className = 'berita'
					
					var img = document.createElement('img')
					img.src = "{{ URL::to('/') }}/gambar/"+element.gambar
					img.width = '400'
					berita_box.appendChild(img)
					
					var creator = document.createElement('p')
					creator.innerHTML = 'Creator : ' + element.author.name
					berita_box.appendChild(creator)

					var judul = document.createElement('h4')
					judul.innerHTML = element.judul
					berita_box.appendChild(judul)
					
					var isi = document.createElement('p')
					isi.innerHTML = element.isi
					berita_box.appendChild(isi)

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

		$('#search').keyup(function(){
			var search = $(this).val()
			var url = 'api/articles/search/'+search
			var cekSearch = document.getElementById('hasil_search')
			if(search == ''){
			 	url = 'api/articles'
				cekSearch.innerHTML = ""
			}else{
				url = 'api/articles/search/'+search
				cekSearch.innerHTML = "Hasil Search"
				console.log(url)
			}
			$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function(data){

				// console.log(data.data)
				var beritaList = document.getElementsByClassName('beritaList')[0]
				beritaList.innerHTML = ''
				data.data.forEach(element => {
					console.log(element)
					
					
					var berita_box = document.createElement('div')
					berita_box.className = 'berita'
					
					var img = document.createElement('img')
					img.src = "{{ URL::to('/') }}/gambar/"+element.gambar
					img.width = '400'
					berita_box.appendChild(img)
					
					var creator = document.createElement('p')
					creator.innerHTML = 'Creator : ' + element.author.name
					berita_box.appendChild(creator)

					var judul = document.createElement('h4')
					judul.innerHTML = element.judul
					berita_box.appendChild(judul)

					var isi = document.createElement('p')
					isi.innerHTML = element.isi
					berita_box.appendChild(isi)

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
	})


</script>


{{-- <div class="popup">
    <div class="popup-content">
      <h2>Popup Title</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum.</p>
      <a class="closeBtn" href="javascript:void(0)">x</a>
    </div>
  </div>
  <script type="text/javascript">
	$(document).ready(function () {
   
	  // Open Popup
	  $('.openBtn').on('click', function () {
		$('.popup').fadeIn(300);
	  });
   
	  // Close Popup
	  $('.closeBtn').on('click', function () {
		$('.popup').fadeOut(300);
	  });
   
	  // Close Popup when Click outside
	  $('.popup').on('click', function () {
		$('.popup').fadeOut(300);
	  }).children().click(function () {
		return false;
	  });
   
	});
  </script> --}}
</body>
</html>
@endsection