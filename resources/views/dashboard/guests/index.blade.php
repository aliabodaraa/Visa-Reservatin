@extends('layouts.app-master')

@section('content')
{{-- registants','invitees --}}
    <div class="bg-light p-4 rounded">
        <div class="lead">
            @if($person_type=="invitee")
                <a href="{{ route('dashboard.users.send_invite',auth()->user()->id) }}" class="btn btn-warning float-right mb-4">إضافة دعوة</a>
            @endif
        </div>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @php
        $registants=App\Models\Guest::where("is_registant",1)->get();
        $invitees=App\Models\Guest::where("is_registant",0)->get();
        @endphp

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
    @if($registants && count($registants) || $invitees && count($invitees))
        <div class="col-sm-3 mb-1">
            {{-- That is not related with controller - Only for Js --}}
            <label for="search_guest_name" class="form-label">Search :</label>
            <input class="form-control" 
            type="text" 
            id="search_guest_name" 
            onkeyup="myFunction(JSON.stringify({{ App\Models\Guest::all() }}))" placeholder="Serarch Guests">
        </div>

            @if($person_type=="invitee")
                    <table class="table table-warning">
                        <thead>
                        <tr>
                            <th scope="col" width="25%">#</th>
                            <th scope="col" width="25%">Email</th>
                            <th scope="col" width="25%">fname</th>
                            <th scope="col" width="25%">lname</th>
                        </tr>
                        </thead>
                        <tbody id="guest-list" name="guests-list">
                                @foreach($invitees as $invitee)
                                    <tr class="guest invitee" id="{{$invitee->id}}">
                                        <th scope="row">{{ $invitee->id }}</th>
                                        <td>{{ $invitee->email }}</td>
                                        <td>{{ $invitee->fname }}</td>
                                        <td>{{ $invitee->lname }}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
            @elseif($person_type=="registant")
                    <table class="table table-warning">
                        <thead>
                        <tr>
                            <th scope="col" width="4%">#</th>
                            <th scope="col" width="25%">Email</th>
                            <th scope="col" width="25%">fname</th>
                            <th scope="col" width="25%">lname</th>
                            <th scope="col" width="50%">companion</th>
                        </tr>
                        </thead>
                        <tbody id="guest-list" name="guests-list">
                                @foreach($registants as $registant)
                                    <tr class="guest registant" id="{{$registant->id}}">
                                        <th scope="row">{{ $registant->id }}</th>
                                        <td>{{ $registant->email }}</td>
                                        <td>{{ $registant->fname }}</td>
                                        <td>{{ $registant->lname }}</td>
                                        <td>
                                            @if($registant->companion)
                                            <a href="{{ route('dashboard.companion.show',[$registant->id,$registant->companion->id] ) }}" class="btn btn-info btn-sm me-2">companion info</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
            @endif
        @else
        <div class="mt-5 alert text-black alert-success" role="alert" style="margin-top: 20px;">
            <h4 class="alert-heading">Sorry<h4>
            <p>There is no one yet .</p>
            <hr>
        <h6><a href="{{url()->previous()}}" class="btn btn-secondary"> Back</a></h6>
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
    let guests=JSON.parse(x);

    $(".guest").hide();
    jQuery.each(guests, function(id) {
        if (guests[id]["fname"].indexOf($('#search_guest_name').val()) > -1 || guests[id]["lname"].indexOf($('#search_guest_name').val()) > -1 )
            $("#"+guests[id]["id"]).show();
    });
    }
//Filtering End
    });

    </script>
