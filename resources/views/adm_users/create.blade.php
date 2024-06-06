@extends('layout.app')
@section('content')

    <div class="card">
        <div class="card-header">Register Form</div>
        <div class="card-body">

            <form action= "{{ url('adm_user') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label>
                <input type="text" name="name" id="name" class ="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> </br>

                <label>Position</label>
                {{-- <input type="text" name="position" id="position"
                    class ="form-control @error('position') is-invalid @enderror" name="position"
                    value="{{ old('position') }}" required autocomplete="position" autofocus> </br> --}}
                <select class="form-control" name="position" id="position" value="{{ old('position') }}">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <br />

                <label>Phone Number</label>
                <input type="text" name="phone_number" id="phone_number"
                    class ="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                    value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus> </br>

                <label>Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class ="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                </br>


                <label>Password</label>
                <input type="password" name="password" id="password"
                    class ="form-control @error('password') is-invalid @enderror" required autocomplete="password"
                    autofocus> </br>

                <label>Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password"> </br>

                <input type="submit" value="Save" class="btn btn-success">

            </form>
        </div>
    </div>

@stop
