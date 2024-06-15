function validateForm() {
    var name = document.forms["signupform"]["name"].value;
    var address = document.forms["signupform"]["address"].value;
    var phone = document.forms["signupform"]["phone"].value;
    var email = document.forms["signupform"]["email"].value;
    var password = document.forms["signupform"]["password"].value;
    var confirm_password = document.forms["signupform"]["confirm_password"].value;
    var gender = document.forms["signupform"]["gender"].value;

    // Check if name is filled
    if (name == "") {
        alert("Please enter your full name.");
        return false;
    }

    // Check if address is filled
    if (address == "") {
        alert("Please enter your address.");
        return false;
    }

    // Check if phone is filled and matches pattern
    var phonePattern = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
    if (phone == "" || !phonePattern.test(phone)) {
        alert("Please enter a valid phone number (format: 123-456-7890).");
        return false;
    }

    // Check if email is filled and matches email pattern
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == "" || !emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Check if password is filled and meets minimum length requirement
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // Check if confirm password matches password
    if (password != confirm_password) {
        alert("Passwords do not match.");
        return false;
    }

    // Check if gender is selected
    if (gender == "") {
        alert("Please select your gender.");
        return false;
    }

    // If all validations pass, return true to submit the form
    return true;
}