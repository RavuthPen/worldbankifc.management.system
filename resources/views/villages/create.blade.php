@extends('layout.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <div class="card-header">
        Create New Village
    </div>
    <div class="card-body">

        <form action="{{ url('village') }}" method="post">
            {!! csrf_field() !!}

            <label>City/Province</label>
            <select class="form-control" name="city_id" id="city_id">
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_en }}</option>
                @endforeach
            </select>
            </br>

            <label>Khan/District</label>
            <select class="form-control" name="khan_id" id="khan_id">
                <option value="">Select Khan/District</option>
            </select>
            </br>

            <label>Sangkat/Commune</label>
            <select class="form-control" name="sangkat_id" id="sangkat_id">
                <option value="">Select Sangkat/Commune</option>
            </select>
            </br>

            <label>Village-KH</label>
            <input type="text" name="village_kh" id="village_kh" class="form-control @error('village_kh') is-invalid @enderror" required autocomplete="village_kh" autofocus> </br>

            <label>Village-EN</label>
            <input type="text" name="village_en" id="village_en" class="form-control @error('village_en') is-invalid @enderror" required autocomplete="village_en" autofocus> </br>

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
                $('#sangkat_id').html('');

                $.ajax({
                    url: '{{ route('getSangkat') }}?khan_id=' + khanId,
                    type: 'get',
                    success: function(res) {
                        $('#sangkat_id').html('<option value="">Select Sangkat/Commune</option>')
                        $.each(res, function(key, value) {
                            $('#sangkat_id').append('<option value="' + value.id + '">' +
                                value.sangkat_en + '</option>');
                        });
                    }
                });

            });
        }


   

   
</script>


@stop