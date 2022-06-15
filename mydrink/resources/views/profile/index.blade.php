@extends('layouts.template')
@section('title', 'Profil')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('gagal'))
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @endif
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                    <div class="form-group">
                        <label for="image"></label>
                        @if (Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image )}}" class="rounded-circle" width="200px" alt="">
                            <input type="file" class="form-control mt-2 @error('image') is-invalid @enderror" name="image" id="image">
                        @else
                        <div class="d-flex align-items-center gap-2">
                            <img src="storage/foto/blank-thumbnail.jpg" class="rounded-cirle" width="200px" alt="">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                        </div>
                        @endif
                        @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
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