@extends('layout.app')
@section('content')

<div class="card">
    <div class="card-header">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">

                    <a href="{{ url('/app_user/create') }}" class="btn btn-success btn-sm">Add New</a>

                </div>

                <div class="col-sm-6">

                    <div class="form-group">
                        <form action="">

                            <div class="input-group" style="position: absolute;">
                                <input type="text" name="search" placeholder="Search...!" class="form-control" />
                                <button type="submit" class="btn btn-primary">search</button>

                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>





    </div>


    <div class="card-body">

        <table id="myTable" class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Address Name</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($locations as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->location }}</td>

                    <td>
                        <a href="{{ url('/user/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <form method="POST" action="{{ url('/app_user' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        

                    </td>
                </tr>
                @endforeach



            </tbody>
        </table>



    </div>
</div>

@stop