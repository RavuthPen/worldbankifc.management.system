@extends('layout.app')
@section('content')


    <div class="card">
        <div class="card-header">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                        <a href="{{ url('/user/create') }}" class="btn btn-success btn-sm">Add New</a>

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
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">DOB</th>
                        {{-- <th scope="col">City</th>
                        <th scope="col">Sangkat</th> --}}
                        <th scope="col">Active</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->lname }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->dob }}</td>
                            {{-- <td>{{ $item->city_en }}</td>
                            <td>{{ $item->sangkat_en }}</td> --}}

                            <td disabled>
                                <input type="checkbox" disabled class="larger" name="active" value="active"
                                    {{ old('active', $item->active) ? 'checked' : '' }} />
                            </td>

                            <td>
                                {{-- <a title="View Detail"><button class="btn btn-info btn-sm"
                                    onclick="window.open('{{ url('/user/' . $item->id) }}', '_blank')"><i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                    View</button></a> --}}


                                    <a href="{{ url('/user/' . $item->id) }}" class="fa fa-eye btn btn-info btn-sm" aria-hidden="true">View</a>
                              
                                <a href="{{ url('/user/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                <form method="POST" action="{{ url('/user' . '/' . $item->id) }}" accept-charset="UTF-8"
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

            {!! $users->links() !!}
        </div>
    </div>

@stop
