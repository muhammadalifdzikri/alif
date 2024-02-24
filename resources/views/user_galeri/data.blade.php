@extends('layout.user')

@section('content')
<div class="container col-md-5 mt-5">
    <div class="card">
        <div class="card-header h5">
            Form Upload Data
        </div>
        <div class="card-body">
            <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nama_foto" id="nama_foto" placeholder="Nama Foto" required>
                    <label for="nama_foto">Nama Foto</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="nama_file" id="nama_file" placeholder="Foto" required  accept="image/*">
                    <label for="nama_file">Foto</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
                    <label for="deskripsi">Deskripsi</label>
                </div>
                <input type="hidden" name="id_pengguna">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
