document.getElementById("show-login-password-btn").addEventListener("click", function() {
    const passwordField = document.getElementById("login-password");
    const icon = this.querySelector("i");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});

document.getElementById("show-register-password-btn").addEventListener("click", function() {
    const passwordField = document.getElementById("register-password");
    const icon = this.querySelector("i");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});


function showRegister() {
    document.getElementById('wrapper-login').style.display = 'none';
    document.getElementById('wrapper-register').style.display = 'flex';
}

function showLogin() {
    document.getElementById('wrapper-login').style.display = 'flex';
    document.getElementById('wrapper-register').style.display = 'none';
}

