@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail Produk
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ Storage::url($product->foto) }}" alt="" width="300">
                </div>
                <table style="width: 100%">
                    <tr>
                        <th>Nama Produk</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $product->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$product->harga}}
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$product->deskripsi}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <a href="/transaction/create?id={{ $product->id }}" class="btn btn-primary w-100">Beli</a>
            </div>
        </div>
    </div>
@endsection