@extends('layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">Update Bank Information</div>
        <div class="card-body">

            <form action="{{ url('bank_info/' . $bank_infos->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $bank_infos->id }}" id="id" />

                <label>Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" value="{{ $bank_infos->bank_name }}"
                    class="form-control @error('bank_name') is-invalid @enderror" required
                    autocomplete="bank_name" autofocus> </br>

                <label>Street Address</label>
                <input type="text" name="street_address" id="street_address" value="{{ $bank_infos->street_address }}"
                    class="form-control @error('street_address') is-invalid @enderror" required
                    autocomplete="street_address" autofocus> </br>

                <label>City</label>
                <input type="text" name="city" id="city" value="{{ $bank_infos->city }}" class="form-control"> </br>

                <label>Telephone</label>
                <input type="text" name="telephone" id="telephone" value="{{ $bank_infos->telephone }}" class="form-control"> </br>

                <label>Swift Code</label>
                @csrf
                <input type="text" class="form-control" name="swift_code" id="swift_code" value="{{ $bank_infos->swift_code }}" /> </br>


                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>
@endsection
