@extends('layout.app')
@section('content')

<div class="card">
    <div class="card-header">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">

                    <a href="{{ url('/card/create') }}" class="btn btn-success btn-sm">Add New</a>

                </div>

                <div class="col-sm-6">

                    <div class="form-group">
                        <form action="">

                            <div class="input-group">
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
                    <th scope="col">User ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Card Type</th>
                    <th scope="col">Card Number</th>
                    <th scope="col">CVV</th>
                    <th scope="col">expired_date</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cards as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->card_type }}</td>
                    <td>{{ $item->card_number }}</td>
                    <td>{{ $item->cvv }}</td>
                    <td>{{ $item->expired_date }}</td>

                    <td>
                        <!-- <a href="{{ url('/details/' . $item->id) }}" class="btn btn btn-primary btn-sm">View</a> -->

                        <a href="{{ url('/card/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                        <form method="POST" action="{{ url('/account' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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

        {!! $cards->links() !!}


    </div>
</div>

@stop