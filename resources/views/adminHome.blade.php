@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h3 style="font-weight: 700">Admin</h3>
        </div>
        <div class="col text-end">
            <div class="col text-end mt-1">
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="btn px-5 rounded-5 text-white" style="background: #55AAAD"><strong>Manage Users</strong></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('showSeller') }}"
                                style="background: #55AAAD; color:white; width: 85%">Show Sellers</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('showBuyer') }}"
                            style="background: #55AAAD; color:white; width: 85%">Show Buyers</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('top-up.index') }}"
                            style="background: #55AAAD; color:white; width: 85%">Top Up</a></li>
                            <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('category.index') }}"
                                style="background: #55AAAD; color:white; width: 85%">Category</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <h3 style="font-weight: 700; margin-left: 5%">Admin</h3>
        <hr>
        <div class="row mt-5">
            <div class="col-4 mt-5">
                <div class="card p-4 text-white" style="background: #53949D">
                    <strong>Total Verified Seller <i class="fas fa-heart" style="float: right; font-size: 20px"></i></strong> <br>
                    <h1 style="font-weight: 900">{{ $sellers }}</h1>
                </div>
                <div class="card p-4 text-white mt-5" style="background: #555CB3">
                    <strong>Total Verified Buyer <i class="fas fa-heart" style="float: right; font-size: 20px"></i></strong> <br>
                    <h1 style="font-weight: 900">{{ $users }}</h1>
                </div>
            </div>
            <div class="col-8">
                <canvas id="bargraph" style="background: #4E6A80"></canvas>
            </div>
        </div>

        <div class="mt-5">
            <canvas id="productChart" style="background: #c0c2c3" width="400" height="200"></canvas>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('bargraph').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Sellers', 'Buyers'],
                    datasets: [{
                        label: 'User Counts',
                        data: [@json($sellers), @json($users)],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 2,
                        fill: false,
                        pointBackgroundColor: 'white', // Color of the points on the graph
                        pointBorderColor: 'rgba(255, 99, 132, 1)' // Border color of the points on the graph
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    elements: {
                        line: {
                            tension: 0 // Disables bezier curves
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: 'white' // Set color of the legend text
                            }
                        }
                    }
                }
            });

            var ctx = document.getElementById('productChart').getContext('2d');

            // Extract category names and product counts from the controller data
            var categoryLabels = @json($categories->pluck('name'));
            var productCounts = @json($categories->pluck('product.count'));

            var data = {
                labels: categoryLabels,
                datasets: [{
                    label: 'Products per Category',
                    data: productCounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            };

            var config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var myChart = new Chart(ctx, config);
                    });
    </script>
</div>
@endsection
