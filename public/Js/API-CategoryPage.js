async function fetchPosts() {
    const categoryId = window.location.pathname.split('/').pop();  

    try {
        const response = await fetch(`http://127.0.0.1:8000/api/category/${categoryId}`);
        
        if (!response.ok) {
            console.error('API Hatası:', response.statusText);
            return;
        }
        
        const responseText = await response.text();
        
       // console.log('API Yanıtı:', responseText);
        
        const data = JSON.parse(responseText);

        if (data.posts.length > 0) {
            const postsHeading = document.querySelector(".NewestPostsAndPopular .left");
            const firstPost = data.posts[0]; 
            if (firstPost.category) {
                postsHeading.textContent = `${firstPost.category.category_name} Posts`;
            }
        }

        const newestPostsContainer = document.getElementById("NewestAndPopularContainer");
        
        data.posts.forEach(post => {
            const imageUrl = `http://127.0.0.1:8000/storage/${post.post_image}`;
            newestPostsContainer.innerHTML += `
                <div class="Post">
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
        console.error("API'den veri çekilirken hata oluştu:", error);
    }
}

document.addEventListener("DOMContentLoaded", fetchPosts);
