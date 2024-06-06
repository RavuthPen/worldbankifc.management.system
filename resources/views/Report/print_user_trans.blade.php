{{-- @extends('layout.app') --}}
{{-- @section('content') --}}
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

            @page {
                size: auto;
            }

            #printarea {
                display: block;
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

            <h4>User Transfer Report</h4>
            {{-- <input type="text" id="from_d"/>
            <input type="text" id="to_d"/> --}}

            {{-- <h3>User List Report</h3> --}}

            <table id="myTable" class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Account Holder</th>
                        <th scope="col">Account Receiver</th>
                        <th scope="col">Amount($)</th>
                        <th scope="col">Transfer Date</th>
                        <th scope="col">Noted</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($banks as $item)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->account_holder }}</td>
                            <td>{{ $item->account_receiver }}</td>
                            <td>{{ $item->amounts }}</td>
                            <td>{{ $item->transfer_date }}</td>
                            <td>{{ $item->noted }}</td>

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
