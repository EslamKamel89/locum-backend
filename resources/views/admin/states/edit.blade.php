@extends('admin.layouts.master')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create State</h4>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <hr>
        <form action="{{ route('admin.states.update', $state->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="stateName" class="control-label col-form-label">State name</label>
                            <input type="text" class="form-control" id="stateName" name="name"
                                value="{{ $state->name }}" placeholder="State name Here">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="action-form">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection