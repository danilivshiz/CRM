// AJAX function
function sendAJAX(type) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {


            // return the data to the client according to the type that was selected
            switch (type) {

                case 'select':
                    var data = JSON.parse(this.responseText);
                    for (let i = 0; i < data.length; i++) {
                        leadsArray.push(new leads(
                            data[i].id,
                            data[i].lead_name,
                            data[i].lead_phone,
                            data[i].product_id
                        ));
                    }
                    creaTable(data);
                    break;

                case 'selectProspects':
                    var data = JSON.parse(this.responseText);
                    for (let i = 0; i < data.length; i++) {
                        leadsArray.push(new Prospect(
                            data[i].id,
                            data[i].prospect_name,
                            data[i].prospect_phone,
                            data[i].lead_id
                        ));
                    }
                    creaTable(data);
                    break;


                case 'id':
                    var check = JSON.parse(this.responseText);
                    if (check != true) {
                        $("#id_error").html("this id doesn't exsist!");
                        $("#hide").addClass("hide")
                    } else {
                        $("#hide").removeClass("hide")
                    }
                    break;

                case 'create':
                    var returnFromServer = JSON.parse(this.responseText);
                    var r = returnFromServer == "true" ? 'Lead was created' : 'Error';
                    $("input").css("border", "solid 1px black");
                    $("#result").css({ "color": "black", "fontFamily": "Arial" });
                    $("#result").html(r);
                    break;

                case 'delete':
                    var check = this.responseText;
                    var r = check == "true" ? 'Lead was deleted' : 'Error';
                    break;

                case 'update':
                    var returnFromServer = JSON.parse(this.responseText);
                    var r = returnFromServer == 'true' ? 'Lead was updated' : 'Error';
                    $("input").css("border", "solid 1px black");
                    $("#result").css({ "color": "black", "fontFamily": "Arial" });
                    $("#result").html(r);
                    break;

                case 'getProducts':
                    $("#product_id").html(JSON.parse(this.responseText));
                    break;

                default:
                    $("#result").html("error");


            }
        }

    }


    var param =
        "../../server/API.php?" +
        "q=" + type +
        "&name=" + name +
        "&id=" + id +
        "&phone=" + phone +
        "&product_id=" + product_id;

    xhttp.open("GET", param, true);
    // xhttp.open("GET", "../server/API.php", true);
    xhttp.send();
}