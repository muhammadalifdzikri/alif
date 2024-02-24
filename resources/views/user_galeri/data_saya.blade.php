@extends('layout.user')

@section('content')
<div class="row p-4">
    @foreach($my_image as $item)
    <div class="col-xl-4 col-lg-6 col-md-8 mb-3">
        <div class="card">
            <div class="card-header h5">
                {{ $item->nama_foto }}
            </div>
            <div class="card-body overflow-hidden">
                <img src="{{ asset('storage/' . $item->nama_file) }}" class="rounded img-fluid" alt="{{ $item->nama_foto }}">
            </div>
            <!-- card footer -->
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="{{ url('/view', $item->id) }}" title="View Image" class="text-black"><span class="material-symbols-outlined">
visibility
</span></a>
                <div class="d-flex gap-1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">
                    Update
                </button>
                <form action="{{ route('image.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                    </form>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Update</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('item.edit', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-floating">
  <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi">{{ $item->deskripsi }}</textarea>
  <label for="deskripsi">Deskripsi</label>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
                        </div>
                    </div>
                    </div>
                
            </div>
            <!-- end card footer -->
        </div>
    </div>
    @endforeach
</div>
@endsection