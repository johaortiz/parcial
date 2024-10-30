function jo_validateRegister() {
    var username = document.getElementById('jo_username').value;
    var email = document.getElementById('jo_email').value;
    var password = document.getElementById('jo_password').value;

    if (username === "" || email === "" || password === "") {
        alert("All fields are required");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long");
        return false;
    }

    return true;
}

function jo_validateLogin() {
    var email = document.getElementById('jo_email').value;
    var password = document.getElementById('jo_password').value;

    if (email === "" || password === "") {
        alert("All fields are required");
        return false;
    }

    return true;
}