//for country_of_residency , place_of_issue
//mobile
var inputphone = document.querySelector("#phone");
window.intlTelInput(inputphone, {});
//mobile
//countries
//country_of_residency
var country_of_residency = document.querySelector("#country_of_residency");
var country_of_residency_value = document.querySelector("#country_of_residency_value");
window.intlTelInput(country_of_residency, {
    // any initialisation options go here
    // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    separateDialCode: true,
    customPlaceholder: function(
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
var iti1 = window.intlTelInputGlobals.getInstance(country_of_residency);

let i = 0;
const timer = setInterval(() => {
    ++i;
    country_of_residency_value.setAttribute('value', iti1.getSelectedCountryData().name);
}, 100);

//place_of_birth
var place_of_birth = document.querySelector("#place_of_birth");
var place_of_birth_value = document.querySelector("#place_of_birth_value");
window.intlTelInput(place_of_birth, {
    // any initialisation options go here
    // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    separateDialCode: true,
    customPlaceholder: function(
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
var iti2 = window.intlTelInputGlobals.getInstance(place_of_birth);

i = 0;
setInterval(() => {
    ++i;
    place_of_birth_value.setAttribute('value', iti2.getSelectedCountryData().name);
}, 100);

//place_of_issue
var place_of_issue = document.querySelector("#place_of_issue");
var place_of_issue_value = document.querySelector("#place_of_issue_value");
window.intlTelInput(place_of_issue, {
    // any initialisation options go here
    // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    separateDialCode: true,
    customPlaceholder: function(
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
var iti3 = window.intlTelInputGlobals.getInstance(place_of_issue);

i = 0;
setInterval(() => {
    ++i;
    place_of_issue_value.setAttribute('value', iti3.getSelectedCountryData().name);
}, 100);



//companion country
//country_of_residency
var companion_country_of_residency = document.querySelector("#companion_country_of_residency");
var companion_country_of_residency_value = document.querySelector("#companion_country_of_residency_value");
window.intlTelInput(companion_country_of_residency, {
    // any initialisation options go here
    // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    separateDialCode: true,
    customPlaceholder: function(
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
var iti4 = window.intlTelInputGlobals.getInstance(companion_country_of_residency);

i = 0;
setInterval(() => {
    ++i;
    companion_country_of_residency_value.setAttribute('value', iti4.getSelectedCountryData().name);
}, 100);

//companion_place_of_birth
var companion_place_of_birth = document.querySelector("#companion_place_of_birth");
var companion_place_of_birth_value = document.querySelector("#companion_place_of_birth_value");

window.intlTelInput(companion_place_of_birth, {
    // any initialisation options go here
    // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    separateDialCode: true,
    customPlaceholder: function(
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
var iti5 = window.intlTelInputGlobals.getInstance(companion_place_of_birth);

i = 0;
setInterval(() => {
    ++i;
    companion_place_of_birth_value.setAttribute('value', iti5.getSelectedCountryData().name);
}, 100);

//place_of_issue
var companion_place_of_issue = document.querySelector("#companion_place_of_issue");
var companion_place_of_issue_value = document.querySelector("#companion_place_of_issue_value");

window.intlTelInput(companion_place_of_issue, {
    // any initialisation options go here
    // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    separateDialCode: true,
    customPlaceholder: function(
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
var iti6 = window.intlTelInputGlobals.getInstance(companion_place_of_issue);

i = 0;
setInterval(() => {
    ++i;
    companion_place_of_issue_value.setAttribute('value', iti6.getSelectedCountryData().name);
}, 100);
//companion_country
//countries