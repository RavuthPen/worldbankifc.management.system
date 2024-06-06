@extends('layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">

                        {{-- <a href="{{ url('/bank/create') }}" class="btn btn-success btn-sm">Add New</a> --}}

                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <form action="">

                                <div class="input-group" style="position: relative;">
                                    <input type="date" name="from_date" id="from_date" class="form-control" />
                                    &nbsp;&nbsp;

                                    <input type="date" name="to_date" id="to_date" class="form-control" /> &nbsp;&nbsp;

                                    <input type="text" name="member_name" id="member_name" placeholder="member name"
                                        class="form-control" /> &nbsp;&nbsp;



                                    <button type="submit" class="btn btn-primary">search</button> &nbsp;&nbsp;

                                    {{-- <input type="button" id="create_pdf" value="Generate PDF"> --}}

                                </div>

                            </form>

                        </div>


                    </div>
                </div>
            </div>

        </div>

        <div class="card-body">

            <form class="form">

                <h1>Account Statement</h1>

                <table id="myTable" class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Noted</th>
                            <th scope="col">App Bank ID</th>
                            <th scope="col">App Swift Code</th>
                            <th scope="col">Account Holder</th>
                            <th scope="col">Account Receiver</th>
                            <th scope="col">Member Name</th>
                            <th scope="col">Transfer Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($banks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->noted }}</td>
                                <td>{{ $item->app_bankid }}</td>
                                <td>{{ $item->app_swiftcode }}</td>
                                <td>{{ $item->account_holder }}</td>
                                <td>{{ $item->account_receiver }}</td>
                                <td>{{ $item->member_name }}</td>
                                <td>{{ $item->transfer_date }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </form>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>


    <script>
        $(document).ready(function() {
            var form = $('.form'),
                cache_width = form.width(),
                a4 = [595.28, 841.89]; // for a4 size paper width and height  

            $('#create_pdf').on('click', function() {
                $('body').scrollTop(0);
                createPDF();
            });

            function createPDF() {
                getCanvas().then(function(canvas) {
                    var
                        img = canvas.toDataURL("image/png"),
                        doc = new jsPDF({
                            unit: 'px',
                            format: 'a4'
                        });
                    doc.addImage(img, 'JPEG', 20, 20);
                    doc.save('techsolutionstuff.pdf');
                    form.width(cache_width);
                });
            }

            function getCanvas() {
                form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }
        });
    </script>



@stop
