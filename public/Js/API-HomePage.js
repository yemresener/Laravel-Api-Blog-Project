// API'den veriyi çek ve HTML'ye ekle
/*axios.defaults.baseURL = "127.0.0.1";
axios.defaults.withCredentials = true;
console.log(axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

const token = localStorage.getItem("auth_token");
console.log("Token alınan değer:", token);
if (token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    console.log("Axios Authorization Header:", axios.defaults.headers.common["Authorization"]);

} else {
    console.error("Token bulunamadı!");
}


axios.defaults.withCredentials = true;
axios
    .get("http://127.0.0.1:8000/api/user")
    .then((response) => {
        console.log("Kullanıcı Bilgisi:", response.data);
    })
    .catch((error) => {
        console.error("Hata:", error.response.data);
    });
*/
    
    async function fetchPosts() {
        try {
            
            const token = localStorage.getItem('auth_token');
            
    
            const response = await fetch("http://127.0.0.1:8000/api/home", {
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
            
           
            const newestPostsContainer = document.getElementById("newestPostsContainer");
            data.newestPosts.forEach(post => {
                const imageUrl = `http://127.0.0.1:8000/storage/${post.post_image}`;
                newestPostsContainer.innerHTML += `
                    <div class="NewestPosts">
                        <a href="#" class="postLink" data-id="${post.id}">
                        <img class="MainImage" src="${imageUrl}" alt="${post.post_title}">
                        <h4 class="CategoryDate">${post.post_title} | ${post.category ? post.category.category_name : "No Category"} | ${new Date(post.created_at).toLocaleDateString()} | ${post.views} Views</h4>
                        <label>${post.post_article.substring(0, 40)}...</label>
                        </a>
                    </div>
                `;
            });
    
            const popularPostsContainer = document.getElementById("popularPostsContainer");
            data.popularPosts.forEach(post => {
                const imageUrl = `http://127.0.0.1:8000/storage/${post.post_image}`;
                popularPostsContainer.innerHTML += `
                    <div class="PopularPosts">
                    <a href="#" class="postLink" data-id="${post.id}">
                        <img class="MainImage" src="${imageUrl}" alt="${post.post_title}">
                        <h4 class="CategoryDate">${post.post_title} | ${post.category ? post.category.category_name : "No Category"} | ${new Date(post.created_at).toLocaleDateString()} | ${post.views} Views</h4>
                        <label>${post.post_article.substring(0, 40)}...</label>
                        </a>
                    </div>
                `;
            });
    
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
    
    // Sayfa yüklendiğinde fetchPosts fonksiyonunu çalıştır
    document.addEventListener("DOMContentLoaded", fetchPosts);
    