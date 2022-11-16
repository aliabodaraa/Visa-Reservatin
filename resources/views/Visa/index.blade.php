@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                index page EMAIL
                <form method="POST" action="{{route('visa.provide_email')}}">create_visa_request
                    @csrf
                <input placeholder="email ..." type="email" name="email" required style="margin-bottom: 2px">
                <button type="submit" class="btn btn-primary">Submit</button>

                </form>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection