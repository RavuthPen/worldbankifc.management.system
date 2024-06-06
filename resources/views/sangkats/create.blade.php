@extends('layout.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <div class="card-header">
        Create New Khan/District
    </div>
    <div class="card-body">

        <form action="{{ url('sangkat') }}" method="post">
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
                {{-- @foreach ($khans as $khan)
                    <option value="{{ $khan->id }}">{{ $khan->khan_en }}</option>
                @endforeach --}}
            </select>
            </br>

            <label>Sangkat/Commune-KH</label>
            <input type="text" name="sangkat_kh" id="sangkat_kh" class="form-control @error('sangkat_kh') is-invalid @enderror" required autocomplete="sangkat_kh" autofocus> </br>

            <label>Sangkat/Commune-EN</label>
            <input type="text" name="sangkat_en" id="sangkat_en" class="form-control @error('sangkat_en') is-invalid @enderror" required autocomplete="sangkat_en" autofocus> </br>


            

            

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


   

   
</script>


@stop