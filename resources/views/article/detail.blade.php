@auth


<abbr>{{ $data->topic }}</abbr>
<b>{{ $data->user_id }}</b>
<b>{{ $data->isi }}</b>
<aside>{{ $data->judul }}</aside>


@if(auth()->user()->id === $data->user_id)

    <a href="/article/edit/id/{{ $data->id }}">Edit</a>

@endif

@if(auth()->user()->id === $data->user_id)
    <a href="/article/delete/id/{{ $data->id }}">Delete</a>
@endif


<p>Creator : {{ $data->author->name }}</p>

<p>{{ $data->judul }}</p>

<p>{{ $data->isi }}</p>


<a id="like" href='/like/{{ $data->id }}' >{{ $data->total_like}}</a>

<br>

{{-- Disini ada total komentar --}}

@if($komentar)
    @foreach($komentar as $komen)
    <div>
        <p>{{ $komen->userNama }}</p>
        <p>{{ $komen->komentar }}</p>
    </div>
    @endforeach
@endif

<form id="form" action="/komentar/send/{{ $data->id }}">
    @csrf
    <input type="text" name="komentar" id="komentar" placeholder="comments">
    <input type="submit" value="kirim">
</form>

@endauth
