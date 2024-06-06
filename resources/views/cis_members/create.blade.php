@extends('layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">
            Create New CIS Member
        </div>
        <div class="card-body">

            <form action="{{ url('cis_member') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <label>User ID</label>
                <input type="text" name="user_id" id="user_id"
                    class="form-control @error('user_id') is-invalid @enderror" required autocomplete="user_id" autofocus>
                </br>


                {{-- <label>Account Number</label>
                <input type="text" name="account_number" id="account_number"
                    class="form-control @error('account_number') is-invalid @enderror" required
                    autocomplete="account_number" autofocus> </br> --}}

                <label>Account Number</label>
                <select class="form-control" name="account_number" id="account_number" value="{{ old('account_number') }}">
                </select>
                </br>

                <label>Passport Number</label>
                <input type="text" name="passport_number" id="passport_number" value="{{ old('passport_number') }}"
                    class="form-control @error('passport_number') is-invalid @enderror" required
                    autocomplete="passport_number" autofocus> </br>

                <label>Date of Issue</label>
                <input type="date" name="dateof_issue" id="dateof_issue" class="form-control" value="{{ old('dateof_issue') }}"> </br>

                <label>Date of Expi</label>
                <input type="date" name="dateof_expi" id="dateof_expi" class="form-control" value="{{ old('dateof_expi') }}"> </br>

                <label>Bank</label>
                <select class="form-control" name="bank_id" id="bank_id" value="{{ old('bank_id') }}">
                    {{-- <option value="">select Bank</option> --}}
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                    @endforeach
                </select>
                </br>

                <label>Passport Image</label>
                @csrf
                <input type="file" class="form-control" name="passport_image" id="passport_image" /> </br>

                <label>Version</label>
                <input type="text" name="version" id="version"
                    class="form-control @error('version') is-invalid @enderror" required autocomplete="version" autofocus>
                </br>

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

                $('#account_number').html('');
                $.ajax({
                    url: '{{ route('getAccountByUserId') }}?id=' + user_id,
                    type: 'get',
                    success: function(res) {
                        $.each(res, function(key, value) {
                            $('#account_number').append('<option value="' + value
                                .account_number + '">' +
                                value.account_number + '</option>');

                        });
                    }

                });

            });

        });


        function getUserName() {

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

        }
    </script>

@stop
