function validateForm() {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;

    if (email === "") {
        alert("Please enter your email.");
        return false;
    }

    if (!isValidEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password === "") {
        alert("Please enter your password.");
        return false;
    }

    return true;
}

function isValidEmail(email) {
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex.test(email);
}
