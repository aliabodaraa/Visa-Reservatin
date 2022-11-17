@extends('layouts.app-master')

@section('content')
    
<h1>Welcome  {{  $email }}  !!</h1>
        
        <form id="regForm" method="POST" action="{{ route("visa.store_visa_data") }}">
            @csrf
            <input type="email" name="email" value="{{ $email }}" hidden />
            <input type="number" name="id" value="{{ $id }}" hidden />
            <h1>Register:</h1>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                country code and Enter your number:
                <p><input type="number" id="phone" class="form-group" name="phone" required style="width: 743px"/></p>
                OTP Verification Number :
              <p><input class="form-group" placeholder="OTP Verification Number..." type="number" id="OTP_Verification_Number" name="OTP_Verification_Number :" required>
                <span id="feedback_OTP_Verification_Number"></span>
            </p>
            </div>
            <div class="tab">
                {{-- second tab --}}
                Name :
                <p><input placeholder="First name..." name="fname" required style="margin-bottom: 2px">
                    <input placeholder="Last name..." name="lname" required></p>

                Date of birth :
                <p><input class="date_picker_start_from_before_today" onclick="max_date_choose()" placeholder="MM/DD/YYYY" name="date_of_birth" type="date" required/></p>
                Gender Info :
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Male" name="gender" id="Male" checked>
                    <label class="form-check-label" for="Male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Female" name="gender" id="Male">
                    <label class="form-check-label" for="Female">
                        Female
                    </label>
                </div>
                <br>
                <p>
                Place of birth :<br>
                <select id="place_of_birth" placeholder="Please Place of birth..." style="display: contents;" name="place_of_birth" value="">
                    <option id="place_of_birth_value" value=""></option>
                </select>
                </p>
                <p>
                Country of Residency :<br>
                <select  id="country_of_residency" placeholder="Please Country of Residency..." style="display: contents;" name="country_of_residency">
                    <option id="country_of_residency_value" value=""></option>
                </select>
                </p>

                Passport No :
                <p>
                    <input placeholder="Passport No..." type="text" name="passport_no" id="passport_no" required>
                    <span id="feedback_passport_no"></span>
                    {{-- <span class="feedback_passport_no">The passport_no is incorrect</span> --}}
                </p>
            	Issue date :
                <p><input class="date_picker_start_from_before_today" onclick="max_date_choose()" placeholder="MM/DD/YYYY" type="date" name="issue_date" required/></p>
                Expiry date :
                <p><input class="date_picker_start_from_today" onclick="min_date_choose()" placeholder="MM/DD/YYYY" type="date" name="expiry_date" required></p>
                Place of issue:
                <p><select id="place_of_issue" placeholder="Please Place of issue..." style="display: contents;" name="place_of_issue" value="">
                    <option id="place_of_issue_value" value=""></option>
                </select></p>
                Arrival date :
                <p><input class="date_picker_start_from_today" onclick="min_date_choose()" placeholder="MM/DD/YYYY" type="date" name="arrival_date" required></p>
                Profession :
                <p><input placeholder="Profession..." type="text" name="profession" ></p>
                Organization  :
                <p><input placeholder="Organization..." type="text" name="organization"></p>
                Visa duration :
                <br>
                <p>
                    <select name="visa_duration" class="form-select">
                        @for($i=1; $i<100; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </p>
                Visa status  :
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="single" name="visa_status" id="visa_status_single" checked>
                    <label class="form-check-label" for="single">
                        single
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="multiple" name="visa_status" id="visa_status_multiple">
                    <label class="form-check-label" for="multiple">
                        multiple
                    </label>
                </div>
                <br>
                Please upload require documents for VISA requirement :
                select Passport picture  :
                <input
                type="file"
                name="passport_picture"
                id="img1"
                class="form-control @error('passport_picture') is-invalid @enderror" required>
                <br>
                select your Personal picture :
                <input
                type="file"
                name="personal_picture"
                id="img2"
                class="form-control @error('personal_picture') is-invalid @enderror" required>
                <input
                type="number"
                name="is_exist_companion"
                id="is_exist_companion"
                class="form-control" value="0" hidden>

                {{-- Collapse --}}
                Are you Traveling with companion  ??
                <div class="m-1">
                    <!-- Trigger Button HTML -->
                    <button type="button" class="btn btn-danger mb-4" id="no_btn">no</button>
                    <button type="button" class="btn btn-dark mb-4" id="yes_btn">yes</button>
                
                    <!-- Collapsible Element HTML -->
                    <div class="collapse" id="companion_collapse">
                        <div class="card card-body companion_card">
                            {{--Companion_fields--}}
                            companion Name:
                            <p><input placeholder="companion First name..." name="companion_fname"></p>
                            <p><input placeholder="companion Last name..." name="companion_lname"></p>
            
                            companion Date of birth   : 
                            <p><input class="date_picker_start_from_before_today" onclick="max_date_choose()" placeholder="MM/DD/YYYY" name="companion_date_of_birth" type="date"/></p>
                            companion Gender Info:
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Male" name="companion_gender" id="Male" >
                                <label class="form-check-label" for="Male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Female" name="companion_gender" id="Male">
                                <label class="form-check-label" for="Female">
                                    Female
                                </label>
                            </div>
                            companion Place of birth
                            <p><select id="companion_place_of_birth" style="display: contents;" name="companion_place_of_birth" value="">
                                <option id="companion_place_of_birth_value" value=""></option>
                            
                            </select></p>
                            companion Country of Residency
                            <p><select id="companion_country_of_residency" style="display: contents;" name="companion_country_of_residency" value="">
                                <option id="companion_country_of_residency_value" value=""></option>
                            </select></p>
                            companion Passport No– احرف وأرقام انجليزي فقط-لايقل عن 6 خانا :
                            <p>
                                <input placeholder="First name..." type="text" name="companion_passport_no" id="companion_passport_no">
                                {{-- <span class="feedback_companion_passport_no">The passport_no is incorrect</span> --}}
                            </p>
                            companion Issue date لايمكن اختيارتاريخ مستقبلي:
                            <p><input class="date_picker_start_from_before_today" onclick="max_date_choose()" placeholder="MM/DD/YYYY" type="date" name="companion_issue_date"/></p>
                            companion Expiry dateلايمكن اختيارتاريخ مستقبلي:
                            <p><input class="date_picker_start_from_today" onclick="min_date_choose()" placeholder="Please Arrival date..."  type="date" name="companion_expiry_date"></p>
                            companion Place of issue:
                            <p><select id="companion_place_of_issue" placeholder="Please Place of issue..." style="display: contents;" name="companion_place_of_issue" value="">
                                <option id="companion_place_of_issue_value" value=""></option>
                            </select></p>
                            companion Arrival date : لايمكن اختيارتاريخ مضى
                            <p><input class="date_picker_start_from_today" onclick="min_date_choose()" placeholder="MM/DD/YYYY" type="date" name="companion_arrival_date"></p>
                            companion Profession :
                            <p><input placeholder="companion Profession..." type="text" name="companion_profession"></p>
                            companion Organization  :
                            <p><input placeholder="companion Organization..." type="text" name="companion_organization"></p>
                            Visa duration :
                            <br>
                            <select name="companion_visa_duration" class="form-select">
                                @for($i=1; $i<100; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <br>
                            companion_Visa status  :
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="single" name="companion_visa_status" id="companion_visa_status_single" >
                                <label class="form-check-label" for="single">
                                    single
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="multiple" name="companion_visa_status" id="companion_visa_status_multiple">
                                <label class="form-check-label" for="multiple">
                                    multiple
                                </label>
                            </div>
                            <br>
                            Please upload require documents for VISA requirement :<br>
                            select companion Passport picture  :
                            <input
                            type="file"
                            name="companion_passport_picture"
                            id="img1"
                            class="form-control @error('passport_picture') is-invalid @enderror">
                            <br>
                            select your companion Personal picture :
                            <input
                            type="file"
                            name="companion_personal_picture"
                            id="img2"
                            class="form-control @error('personal_picture') is-invalid @enderror">

                            {{--Companion_fields--}}
                        </div>
                    </div>
                </div>
                 {{-- Collapse --}}
            {{-- second tab --}}
            </div>


            <div class="tab">
                Please choose your accommodation preference as you are eligible for (5-night)<br>
                Eligible stay (5-nigh)<br>
                Check-in date :
                <p><input class="date_picker_start_from_today check_in_date" onclick="min_date_choose()" placeholder="MM/DD/YYYY" type="date" name="check_in_date" required/></p>
                Check-out date :
                <p><input class="check_out_date" onclick="date_picker_start_from_specific_date_to_five_days_after()" placeholder="MM/DD/YYYY" type="date"  name="check_out_date" required/></p>
                Rom type
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="king_bed" name="rom_type" id="rom_type_king_bed" checked>
                    <label class="form-check-label" for="king_bed">
                        king bed 
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="twin_bed" name="rom_type" id="rom_type_twin_bed">
                    <label class="form-check-label" for="twin_bed">
                        twin bed
                    </label>
                </div>
                <br>
                <hr>
                <span><b>Note : </b> you can't reserve an extra day, while you have'nt reserved for 5 days exactly</span>
                <p id="num_of_day"></p>
                <button type="button" class="btn btn-warning mb-4" id="extra_night_btn">Request An Extra Night</button>

                <div class="collapse" id="companion_collapse_for_extra_night_btn">
                    <div class="card card-body">
                        Rom Extra type :
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="king_bed" name="rom_extra_type" id="rom_type_extra_king_bed">
                            <label class="form-check-label" for="king_bed">
                                king bed 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="twin_bed" name="rom_extra_type" id="rom_type_extra_twin_bed">
                            <label class="form-check-label" for="twin_bed">
                                twin bed
                            </label>
                        </div>
                        <br><br>
                    </div>
                </div>

            </div>
            <div class="tab">
                <hr>
                <h6>You can back track to the previous steps and edit your data , else you can move onto the forward via click submit button</h6>
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                <hr>
              {{-- <p><input placeholder="Username..." name="uname"></p>
              <p><input placeholder="Password..." name="pword" type="password"></p> --}}
            </div>
            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
              </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>
        </form>
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
@endsection
