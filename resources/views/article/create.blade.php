@extends('layouts.navbar')
@section('content')

@auth
<body>
        <form id="form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="form-topic">
                <input class="form-check-input" type="checkbox" name="food" value="1"><label class="form-check-label" for="food">Food</label>
                <input class="form-check-input" type="checkbox" name="sports" value="1"><label class="form-check-label" for="sports">Sports</label>
                <input class="form-check-input" type="checkbox" name="yoga" value="1"><label class="form-check-label" for="yoga">Yoga</label>
                <input class="form-check-input" type="checkbox" name="therapy" value="1"><label class="form-check-label" for="therapy">Therapy</label>
                <input class="form-check-input" type="checkbox" name="workout" value="1"><label class="form-check-label" for="workout">Workout</label>
                <input class="form-check-input" type="checkbox" name="nature" value="1"><label class="form-check-label" for="nature">Nature</label>
                <input class="form-check-input" type="checkbox" name="diet" value="1"><label class="form-check-label" for="diet">Diet</label>
                <input class="form-check-input" type="checkbox" name="lifestyle" value="1"><label class="form-check-label" for="lifestyle">Lifestyle</label>
                <input class="form-check-input" type="checkbox" name="psychology" value="1"><label class="form-check-label" for="psychology">Psychology</label>
            </div>

            <div class="judul">
                <input id="judul" class="judul" type="text" placeholder="Judul" name="judul">
                <div class="pesan"></div>
            </div>

            <div class="kalimat">
                <textarea id="isi" rows="20" cols="100" placeholder="isi" name="isi"></textarea>
                <div class="pesan"></div>
            </div>


            <div class="gambar">
                <input type="file" id="gambar" name="gambar">
                <div class="pesan"></div>
            </div>


            <button class="btn btn-outline-danger" type="submit" class="tombol">Buat Laporan</button>
        </form>
    </div>
</body>

@else

@endauth