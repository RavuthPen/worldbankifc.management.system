@extends('layout.app')
@section('content')

    <div class="card">
        <div class="card-header">Register Form</div>
        <div class="card-body">

            <form action= "{{ url('adm_user/' . $user->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $user->id }}" id="id" />

                <label>Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class ="form-control"> </br>

                <label>Position</label>
                <input type="text" name="position" id="position"
                    class ="form-control @error('position') is-invalid @enderror" name="position"
                    value="{{ $user->position }}" required autocomplete="position" autofocus> </br>

                <label>Phone Number</label>
                <input type="text" name="phone_number" id="phone_number"
                    class ="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                    value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus> </br>
                    

                <label>Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class ="form-control"> </br>

                <label>Password</label>
                <input type="text" name="password" id="password" value="{{ $user->password }}"
                    class ="form-control @error('password') is-invalid @enderror" required autocomplete="password"
                    autofocus> </br>

                <input type="submit" value="Update" class="btn btn-success">

            </form>
        </div>
    </div>

@stop
