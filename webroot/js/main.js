var application_name = "";
var user_nr = 0;

function add_new_user() {
    $("#first_user").empty();
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

    $("#first_user").empty();

    $.get("http://cakeajax-cakeajax.a3c1.starter-us-west-1.openshiftapps.com/users/first")
        .done(function (response) {
            response = JSON.parse(response);
            if(response["status"] == "ok"){
                var user = response["user"];
                $("#first_user").append('<h3>First User</h3> Name: ' + user['name'] + '<br>Age: ' + user['age']);
            };
        });


}