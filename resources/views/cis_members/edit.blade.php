@extends('layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="card">
        <div class="card-header">Update CIS Member</div>
        <div class="card-body">

            <form action="{{ url('cis_member/' . $cis_members->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PATCH')

                <input type="hidden" name="id" id="id" value="{{ $cis_members->id }}" id="id" />

                <input type="hidden" name="user_id" id="user_id" value="{{ $cis_members->user_id }}" />

                {{-- <label>Account Number</label>
                <input type="text" name="account_number" id="account_number" value="{{ $cis_members->account_number }}"
                    class="form-control @error('account_number') is-invalid @enderror" required
                    autocomplete="account_number" autofocus> </br> --}}

                <label>Account Number</label>
                <select class="form-control" name="account_number" id="account_number">
                    @foreach ($account_numbers as $account_number)
                        <option value="{{ $account_number->account_number }}" {{ $account_number->account_number == $cis_members->account_number ? 'selected' : '' }}>
                            {{ $account_number->account_number }}</option>
                    @endforeach
                </select>
                </br>


                <label>Passport Number</label>
                <input type="text" name="passport_number" id="passport_number"
                    value="{{ $cis_members->passport_number }}"
                    class="form-control @error('passport_number') is-invalid @enderror" required
                    autocomplete="passport_number" autofocus> </br>

                <label>Date of Issue</label>
                <input type="date" name="dateof_issue" id="dateof_issue" value="{{ $cis_members->dateof_issue }}"
                    class="form-control"> </br>

                <label>Date of Expi</label>
                <input type="date" name="dateof_expi" id="dateof_expi" value="{{ $cis_members->dateof_expi }}"
                    class="form-control"> </br>

                <label>Bank</label>
                <select class="form-control" name="bank_id" id="bank_id">
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}" {{ $bank->id == $cis_members->bank_id ? 'selected' : '' }}>
                            {{ $bank->bank_name }}</option>
                    @endforeach
                </select>
                </br>

                <label>Passport Image</label>
                @csrf

                <img src="{{ asset($cis_members->passport_image) }}" alt="Img" style="width: 400px;height: 250px;" />
                <br />
                <input type="file" class="form-control" name="passport_image" id="passport_image" /> </br>

                <label>Version</label>
                <input type="text" name="version" id="version" value="{{ $cis_members->version }}"
                    class="form-control @error('version') is-invalid @enderror" required autocomplete="version" autofocus>
                </br>

                <input type="submit" value="Update" class="btn btn-success">

            </form>
        </div>
    </div>
@endsection
