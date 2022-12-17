@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="center"style="align-content: center">Selamat datang di Toko Aldi Jaya Tani</h1>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-5">
                                <h3 class="card-title">Data Produk</h3>
                                <h6 class="card-text">Sisa Stok : {{ $produk }}</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="card-title">Produk Masuk</h3>
                                <h6 class="card-text">Jumlah Masuk : {{ $produkMasuk }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="card-title">Produk Keluar</h3>
                                <h6 class="card-text">Jumlah Keluar : {{ $produkKeluar }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{-- <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="card-title">Data Produk</h3>
                                <h6 class="card-text">Sisa Stok : {{ $produk }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="card-title">Data Produk</h3>
                                <h6 class="card-text">Sisa Stok : {{ $produk }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="card-title">Data Produk</h3>
                                <h6 class="card-text">Sisa Stok : {{ $produk }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Data Produk</h5>
                        <p class="card-text">Sisa Stok : 8</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Produk Masuk</h5>
                        <p class="card-text">Jumlah: 8</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Produk Keluar</h5>
                        <p class="card-text">Jumlah: 6</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Produk Masuk</h5>
                        <p class="card-text">Jumlah: 8</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Produk Masuk</h5>
                        <p class="card-text">Jumlah: 8</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Produk Keluar</h5>
                        <p class="card-text">Jumlah: 6</p>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    @endsection
