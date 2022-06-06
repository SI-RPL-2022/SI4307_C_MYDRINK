@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail Pembelanjaan
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ Storage::url($transaction->bukti_pembayaran) }}" alt="" width="300">
                </div>
                <table style="width: 100%">
                    <tr>
                        <th>Tanggal Pembelanjaan</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Produk</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$transaction->product->nama}}
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Pembeli</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$transaction->user->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>QTY</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$transaction->qty}}
                        </td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$transaction->catatan}}
                        </td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>
                            :
                        </td>
                        <td>
                            {{$transaction->total}}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            :
                        </td>
                        <td>
                            <div class="badge bg-info text-uppercase">
                                {{$transaction->status}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @if ($transaction->status == 'terbayar' && Auth::user()->role == 'admin')
                                        <form action="{{ route('transaction.validasi', $transaction->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="diproses">
                                            <button class="btn btn-info ms-2">Proses</button>
                                        </form>
                                    @elseif($transaction->status == 'diproses' && Auth::user()->role == 'admin')
                                    <form action="{{ route('transaction.validasi', $transaction->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="pengantaran">
                                        <button class="btn btn-info ms-2">Diantar</button>
                                    </form>
                                    @elseif($transaction->status == 'pengantaran' && Auth::user()->role == 'customer')
                                    <form action="{{ route('transaction.validasi', $transaction->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="selesai">
                                        <button class="btn btn-info ms-2">Nyatakan Selesai</button>
                                    </form>
                                    @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection