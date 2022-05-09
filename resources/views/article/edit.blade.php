@auth
<form id="form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="form-topic">

        @if ($topic->food === 1)
        <input type="checkbox" name="food" checked ><label for="food">Food</label>
        @else
        <input type="checkbox" name="food" value="0" ><label for="food">Food</label>
        @endif

        @if ($topic->sports === 1)
        <input type="checkbox" name="sports" checked ><label for="sports">Sports</label>
        @else
        <input type="checkbox" name="sports" value="0" ><label for="sports">Sports</label>
        @endif

        @if ($topic->yoga === 1)
        <input type="checkbox" name="yoga" checked ><label for="yoga">Yoga</label>
        @else
        <input type="checkbox" name="yoga" value="0" ><label for="yoga">Yoga</label>
        @endif

        @if ($topic->therapy === 1)
        <input type="checkbox" name="therapy" checked ><label for="therapy">Therapy</label>
        @else
        <input type="checkbox" name="therapy" value="0" ><label for="therapy">Therapy</label>
        @endif

        @if ($topic->workout === 1)
        <input type="checkbox" name="workout" checked ><label for="workout">Workout</label>
        @else
        <input type="checkbox" name="workout" value="0" ><label for="workout">Workout</label>
        @endif

        @if ($topic->nature === 1)
        <input type="checkbox" name="nature" checked ><label for="nature">Nature</label>
        @else
        <input type="checkbox" name="nature" value="0" ><label for="nature">Nature</label>
        @endif

        @if ($topic->diet === 1)
        <input type="checkbox" name="diet" checked ><label for="diet">Diet</label>
        @else
        <input type="checkbox" name="diet" value="0" ><label for="diet">Diet</label>
        @endif

        @if ($topic->lifestyle === 1)
        <input type="checkbox" name="lifestyle" checked ><label for="lifestyle">Lifestyle</label>
        @else
        <input type="checkbox" name="lifestyle" value="0" ><label for="lifestyle">Lifestyle</label>
        @endif

        @if ($topic->psychology === 1)
        <input type="checkbox" name="psychology" checked ><label for="psychology">Psychology</label>
        @else
        <input type="checkbox" name="psychology" value="0" ><label for="psychology">Psychology</label>
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