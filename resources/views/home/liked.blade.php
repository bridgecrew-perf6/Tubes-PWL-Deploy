@extends('layouts.navbar')

@section('navbar')
<a href="/" class="nav-item nav-link"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
<a href="/liked" class="nav-item nav-link active"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>	
<a href="/my_article" class="nav-item nav-link"><i class="material-icons">&#xe80b;</i><span>My Article</span></a>

@endsection
@section('content')

<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>

 


<div class="beritaList" style="margin-top:40px !important">
	<h4 style="text-align: center; margin-top:100px;"> Your Liked page </h4>
</div>

<script>
	$(document).ready(function(){
		$.ajax({
			url: 'api/liked',
			type: 'GET',
			dataType: 'json',
			success: function(data){

				// console.log(data.data)
				var beritaList = document.getElementsByClassName('beritaList')[0]
				data.forEach(element => {
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

</script>