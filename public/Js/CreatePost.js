document.getElementById('home_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = e.target.result;
        document.getElementById('imagePreviewContainer').style.display = 'block'; 
    }

    if (file) {
        reader.readAsDataURL(file); 
    }
});

let currentIndex = 1;

function toggleContent(contentId, nextButtonId, action) {
    const currentContent = document.getElementById(contentId);
    const nextButton = document.getElementById(nextButtonId);

    if (action === "show") {
        currentContent.style.display = "block";
        nextButton.style.display = "inline"; 
    } 
}

function showNextButton(currentButtonId, nextButtonId) {
    const currentButton = document.getElementById(currentButtonId);
    const nextButton = document.getElementById(nextButtonId);

    currentButton.style.display = "none";
    if (nextButton) {
        nextButton.style.display = "inline";
    }
}