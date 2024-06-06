@extends('layout.app')
@section('content')

<div class="card">
    <div class="card-header">
        Create Bank Swift
    </div>
    <div class="card-body">

        <form action="{{ url('bank_swift') }}" method="post">
            {!! csrf_field() !!}

            <label>Bank Phone</label>
            <input type="text" name="banks_phones" id="banks_phones" class="form-control @error('banks_phones') is-invalid @enderror" required autocomplete="banks_phones" autofocus> </br>

            <label>Banks Swift</label>
            <input type="text" name="banks_swift" id="banks_swift" class="form-control"> </br>

            <label>Bank Address</label>
            <input type="text" name="banks_address" id="banks_address" class="form-control"> </br>

            <label>Bank Email</label>
            <input type="text" name="banks_email" id="banks_email" class="form-control"> </br>

            <label>Bank Name</label>
            <input type="text" name="banks_name" id="banks_name" class="form-control"> </br>

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@stop