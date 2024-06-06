@extends('layout.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Create Member
        </div>
        <div class="card-body">

            <form action="{{ url('member') }}" method="post">
                {!! csrf_field() !!}

                <label>Remake</label>
                <input type="text" name="remake" id="remake" class="form-control @error('remake') is-invalid @enderror"
                    required autocomplete="remake" value="{{ old('remake') }}" autofocus> </br>

                <label>Try</label>
                <select class="form-control" aria-label="USD" name="c_try" id="c_try" value="{{ old('c_try') }}">
                    <option value="USD">USD</option>
                    <option value="Khmer">Khmer</option>
                </select>
                </br>

                <label>Amount</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount') }}"> </br>

                <label>User ID</label>
                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ old('user_id') }}"> </br>

                <label>Member ID</label>
                <input type="text" name="member_id" id="member_id" class="form-control" value="{{ old('member_id') }}"> </br>

                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>

@stop
