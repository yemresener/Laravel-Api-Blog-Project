document.getElementById("logout-form").addEventListener("submit", async function (e) {
    e.preventDefault(); 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    try {
        // API logout isteği
        const apiResponse = await fetch("http://127.0.0.1:8000/api/logout", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                "Authorization": `Bearer ${localStorage.getItem("auth_token")}`,
            },
        });

        const apiResult = await apiResponse.json();

        if (apiResponse.ok) {
            const webResponse = await fetch("http://127.0.0.1:8000/logout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken, 
                },
            });

            if (webResponse.ok) {
                localStorage.removeItem("auth_token"); 
                window.location.href = "/login"; 
            } else {
                alert("Web oturumu sonlandırılamadı!");
            }
        } else {
            console.log("API logout başarısız:", apiResult);
            alert(apiResult.message || "API Logout işlemi başarısız oldu.");
        }
    } catch (error) {
        console.error("Logout Error:", error);
        alert("Bir hata oluştu. Lütfen tekrar deneyin.");
    }
});
