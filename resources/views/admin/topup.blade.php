@extends('layouts.app')

@section('content')

@if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
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
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('top-up.index') }}"
                            style="background: #55AAAD; color:white; width: 85%">Top up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <td>Role</td>
                        <td>Full Name</td>
                        <td>Proof</td>
                        <td>Reference Number</td>
                        <td>Request</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topUps as $topUp)
                        <tr>
                            <td>{{ $topUp->user->role }}</td>
                            <td>{{ $topUp->user->first_name }} {{ $topUp->user->middle_name }} {{ $topUp->user->last_name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $topUp->proof) }}" height="150" width="150" alt="">
                            </td>
                            <td>{{ $topUp->reference }}</td>
                            <td>{{ $topUp->topup_request }}</td>
                            <td>
                                <button class="btn btn-primary" data-id="{{ $topUp->user_id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Transfer Points</button>
                            </td>
                        </tr>
                        {{-- MODAL  --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Transfer Points</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('top-up.transfer', $topUp->user_id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="from-group">
                                        <label for="">How much</label>
                                        <input type="number" name="topup_request" placeholder="Transfer Points" class="form-control">
                                        <input type="hidden" name="reference_number" value="{{ $topUp->reference_number }}" class="form-control">
                                        <input type="hidden" name="top_up_id" value="{{ $topUp->id }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Transfer</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $('#dataTable').DataTable();
    </script>
</div>
@endsection
