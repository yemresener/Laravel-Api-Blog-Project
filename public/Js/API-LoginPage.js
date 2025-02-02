document.getElementById("login-form").addEventListener("submit", async function (e) {
    e.preventDefault(); 

    const username = document.getElementById("login-username").value;
    const password = document.getElementById("login-password").value; 
    const csrfToken = document.querySelector('input[name="_token"]').value; 

    try {
        // API login isteği
        const response = await fetch("http://127.0.0.1:8000/api/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json", 
                "Accept": "application/json", 
                "X-CSRF-TOKEN": csrfToken, 
            },
            body: JSON.stringify({ name: username, password: password }),
        });

        const result = await response.json(); // JSON yanıtı parse et
        const responseMessage = document.getElementById("login-response-message");

        if (response.ok) {
            responseMessage.style.color = "green";
            responseMessage.innerText = result.message || "Giriş başarılı.";

            localStorage.setItem("auth_token", result.token);

            const sessionResponse = await fetch("http://127.0.0.1:8000/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken, 
                },
                body: JSON.stringify({ name: username, password: password }),  
            });

            if (sessionResponse.ok) {
                setTimeout(() => {
                    window.location.href = "/home"; 
                }, 2000); 
            } else {
                alert("Web oturumu hatası!");
            }
        } else {
            responseMessage.style.color = "red";
            responseMessage.innerText = result.message || "Giriş başarısız.";
        }
    } catch (error) {
        console.error("Error:", error); 
        alert("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
});


document.getElementById("register-form").addEventListener("submit", async function (e) {
    e.preventDefault(); 

    const email = document.getElementById("register-email").value;
    const username = document.getElementById("register-username").value;
    const password = document.getElementById("register-password").value;


    const csrfToken = document.querySelector('input[name="_token"]').value; 

    try {
        const response = await fetch("http://127.0.0.1:8000/api/register", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": csrfToken, 
            },
            body: JSON.stringify({ name: username, password: password, email: email, }),
        });

        const result = await response.json();
        const responseMessage = document.getElementById("register-response-message");

        if (response.ok) {
            responseMessage.style.color = "green";
            responseMessage.innerText = result.message;

            localStorage.setItem("auth_token", result.token);

        } else {
            responseMessage.style.color = "red";
            responseMessage.innerText = result.message;
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Bir hata oluştu. Lütfen daha sonra tekrar deneyin.");
    }
});


