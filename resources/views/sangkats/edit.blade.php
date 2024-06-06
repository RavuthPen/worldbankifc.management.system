@extends('layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="card">
        <div class="card-header">Update Sangkat</div>
        <div class="card-body">

            <form action="{{ url('sangkat/' . $sangkats->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $sangkats->id }}" id="id" />

                <label>Sangkat/Commune-KH</label>
                <input type="text" name="sangkat_kh" id="sangkat_kh" value="{{ $sangkats->sangkat_kh }}"
                    class="form-control @error('sangkat_kh') is-invalid @enderror" required autocomplete="sangkat_kh" autofocus>
                </br>

                <label>Sangkat/Commune-EN</label>
                <input type="text" name="sangkat_en" id="sangkat_en" value="{{ $sangkats->sangkat_en }}"
                    class="form-control @error('sangkat_en') is-invalid @enderror" required autocomplete="sangkat_en" autofocus>
                </br>

                <label>Khan/District</label>
                <select class="form-control" name="khan_id" id="khan_id">
                    @foreach ($khans as $khan)
                        <option value="{{ $khan->id }}" {{ $khan->id == $sangkats->khan_id ? 'selected' : '' }}>
                            {{ $khan->khan_en }}</option>
                    @endforeach
                </select>
                </br>

                {{-- <label>City/Province</label>
                <select class="form-control" name="city_id" id="city_id">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ $city->id == $khans->city_id ? 'selected' : '' }}>
                            {{ $city->city_en }}</option>
                    @endforeach
                </select>
                </br> --}}


                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>
@endsection
