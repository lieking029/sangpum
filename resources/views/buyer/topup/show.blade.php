@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col-2 d-flex">
            <div class="dropdown" id="userdropdown">
                <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-bars" style="font-size: 23px"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="text-center" style="margin-left: 20px"><span class="dropdown-item btn rounded-5 mb-3" href="#"
                        style="background: #55AAAD; color:white; width: 85%">Finance</span></li>
                </ul>
            </div>
            <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="{{ route('post.index') }}">Marketplace</a>
        </div>
        <div class="col-8">
            <!-- Input group -->
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-2 text-end">
            <a href="{{ route('top-up.create') }}" class="btn btn-secondary text-white"><strong>Top-up</strong></a>
            <a class="btn" style="background:#4E6A80" href="{{ url('/') }}"><i class="fas fa-home"
                    style="color: white"></i></a>
        </div>
    </div>
    <div class="card-body">
        <h4>Top Up History</h4>
        <table class=" mt-4 table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <td>Proof</td>
                    <td>Points</td>
                    <td>Date</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->topUp as $topUp)
                    <tr class="text-center">
                        <td>
                            <img src="{{ asset('storage/' . $topUp->proof) }}" height="100" width="100" alt="">
                        </td>
                        <td>{{ number_format($topUp->topup_request, 2) }}</td>
                        <td>{{ date('F j, Y', strtotime($topUp->created_at)) }}</td>
                        <td>
                            @if($topUp->status == 0)
                            <strong style="color: rgb(117, 117, 0)">Pending</strong>
                            @else
                            <strong style="color: green">Received</strong>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('#dataTable').DataTable()
    </script>
</div>
@endsection
