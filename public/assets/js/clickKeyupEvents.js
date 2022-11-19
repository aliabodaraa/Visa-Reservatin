$(document).ready(function() {

    // -   Passport No and companion_passport_no should have at least 6 character and contains English chars and numbers

    //onkey passport_no
    const passport_no = document.getElementById('passport_no');
    let pattern_passport_no = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){6,}$/; //^[a-zA-Z0-9]{6,}$/
    passport_no.addEventListener('keyup', (e) => {
        if (pattern_passport_no.test(e.target.value)) {
            passport_no.classList.remove('error')
            passport_no.classList.add('success');
        } else {
            passport_no.classList.remove('success')
            passport_no.classList.add('error');
            //document.querySelector('.feedback_passport_no').style.display = 'flow-root';
        }
        if (e.target.value == '') {
            passport_no.classList.remove('error')
        }
    });
    //onkey OTP_Verification_Number
    const OTP_Verification_Number = document.getElementById('OTP_Verification_Number');
    let pattern_OTP_Verification_Number = /^[0-9]{4}$/; //^[a-zA-Z0-9]{6,}$/
    OTP_Verification_Number.addEventListener('keyup', (e) => {
        if (pattern_OTP_Verification_Number.test(e.target.value)) {
            OTP_Verification_Number.classList.remove('error')
            OTP_Verification_Number.classList.add('success');
        } else {
            OTP_Verification_Number.classList.remove('success')
            OTP_Verification_Number.classList.add('error');
            //document.querySelector('.feedback_OTP_Verification_Number').style.display = 'flow-root';
        }
        if (e.target.value == '') {
            OTP_Verification_Number.classList.remove('error')
        }
    });
    const companion_passport_no = document.getElementById('companion_passport_no');
    let pattern_companion_passport_no = /^[a-zA-Z0-9]{6,}$/;
    companion_passport_no.addEventListener('keyup', (e) => {
        if (pattern_companion_passport_no.test(e.target.value)) {
            companion_passport_no.classList.remove('error')
            companion_passport_no.classList.add('success');
        } else {
            companion_passport_no.classList.remove('success')
            companion_passport_no.classList.add('error');
            //document.querySelector('.feedback_companion_passport_no').style.display = 'flow-root';
        }
        if (e.target.value == '') {
            companion_passport_no.classList.remove('error')
        }
    });

});