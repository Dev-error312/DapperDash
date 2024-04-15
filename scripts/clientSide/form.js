function validateForm(formname) {

    // VALUES
    // Name
    if (document.forms[formname]["name"]) {
        var name = document.forms[formname]["name"].value;
    }

    // Email
    var email = document.forms[formname]["email"].value;

    // Password
    var password = document.forms[formname]["password"].value;
    if (document.forms[formname]["confirm_password"]) {
        var Cpassword = document.forms[formname]["confirm_password"].value;
    }
    // Phone
    if (document.forms[formname]["phone"]) {
        var phone = document.forms[formname]["phone"].value;
    }

    // Gender
    if (document.forms[formname]["gender"]) {
        var gender = document.forms[formname]["gender"].value;
    }

    // REGEX
    var nameRegex = /^[a-zA-Z ]+$/;
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phoneRegex = /^\d{10}$/;

    // Checking Names
    if (!nameRegex.test(name)) {
        alert("Invalid Name");
        return false;
    }

    // Checking Email
    if (!emailRegex.test(email)) {
        alert("Invalid Email Address");
        return false;
    }
    if (Cpassword != undefined && password != Cpassword) {
        alert("Passwords don't match");
        return false;
    }

    // Checking phone number
    if(phone != undefined){
        if (!phoneRegex.test(phone)) {
            alert("Invalid Phone number");
            return false;
        }
    }

    // Checking Gender
    if (gender == "") {
        alert("Select a gender.");
        return false;
    }

}