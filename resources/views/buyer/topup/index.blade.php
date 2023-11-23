@extends('layouts.app')

@section('content')
@if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col-2">
            <i class="fas fa-bars"></i>
            <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="/post">Marketplace</a>
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
            <a href="{{ route('top-up.show', auth()->id()) }}" class="btn btn-warning text-white"><strong>Top-up History</strong></a>
            <a href="{{ route('top-up.create') }}" class="btn btn-secondary text-white"><strong>Top-up</strong></a>
            <a class="btn" style="background:#4E6A80" href="/"><i class="fas fa-home"
                    style="color: white"></i></a>
        </div>
    </div>
    <div class="card-body">
        <h2>TOP-UP</h2>
        <div class="row ">
            <div class="col mt-5">
                <form action="{{ route('top-up.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Request Top-Up</h3>
                <span>Submit here the proof that you have send the money to the owner of the qr code in the top</span>
                <div class="form-group mt-3">
                    <label for="">How much did you send?</label>
                    <input type="number" placeholder="Type here how much did you send" name="topup_request" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="">Proof/Screenshot</label>
                    <input type="file" name="proof" class="form-control">
                </div>
                <button class="btn btn-success mt-3 text-white" style="float: right" type="submit"><strong>Submit</strong></button>
            </form>
        </div>
        <div class="text-center col row">
            <img class="col" src="https://scontent.fmnl9-1.fna.fbcdn.net/v/t1.15752-9/400372995_1041247320415908_5283826235252118310_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeF9X6J3xJJRbEiMi1Vl2GwPqFiQvtIUN_yoWJC-0hQ3_C2rx0SqJt0cGElUt44nQmGmXLMcUYK4dIsDDR071EQQ&_nc_ohc=dlDkTfCwPC4AX_E9e6c&_nc_ht=scontent.fmnl9-1.fna&oh=03_AdRqFpc2oKdom67GPipipc53d90d_saVZ5KKziJvNMCO9A&oe=65861EF7" alt="" height="400" width="400">
            <p style="font-weight: 600; margin-top: 150px" class="col " >
                To Top-Up you need to send amount to the Admin of the web-site the using G-cash or any other kind of payment method you want.
                We assure you that once the Admin has received your form with the screen-shot of the transaction that he/she will send you your points right away.
            </p>
        </div>
        </div>
    </div>

</div>
@endsection
