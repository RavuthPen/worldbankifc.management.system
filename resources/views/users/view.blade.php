@extends('layout.app')
@section('content')





    <div class="card">
        <div class="card-header">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                        <a href="{{ url('/user/') }}" class="btn btn-success btn-sm">Back</a>

                    </div>
                    
                </div>
            </div>

        </div>

        <div class="card-body">

            <table class="table-sm">

                <tr>
                    <td>User ID</td>
                    <td>: {{ $users->id }}</td>
                </tr>

                <tr>
                    <td>Fisrt Name</td>
                    <td>: {{ $users->fname }}</td>
                </tr>
                <tr>
                    <td>last Name</td>
                    <td>: {{ $users->lname }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>: {{ $users->gender }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>: {{ $users->phone_number }}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>: {{ $users->dob }}</td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>: {{ $users->email }}</td>
                </tr>
                <tr>
                    <td>Home NO</td>
                    <td>: {{ $users->ho_st_id }}</td>
                </tr>
                <tr>
                    <td>Capital/Province</td>
                    <td>: {{ $users->city_en }}</td>
                </tr>
                <tr>
                    <td>Khan/District</td>
                    <td>: {{ $users->khan_en }}</td>
                </tr>
                <tr>
                    <td>Sangkat/Commune</td>
                    <td>: {{ $users->sangkat_en }}</td>
                </tr>
                <tr>
                    <td>Village</td>
                    <td>: {{ $users->village_en }}</td>
                </tr>



            </table>

        </div>
    </div>



@stop
