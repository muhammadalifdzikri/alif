@extends('layout.user')

@section('content')
<div class="row p-4">
    @foreach($data as $item)
    <div class="col-xl-4 col-lg-6 col-md-8 mb-3">
        <div class="card">
            <div class="card-header h5">
                {{ $item->nama_foto }}
            </div>
            <div class="card-body overflow-hidden">
                <img src="{{ asset('storage/' . $item->nama_file) }}" class="rounded img-fluid" alt="{{ $item->nama_foto }}">
            </div>
            <div class="card-footer">
            <a href="{{ url('/view', $item->id) }}" title="View Image" class="text-black"><span class="material-symbols-outlined">
visibility
</span></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
