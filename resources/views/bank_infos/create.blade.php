@extends('layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">
            Create New Bank Information
        </div>
        <div class="card-body">

            <form action="{{ url('bank_info') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <label>Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name') }}"
                    class="form-control @error('bank_name') is-invalid @enderror" required autocomplete="bank_name"
                    autofocus> </br>

                <label>Street Address</label>
                <input type="text" name="street_address" id="street_address" value="{{ old('street_address') }}"
                    class="form-control @error('street_address') is-invalid @enderror" required
                    autocomplete="street_address" autofocus> </br>

                <label>City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}"> </br>

                <label>Telephone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}"> </br>

                <label>Swift Code</label>
                @csrf
                <input type="text" class="form-control" name="swift_code" id="swift_code" value="{{ old('swift_code') }}"/> </br>

                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>

@stop
