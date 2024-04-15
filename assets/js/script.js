var a = document.getElementById("loginBtn");
var b = document.getElementById("registerBtn");
var x = document.getElementById("login");
var y = document.getElementById("register");

function login(event) {
    event.preventDefault(); 

    var form = document.getElementById('loginForm');
    var formData = new FormData(form);

    localStorage.setItem('loginData', JSON.stringify(Object.fromEntries(formData)));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Success
            var response = xhr.responseText;
            alert(response); 
            window.location.href = 'index.php'; 
        } else {
            // Error
            alert('Error: ' + xhr.statusText);
        }
    };
    xhr.onerror = function () {
        // Network error
        alert('Network Error');
    };
    xhr.send(formData);
}

function register(event) {
    event.preventDefault(); 

    var form = document.getElementById('registrationForm');
    var formData = new FormData(form);

    localStorage.setItem('registrationData', JSON.stringify(Object.fromEntries(formData)));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Success
            var response = xhr.responseText;
            alert(response); 
            window.location.href = 'login.php'; 
        } else {
            // Error
            alert('Error: ' + xhr.statusText);
        }
    };
    xhr.onerror = function () {
        // Network error
        alert('Network Error');
    };
    xhr.send(formData);
}

// Perbaikan event listener untuk tombol Login
a.addEventListener("click", function() {
    window.location.href = "login.php";
});

// Perbaikan event listener untuk tombol Sign Up
b.addEventListener("click", function() {
    window.location.href = "regist.php";
});

registerLink.addEventListener("click", function(event) {
    event.preventDefault(); 
    window.location.href = "regist.php";
});

function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
}
