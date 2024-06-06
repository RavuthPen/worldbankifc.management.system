@extends('layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="card">
        <div class="card-header">Update Khan</div>
        <div class="card-body">

            <form action="{{ url('khan/' . $khans->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $khans->id }}" id="id" />

                <label>Khan/District-KH</label>
                <input type="text" name="khan_kh" id="khan_kh" value="{{ $khans->khan_kh }}"
                    class="form-control @error('khan_kh') is-invalid @enderror" required autocomplete="khan_kh" autofocus>
                </br>

                <label>Khan/District-EN</label>
                <input type="text" name="khan_en" id="khan_en" value="{{ $khans->khan_en }}"
                    class="form-control @error('khan_en') is-invalid @enderror" required autocomplete="khan_en" autofocus>
                </br>

                <label>City/Province</label>
                <select class="form-control" name="city_id" id="city_id">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $khans->city_id ? 'selected' : '' }}>
                            {{ $city->city_en }}</option>
                    @endforeach
                </select>
                </br>


                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>
@endsection
