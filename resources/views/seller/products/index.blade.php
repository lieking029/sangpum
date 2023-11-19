@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h4>Product</h4>
        </div>
        <div class="col text-end">
            <i class="fas fa-bars" style="font-size: 24px"></i>
        </div>
    </div>
    <div class="card-body">
        <div class="card-header row">
            <div class="col">
                <h4>Products</h4>
            </div>
            <div class="col text-end">
                <a href="#" class="btn btn-danger"><i class="fas fa-plus">Add Product</i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
