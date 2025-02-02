async function fetchPostDetail() {
    const postId = window.location.pathname.split('/').pop(); 
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/post/${postId}`);
        const data = await response.json();

        const post = data.post;
        const postDetailContainer = document.getElementById("postDetail");

        postDetailContainer.innerHTML = `
            <h1 class="main-title">${post.post_title}</h1>
            <img class="MainImage" src="http://127.0.0.1:8000/storage/${post.post_image}" alt="${post.post_title}">
            <p class="main-article">${post.post_article}</p>
        `;

        if (post.post_title2 && post.post_article2) {
            postDetailContainer.innerHTML += `
                <div class="post secondary">
                    <h2 class="secondary-title">${post.post_title2}</h2>
                    <p class="secondary-article">${post.post_article2}</p>
                </div>
            `;
        }

    } catch (error) {
        console.error("Post verisi alınırken hata oluştu:", error);
    }
}

document.addEventListener("DOMContentLoaded", fetchPostDetail);
