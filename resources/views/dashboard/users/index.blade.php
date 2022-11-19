@extends('layouts.app-master')

@section('content')

    <div class="bg-light p-4 rounded">
        <div class="lead">
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-warning float-right mb-4"> Add Admin</a>
        </div>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        {{-- @livewire('search') --}}
        @if(count($users))
        <div class="col-sm-3 mb-1">
            {{-- That is not related with controller - Only for Js --}}
            <label for="search_user_name" class="form-label">Search :</label>
            <input class="form-control" 
            type="text" 
            id="search_user_name" 
            onkeyup="myFunction(JSON.stringify({{ App\Models\User::all() }}))" placeholder="Serarch Users">
        </div>
        <table class="table table-warning">
            <thead>
            <tr>
                <th scope="col" width="4%">#</th>
                <th scope="col" width="10%">Email</th>
                <th scope="col" width="10%">Username</th>
                <th scope="col" width="10%" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody id="user-list" name="users-list">
                    @foreach($users as $user)
                        <tr class="{{Auth::user()->id==$user->id? 'text-primary':''}} user" id="{{$user->id}}">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
 
                            <td style="display:flex;align-items:baseline;">
                                <a href="{{ route('dashboard.users.profile', $user->id) }}" class="btn btn-primary btn-sm me-2">profile</a>

                                        @if(Auth::user()->id == $user->id)
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-info btn-sm me-2">Edit</a>
                                           {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                           {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                           {!! Form::close() !!} --}}
                                        @endif
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @else
            <div class="alert text-black alert-success" role="alert" style="margin-top: 20px;">
                <h4 class="alert-heading">Sorry<h4>
                <p>The Program has not any user yet .</p>
                <hr>
                <p class="mb-0">Whenever you need to add a new user, click the yellow button .</p>
            <h1><a href="{{url()->previous()}}" class="btn btn-secondary"> Back</a></h1>
            {{-- problem in back --}}
            </div>
      @endif

    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"> </script>

<script type="text/javascript">
    $(document).ready(function(){

//Filtering Start
    myFunction=(x)=>{
    let users=JSON.parse(x);
    $(".user").hide();
    jQuery.each(users, function(id) {
        if (users[id]["username"].indexOf($('#search_user_name').val()) > -1 )
            $("#"+users[id]["id"]).show();
    });
    }
//Filtering End
    });

    </script>
