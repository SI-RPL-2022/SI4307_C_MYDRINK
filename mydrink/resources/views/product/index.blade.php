@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Produk Tersedia
            </div>
            <div class="card-body d-flex align-items-center">
                @forelse ($products as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($item->foto) }}" class="card-img-top" alt="...">
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