@extends('layouts.app-master')

@section('content')
{{-- registants','invitees --}}
    <div class="bg-light p-4 rounded">
        <div class="lead">
            @if($person_type=="invitee")
                <a href="{{ route('dashboard.users.send_invite',auth()->user()->id) }}" class="btn btn-secondary float-right mb-4">إضافة دعوة</a>
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
            onkeyup="guestsSearchFunction(JSON.stringify({{ App\Models\Guest::all() }}))" placeholder="Serarch Guests">
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
                            <tr id="empty_guests" style="display:none;"><td colspan="4" style="text-align: center;"><b style="color:red;">No invitees</b></td></tr>
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
            <div style="overflow-x:auto;">
                    <table id="registants_table" class="table table-warning">
                        <thead>
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <th scope="col" width="1%">Email</th>
                            <th scope="col" width="1%">fname</th>
                            <th scope="col" width="1%">lname</th>
                            <th scope="col" width="1%">phone</th>
                            <th scope="col" width="1%">gender</th>
                            <th scope="col" width="1%">place_of_birth</th>
                            <th scope="col" width="1%">country_of_residency</th>
                            <th scope="col" width="1%">place_of_issue</th>
                            <th scope="col" width="1%">passport_no</th>
                            <th scope="col" width="1%">issue_date</th>
                            <th scope="col" width="1%">expiry_date</th>
                            <th scope="col" width="1%">arrival_date</th>
                            <th scope="col" width="1%">profession</th>
                            <th scope="col" width="1%">organization</th>
                            <th scope="col" width="1%">visa_duration</th>
                            <th scope="col" width="1%">visa_status</th>
                            <th scope="col" width="1%">passport_picture</th>
                            <th scope="col" width="1%">personal_picture</th>
                            <th scope="col" width="1%">check_in_date</th>
                            <th scope="col" width="1%">check_out_date</th>
                            <th scope="col" width="1%">rom_type</th>
                            <th scope="col" width="1%">rom_extra_type</th>
                            <th scope="col" width="1%">companion</th>
                        </tr>
                        </thead>
                        <tbody id="guest-list" name="guests-list">
                            <tr id="empty_guests" style="display:none;">
                                <td colspan="24" style="text-align: center;"><b style="color:red;">No registants</b></td></tr>
                                @foreach($registants as $registant)
                                    <tr class="guest registant" id="{{$registant->id}}">
                                        <th scope="row">{{ $registant->id }}</th>
                                        <td>{{ $registant->email }}</td>
                                        <td>{{ $registant->fname }}</td>
                                        <td>{{ $registant->lname }}</td>
                                        <td>{{ $registant->phone }}</td>
                                        <td>{{ $registant->gender }}</td>
                                        <td>{{ $registant->place_of_birth }}</td>
                                        <td>{{ $registant->country_of_residency }}</td>
                                        <td>{{ $registant->place_of_issue }}</td>
                                        <td>{{ $registant->passport_no }}</td>
                                        <td>{{ $registant->issue_date }}</td>
                                        <td>{{ $registant->expiry_date }}</td>
                                        <td>{{ $registant->arrival_date }}</td>
                                        <td>{{ $registant->profession? $registant->profession:"NN" }}</td>
                                        <td>{{ $registant->organization ? $registant->organization:"NN" }}</td>
                                        <td>{{ $registant->visa_duration }}</td>
                                        <td>{{ $registant->visa_status }}</td>
                                        <td><img src="{{ asset('/images/passport-pictures/'.$registant->passport_picture) }}"/></td>
                                        <td><img src="{{ asset('/images/personal-pictures/'.$registant->personal_picture) }}"/></td>
                                        <td>{{ $registant->check_in_date }}</td>
                                        <td>{{ $registant->check_out_date }}</td>
                                        <td>{{ $registant->rom_type? $registant->rom_type:"NN" }}</td>
                                        <td>{{ $registant->rom_extra_type? $registant->rom_extra_type:"NN" }}</td>
                                        <td>
                                            @if($registant->companion)
                                            <a href="{{ route('dashboard.companion.show',[$registant->id,$registant->companion->id] ) }}" class="btn btn-warning btn-sm me-2">companion info</a>
                                            @else
                                            <span style="margin-left: 54px;">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
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

