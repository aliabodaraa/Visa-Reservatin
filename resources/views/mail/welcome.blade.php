@component('mail::message')
    <h2>Hi {{ $data['email'] }}</h2>
    <p style="text-align:center;">
        Welcome to RS4IT
    </p>
    We sending this email to you to complete your Saudi VIAS entry and travel requirement
    <p style="text-align:center;">
        Please click on link below
    </p>
    @component('mail::button',['url'=>route('guests.complete_visa_info',['id'=>$data['id'],'email'=>$data['email'],'first_name'=>$data['first_name'],'last_name'=>$data['last_name']])])
        123456789qwererewr.com
    @endcomponent
@endcomponent