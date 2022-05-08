@auth
<form id="form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="form-topic">

        @if ($topic->healthy === 1)
        <input type="checkbox" name="healthy" checked ><label for="healthy">Healthy</label>
        @else
        <input type="checkbox" name="healthy" value="0" ><label for="healthy">Healthy</label>
        @endif
        
        @if ($topic->sports === 1)
        <input type="checkbox" name="sports" checked ><label for="sports">Sports</label>
        @else
        <input type="checkbox" name="sports" value="0" ><label for="sports">Sports</label>
        @endif

        @if ($topic->politics === 1)
        <input type="checkbox" name="politics" checked ><label for="politics">politics</label>
        @else
        <input type="checkbox" name="politics" value="0" ><label for="politics">politics</label>
        @endif

        @if ($topic->entertainment === 1)
        <input type="checkbox" name="entertainment" checked ><label for="entertainment">entertainment</label>
        @else
        <input type="checkbox" name="entertainment" value="0" ><label for="entertainment">entertainment</label>
        @endif

        @if ($topic->technology === 1)
        <input type="checkbox" name="technology" checked ><label for="technology">technology</label>
        @else
        <input type="checkbox" name="technology" value="0" ><label for="technology">technology</label>
        @endif

        @if ($topic->science === 1)
        <input type="checkbox" name="science" checked ><label for="science">science</label>
        @else
        <input type="checkbox" name="science" value="0" ><label for="science">science</label>
        @endif

        

        {{-- <select id="topic" class="topic" name="topic" >
            <option value="" selected disabled hidden>Pilih topik</option>
            <option value="healthy">healthy</option>
            <option value="food">food</option>
            <option value="sport">sport</option>
            <option value="sahur">sahur</option>
        </select> --}}
        <div class="pesan"></div>
    </div>

    <div class="judul">
        <input id="judul" class="judul" type="text" placeholder="judul" name="judul" value='{{ $data->judul }}'>
        <div class="pesan"></div>
    </div>

    <div class="kalimat">
        <textarea id="isi" rows="25" cols="100" placeholder="isi" name="isi">{{ $data->isi }}</textarea>
        <div class="pesan"></div>
    </div>
    

    <div class="gambar">
        <input type="file" id="gambar" name="gambar">
        {{-- <input type="hidden" id="hidden_gambar" name="hidden_gambar" value="{{ $data->gambar }}"> --}}
        <div class="pesan"></div>
    </div>
    

    <button class="laporbtn" type="submit" class="tombol" >Buat Laporan</button>
</form>

@else

@endauth