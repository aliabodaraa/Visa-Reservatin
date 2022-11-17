<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Educational Platform</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    

    




    <style>
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}






#regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
}

h1 {
    text-align: center;
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
}


/* Mark input boxes that gets an error on validation: */

input.invalid {
    background-color: #ffdddd;
}


/* Hide all steps by default: */

.tab {
    display: none;
}

button {
    background-color: #04AA6D;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
}


/* Make circles that indicate the steps of the form: */

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}


/* Mark the steps that are finished and valid: */

.step.finish {
    background-color: #04AA6D;
}


/* country select */

.md-country-picker-item {
    position: relative;
    line-height: 20px;
    padding: 10px 0 10px 40px;
}

.md-country-picker-flag {
    position: absolute;
    left: 0;
    height: 20px;
}

.mbsc-scroller-wheel-item-2d .md-country-picker-item {
    transform: scale(1.1);
}


/* remove the number for countries */

.iti__selected-dial-code {
    display: none;
}


/* color card in companion_card */

#companion_collapse>.companion_card {
    background-color: #f3f3f3;
}


/* message for fields */

.error {
    border: 2px solid #c8a3a3;
    background-color: #ffdddd;
}

.success {
    border: 2px solid rgb(27, 162, 99);
    background-color: rgb(73, 239, 161);
}
    </style>


    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>
<body>

    @include('layouts.partials.navbar')

    <main class="container mt-5">
        @yield('content')
    </main>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"> </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    @section("scripts")
    

    <script>
      var ctx1 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
      gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
      new Chart(ctx1, {
          type: "line",
          data: {
              labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
              datasets: [{
                  label: "Mobile apps",
                  tension: 0.4,
                  borderWidth: 0,
                  pointRadius: 0,
                  borderColor: "#fb6340",
                  backgroundColor: gradientStroke1,
                  borderWidth: 3,
                  fill: true,
                  data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                  maxBarThickness: 6

              }],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      display: false,
                  }
              },
              interaction: {
                  intersect: false,
                  mode: 'index',
              },
              scales: {
                  y: {
                      grid: {
                          drawBorder: false,
                          display: true,
                          drawOnChartArea: true,
                          drawTicks: false,
                          borderDash: [5, 5]
                      },
                      ticks: {
                          display: true,
                          padding: 10,
                          color: '#fbfbfb',
                          font: {
                              size: 11,
                              family: "Open Sans",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
                  x: {
                      grid: {
                          drawBorder: false,
                          display: false,
                          drawOnChartArea: false,
                          drawTicks: false,
                          borderDash: [5, 5]
                      },
                      ticks: {
                          display: true,
                          color: '#ccc',
                          padding: 20,
                          font: {
                              size: 11,
                              family: "Open Sans",
                              style: 'normal',
                              lineHeight: 2
                          },
                      }
                  },
              },
          },
      });
  </script>
  {{-- the previous sourses get all countries wappered in select then you can access them  via window.intlTelInput(element,..) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>

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
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        var iti1 = window.intlTelInputGlobals.getInstance(country_of_residency);
    
        let i=0;
        const timer=setInterval(()=>{
        ++i;
        country_of_residency_value.setAttribute('value', iti1.getSelectedCountryData().name);
        },100);
    
        //place_of_birth
        var place_of_birth = document.querySelector("#place_of_birth");
        var place_of_birth_value = document.querySelector("#place_of_birth_value");
        window.intlTelInput(place_of_birth, {
            // any initialisation options go here
            // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        var iti2 = window.intlTelInputGlobals.getInstance(place_of_birth);
    
        i=0;
        setInterval(()=>{
        ++i;
        place_of_birth_value.setAttribute('value', iti2.getSelectedCountryData().name);
        },100);
    
        //place_of_issue
        var place_of_issue = document.querySelector("#place_of_issue");
        var place_of_issue_value = document.querySelector("#place_of_issue_value");
        window.intlTelInput(place_of_issue, {
            // any initialisation options go here
            // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        var iti3 = window.intlTelInputGlobals.getInstance(place_of_issue);
    
        i=0;
        setInterval(()=>{
        ++i;
        place_of_issue_value.setAttribute('value', iti3.getSelectedCountryData().name);
        },100);
    
    
    
        //companion country
        //country_of_residency
        var companion_country_of_residency = document.querySelector("#companion_country_of_residency");
        var companion_country_of_residency_value = document.querySelector("#companion_country_of_residency_value");
        window.intlTelInput(companion_country_of_residency, {
            // any initialisation options go here
            // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        var iti4 = window.intlTelInputGlobals.getInstance(companion_country_of_residency);
    
        i=0;
        setInterval(()=>{
        ++i;
        companion_country_of_residency_value.setAttribute('value', iti4.getSelectedCountryData().name);
        },100);
    
        //companion_place_of_birth
        var companion_place_of_birth = document.querySelector("#companion_place_of_birth");
        var companion_place_of_birth_value = document.querySelector("#companion_place_of_birth_value");

        window.intlTelInput(companion_place_of_birth, {
            // any initialisation options go here
            // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        var iti5 = window.intlTelInputGlobals.getInstance(companion_place_of_birth);
    
        i=0;
        setInterval(()=>{
        ++i;
        companion_place_of_birth_value.setAttribute('value', iti5.getSelectedCountryData().name);
        },100);
    
        //place_of_issue
        var companion_place_of_issue = document.querySelector("#companion_place_of_issue");
        var companion_place_of_issue_value = document.querySelector("#companion_place_of_issue_value");

        window.intlTelInput(companion_place_of_issue, {
            // any initialisation options go here
            // utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
            separateDialCode: true,
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        var iti6 = window.intlTelInputGlobals.getInstance(companion_place_of_issue);
    
        i=0;
        setInterval(()=>{
        ++i;
        companion_place_of_issue_value.setAttribute('value', iti6.getSelectedCountryData().name);
        },100);
        //companion_country
    //countries
    </script>



<script>

  // -   Passport No and companion_passport_no should have at least 6 character and contains English chars and numbers

    //onkey passport_no
  const passport_no  = document.getElementById('passport_no');
  let pattern_passport_no =/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){6,}$/; //^[a-zA-Z0-9]{6,}$/
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
  const OTP_Verification_Number  = document.getElementById('OTP_Verification_Number');
  let pattern_OTP_Verification_Number =/^[0-9]{4}$/; //^[a-zA-Z0-9]{6,}$/
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
  const companion_passport_no  = document.getElementById('companion_passport_no');
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
  
</script>

{{-- //Collapse --}}
<script>
  $(document).ready(function(){
      var k=0;
          setInterval(()=>{
              ++k;
              if($("#companion_collapse").hasClass("show")){
                  is_exist_companion.setAttribute('value',1);
              }else{
                  is_exist_companion.setAttribute('value',0);
              }
          },100);
  //collapse sectio
      //collapse yes_btn btn
      $("#yes_btn").click(function(){
          $("#companion_collapse").collapse("toggle");
          //this.setAttribute("disabled", true);
      });
      $("#no_btn").click(function(){
          if($("#companion_collapse").hasClass("show"))
              $("#companion_collapse").collapse("toggle");
      });
      //collapse yes_btn btn
      $("#extra_night_btn").click(function(){
          $("#companion_collapse_for_extra_night_btn").collapse("toggle");
          //this.setAttribute("disabled", true);
      });
      //restrict some fileds to start own date from today
      min_date_choose=()=>{
          today=new Date(),
          //today=today.toDateString(),
          month = '' + (today.getMonth() + 1),
          day = '' + today.getDate(),
          year = today.getFullYear();
          
          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;
        $('.date_picker_start_from_today').attr('min',[year, month, day].join('-'));
      }
      //restrict some fileds to start own date from before today
      max_date_choose=()=>{
          today=new Date(),
          //today=today.toDateString(),
          month = '' + (today.getMonth() + 1),
          day = '' + today.getDate(),
          year = today.getFullYear();
          
          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;
        $('.date_picker_start_from_before_today').attr('max',[year, month, day].join('-'));
      }
      //restrict some fileds to start from_specific_date_to_five_days_after
      date_picker_start_from_specific_date_to_five_days_after=()=>{
        let specific_date_start=new Date($(".check_in_date").val());
          month_start = '' + (specific_date_start.getMonth() + 1),
          day_start = '' + specific_date_start.getDate(),
          year_start = specific_date_start.getFullYear();
          if (month_start.length < 2) 
              month_start = '0' + month_start;
          if (day_start.length < 2) 
              day_start = '0' + day_start;
          let xx=5 * 60 * 60 * 24 * 1000;
         let specific_date_end=new Date((new Date($(".check_in_date").val()).getTime())+xx);
          month_end = '' + (specific_date_end.getMonth() + 1),
          day_end = '' + specific_date_end.getDate(),
          year_end = specific_date_end.getFullYear();
          if (month_end.length < 2) 
              month_end = '0' + month_end;
          if (day_end.length < 2) 
              day_end = '0' + day_end;

        $('.check_out_date').attr('min',[year_start, month_start, day_start].join('-'));
        $('.check_out_date').attr('max',[year_end, month_end, day_end].join('-'));
      }

      //calculate the difference between selected date with start_date
      var diff_msecounds=new Date($(".check_out_date").val()).getTime()-new Date($(".check_in_date").val()).getTime();
      var total_days_diff = Math.ceil(diff_msecounds / (1000 * 3600 * 24));
      console.log(diff_msecounds,total_days_diff);
      var k=0;
          setInterval(()=>{
              ++k;
              //lock check_out_date while check_in_date hasn't selected yet
              if($('.check_in_date').val())
                  $('.check_out_date').attr("disabled",false);
              else
                  $('.check_out_date').attr("disabled",true);

              diff_msecounds=new Date($(".check_out_date").val()).getTime()-new Date($(".check_in_date").val()).getTime();
              total_days_diff = Math.ceil(diff_msecounds / (1000 * 3600 * 24));
              if(total_days_diff)
                  $("#num_of_day").text("You made a reservation for "+total_days_diff+" Days");
              console.log(diff_msecounds,total_days_diff);
              if(total_days_diff == 5){
                  $("#extra_night_btn").attr("disabled", false);
              }else{
                  $("#extra_night_btn").attr("disabled", true);
              }
          },100);
  });
</script>
<script>

  $(function () {
  var inst = $('#demo-country-picker').mobiscroll().select({
      display: 'anchored',
      filter: true,
      itemHeight: 40,
      renderItem: function (item) {
          return '<div class="md-country-picker-item">' +
              '<img class="md-country-picker-flag" src="https://img.mobiscroll.com/demos/flags/' + item.data.value + '.png" />' +
              item.display + '</div>';
      }
  }).mobiscroll('getInst');

  $.getJSON('https://trial.mobiscroll.com/content/countries.json', function (resp) {
      var countries = [];
      for (var i = 0; i < resp.length; ++i) {
          var country = resp[i];
          countries.push({ text: country.text, value: country.value });
      }
      inst.setOptions({ data: countries });
  });
  });
</script>

<script>
  //form
      //form
      var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
      } else {
          document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
          document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
  }

  function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
          // ... the form gets submitted:
          document.getElementById("regForm").submit();
          return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
  }

  function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
          // If a field is empty...
          if (y[i].value == "" && y[i].required) {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false
              valid = false;
          }
          //stop move in slide form when length of OTP_Verification_Number not equal 4
          var feedback_OTP_Verification_Number=document.querySelector("#feedback_OTP_Verification_Number");
          if(OTP_Verification_Number.value.length!=4){
              valid = false;
              feedback_OTP_Verification_Number.style.color="red";
              feedback_OTP_Verification_Number.innerHTML="OTP_Verification_Number length must 4 characters";
          }else{
            feedback_OTP_Verification_Number.innerHTML="";
          }
          //stop move in slide form when length of passport_no not equal 6 mix chars and number at leat 6
          var passport_no=document.querySelector("#passport_no");
          var feedback_passport_no=document.querySelector("#feedback_passport_no");
          if(passport_no.value.length<6 && currentTab==1){
              valid = false;
              feedback_passport_no.style.color="red";
              feedback_passport_no.innerHTML="passport_no length must 6 mix characters and numbers";
          }else{
            feedback_passport_no.innerHTML="";
          }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
  }

  function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
  }
</script>
    @show
  </body>
</html>
