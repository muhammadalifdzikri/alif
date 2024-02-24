@extends('layout.public')

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

    <!-- Form untuk menambahkan komentar -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="image_id" value="{{ $image->id }}">
        <div class="form-group">
            <textarea class="form-control" name="body" rows="3" placeholder="Tambahkan komentar"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Komentar</button> </form>

</div>
</div>
@endsection