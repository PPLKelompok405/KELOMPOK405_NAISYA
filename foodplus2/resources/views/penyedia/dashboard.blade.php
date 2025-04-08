
@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Penyedia Makanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Selamat datang di halaman penyedia makanan, {{ Auth::user()->name }}!</p>
                    
                    <div class="mt-4">
                        <h5>Menu Cepat:</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Tambah Donasi Makanan Baru</a>
                            <a href="#" class="list-group-item list-group-item-action">Kelola Donasi</a>
                            <a href="#" class="list-group-item list-group-item-action">Lihat Transaksi</a>
                            <a href="#" class="list-group-item list-group-item-action">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection