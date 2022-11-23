@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Contacts</h2>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

{{--        <form action="{{ route('send.mail') }}" method="post">--}}
{{--            <div class="row">--}}
{{--                <div class="col-1 offset-11">--}}
{{--                    <input type="submit">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @csrf--}}
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>

                </thead>
{{--                <tfoot>--}}
                {{--                <tr>--}}
                {{--                    <th scope="col">Name</th>--}}
                {{--                    <th scope="col">Email</th>--}}
                {{--                    <th scope="col">Action</th>--}}
                {{--                </tr>--}}
                {{--                </tfoot>--}}
                <tbody>

                @foreach($contacts as $contact)
                    <tr>
{{--                        <td class="text-center"><input type="checkbox" name="check[]" value="{{ $contact->id }}"></td>--}}
                        <th scope="row">{{ $contact->name }}</th>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

{{--        </form>--}}
    </div>
@endsection
