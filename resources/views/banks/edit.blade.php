@extends('layout.app')
@section('content')
    <html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- <script src="{{ asset('resources/js/app.js') }}"></script> -->

    <body>

        <div class="card">
            <div class="card-header">View Detail Bank</div>
            <div class="card-body">

                <form action="{{ url('bank/' . $bank->id) }}" method="post">
                    {!! csrf_field() !!}
                    @method('PATCH')

                    <input type="hidden" name="id" id="id" value="{{ $bank->id }}" id="id" />

                    <label>Noted</label>
                    <input type="text" name="noted" id="noted" value="{{ $bank->noted }}"
                        class="form-control @error('noted') is-invalid @enderror" required autocomplete="noted" autofocus>
                    </br>

                    <label>App Bank ID</label>
                    <input type="text" name="app_bankid" id="app_bankid" value="{{ $bank->app_bankid }}"
                        class="form-control"> </br>

                    <label>App Swift Code</label>
                    <input type="text" name="app_swiftcode" id="app_swiftcode" value="{{ $bank->app_swiftcode }}"
                         class="form-control"> </br>

                    <label>Code</label>
                    <input type="text" name="code" id="code" value="{{ $bank->code }}"
                        class="form-control">
                    </br>

                    <label>Phone Send</label>
                    <input type="text" name="phone_sent" id="phone_sent" value="{{ $bank->phone_sent }}"
                        class="form-control"> </br>

                    <label>User ID</label>
                    <input type="text" name="user_id" id="user_id" value="{{ $bank->user_id }}"
                        class="form-control @error('user_id') is-invalid @enderror"> </br>

                    <label>Member ID</label>
                    <input type="text" name="member_id" id="member_id" value="{{ $bank->member_id }}"
                        class="form-control"> </br>

                    <label>Bank Address</label>
                    <input type="text" name="bank_address" id="bank_address" value="{{ $bank->bank_address }}"
                        class="form-control"> </br>

                    <label>Member</label>
                    <input type="text" name="member_name" id="member_name" value="{{ $bank->member_name }}"
                        class="form-control"> </br>

                    <label>Amount</label>
                    <input type="text" name="amounts" id="amounts" value="{{ $bank->amounts }}"
                        class="form-control @error('amounts') is-invalid @enderror" required autocomplete="amounts"
                        autofocus> </br>

                    <label>Swift Code</label>
                    <input type="text" name="swift_code" id="swift_code" value="{{ $bank->swift_code }}"
                        class="form-control"> </br>

                    <label>Address</label>
                    <input type="text" name="address" id="address" value="{{ $bank->address }}"
                        class="form-control">
                    </br>

                    <label>Country</label>
                    <input type="text" name="country" id="country" value="{{ $bank->country }}"
                        class="form-control">
                    </br>

                    <label>Charge</label>
                    <input type="text" name="charge" id="charge" value="{{ $bank->charge }}"
                        class="form-control">
                    </br>

                    <label>Currency</label>
                    <input type="text" name="currency" id="currency" value="{{ $bank->currency }}"
                        class="form-control @error('currency') is-invalid @enderror" required autocomplete="currency"
                        autofocus> </br>

                    <label>Caddress</label>
                    <input type="text" name="caddress" id="caddress" value="{{ $bank->caddress }}"
                        class="form-control"> </br>

                    <label>Company</label>
                    <input type="text" name="company" id="company" value="{{ $bank->company }}"
                        class="form-control">
                    </br>

                    <label>App Name</label>
                    <input type="text" name="app_name" id="app_name" value="{{ $bank->app_name }}"
                        class="form-control"> </br>

                    <label>Bank Phone</label>
                    <input type="text" name="bank_phone" id="bank_phone" value="{{ $bank->bank_phone }}"
                        class="form-control"> </br>

                    <label>Bank Address</label>
                    <input type="text" name="bank_address" id="bank_address" value="{{ $bank->bank_address }}"
                         class="form-control"> </br>

                    <label>Transfer Date</label>

                    <input type="date" name="transfer_date" id="transfer_date"
                        value="{{ date('Y-m-d', strtotime($bank->transfer_date)) }}" class="form-control"> </br>

                    <label>TXT NO</label>
                    <input type="text" name="txtno" id="txtno" value="{{ $bank->txtno }}"
                        class="form-control"> </br>

                    <label>Reper</label>
                    <input type="text" name="reper" id="reper" value="{{ $bank->reper }}"
                        class="form-control"> </br>

                    <label>MT Sent</label>
                    <input type="text" name="mt_sent" id="mt_sent" value="{{ $bank->mt_sent }}"
                        class="form-control"> </br>


                    <input type="submit" value="Update" class="btn btn-success">

                    <a href="{{ url('/bank') }}" class="btn btn-success btn-sm">Back</a>

                </form>
            </div>
        </div>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>


        <script>
            jQuery(document).ready(function() {
                alert('ok')
            });
        </script>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>

    </body>

    </html>
@endsection
