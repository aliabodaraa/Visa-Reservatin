// $(document).ready(function() {

//usersSearchFunction Filtering Start
usersSearchFunction = (x) => {
        let users = JSON.parse(x);
        $(".user").hide();
        jQuery.each(users, function(id) {
            if (users[id]["username"].toLowerCase().indexOf($('#search_user_name').val().toLowerCase()) > -1) {
                $("#" + users[id]["id"]).show();
            }
        });
        //show No users Message 
        let count = 0;
        jQuery.each($("#user-list").children(), function(child_id, child) {
            //$(this).clone().attr('rel', child_id).appendTo("table");
            if ($(this).hasClass("user") && $(this).css('display') != 'none') {
                count++;
            }
            if (count == 0)
                $("#empty_users").show();
            else
                $("#empty_users").hide();
        });
        // console.log("alii", $("#user-list").children().length);
        // console.log("count", count);
        //show No users Message 
    }
    //usersSearchFunction Filtering End


//guestsSearchFunction Filtering Start
guestsSearchFunction = (x) => {
        let guests = JSON.parse(x);
        $(".guest").hide();
        $("#empty_guests").hide();
        jQuery.each(guests, function(id) {
            if (guests[id]["fname"].toLowerCase().indexOf($('#search_guest_name').val().toLowerCase()) > -1 || guests[id]["lname"].indexOf($('#search_guest_name').val().toLowerCase()) > -1) {
                $("#empty_guests").hide();
                $("#" + guests[id]["id"]).show();
            } else
                $("#empty_guests").show();
        });
        //show No Guests Message 
        let count = 0;
        jQuery.each($("#guest-list").children(), function(child_id, child) {
            //$(this).clone().attr('rel', child_id).appendTo("table");
            if ($(this).hasClass("guest") && $(this).css('display') != 'none') {
                count++;
            }
            if (count == 0)
                $("#empty_guests").show();
            else
                $("#empty_guests").hide();
        });
        //show No Guests Message 
    }
    //guestsSearchFunction Filtering End

// });