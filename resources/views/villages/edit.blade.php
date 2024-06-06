@extends('layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">Update Village</div>
        <div class="card-body">

            <form action="{{ url('village/' . $villages->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $villages->id }}" id="id" />

                <label>Village-KH</label>
                <input type="text" name="village_kh" id="village_kh" value="{{ $villages->village_kh }}"
                    class="form-control @error('village_kh') is-invalid @enderror" required autocomplete="village_kh"
                    autofocus>
                </br>

                <label>Village-EN</label>
                <input type="text" name="village_en" id="village_en" value="{{ $villages->village_en }}"
                    class="form-control @error('village_en') is-invalid @enderror" required autocomplete="village_en"
                    autofocus>
                </br>

                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>
@endsection
