@extends('layout.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="card">
    <div class="card-header">Update Member</div>
    <div class="card-body">

        <form action="{{ url('member/' .$member->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <input type="hidden" name="id" id="id" value="{{$member->id}}" id="id" />

            <label>Remake</label>
            <input type="text" name="remake" id="remake" value="{{$member->remake}}" class="form-control"> </br>

            <label>Try</label>
            <select class="form-control" name="c_try" id="c_try">
                @foreach($try as $trys)
                    <option value="{{$trys}}" {{$trys == $member->c_try ? 'selected':''  }} >{{$trys}}</option>
                @endforeach
            </select>
            </br>

            <label>Amount</label>
            <input type="text" name="amount" id="amount" value="{{$member->amount}}" class="form-control"> </br>

            <label>User ID</label>
            <input type="text" name="user_id" id="user_id" value="{{$member->user_id}}" class="form-control"> </br>

            <label>Member ID</label>
            <input type="text" name="member_id" id="member_id" value="{{$member->member_id}}" class="form-control"> </br>
           

            <input type="submit" value="Save" class="btn btn-success">

        </form>
    </div>
</div>

@endsection