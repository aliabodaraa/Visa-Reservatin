$(document).ready(function() {
    var k = 0;
    setInterval(() => {
        ++k;
        if ($("#companion_collapse").hasClass("show")) {
            is_exist_companion.setAttribute('value', 1);
        } else {
            is_exist_companion.setAttribute('value', 0);
        }
    }, 100);
    //collapse yes_btn btn
    $("#yes_btn").click(function() {
        $("#companion_collapse").collapse("toggle");
        //this.setAttribute("disabled", true);
    });
    $("#no_btn").click(function() {
        if ($("#companion_collapse").hasClass("show"))
            $("#companion_collapse").collapse("toggle");
    });
    //collapse yes_btn btn
    $("#extra_night_btn").click(function() {
        $("#companion_collapse_for_extra_night_btn").collapse("toggle");
        //this.setAttribute("disabled", true);
    });
    //restrict some fileds to start own date from today
    min_date_choose = () => {
            today = new Date(),
                //today=today.toDateString(),
                month = '' + (today.getMonth() + 1),
                day = '' + today.getDate(),
                year = today.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;
            $('.date_picker_start_from_today').attr('min', [year, month, day].join('-'));
        }
        //restrict some fileds to start own date from before today
    max_date_choose = () => {
            today = new Date(),
                //today=today.toDateString(),
                month = '' + (today.getMonth() + 1),
                day = '' + today.getDate(),
                year = today.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;
            $('.date_picker_start_from_before_today').attr('max', [year, month, day].join('-'));
        }
        //restrict some fileds to start from_specific_date_to_five_days_after
    date_picker_start_from_specific_date_to_five_days_after = () => {
        let specific_date_start = new Date($(".check_in_date").val());
        month_start = '' + (specific_date_start.getMonth() + 1),
            day_start = '' + specific_date_start.getDate(),
            year_start = specific_date_start.getFullYear();
        if (month_start.length < 2)
            month_start = '0' + month_start;
        if (day_start.length < 2)
            day_start = '0' + day_start;
        let xx = 5 * 60 * 60 * 24 * 1000;
        let specific_date_end = new Date((new Date($(".check_in_date").val()).getTime()) + xx);
        month_end = '' + (specific_date_end.getMonth() + 1),
            day_end = '' + specific_date_end.getDate(),
            year_end = specific_date_end.getFullYear();
        if (month_end.length < 2)
            month_end = '0' + month_end;
        if (day_end.length < 2)
            day_end = '0' + day_end;

        $('.check_out_date').attr('min', [year_start, month_start, day_start].join('-'));
        $('.check_out_date').attr('max', [year_end, month_end, day_end].join('-'));
    }

    //calculate the difference between selected date with start_date
    var diff_msecounds = new Date($(".check_out_date").val()).getTime() - new Date($(".check_in_date").val()).getTime();
    var total_days_diff = Math.ceil(diff_msecounds / (1000 * 3600 * 24));
    console.log(diff_msecounds, total_days_diff);
    var k = 0;
    setInterval(() => {
        ++k;
        //lock check_out_date while check_in_date hasn't selected yet
        if ($('.check_in_date').val())
            $('.check_out_date').attr("disabled", false);
        else
            $('.check_out_date').attr("disabled", true);

        diff_msecounds = new Date($(".check_out_date").val()).getTime() - new Date($(".check_in_date").val()).getTime();
        total_days_diff = Math.ceil(diff_msecounds / (1000 * 3600 * 24));
        if (total_days_diff)
            $("#num_of_day").text("You made a reservation for " + total_days_diff + " Days");
        console.log(diff_msecounds, total_days_diff);
        if (total_days_diff == 5) {
            $("#extra_night_btn").attr("disabled", false);
        } else {
            $("#extra_night_btn").attr("disabled", true);
        }
    }, 100);
});