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
            @if (isset($article) == true)
                @foreach ($article as $item)
                    <div class="berita">
                        <img src="{{ URL::to('/') }}/gambar/{{ $item->gambar }}" alt="{{ $item->gambar }}" width="400">
                        <p>{{ $item->creator->name }}</p>
                        <p>{{ $item->judul }}</p>
                        <p><a href='/article/id/{{ $item->id }}' >Selengkapnya</a></p>
                        <p>{{ $item->isi }}</p>
                        <div class="keterangan">
                            <a href='/like/{{ $item->id }}' class="liked"><i onclick="myFunction(this)" class="fa fa-heart-o"></i> {{ $item->total_like }}</a>
                                <p>Waktu : {{ $item->created_at->format('d-m-Y H:i:s') }}</p>
                        </div> 
                    </div>
                @endforeach
            @else
                    <div class="berita">
                        <p>Tidak ada data</p>
                    </div>
            @endif
        
      </div>
      <script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
        
    @endauth




{{-- 
@auth

@foreach ($article as $item)
    
    <img src="{{ URL::to('/') }}/gambar/{{ $item->gambar }}" alt="{{ $item->gambar }}" width="400">
    <p>{{ $item->creator->name }}</p>
    <p>{{ $item->judul }}</p>
    <p><a href='/article/id/{{ $item->id }}' >Selengkapnya</a></p>
    <p>{{ $item->isi }}</p>
    <p><a href='/like/{{ $item->id }}' >{{ $item->total_like }}</a></p> 
@endforeach

@endauth

<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
<div class="beritaList">

</div> --}}

@endsection
