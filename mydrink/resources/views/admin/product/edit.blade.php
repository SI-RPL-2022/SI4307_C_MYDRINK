@extends('layouts.template')
@section('title', 'Edit produk')

@section('content')
    
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Product
                </span>
                <span>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{ $product->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" name="harga" value="{{ $product->harga }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="{{ $product->deskripsi }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-2 w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    
@endsection