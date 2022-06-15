@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <p class="text-muted">Hai, {{ Auth::user()->name }}</p>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">{{ __('Pesanan Terbayar') }}</div>

                <div class="card-body">

                    {{ count(App\Models\Transaction::where('status', 'terbayar')->get()) }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">{{ __('Pesanan Diproses') }}</div>

                <div class="card-body">
                    

                    {{ count(App\Models\Transaction::where('status', 'diproses')->get()) }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">{{ __('Pesanan Diantar') }}</div>

                <div class="card-body">
                    

                    {{ count(App\Models\Transaction::where('status', 'pengantaran')->get()) }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">{{ __('Pesanan Selesai') }}</div>

                <div class="card-body">
                    

                    {{ count(App\Models\Transaction::where('status', 'selesai')->get()) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
