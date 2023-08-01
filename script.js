function validateForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const mobile = document.getElementById("mobile").value.trim();
    const address = document.getElementById("address").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (name === "") {
        alert("Please enter your name.");
        return false;
    }

    if (email === "") {
        alert("Please enter your email.");
        return false;
    }

    if (!isValidEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (mobile === "") {
        alert("Please enter your mobile number.");
        return false;
    }

    if (address === "") {
        alert("Please enter your address.");
        return false;
    }

    if (password === "") {
        alert("Please enter a password.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}

function isValidEmail(email) {
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return emailRegex.test(email);
}
