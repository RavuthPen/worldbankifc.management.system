@extends('layout.app')
@section('content')

    <div class="card">
        <div class="card-header">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                        <a href="{{ url('/sangkat/create') }}" class="btn btn-success btn-sm">Add New</a>

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
                        <th scope="col">Sangkat / Commune-KH</th>
                        <th scope="col">Sangkat / Commune-EN</th>
                        <th scope="col">Khan/District</th>


                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($sangkats as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->sangkat_kh }}</td>
                            <td>{{ $item->sangkat_en }}</td>
                            <td>{{ $item->khan_en }}</td>

                            <td>
                                <!-- <a href="{{ url('/details/' . $item->id) }}" class="btn btn btn-primary btn-sm">View</a> -->
                                <a href="{{ url('/sangkat/' . $item->id . '/edit') }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ url('/khan' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete user"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {!! $sangkats->links() !!}


        </div>
    </div>



@stop
