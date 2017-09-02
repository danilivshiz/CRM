var leadsArray = [];
var id;
var name;
var type;
var phone;
var product_id;
var Lead_id;

// function constructor for leads
function leads(id, lead_name, lead_phone, product_id) {
    this.id = id;
    this.lead_name = lead_name;
    this.lead_phone = lead_phone;
    this.product_id = product_id;
}

// function constructor for propects
function Prospect(id, prospect_name, prospect_phone, lead_id) {
    this.id = id;
    this.prospect_name = prospect_name;
    this.prospect_phone = prospect_phone;
    this.lead_id = lead_id;
}


// function to create a table with all data
function creaTable(data) {
    document.getElementById('result').innerHTML = "";
    var array = data;
    var tableBody = document.getElementById('result');
    var tr = document.createElement('TR');
    tr.setAttribute("id", 'th');
    tableBody.appendChild(tr);
    var keys = Object.keys(array[0]);
    for (i = 0; i < keys.length; i++) {
        var th = document.createElement('TH');
        th.appendChild(document.createTextNode(keys[i]));
        document.getElementById('th').appendChild(th);
    }


    for (i = 0; i < array.length; i++) {
        var tr = document.createElement('TR');
        tr.setAttribute("id", i);
        tableBody.appendChild(tr);

        for (var prop in array[i]) {
            var td = document.createElement('TD');
            td.appendChild(document.createTextNode(array[i][prop]));
            document.getElementById(i).appendChild(td);
        }
    }

}


// Send the id to the DB and check if it exsist
function checkId(check) {
    $("#id_error").html("");
    id = $("#id").val();
    sendAJAX(check);
}

// Gets the products from DB for select option
function getProducts(list) {
    sendAJAX(list);
}

// Gets values after validation and sends then to ajax
function getParam() {
    var buttonValue = $("#submit").val();
    id = $("#id").val();
    name = $("#name").val();
    phone = $("#phone").val();
    product_id = $("#select_id option:selected").val();
    Lead_id = $("#select_id option:selected").val();
    sendAJAX(buttonValue);
}