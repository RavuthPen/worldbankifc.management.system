    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
            @media print {

                html,
                body {
                    height: 100%;
                    margin: 0 !important;
                    padding: 0 !important;
                    overflow: hidden;
                }

            }

            .table tr td {
                border: none;
            }
        </style>

    </head>

    <body>

        <div>
            <div class="card-body" style="height: 1450px;">
                {{-- 
                <div class="card-body"
                    style="background-image: url('{{ asset('img/logo-background.png') }}');height: 1000px;background-repeat:no-repeat;background-position: center;
                "> --}}

                <div class="card-body" style="font-size: 12px;">

                    <img src="{{ asset('img/World_Bank_Group_logo.png') }}" alt="Img"
                        style="width: 80%;height: 80%;text-align: center;margin-left: 50px;">

                    {{-- <hr style="border:0 solid rgb(255, 255, 255);" /> --}}

                    <img src="{{ asset('img/cis_ruler.png') }}" height="10px;" style="width: 100%;" /> <br />

                    <div style="position: absolute;margin-top: 40px; margin-left: 80%;">{{QrCode::generate("https://worldbankifc.com/cis=".$cis_members->account_number)}}</div>

                    
                    <img src="{{ asset('img/worldbankgroup_cis1.png') }}" height="610px;"
                        style="position:absolute;margin-top: 10%;margin-left: 45px;opacity: 0.5;" /> <br />

                    <h6 style="text-align: center;font-weight: bold;font-family: Arial Black;">CLIENT INFORMATION SHEET
                        (PERSONAL)</h6></br>

                    <p></p>
                    <table class="table-sm"
                        style="margin-left: 50px;font-family: Courier New;color: darkblue;font-weight: bold;position: relative;">
                        <thead>
                            <tr>
                                <td style="width: 30%;font-family: Arial;">Date:
                                    {{ date('M d, Y', strtotime($cis_members->created_at)) }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;font-family: Arial;">CIS Number:
                                    {{ "CIS-".$cis_members->passport_number."-V".$cis_members->version."-".$cis_members->id }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;font-weight: bold;text-decoration: underline;">CLIENT INFORMATION
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                        <tr>
                            <td>Client/ Signatory Name</td>
                            <td>: {{ $cis_members->username }}</td>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <td>: CAMBODIA</td>
                        </tr>
                        <tr>
                            <td>Passport Number</td>
                            <td>: {{ $cis_members->passport_number }}</td>
                        </tr>

                        <tr>
                            <td>Date Of Issue</td>
                            <td>: {{ $cis_members->dateof_issue }}</td>
                        </tr>

                        <tr>
                            <td>Expiration Date</td>
                            <td>: {{ $cis_members->dateof_expi }}</td>
                        </tr>

                        <tr>
                            <td>Issued by</td>
                            <td>: MIN Phnom Penh</td>
                        </tr>

                        <tr>
                            <td>Date of Birth</td>
                            <td>: {{ $cis_members->dob }}</td>
                        </tr>

                        <tr>
                            <td>Place of Birth</td>
                            <td>: {{ $cis_members->city_en }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;font-weight: bold;text-decoration: underline;">HOME INFORMATION</td>
                        </tr>
                        <tr>
                            <td>Street Address</td>
                            <td>: {{ $cis_members->city_en }} Province, Cambodia</td>
                        </tr>
                        <tr>
                            <td>City/State/Zip</td>
                            <td>: Phnom Penh </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>: Cambodia</td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>: {{ $cis_members->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $cis_members->email }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%;font-weight: bold;text-decoration: underline;">
                                BANK INFORMATION</td>
                        </tr>
                        <tr>
                            <td>Name Of Bank</td>
                            <td>: {{ $cis_members->bank_name }}</td>
                        </tr>
                        <tr>
                            <td>Street Address</td>
                            <td>: {{ $cis_members->street_address }}</td>
                        </tr>
                        <tr>
                            <td>City/State/Zip</td>
                            <td>: {{ $cis_members->city }}</td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td>: {{ $cis_members->telephone }}</td>
                        </tr>
                        <tr>
                            <td>S.W.I.F.T Code</td>
                            <td>: {{ $cis_members->swift_code }}</td>
                        </tr>
                        <tr>
                            <td>Account Name</td>
                            <td>: {{ $cis_members->username }}</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>: {{ $cis_members->account_number }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-bottom: 40px;">Electronic or Facsimile transaction of
                                this document any other associated
                                documents are as valid as the original. Hard copies shall be delivered if requested. I
                                hereby swear under penalty of perjury, that the information provided hare in is accurate
                                and true.
                            </td>
                        </tr>

                        <tr>
                            <td style="border-top: 1px solid darkblue;">Client Name</td>
                            <td>: {{ $cis_members->username }}</td>
                        </tr>
                        <tr>
                            <td>Passport Number/Country</td>
                            <td>: {{ $cis_members->passport_number }}</td>
                        </tr>

                    </table>

                    <img src="{{ asset('img/cis_ruler_buttom.png') }}" height="6px;" style="width: 100%;" /> <br />

                    <h6 style="font-family: Cambria;">LOS ANGELES CITY TREASUREER
                        &emsp;&emsp;&emsp;&emsp; Email: dchung1@worldbank.org &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Page 1</h6>

                </div>
            </div>
        </div>

    </body>

    </html>

    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>