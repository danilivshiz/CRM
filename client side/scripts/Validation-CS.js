 $(document).ready(function() {
     var name;
     var id;
     var product_id;
     var phone;

     //gets the values from the html form
     $('#submit').click(function() {
         name = $('#name').val();
         id = $('#id').val();
         product_id = $('#product_id').val();
         phone = $('#phone').val();

         if ((ValidateName(name) == true) && (CheckPhone(phone) == true)) {

             getParam();
         }
     });


     // clears the error when user types a new value
     $("input").change(function() {
         $("#result").html("");

     });


     // Validation for name input
     function ValidateName(inputtxt) {
         var pattern = /[0-9a-zA-Z\s!?=+-.,']+$/m;
         if (NotEmpty(inputtxt) == false) {
             $("#result").html("Enter a name");
             $("#name").css("border", "solid 1px red");
             $("#result").css({ "color": "red", "fontFamily": "Arial" });
             return false;

         } else if (!pattern.test(inputtxt)) {
             $("#result").html("Use only A-Z or Digits");
             $("#name").css("border", "solid 1px red");
             $("#result").css({ "color": "red", "fontFamily": "Arial" });
             return false;

         } else {
             return true;
         }

     }


     //checks if not a number
     function CheckPhone(inputtxt) {
         var chell = /^\d{10}$/;
         var Phone = /^\d{9}$/;


         if (NotEmpty(inputtxt) == false) {
             $("#result").html("Enter a Phone");
             $("#phone").css("border", "solid 1px red");
             $("#result").css({ "color": "red", "fontFamily": "Arial" });
             return false;

         } else if ((chell.test(inputtxt)) || (Phone.test(inputtxt))) {
             return true;

         } else {
             $("#result").html("Phone must Contain 9 or 10 digits");
             $("#phone").css("border", "solid 1px red");
             $("#result").css({ "color": "red", "fontFamily": "Arial" });
             return false;

         }

     }



     // Check if input isn't empty
     function NotEmpty(inputtxt) {
         if (inputtxt == "" || inputtxt == "undefined") {
             return false;
         }
     }


 });