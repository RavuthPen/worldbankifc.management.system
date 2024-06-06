@extends('layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">

            <form action="{{ url('user/' . $user->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $user->id }}" id="id" />

                <label>First Name</label>
                <input type="text" name="fname" id="fname" value="{{ $user->fname }}" class="form-control"> </br>

                <label>Last Name</label>
                <input type="text" name="lname" id="lname"
                    class="form-control @error('lname') is-invalid @enderror" required autocomplete="lname"
                    value="{{ $user->lname }}" autofocus> </br>

                <label>User Name</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control">
                </br>

                <label>Identity CARD</label>
                <input type="text" name="id_card" id="id_card"
                    class="form-control @error('id_card') is-invalid @enderror" required autocomplete="id_card"
                    value="{{ $user->id_card }}" autofocus>
                </br>

                <label>Gender</label>
                <select class="form-control" name="gender" id="gender">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender }}" {{ $gender == $user->gender ? 'selected' : '' }}>
                            {{ $gender }}</option>
                    @endforeach
                </select>
                </br>

                <label>Phone Number</label>
                <input type="text" name="phone_number" id="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror" required autocomplete="phone_number"
                    value="{{ $user->phone_number }}" autofocus>
                </br>

                <label>Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ date('Y-m-d', strtotime($user->dob)) }}"
                    class="form-control"> </br>

                <label>Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"> </br>

                <label>Active</label>
                <input type="checkbox" name="active" id="active" value="1"
                    {{ $user->active || old('active', 0) === 1 ? 'checked' : '' }}> </br>

                <label>Remark</label>
                <input type="text" name="remark" id="remark" value="{{ $user->remark }}" class="form-control"> </br>

                <label>Home No</label>
                <input type="text" name="ho_st_id" id="ho_st_id" value="{{ $user->ho_st_id }}" class="form-control">
                </br>

                <label>City/Province</label>
                <select class="form-control" name="city_id" id="city_id">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $user->city_id ? 'selected' : '' }}>
                            {{ $city->city_en }}</option>
                    @endforeach
                </select>
                </br>

                <label>Khan/Distrct</label>
                <select class="form-control" name="khan_id" id="khan_id">
                    @foreach ($khans as $khan)
                        <option value="{{ $khan->id }}" {{ $khan->id == $user->khan_id ? 'selected' : '' }}>
                            {{ $khan->khan_en }}</option>
                    @endforeach
                </select>
                </br>

                <label>Sangkat/Communce</label>
                <select class="form-control" name="songkat_id" id="songkat_id">
                    @foreach ($sangkats as $sangkat)
                        <option value="{{ $sangkat->id }}" {{ $sangkat->id == $user->songkat_id ? 'selected' : '' }}>
                            {{ $sangkat->sangkat_en }}</option>
                    @endforeach
                </select>
                </br>

                <label>Village</label>
                {{-- <input type="text" name="village_id" id="village_id" value="{{ $user->village_id }}"
                    class="form-control">  --}}
                <select class="form-control" name="village_id" id="village_id">
                    @foreach ($villages as $village)
                        <option value="{{ $village->id }}" {{ $village->id == $user->village_id ? 'selected' : '' }}>
                            {{ $village->village_en }}</option>
                    @endforeach
                </select>

                </br>

                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control">
                </br>

                <label>Pin Code</label>
                <input type="password" name="pincode" id="pincode" class="form-control">
                </br>
                <a href="{{ url('/user/') }}" class="btn btn-secondary">Back</a>
                <input type="submit" value="Update" class="btn btn-success">

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