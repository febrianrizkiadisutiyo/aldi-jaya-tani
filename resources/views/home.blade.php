@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="center"style="align-content: center">Dashboard</h1>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4 mt-5">
                <div class="card border-left-primary text-white bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-5"  style="text-decoration: none">
                                <h3 class="card-title">Data Produk</h3>
                                {{-- <a href="produk" style="text-decoration: none; color: white;"><h3 class="card-title">Data Produk</h3></a> --}}
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
            {{-- card --}}
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="card-title"><b>Jumlah Barang Masuk dan Keluar</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="card-title"><b>Jumlah Barang Masuk dan Keluar Perbulan</b></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
            const ctx = document.getElementById('doughnutChart');
            const doughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Jumlah Masuk','Jumlah Keluar'],
                    datasets: [{
                        label: 'Jumlah: ',
                        data: [{{ $produkMasuk }}, {{ $produkKeluar }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                           
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <script>
            const ctr = document.getElementById('barChart');
            const barChart = new Chart(ctr, {
                type: 'bar',
                data: {
                    labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                    datasets: [{
                        label: 'Produk Masuk: ',
                        data: [ {{ $masuk_jan }},
                                {{ $masuk_feb }},
                                {{ $masuk_mar }},
                                {{ $masuk_apr }},
                                {{ $masuk_mei }},
                                {{ $masuk_jun }},
                                {{ $masuk_jul }},
                                {{ $masuk_agu }},
                                {{ $masuk_sep }},
                                {{ $masuk_okt }},
                                {{ $masuk_nov }},
                                {{ $masuk_des }},
                            ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            
                            

                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',

                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Produk Keluar: ',
                        data: [ {{ $keluar_jan }},
                                {{ $keluar_feb }},
                                {{ $keluar_mar }},
                                {{ $keluar_apr }},
                                {{ $keluar_mei }},
                                {{ $keluar_jun }},
                                {{ $keluar_jul }},
                                {{ $keluar_agu }},
                                {{ $keluar_sep }},
                                {{ $keluar_okt }},
                                {{ $keluar_nov }},
                                {{ $keluar_des }},
                            ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',

                        ],
                        borderWidth: 1
                    }
                ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    @endsection
