@extends('layout.app')
@section('content')
  
    <div class="card">
        <div class="card-header">Register Form</div>
        <div class="card-body"> 
        
            <form action= "{{ url('user/' .$user->id) }}" method="post">
             {!! csrf_field() !!}   
             @method("PATCH")

             <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />

            <label>Name</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" class ="form-control"> </br>

      
            <label>Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" class ="form-control"> </br>

            <input type="submit" value="Save" class="btn btn-success"> 

            </form>
        </div>
    </div>

@stop