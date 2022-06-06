@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-start align-items-center">
                <span>
                    Profil Saya
                </span>
            </div>
            <div class="card-body">
                @if ($message = Session::get('gagal'))
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @endif
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                    <div class="form-group">
                        
                        <label for="">Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email"  class="form-control" value="{{ Auth::user()->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="password" name="password"  class="form-control">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection