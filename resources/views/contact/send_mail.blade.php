@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Send Email</h2>
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
        <form action="{{ route('send.mail') }}" method="post">
            <div class="row mt-3 mb-3">
                <div class="col-4">
                    <select class="form-select" name="template" aria-label="Select Template">
                        <option disabled>Please Select a Template</option>
                        <option value="welcome">Welcome Template</option>
                        <option value="thanks">Thanks Template</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <select class="email-multi-select" name="check[]" multiple="multiple" style="width: 100%">
                        @foreach($contacts as $contact)
                            <option value="{{ $contact->id }}">{{ $contact->email }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-1 offset-10 mt-2">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>

            @csrf
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th></th>--}}
{{--                    <th scope="col">Name</th>--}}
{{--                    <th scope="col">Email</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($contacts as $contact)--}}
{{--                    <tr>--}}
{{--                        <td class="text-center"><input type="checkbox" name="check[]" value="{{ $contact->id }}"></td>--}}
{{--                        <th scope="row">{{ $contact->name }}</th>--}}
{{--                        <td>{{ $contact->email }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
        </form>
    </div>
@endsection
