@extends('layout.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">
            Create New Card
        </div>
        <div class="card-body">

            <form action="{{ url('card') }}" method="post">
                {!! csrf_field() !!}

                <label>User ID</label>
                <input type="text" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                    required autocomplete="user_id" autofocus> </br>

                <input type="text" id="username" name="username" value="" style="border: none;color: green;"
                    disabled />
                </br></br>

                <label>Card Type</label>
                <select class="form-control" aria-label="USD" name="card_type" id="card_type"
                    value="{{ old('card_type') }}">
                    <option value="VISA">VISA</option>
                    <option value="MASTER">MASTER</option>
                </select>
                </br>

                <label>Card Number</label>
                <input type="text" name="card_number" id="card_number" value="{{ old('card_number') }}"
                    class="form-control @error('card_number') is-invalid @enderror" required autocomplete="card_number"
                    autofocus> </br>

                <label>CVV</label>
                <input type="text" name="cvv" id="cvv" class="form-control" value="{{ old('cvv') }}"> </br>

                <label>Expired date</label>
                <input type="date" name="expired_date" id="expired_date" class="form-control"
                    value="{{ old('expired_date') }}"> </br>

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
       
    </script>


@stop
