@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Add API Key Details</h2>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @endif
        <form action="{{ route('set_mailer.store') }}" method="post">
            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_driver" class="form-label">Mail Driver</label>
                </div>
                <div class="col-8">
                    <input type="text" name="mail_driver" class="form-control" id="mail_driver"
                           aria-describedby="Mail Driver">
                </div>
            </div>
            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_host" class="form-label">Mail Host</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="mail_host" id="mail_host">
                </div>
            </div>

            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_port" class="form-label">Mail Port</label>
                </div>
                <div class="col-8">
                    <input type="text" name="mail_port" class="form-control" id="mail_port" aria-describedby="Mail Driver">
                </div>
            </div>
            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_username" class="form-label">User Name</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="mail_username" id="mail_username">
                </div>
            </div>

            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_password" class="form-label">API Key</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="mail_password" id="mail_password">
                </div>
            </div>
            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_encryption" class="form-label">Mail Encryption</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="mail_encryption" id="mail_encryption">
                </div>
            </div>

            <div class="row g-3 mb-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="mail_from_address" class="form-label">Mail from Address</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="mail_from_address" id="mail_from_address">
                </div>
            </div>

            <div class="row g-3 mb-3 align-items-center">
                <div class="col-2 offset-1">
                    <label for="status" class="form-label">Status</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="status" aria-label="Select Status">
                        <option disabled>Please Select Status</option>
                        <option value="0">Disable</option>
                        <option value="1">Enable</option>
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-1  mt-2 align-items-center">
                <div class="col-1 offset-10">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
            @csrf
        </form>

    </div>
@endsection
