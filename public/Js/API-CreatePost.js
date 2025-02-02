const addPostForm = document.getElementById("createPost");
const message = document.getElementById("message");

addPostForm.addEventListener("submit", async (event) => {
    event.preventDefault(); 

    const formData = new FormData(addPostForm);
    const token = localStorage.getItem("auth_token");

    try {
        const response = await fetch("http://127.0.0.1:8000/api/post123", {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                'Authorization': `Bearer ${token}`,
            },  
            body: formData, 
        });

        const data = await response.json();

        console.log('API Response:', data); 

        if (response.ok) {
            message.textContent = "Post ekleme isteği başarıyla gerçekleşti!";
            message.style.color = "green";
        } else {
            message.textContent = "Post ekleme işlemi başarısız oldu.";
            message.style.color = "red";
        }
    } catch (error) {
        console.log(error);

        message.textContent = "Bir hata oluştu.";
        message.style.color = "red";
    }

    addPostForm.reset(); 
});
