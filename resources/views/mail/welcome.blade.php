@component('mail::message')
    <h2>Hi {{ $email }}</h2>
    <p style="text-align:center;">
        Welcome to RS4IT
    </p>
    We sending this email to you to complete your Saudi VIAS entry and travel requirement
    <p style="text-align:center;">
        Please click on link below
    </p>
    @component('mail::button',['url'=>route('visa.create_visa_request',['email'=>$email,'id'=>$id])])
        123456789qwererewr.com 
    @endcomponent
@endcomponent