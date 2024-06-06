@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

<div class="row justify-content-md-center mt-5">
    <div class="card justify-content-md-center" style="max-width: 540px;">
        <div class="card-header">
            <h3>WORLD BANK FEDERAL RESERVE</h3>
        </div>
        <div class="card-body">

            <form action="{{route('dashboard')}}" method="post">
                {!! csrf_field() !!}
                <label>User Name</label>
                <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus> </br>

                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autofocus> </br>
                <input type="submit" value="Login" class="btn btn-success">

            </form>
        </div>
    </div>
</div>
@stop