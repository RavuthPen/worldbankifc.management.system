@extends('layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">
            Create New Account
        </div>
        <div class="card-body">

            <form action="{{ url('account') }}" method="post">
                {!! csrf_field() !!}

                <label>User ID</label>
                <input type="text" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                    required autocomplete="user_id" autofocus>
                </br>

                <input type="text" id="username" name="username" value="" style="border: none;color: green;" disabled/>
                </br></br>

                <label>CCY</label>
                <select class="form-control" aria-label="USD" name="ccy" id="ccy">
                    <option value="USD">USD</option>
                    <option value="KHR">KHR</option>
                </select>
                </br>

                <label>Account Number</label>
                <input type="text" name="account_number" id="account_number"
                    class="form-control @error('account_number') is-invalid @enderror" required
                    autocomplete="account_number" autofocus> </br>

                <label>Amount</label>
                <input type="text" name="amount" id="amount" class="form-control"> </br>

                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            $("#user_id").on("keyup", function() {
                var user_id = this.value;

                $('#username').val('');
                $.ajax({
                    url: '{{ route('getUserById') }}?id=' + user_id,
                    type: 'get',
                    success: function(res) {
                        $.each(res, function(key, value) {

                            $('#username').val(value.username);

                        });
                    }

                });

            });

        });
        // function checkUserId() {

        //     $.ajax({
        //         url: '{{ route('getUserById') }}?id=' + user_id,
        //         type: 'get',
        //         success: function(res) {
        //             $.each(res, function(key, value) {
        //                 $('#username').val(value.id);
        //             });
        //         }
        //     });

        // }
    </script>

@stop
