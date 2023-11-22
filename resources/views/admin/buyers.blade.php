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
                                style="background: #55AAAD; color:white; width: 85%">Show Seller</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('showBuyer') }}"
                            style="background: #55AAAD; color:white; width: 85%">Show Buyer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center mt-5">
            <h4>Buyer's Information</h4>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Seller ID</th>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last name</th>
                        <th>Address</th>
                        <th>Zip code</th>
                        <th>User name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buyers as $buyer)
                        <tr>
                            <td>{{ $buyer->id }}</td>
                            <td>{{ $buyer->first_name }}</td>
                            <td>{{ $buyer->middle_name }}</td>
                            <td>{{ $buyer->last_name }}</td>
                            <td>{{ $buyer->address }}</td>
                            <td>{{ $buyer->barangay }}</td>
                            <td>{{ $buyer->nickname }}</td>
                            <td>{{ $buyer->email }}</td>
                            <td style="color: #FF2500">Verified</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $buyers->links() }}
        </div>
    </div>
</div>

@endsection