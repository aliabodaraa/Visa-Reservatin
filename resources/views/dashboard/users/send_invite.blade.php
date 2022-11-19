@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">index page EMAIL</div>

                <div class="card-body">
                    <form method="POST" action="{{route('dashboard.users.store_invite',auth()->user()->id)}}">
                        @csrf
                        Create visa Request 
                    <input placeholder="First Name ..." type="text" name="first_name" class="mb-2" required>
                    <input placeholder="Last Name ..." type="text" name="last_name" class="mb-2" required>
                    <input placeholder="email ..." type="email" name="email" class="mb-2" required>
                    <button type="submit" class="btn btn-primary" class="mb-2">Submit</button>
    
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection