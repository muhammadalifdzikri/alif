@extends('layout.user')

@section('content')
<div class="container p-4">
<div class="card shadow-lg">
    <div class="card-header h5 d-flex justify-content-between">
        <span>{{ $image->nama_foto }}</span>
        <span class="h6"> User : {{ $image->user->name }}</span>
    </div>
    <div class="card-body d-flex flex-column gap-2">
        <img src="{{ asset('storage/' . $image->nama_file) }}" class="img-fluid rounded" alt="{{ $image->nama_foto }}">
        <span>{{ $image->deskripsi }}</span>
    </div>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="image_id" value="{{ $image->id }}">
        <div class="form-floating mx-4 my-2">
            <textarea name="body" class="form-control" id="body" cols="30" rows="10" placeholder="Komentar"></textarea>
            <label for="body">Komentar</label>
        </div>
        <button class="btn btn-primary mx-4 mb-4" type="submit">Kirim Komentar</button>
    </form>

    <div class="card-body">
        <p>Komentar</p>
    @foreach($comment as $item)
        <div class="mx-4 my-2">
            <b>{{ '@' }}{{ $item->user->name }}</b>
            {{$item->body}}
        </div>
    @endforeach
</div>
</div>
</div>
@endsection