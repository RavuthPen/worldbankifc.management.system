<html>

@extends('layout.app')
@section('content')

    <body>


        <div class="card">
            <div class="card-header d-flex">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">

                            <a href="{{ url('/adm_user/create') }}" class="btn btn-success btn-sm">Add New</a>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <form action="">

                                    <div class="input-group">
                                        <input type="text" name="search" placeholder="Search...!"
                                            class="form-control" />
                                        <button type="submit" class="btn btn-primary">search</button>

                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body">

                <table id="table-data" class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">date</th>
                            <th scope="col">Position</th>

                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->position }}</td>

                                <td>
                                    <a href="{{ url('/adm_user/' . $item->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form method="POST" action="{{ url('/adm_user' . '/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete user"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
                                    </form>

                                    {{-- <a href="{{ url('/adm_user/' . $item->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">Reset Password</a> --}}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {!! $users->links() !!}

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    @endsection
</body>

</html>
