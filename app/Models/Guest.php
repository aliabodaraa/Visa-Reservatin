<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable=['email','fname','lname','is_registant'  ,'date_of_birth','gender','passport_no','phone',
    'issue_date','expiry_date','arrival_date','profession','organization',
    'visa_duration','visa_status','passport_picture','personal_picture',
    'place_of_birth','country_of_residency','place_of_issue','check_in_date',
    'check_out_date','rom_type','rom_extra_type'];
    public function companion(){
        return $this->hasOne(Companion::class);
    }
}
