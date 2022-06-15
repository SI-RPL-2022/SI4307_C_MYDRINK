@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <p class="text-muted">Hai, {{ Auth::user()->name }}</p>
    {{-- <div class="row mb-2">
    <p>Pemasukan</p>
        @foreach ($pemasukan as $p)
        <div class="col-3">
            <div class="card">
                <div class="card-header">{{ __('Pemasukan') }}</div>

                <div class="card-body">

                    $p->total
                </div>
            </div>
        </div>
        @endforeach
        
    </div> --}}
    <p>Proses</p>
    <div class="d-flex flex-row mb-3 gap-2">
        <div class="card bg-primary shadow-sm border-0 rounded-2">
            <a class="card-body p-4 text-white" href="/transaction">
                <h5 class="card-title">{{ __('Pesanan Terbayar') }}</h5>
                {{ count(App\Models\Transaction::where('status', 'terbayar')->get()) }}
            </a>
        </div>
        <div class="card shadow-sm border-1 rounded-2">
            <div class="card-body">
                <h5 class="card-title">{{ __('Pesanan Diproses') }}</h5>
                {{ count(App\Models\Transaction::where('status', 'diproses')->get()) }}
            </div>
        </div>
        <div class="card shadow-sm border-1 rounded-2">
            <div class="card-body">
                <h5 class="card-title">{{ __('Pesanan Diantar') }}</h5>
                {{ count(App\Models\Transaction::where('status', 'pengantaran')->get()) }}
            </div>
        </div><div class="card shadow-sm border-1 rounded-2">
            <div class="card-body">
                <h5 class="card-title">{{ __('Pesanan Selesai') }}</h5>
                {{ count(App\Models\Transaction::where('status', 'selesai')->get()) }}
            </div>
        </div>
      </div>
</div>
@endsection
