@extends('layout.app')
@section('content')

<div class="card">
    <div class="card-header">
        Create New Khan/District
    </div>
    <div class="card-body">

        <form action="{{ url('khan') }}" method="post">
            {!! csrf_field() !!}

            <label>Khan/District-KH</label>
            <input type="text" name="khan_kh" id="khan_kh" class="form-control @error('khan_kh') is-invalid @enderror" required autocomplete="khan_kh" autofocus> </br>

            <label>Khan/District-EN</label>
            <input type="text" name="khan_en" id="khan_en" class="form-control @error('khan_en') is-invalid @enderror" required autocomplete="khan_en" autofocus> </br>


            <label>City/Province</label>
            <select class="form-control" name="city_id" id="city_id">
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_en }}</option>
                @endforeach
            </select>
            </br>

            

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@stop