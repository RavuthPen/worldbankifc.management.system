{{-- @extends('layout.app')
@section('content') --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

<style>
    @media print {
        #printarea {
            display: none;
        }

        @media print {
            #non-printable {
                display: none;
            }

            #printarea {
                display: block;
            }

            @page {
                size: auto;
            }

            body {
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden;
            }

        }
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <div class="card-header" id="non-printable">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">

                </div>

                <div class="col-sm-7">
                    <div class="form-group">
                        <form action="">

                            <div class="input-group" style="position: relative;">
                                <input type="date" name="from_date" id="from_date" class="form-control"
                                    value="{{ old('from_date') }}" />
                                &nbsp;&nbsp;

                                <input type="date" name="to_date" id="to_date" class="form-control"
                                    value="{{ old('to_date') }}" /> &nbsp;&nbsp;

                                <button type="submit" id="btnFind" class="btn btn-primary">find</button> &nbsp;&nbsp;
                                <input type="button" id="btnPrint" class="btn btn-info" value="Print" />

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card-body" id="printarea">

        <form class="form">

            <h4>User List Report</h4>
            {{-- <input type="text" id="from_d"/>
            <input type="text" id="to_d"/> --}}

            {{-- <h3>User List Report</h3> --}}

            <table id="myTable" class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">User ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Date Of Birth</th>
                        {{-- <th scope="col">Create At</th> --}}
                        {{-- <th scope="col">Email</th> --}}
                        <th scope="col">Home No</th>
                        <th scope="col">City/Province</th>
                        <th scope="col">Khan/Distrct</th>
                        <th scope="col">Sangkat/Commune</th>
                        <th scope="col">Village</th>
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
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->dob }}</td>
                            {{-- <td>{{ $item->created_at }}</td> --}}
                            {{-- <td>{{ $item->email }}</td> --}}
                            <td>{{ $item->ho_st_id }}</td>
                            <td>{{ $item->city_en }}</td>
                            <td>{{ $item->khan_en }}</td>
                            <td>{{ $item->sangkat_en }}</td>
                            <td>{{ $item->village_en }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

        </form>

    </div>
</div>

{{-- <script src="{{ asset('public/js/jquery-3.4.1.min.js') }}"></script> --}}

<script>
    $(document).ready(function() {

        $("#btnFind").click(function() {

            var f_date = document.getElementById("from_date").value;
            // $("#from_d").html(f_date);

            $("#from_d").val(f_date);
            // alert(f_date);

            // $("<span>Hello World!</span>").appendTo("p");

        });

        $("#btnPrint").click(function() {
            window.print();
        });

    });
</script>

{{-- @stop --}}
