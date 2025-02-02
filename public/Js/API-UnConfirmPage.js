
async function fetchPosts(page = 1) {
    try {
        const token = localStorage.getItem('auth_token');
        if (!token) {
            console.error("Bearer token bulunamadı! Lütfen giriş yaptığınızdan emin olun.");
            return;
        }

        const response = await fetch(`http://127.0.0.1:8000/api/unconfirm?page=${page}`, {
            method: "GET",
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
            },
        });

        if (!response.ok) {
            throw new Error(`API isteği başarısız oldu! HTTP Durumu: ${response.status}`);
        }

        const data = await response.json();
        console.log("API'den dönen veri:", data);

        const NewestAndPopularContainer = document.getElementById("NewestAndPopularContainer");
        NewestAndPopularContainer.innerHTML = ""; 

        if (data.data && Array.isArray(data.data)) {
            data.data.forEach(post => {
                const imageUrl = `http://127.0.0.1:8000/storage/${post.post_image}`;
                NewestAndPopularContainer.innerHTML += `
                    <div class="Post">
                        <a href="#" class="postLink" data-id="${post.id}">
                        <img class="MainImage" src="${imageUrl}" alt="${post.post_title}">
                        <h4 class="CategoryDate">${post.post_title} | ${post.category ? post.category.category_name : "No Category"} | ${new Date(post.created_at).toLocaleDateString()} | ${post.views} Views</h4>
                        <label>${post.post_article.substring(0, 40)}...</label>
                        
                        </a>
                    </div>
                `;
            });
        } else {
            console.error("Gösterilecek gönderi bulunamadı.");
        }

        const paginationContainer = document.getElementById("paginationContainer");
        paginationContainer.innerHTML = ""; // Sayfalama düğmelerini temizle

        if (data.prev_page_url) {
            paginationContainer.innerHTML += `<button onclick="fetchPosts(${data.current_page - 1})">Önceki</button>`;
        }

        if (data.next_page_url) {
            paginationContainer.innerHTML += `<button onclick="fetchPosts(${data.current_page + 1})">Sonraki</button>`;
        }

        document.querySelectorAll(".postLink").forEach(link => {
            link.addEventListener("click", (event) => {
                event.preventDefault(); 
                const postId = link.getAttribute("data-id");
                if (postId) {
                    window.location.href = `/post/${postId}`;  
                }
            });
        });
    } catch (error) {
        console.error("API'den veri çekilirken hata oluştu:", error.message);
    }
}

document.addEventListener("DOMContentLoaded", fetchPosts);
