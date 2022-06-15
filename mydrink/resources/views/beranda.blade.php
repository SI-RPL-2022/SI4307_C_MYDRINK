@extends('layouts.template')

@section('content')
    <div class="container">
        <form action="/produk" method="GET" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" name="search" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div class="mt-4 p-5 bg-light rounded border">
            <div class="d-flex justify-content-between">
            <div class="col">
                <h1>Cari produk favorit anda</h1>
                <p>Produk favorit anda tersedia disini</p>
            </div>
            <img src="storage/foto/jumbotron.png" width="200px" alt="">
            </div>
          </div>
        <h4 class="mt-2">Produk</h4>
        <div class="row mt-2">
            <div class="d-flex align-items-center gap-2">
                @forelse ($products as $item)
                <div class="card" style="width: 16rem;">
                    @if($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" class="card-img-top" alt="...">
                    @else
                        <img src="storage/foto/blank-thumbnail.jpg" class="img-fluid" alt="">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->nama }}</h5>
                      <p class="card-text">Rp. {{$item->harga}}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ route('produk.show', $item->id) }}" class="btn btn-outline-primary">Lihat</a>
                        <form action="{{ route('transaction.create') }}" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-primary ms-2">Beli Sekarang</button>
                        </form>
                    </div>
                  </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
@endsection