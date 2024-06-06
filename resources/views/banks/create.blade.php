@extends('layout.app')
@section('content')

<div class="card">
    <div class="card-header">
        Create Bank
    </div>
    <div class="card-body">

        <form action="{{ url('bank') }}" method="post">
            {!! csrf_field() !!}

            <label>Noted</label>
            <input type="text" name="noted" id="noted" class="form-control @error('noted') is-invalid @enderror" required autocomplete="noted" autofocus> </br>

            <label>App Bank ID</label>
            <input type="text" name="app_bankid" id="app_bankid" class="form-control"> </br>

            <label>App Swift Code</label>
            <input type="text" name="app_swiftcode" id="app_swiftcode" class="form-control"> </br>

            <label>Code</label>
            <input type="text" name="code" id="code" class="form-control"> </br>

            <label>Phone Send</label>
            <input type="text" name="phone_sent" id="phone_sent" class="form-control"> </br>

            <label>User ID</label>
            <input type="text" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror"> </br>

            <label>Member ID</label>
            <input type="text" name="member_id" id="member_id" class="form-control"> </br>

            <label>Bank Address</label>
            <input type="text" name="banks_address" id="banks_address" class="form-control"> </br>

            <label>Member</label>
            <input type="text" name="member_name" id="member_name" class="form-control"> </br>

            <label>Bank Name</label>
            <input type="text" name="banks_name" id="banks_name" class="form-control"> </br>
            
            <label>Amount</label>
            <input type="text" name="amounts" id="amounts" class="form-control @error('amounts') is-invalid @enderror" required autocomplete="amounts" autofocus> </br>

            <label>Swift Code</label>
            <input type="text" name="swift_code" id="swift_code" class="form-control"> </br>

            <label>Address</label>
            <input type="text" name="address" id="address" class="form-control"> </br>

            <label>Country</label>
            <input type="text" name="country" id="country" class="form-control"> </br>

            <label>Charge</label>
            <input type="text" name="charge" id="charge" class="form-control"> </br>

            <label>Currency</label>
            <input type="text" name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror" required autocomplete="currency" autofocus> </br>

            <label>Caddress</label>
            <input type="text" name="caddress" id="caddress" class="form-control"> </br>

            <label>Company</label>
            <input type="text" name="company" id="company" class="form-control"> </br>

            <label>App Name</label>
            <input type="text" name="app_name" id="app_name" class="form-control"> </br>

            <label>Bank Phone</label>
            <input type="text" name="bank_phone" id="bank_phone" class="form-control"> </br>

            <label>Bank Address</label>
            <input type="text" name="bank_address" id="bank_address" class="form-control"> </br>

            <label>Transfer Date</label>
            <input type="date" name="transfer_date" id="transfer_date" class="form-control"> </br>

            <label>TXT NO</label>
            <input type="text" name="txtno" id="txtno" class="form-control"> </br>

            <label>Reper</label>
            <input type="text" name="reper" id="reper" class="form-control"> </br>

            <label>MT Sent</label>
            <input type="text" name="mt_sent" id="mt_sent" class="form-control"> </br>

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@stop