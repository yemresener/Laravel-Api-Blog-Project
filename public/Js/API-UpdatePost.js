document.addEventListener("DOMContentLoaded", async () => {
    const postId = window.location.pathname.split('/').pop();
    try {
        const token = localStorage.getItem('auth_token');
        if (!token) {
            console.error("Bearer token bulunamadı! Lütfen giriş yaptığınızdan emin olun.");
            return;
        }

        const response = await fetch(`http://127.0.0.1:8000/api/update/${postId}`, {
            method: "GET",
            headers: {
                'Authorization': `Bearer ${token}`, 
                'Content-Type': 'application/json',
            },
        });

        if (!response.ok) {
            throw new Error("Post verisi alınamadı");
        }

        const postData = await response.json();
        console.log(postData);

        document.getElementById("main_title").value = postData.post.post_title || "";
        document.getElementById("main_article").value = postData.post.post_article || "";
        document.getElementById("low_title1").value = postData.post.post_title2 || "";
        document.getElementById("low_article1").value = postData.post.post_article2 || "";
        document.getElementById("low_title2").value = postData.post.post_title2 || ""; 
        document.getElementById("low_article2").value = postData.post.post_article2 || ""; 

        document.getElementById("confirm").value = postData.post.confirm || "0"; 
        document.getElementById("category_id").value = postData.post.category_id || "0"; 


        if (postData.post.post_image) {
            const imagePreviewContainer = document.getElementById("imagePreviewContainer");
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.src = `http://127.0.0.1:8000/storage/${postData.post.post_image}`; 
            imagePreviewContainer.style.display = "block"; 
        }
    } catch (error) {
        console.error("Hata:", error);
        document.getElementById("message").textContent = "Veri yüklenirken bir hata oluştu.";
        document.getElementById("message").style.color = "red";
    }
});




//Submit edildikten sonrası







const addPostForm = document.getElementById("createPost");

addPostForm.addEventListener("submit", async (event) => {
    event.preventDefault(); 

    const postId = window.location.pathname.split('/').pop(); 
    const token = localStorage.getItem('auth_token'); 

    if (!token) {
        console.error("Bearer token bulunamadı! Lütfen giriş yaptığınızdan emin olun.");
        return;
    }

    const formData = {
        post_title: document.getElementById("main_title").value,
        post_article: document.getElementById("main_article").value,
        low_title1: document.getElementById("low_title1")?.value || null,
        low_article1: document.getElementById("low_article1")?.value || null,
        low_title2: document.getElementById("low_title2")?.value || null,
        low_article2: document.getElementById("low_article2")?.value || null,
        confirm: document.getElementById("confirm").value,
        category_id: document.getElementById("category_id").value,
    };

    const homeImage = document.getElementById("home_image").files[0];
    if (homeImage) {
        console.log("Dosya seçildi:", homeImage);
    }

    if (!formData.post_title) {
        console.error("Post başlığı boş olamaz!");
        return;
    }

    try {
        
        const response = await fetch(`http://127.0.0.1:8000/api/update/${postId}`, {
            method: "PUT",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                'Authorization': `Bearer ${token}`,
            },
            body: JSON.stringify(formData), 
        });

        if (!response.ok) {
            const responseData = await response.json();
            console.error("API Hatası: ", responseData);
            throw new Error("Post verisi güncellenemedi.");
        }

        const responseData = await response.json();
        console.log(responseData);

       
        document.getElementById("message").textContent = responseData.message;
        document.getElementById("message").style.color = "green"; 
        setTimeout(() => {
            window.location.href = "/unconfirm"; 
        }, 2000);
    } catch (error) {
        console.error("Hata:", error);
        document.getElementById("message").textContent = "Veri güncellenirken bir hata oluştu.";
        document.getElementById("message").style.color = "red";
    }
});



function showModal(message, color = "black") {
    document.getElementById("modalMessage").textContent = message; // Set the custom message
    document.getElementById("modalMessage").style.color = color; // Set the text color
    document.getElementById("popupModal").style.display = "block"; // Display the modal
}

function closeModal() {
    document.getElementById("popupModal").style.display = "none"; // Hide the modal
}

const deletePost = document.getElementById("deletePost");

deletePost.addEventListener("submit", async (event) => {
    event.preventDefault(); 

    const postId = window.location.pathname.split('/').pop(); 
    const token = localStorage.getItem('auth_token'); 

    if (!token) {
        console.error("Bearer token bulunamadı! Lütfen giriş yaptığınızdan emin olun.");
        showModal("Bearer token bulunamadı! Lütfen giriş yaptığınızdan emin olun.", "red");
        return;
    }

    // form datayı manuel yaptık
    const formData = {
        post_title: document.getElementById("main_title").value,
        post_article: document.getElementById("main_article").value,
        low_title1: document.getElementById("low_title1")?.value || null,
        low_article1: document.getElementById("low_article1")?.value || null,
        low_title2: document.getElementById("low_title2")?.value || null,
        low_article2: document.getElementById("low_article2")?.value || null,
        confirm: document.getElementById("confirm").value,
        category_id: document.getElementById("category_id").value,
    };

    const homeImage = document.getElementById("home_image").files[0];
    if (homeImage) {
        console.log("Dosya seçildi:", homeImage);
    }

    if (!formData.post_title) {
        console.error("Post başlığı boş olamaz!");
        showModal("Post başlığı boş olamaz!", "red");
        return;
    }

    try {
        
        const response = await fetch(`http://127.0.0.1:8000/api/delete/${postId}`, {
            method: "DELETE",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                'Authorization': `Bearer ${token}`,
            },
            body: JSON.stringify(formData), 
        });

        if (!response.ok) {
            const responseData = await response.json();
            console.error("API Hatası: ", responseData);
            showModal(responseData.message || "Post verisi silinemedi.", "red");
            throw new Error("Post verisi Silinemedi.");
        }

        const responseData = await response.json();
        console.log(responseData);

        showModal(responseData.message, "green");
        setTimeout(() => {
            window.location.href = "/unconfirm"; 
        }, 5000);
    } catch (error) {
        console.error("Hata:", error);
        showModal("Veri silinirken bir hata oluştu.", "red");
    }
});