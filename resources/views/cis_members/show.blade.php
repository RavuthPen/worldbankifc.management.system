@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body" style="height: 1450px;">

            <div class="card-body"
                style="background-image: url('{{ asset('img/logo-background.png') }}');height: 1000px;background-repeat:no-repeat;background-position: center;
                ">

                <img src="{{ asset('img/World_Bank_Group_logo.png') }}" alt="Img"
                    style="width: 80%;height: 100px;text-align: center;">
                <hr />

                <h5 style="text-align: center;font-weight: bold;">CLIENT INFORMATION SHEET (PERSONAL)</h5>

                <p></p>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <td style="width: 30%;">Date: {{ date('M d, Y', strtotime($cis_members->created_at)) }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;font-weight: bold;">CLIENT INFORMATION</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Client/ Signatory Name</td>
                        <td>: {{ $cis_members->fname }}</td>
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
                        <td style="width: 30%;font-weight: bold;">HOME INFORMATION</td>
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
                        <td style="width: 30%;font-weight: bold;">BANK INFORMATION</td>
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
                        <td>: {{ $cis_members->fname }}</td>
                    </tr>
                    <tr>
                        <td>Account Number</td>
                        <td>: {{ $cis_members->account_number }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Electronic or Facsimile transaction of this document any other associated documents are as valid as the original. Hard copies shall be delivered if requested. I hereby swear under penalty of perjury, that the information provided hare in is accurate and true.</td>
                    </tr>

                    <tr>
                        <td>Client Name</td>
                        <td>: {{ $cis_members->fname }}</td>
                    </tr>
                    <tr>
                        <td>Passport Number/Country</td>
                        <td>: {{ $cis_members->passport_number }}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>




    



@stop