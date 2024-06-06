@extends('layout.app')
@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="card">
        <div class="card-header">
            Register App User
        </div>
        <div class="card-body">

            <form action="{{ url('user') }}" method="post">
                {!! csrf_field() !!}

                <label>First Name</label>
                <input type="text" name="fname" id="fname" class="form-control @error('fname') is-invalid @enderror"
                    required autocomplete="fname" value="{{ old('fname') }}" autofocus> </br>

                <label>Last Name</label>
                <input type="text" name="lname" id="lname" value="{{ old('lname') }}"
                    class="form-control @error('lname') is-invalid @enderror" required autocomplete="lname" autofocus> </br>

                <label>User Name</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror" required autocomplete="username" autofocus>
                </br>

                <label>Identity CARD</label>
                <input type="text" name="id_card" id="id_card" value="{{ old('id_card') }}"
                    class="form-control @error('id_card') is-invalid @enderror" required autocomplete="id_card"
                    autofocus>
                </br>

                <label>Gender</label>
                <select class="form-control" name="gender" id="gender" value="{{ old('gender') }}">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender }}">{{ $gender }}</option>
                    @endforeach
                </select>
                </br>

                <label>Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                    class="form-control @error('phone_number') is-invalid @enderror" required autocomplete="phone_number"
                    autofocus>
                </br>

                <label>Pin Code</label>
                <input type="text" name="pincode" id="pincode" value="{{ old('pincode') }}"
                    class="form-control @error('pincode') is-invalid @enderror" required autocomplete="pincode" autofocus>
                </br>

                <label>Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror"
                    required autocomplete="dob" value="{{ old('dob') }}" autofocus> </br>

                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"> </br>

                <label>Home No</label>
                <input type="text" name="ho_st_id" id="ho_st_id" class="form-control" value="{{ old('ho_st_id') }}">
                </br>

                <label>City/Province</label>
                <select class="form-control" name="city_id" id="city_id" value="{{ old('city_id') }}">
                    <option value="">Select City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city_en }}</option>
                    @endforeach
                </select>
                </br>

                <label>Khan/Disrict</label>
                <select class="form-control" name="khan_id" id="khan_id" value="{{ old('khan_id') }}">
                    <option value="">select Khan/Disrict</option>
                    {{-- @foreach ($khans as $khan)
                        <option value="{{ $khan->id }}">{{ $khan->khan_name }}</option>
                    @endforeach --}}
                </select>
                </br>

                <label>Sangkat/Communce</label>
                <select class="form-control" name="songkat_id" id="songkat_id" value="{{ old('songkat_id') }}">
                    <option value="">select Sangkat/Commune</option>
                    {{-- @foreach ($sangkats as $sangkat)
                        <option value="{{ $sangkat->id }}">{{ $sangkat->sangkat_name }}</option>
                    @endforeach --}}
                </select>
                </br>

                <label>Village</label>
                <select class="form-control" name="village_id" id="village_id" value="{{ old('village_id') }}">
                    <option value="">select Village</option>
                    {{-- @foreach ($villages as $village)
                        <option value="{{ $village->id }}">{{ $village->village_name }}</option>
                    @endforeach --}}
                </select>
                </br>

                <label>Active</label>
                <input type="checkbox" name="active" id="active" value="1" checked> </br></br>

                <label>Remark</label>
                <input type="text" name="remark" id="remark" class="form-control" value="{{ old('remark') }}"> </br>

                <label>Password</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" required autocomplete="password" autofocus>
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
            getKhan();
            getSangkat();
            getVillage();
        });

        //khan list
        function getKhan() {

            $('#city_id').on('change', function() {
                var cityId = this.value;
                $('#khan_id').html('');
                $.ajax({
                    url: '{{ route('getKhan') }}?city_id=' + cityId,
                    type: 'get',
                    success: function(res) {
                        $('#khan_id').html('<option value="">Select Khan/District</option>')
                        $.each(res, function(key, value) {
                            $('#khan_id').append('<option value="' + value.id + '">' +
                                value.khan_en + '</option>');
                        });
                    }
                });

            });
        }

        //sangkat list
        function getSangkat() {
            $('#khan_id').on('change', function() {
                var khanId = this.value;
                $('#songkat_id').html('');

                $.ajax({
                    url: '{{ route('getSangkat') }}?khan_id=' + khanId,
                    type: 'get',
                    success: function(res) {
                        $('#songkat_id').html('<option value="">Select Sangkat/Commune</option>')
                        $.each(res, function(key, value) {
                            $('#songkat_id').append('<option value="' + value.id + '">' +
                                value.sangkat_en + '</option>');
                        });
                    }
                });

            });
        }

        //village list
        function getVillage() {
            $('#songkat_id').on('change', function() {
                var songkatId = this.value;
                $('#village_id').html('');

                $.ajax({
                    url: '{{ route('getVillage') }}?sangkat_id=' + songkatId,
                    type: 'get',
                    success: function(res) {
                        $('#village_id').html('<option value="">Select Village</option>')
                        $.each(res, function(key, value) {
                            $('#village_id').append('<option value="' + value.id + '">' +
                                value.village_en + '</option>');
                        });
                    }
                });
            });
        }
    </script>
@stop
