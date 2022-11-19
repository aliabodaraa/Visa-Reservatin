@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="container mt-4">
            <h1>
                Personal companion Page
                <div class="float-right">
                    <a href="{{ URL::previous() }}" class="btn btn-dark">Back</a>
                </div>
            </h1>
            <div class="lead">
    
            </div>
            <div>
                Email: {{ $companion->companion_fname }}
            </div>
            <div>
                companion_lname: {{ $companion->companion_lname }}
            </div>
            <div>
                companion_date_of_birth: {{ $companion->companion_date_of_birth }}
            </div>
            <div>
                companion_gender: {{ $companion->companion_gender }}
            </div>
            <div>
                companion_place_of_birth: {{ $companion->companion_place_of_birth }}
            </div>
            <div>
                companion_country_of_residency: {{ $companion->companion_country_of_residency }}
            </div>
            <div>
                companion_place_of_issue: {{ $companion->companion_place_of_issue }}
            </div>
            <div>
                companion_passport_no: {{ $companion->companion_passport_no }}
            </div>
            <div>
                companion_issue_date: {{ $companion->companion_issue_date }}
            </div>
            <div>
                companion_expiry_date: {{ $companion->companion_expiry_date }}
            </div>
            <div>
                companion_arrival_date: {{ $companion->companion_arrival_date }}
            </div>
            @if($companion->companion_profession)
            <div>
                companion_profession: {{ $companion->companion_profession }}
            </div>
            @endif
            @if($companion->companion_organization)
            <div>
                companion_organization: {{ $companion->companion_organization }}
            </div>
            @endif
            <div>
                companion_visa_duration: {{ $companion->companion_visa_duration }}
            </div>
            <div>
                companion_visa_status: {{ $companion->companion_visa_status }}
            </div> 
            <div>
                companion_visa_duration: {{ $companion->companion_visa_duration }}
            </div> 
            <div>
                companion with: {{ $companion->guest->fname }} {{ $companion->guest->lname }}
            </div>   
        </div>
    </div>
@endsection
