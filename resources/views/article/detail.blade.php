@extends('layouts.navbar')
@section('content')

@auth
<body>

<div class="beritalist">
    <div class="berita" style="margin-top: 100px !important;">
    <div class="tagss">
        <h4> Tags : </h4>
    </div>
    <div class="tags">
        <ul>
    @if ($topic->food === 1)
        <li class="textpd"> Food </li>
    @endif
    @if ($topic->sports === 1)
        <li class="textpd"> Sports </li>
    @endif
    @if ($topic->yoga === 1)
        <li class="textpd"> Yoga </li>
    @endif
    @if ($topic->therapy === 1)
        <li class="textpd"> Therapy </li>
    @endif
    @if ($topic->workout === 1)
        <li class="textpd"> Workout </li>
    @endif
    @if ($topic->nature === 1)
        <li class="textpd"> Nature </li>
    @endif
    @if ($topic->diet === 1)
        <li class="textpd"> Diet </li>
    @endif
    @if ($topic->lifestyle === 1)
        <li class="textpd"> Lifestyle </li>
    @endif
    @if ($topic->psychology === 1)
        <li class="textpd"> Psychology </li>
    @endif
</ul>
    </div>

    @if(auth()->user()->id === $data->user_id)
    
        <a href="/article/edit/id/{{ $data->id }}">Edit</a>
    
    @endif
    
    @if(auth()->user()->id === $data->user_id)
        <a href="/article/delete/id/{{ $data->id }}">Delete</a>
    @endif
    
    
    <p>Creator : {{ $data->author->name }}</p>
    
    <h4>{{ $data->judul }}</h4>
    <img src="{{ asset('gambar/'.$data->gambar) }}" alt="" width="400" style="align-content: center">
    
    <p>{{ $data->isi }}</p>
    

    <div class="keterangan">
        <a href='/like/{{ $data->id }}' class="liked"><i onclick="myFunction(this)" class="fa fa-heart-o"></i> {{ $data->total_like }}</a>
            <p>Waktu : {{ $data->created_at->format('d-m-Y H:i:s') }}</p>
    </div>
    </div>

    {{-- <div class="card">
        @if($komentar)
        @foreach($komentar as $komen)
        <div>
            <p>{{ $komen->userNama }}</p>
            <p>{{ $komen->komentar }}</p>
        </div>
        @endforeach
    @endif
    </div> --}}
</div>
    <h1 style="margin-left: 100px !important; margin-top: 50px !important;">Komentar</h1>
    @if($komentar)
    @foreach($komentar as $komen)
<div class="comments-container">
    <ul id="comments-list" class="comments-list">
        <li>
            <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name"><a href="http://creaticode.com/blog">{{ $komen->userNama }}</a></h6>
                    </div>
                    <div class="comment-content">
                        {{ $komen->komentar }}
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
@endforeach
@endif

{{-- Disini ada total komentar --}}

<form id="form" action="/komentar/send/{{ $data->id }}">
    @csrf
    <input type="text" name="komentar" id="komentar" placeholder="comments">
    <input class="btn btn-outline-primary" type="submit" value="kirim">
</form>
</body>

@endauth
@endsection