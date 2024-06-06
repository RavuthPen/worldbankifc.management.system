@extends('layout.app')
@section('content')

<div class="card">
    <div class="card-header">Address</div>
    <div class="card-body">

        <form action="{{ url('address') }}" method="post">
            {!! csrf_field() !!}
            <label>Village</label>
            <input type="text" name="village" id="village" class="form-control"> </br>

            <label>District</label>
            <input type="text" name="district" id="district" class="form-control"> </br>

            <label>Commune</label>
            <input type="text" name="commune" id="commune" class="form-control"> </br>

            <label>Province</label>
            <input type="text" name="province" id="province" class="form-control"> </br>

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@stop