@extends('layout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="card">
    <div class="card-header">Update Card</div>
    <div class="card-body">

        <form action="{{ url('card/' .$cards->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <input type="hidden" name="id" id="id" value="{{$cards->id}}" id="id" />

            <label>User Name</label>
            <input type="text" name="user_id" id="user_id" value="{{$cards->user_id}}" class="form-control @error('user_id') is-invalid @enderror" required autocomplete="user_id" autofocus> </br>

            <label>Card Type</label>
            <select class="form-control" aria-label="USD" name="card_type" id="card_type">
                @foreach ($cardType as $cardTypes)
                        <option value="{{ $cardTypes }}" {{ $cardTypes == $cards->card_type ? 'selected' : '' }}>
                            {{  $cardTypes }}</option>
                    @endforeach
            </select>
            </br>

            <label>Card Number</label>
            <input type="text" name="card_number" id="card_number" value="{{$cards->card_number}}" class="form-control @error('card_number') is-invalid @enderror" required autocomplete="card_number" autofocus> </br>

            <label>CVV</label>
            <input type="text" name="cvv" id="cvv" value="{{$cards->cvv}}" class="form-control"> </br>

            <label>Expired date</label>
            {{-- <input type="date" name="expired_date" id="expired_date" value="{{$cards->expired_date}}" class="form-control"> </br> --}}
           
            <input type="date" name="expired_date" id="expired_date"
                        value="{{ date('Y-m-d', strtotime($cards->expired_date)) }}" class="form-control"> </br>

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@endsection