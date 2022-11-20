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

            <div style="overflow-x:auto;">
                <table id="companions_table" class="table table-warning">
                    <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="1%">companion fname</th>
                        <th scope="col" width="1%">companion lname</th>
                        <th scope="col" width="1%">companion gender</th>
                        <th scope="col" width="1%">companion place_of_birth</th>
                        <th scope="col" width="1%">companion country_of_residency</th>
                        <th scope="col" width="1%">companion place_of_issue</th>
                        <th scope="col" width="1%">companion passport_no</th>
                        <th scope="col" width="1%">companion issue_date</th>
                        <th scope="col" width="1%">companion expiry_date</th>
                        <th scope="col" width="1%">companion arrival_date</th>
                        <th scope="col" width="1%">companion profession</th>
                        <th scope="col" width="1%">companion organization</th>
                        <th scope="col" width="1%">companion visa_duration</th>
                        <th scope="col" width="1%">companion visa_status</th>
                        <th scope="col" width="1%">companion passport_picture</th>
                        <th scope="col" width="1%">companion personal_picture</th>
                    </tr>
                    </thead>
                    <tbody id="companion-list" name="companions-list">
                        <tr id="empty_companions" style="display:none;">
                            <td colspan="24" style="text-align: center;"><b style="color:red;">No companions</b></td></tr>
                                <tr class="companion" id="{{$companion->id}}">
                                    <th scope="row">{{ $companion->id }}</th>
                                    <td>{{ $companion->companion_fname? $companion->companion_fname:"NN" }}</td>
                                    <td>{{ $companion->companion_lname? $companion->companion_lname:"NN" }}</td>
                                    <td>{{ $companion->companion_gender? $companion->companion_gender:"NN" }}</td>
                                    <td>{{ $companion->companion_place_of_birth? $companion->companion_place_of_birth:"NN" }}</td>
                                    <td>{{ $companion->companion_country_of_residency? $companion->companion_country_of_residency:"NN" }}</td>
                                    <td>{{ $companion->companion_place_of_issue? $companion->companion_place_of_issue:"NN" }}</td>
                                    <td>{{ $companion->companion_passport_no? $companion->companion_passport_no:"NN" }}</td>
                                    <td>{{ $companion->companion_issue_date? $companion->companion_issue_date:"NN" }}</td>
                                    <td>{{ $companion->companion_expiry_date? $companion->companion_expiry_date:"NN" }}</td>
                                    <td>{{ $companion->companion_arrival_date? $companion->companion_arrival_date:"NN" }}</td>
                                    <td>{{ $companion->companion_profession? $companion->companion_profession:"NN" }}</td>
                                    <td>{{ $companion->companion_organization ? $companion->companion_organization:"NN" }}</td>
                                    <td>{{ $companion->companion_visa_duration? $companion->companion_visa_duration:"NN" }}</td>
                                    <td>{{ $companion->companion_visa_status? $companion->companion_visa_status:"NN" }}</td>
                                    <td><img src="{{ asset('/images/passport-pictures/'.$companion->companion_passport_picture) }}"/></td>
                                    <td><img src="{{ asset('/images/personal-pictures/'.$companion->companion_personal_picture) }}"/></td>
                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
