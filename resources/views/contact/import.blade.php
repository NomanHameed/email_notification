@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Email List Import
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif

            <div class="card-body">
                <h5 class="card-title">CSV Import</h5>
                <div class="container">
                    <form class="form-horizontal" method="POST" action="{{ route('import_process') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="mt-5 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <input id="csv_file" type="file" class="form-control" name="file" required>

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 offset-5 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    Import CSV
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
