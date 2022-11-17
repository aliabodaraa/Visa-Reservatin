<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $fillable=['fname','lname','date_of_birth','gender','passport_no','email','phone',
                            'issue_date','expiry_date','arrival_date','profession','organization',
                            'visa_duration','visa_status','passport_picture','personal_picture',
                            'place_of_birth','country_of_residency','place_of_issue',

                            'companion_fname','companion_lname','companion_date_of_birth','companion_gender','companion_passport_no',
                            'companion_issue_date','companion_expiry_date','companion_arrival_date','companion_profession','companion_organization',
                            'companion_visa_duration','companion_visa_status','companion_passport_picture','companion_personal_picture',
                            'companion_place_of_birth','companion_country_of_residency','companion_place_of_issue',

                            'check_in_date',
                            'check_out_date','rom_type','rom_extra_type'

                        ];



    protected $table='visa_info';

    
}
