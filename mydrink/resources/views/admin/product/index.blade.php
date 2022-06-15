@extends('layouts.template')
@section('title', 'Produk')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Product
                </span>
                <span>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">+</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $item)
                            <tr>
                                <td>
                                    {{$item->nama}}
                                </td>
                                <td>
                                    {{$item->harga}}
                                </td>
                                <td>
                                    {{$item->deskripsi}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection