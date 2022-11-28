@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h2>Mail Server List</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('set_mailer.create') }}" class="btn btn-primary">Add Mail Server</a>
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

        <table class="table table-bordered" id="mailer-setting">
            <thead>
            <tr>
                <th scope="col">Mail Driver</th>
                <th scope="col">Mail Host</th>
                <th scope="col">Mail Port</th>
                <th scope="col">Mail Username</th>
                <th scope="col">Mail Password</th>
                <th scope="col">Mail Encryption</th>
                <th scope="col">Mail from Address</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mailers as $mailer)
                <tr>
                    <th scope="row">{{ $mailer->mail_driver }}</th>
                    <td>{{ $mailer->mail_host }}</td>
                    <td>{{ $mailer->mail_port }}</td>
                    <td>{{ $mailer->mail_username }}</td>
                    <td>{{ $mailer->mail_password }}</td>
                    <td>{{ $mailer->mail_encryption }}</td>
                    <td>{{ $mailer->mail_from_address }}</td>
                    <td>{{ $mailer->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
