@extends('layouts.applogin')

@section('title', 'Login Petugas')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-10 col-md-12 col-xl-8 my-5">
            <div class="card shadow my-5 bg-dark-400">
                <div class="card-body">
                    @if (session('warning'))
                        <div class="alert alert-danger text-center">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('petugas.login')}}" method="POST">
                            @csrf
                            <div class="w-100 mx-auto bg-green">
                                <h1 class="text-center text-white">Login Petugas</h1>
                            </div>
                            <div class="form-group text-white">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username...">
                            </div>
                            <div class="form-group text-white">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password...">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection