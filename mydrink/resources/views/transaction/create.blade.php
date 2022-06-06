@extends('layouts.template')

@section('content')
<div class="container">
    <main>
  
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Detail Pembayaran</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">{{ $product->nama }}</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">Rp.{{ $product->harga }}</span>
            </li>
          </ul>
  
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="status" value="terbayar">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="row g-3">
  
  
            <hr class="my-4">
  
            <h4 class="mb-3">Payment</h4>
  
            <div class="my-3">
              <div class="form-group">
                  <label for="">QTY</label>
                  <input type="number" name="qty" id="qty" value="1" class="form-control" value="{{ old('qty') }}">
                  @error('qty')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Bukti Pembayaran</label>
                  <input type="file" name="bukti_pembayaran" id="" class="form-control">
                  @error('bukti_pengiriman')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Alamat Pengiriman</label>
                  <input type="text" name="alamat_pengiriman" id="" class="form-control" value="{{ old('alamat_pengiriman') }}">
                  @error('alamat_pengiriman')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="form-group">
                  <label for="">Catatan</label>
                  <textarea name="catatan" id="" cols="30" rows="10" class="form-control">{{ old('catatan') }}</textarea>
              </div>
              <div class="form-group">
                  <label for="">Total</label>
                  <input type="number" name="total" id="total" class="form-control" readonly>
              </div>
            </div>
  
  
            <hr class="my-4">
  
            <button class="w-100 btn btn-primary btn-lg" type="submit">Checkout</button>
          </form>
        </div>
      </div>
    </main>
  
  </div>

  <script>
      let qty = document.getElementById('qty')
      let total = document.getElementById('total')

        total.value = qty.value * {{$product->harga}}

      qty.addEventListener('keyup', function() {
          total.value = qty.value * {{$product->harga}}
      })
  </script>
@endsection