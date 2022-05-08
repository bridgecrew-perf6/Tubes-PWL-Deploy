<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
<div class="beritaList">

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

					var selengkapnya = document.createElement('a')
					selengkapnya.innerHTML = 'Selengkapnya'
					selengkapnya.href = '/article/id/'+element.id
					berita_box.appendChild(selengkapnya)

					var isi = document.createElement('p')
					isi.innerHTML = element.isi
					berita_box.appendChild(isi)

					var like = document.createElement('a')
					like.innerHTML = element.total_like
					like.href = '/like/'+element.id
					berita_box.appendChild(like)

					beritaList.appendChild(berita_box)
				});

			}
		});
	})

</script>