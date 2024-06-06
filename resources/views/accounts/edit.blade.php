@extends('layout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="card">
    <div class="card-header">Update Account</div>
    <div class="card-body">

        <form action="{{ url('account/' .$accounts->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <input type="hidden" name="id" id="id" value="{{$accounts->id}}" id="id" />

            {{-- <label>User Name</label>
            <input type="text" name="user_id" id="user_id" value="{{$accounts->user_id}}" class="form-control @error('user_id') is-invalid @enderror" required autocomplete="user_id" autofocus> </br> --}}

            <label>CCY</label>
            <select class="form-control" aria-label="USD" name="ccy" id="ccy">
                @foreach ($ccy as $ccys)
                        <option value="{{ $ccys }}" {{ $ccys == $accounts->ccy ? 'selected' : '' }}>
                            {{  $ccys }}</option>
                    @endforeach
            </select>
            </br>

            <label>Account Number</label>
            <input type="text" name="account_number" id="account_number" value="{{$accounts->account_number}}" class="form-control @error('account_number') is-invalid @enderror" required autocomplete="account_number" autofocus> </br>

            <label>Amount</label>
            <input type="text" name="amount" id="amount" value="{{$accounts->amount}}" class="form-control"> </br>
           

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@endsection