@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Riwayat Transaksi
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->product->nama}}
                                </td>
                                <td>
                                    {{$item->qty}}
                                </td>
                                <td>
                                    <div class="badge bg-info text-uppercase">
                                        {{$item->status}}
                                    </div>
                                </td>
                                <td>
                                    {{$item->total}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary me-2">Lihat</a>
                                    @if ($item->status == 'terbayar' && Auth::user()->role == 'admin')
                                        <form action="{{ route('transaction.validasi', $item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="diproses">
                                            <button class="btn btn-info ms-2">Proses</button>
                                        </form>
                                    @elseif($item->status == 'diproses' && Auth::user()->role == 'admin')
                                    <form action="{{ route('transaction.validasi', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="pengantaran">
                                        <button class="btn btn-info ms-2">Diantar</button>
                                    </form>
                                    @elseif($item->status == 'pengantaran' && Auth::user()->role == 'customer')
                                    <form action="{{ route('transaction.validasi', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="selesai">
                                        <button class="btn btn-info ms-2">Nyatakan Selesai</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>Belum Ada Data...</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection