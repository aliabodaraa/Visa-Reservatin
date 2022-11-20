<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;
    protected $fillable=['companion_fname','companion_lname','companion_date_of_birth','companion_gender','companion_passport_no',
    'companion_issue_date','companion_expiry_date','companion_arrival_date','companion_profession','companion_organization',
    'companion_visa_duration','companion_visa_status','companion_passport_picture','companion_personal_picture',
    'companion_place_of_birth','companion_country_of_residency','companion_place_of_issue' ,'guest_id'];

    public function guest(){
        return $this->belongsTo(Guest::class);
    }
    // protected $appends = ['companion_passport_picture','companion_personal_picture'];
    // public function getCompanionPassportPictureAttribute()
    // {
    //     return '/images/passport-pictures/'.$this->companion_passport_picture;
    // }
    // public function getCompanionPersonalPictureAttribute()
    // {
    //     return '/images/personal-pictures/'.$this->companion_personal_picture;
    // }
}
