var application_name = "";
var user_nr = 0;

function add_new_user() {
    user_nr++;
    $("#users").append("<div>User " + user_nr + " Name: <input id='name" + user_nr + "'> Age: <input id='age" + user_nr + "'></div>");

}

function add_to_database() {
    //preparing data to send
    var data = [];
    for (i = 1; i <= user_nr; i++) {

        var name = $("#name" + i).val();
        var age = Number($("#age" + i).val());

        data.push([name, age]);
    }



    //sending data

    $.post("/" + application_name + "users/add", {"users" : data})
        .done(function (response) {
            if(JSON.parse(response)["status"] == "ok"){
                alert("Data saved");
            };
        });


    $("#users").empty();
    $("#first_user").empty();

    user_nr = 0;
}

function show_first_user()  {
    var user;

    $.get("/" + application_name + "users/first")
        .done(function (response) {
            response = JSON.parse(response);
            if(response["status"] == "ok"){
                user = response["user"];
            };
        });

    $("#users").empty();
    $("#first_user").empty();
    $("#first_user").append('<h3>First User</h3> Name: ' + user['name'] + '<br>Age: ' + user['age']);
}