@extends('layout.app')
@section('content')

    <div class="card">
        <div class="card-header">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                        <a href="{{ url('/cis_member/create') }}" class="btn btn-success btn-sm">Add New</a>

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
                        <th scope="col">User Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Passport Number</th>
                        <th scope="col">Date of Issue</th>
                        <th scope="col">Date of Expi</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cis_members as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->account_number }}</td>
                            <td>{{ $item->passport_number }}</td>
                            <td>{{ $item->dateof_issue }}</td>
                            <td>{{ $item->dateof_expi }}</td>

                            <td>

                                {{-- <button onclick="testNewTab()">test</button> --}}

                                {{-- <a href="{{ url('/cis_member/' . $item->id) }}" title="View cis"><button
                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View</button></a> --}}

                                <a title="View cis"><button class="btn btn-info btn-sm"
                                        onclick="window.open('{{ url('/cis_member/' . $item->id) }}', '_blank')"><i
                                            class="fa fa-eye" aria-hidden="true"></i>
                                        Print</button></a>


                                <a href="{{ url('/cis_member/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                                <form method="POST" action="{{ url('/cis_member' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
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

            {!! $cis_members->links() !!}

        </div>
    </div>

@stop
