@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="d-flex gap-2">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/' . Auth::user()->image )}}" width="300" alt="">
                </div>
            </div>
            
            <div class="card flex-fill">
                <div class="card-body px-5">
                    <h5>{{ $product->nama }}</h5>
                    <h3 class="fw-bold">Rp.{{ $product->harga }}</h3>
                    <div class="d-grid gap-0">
                        <p class="mt-3 fw-bold">Deskripsi</p>
                        <p>{{ $product->deskripsi }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/transaction/create?id={{ $product->id }}" class="btn btn-primary w-100">Beli</a>
                </div>
            </div>
        </div>
        
    </div>
@endsection