window.addEventListener('DOMContentLoaded', () => {
    const postContext = document.querySelector('.post-context');
    console.log(postContext);
    if (postContext) postContext.focus();

})

const postForm = document.querySelector('.post-form');
const resetBtn = document.querySelector('.my-modal-close');
const postMedia = document.getElementById('post-media');
const postMediaPreview = document.querySelector('.post-media-preview');

postMedia.addEventListener('change', function () {
    const file = this.files[0];
    const fileType = file.type;
    postMediaPreview.innerHTML = "";
    if (file) {
        const reader = new FileReader();
        if (fileType.startsWith('image/')) {
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                postMediaPreview.appendChild(img);
            }
        }
        else if (fileType.startsWith('video/')) {
            reader.onload = function (e) {
                const video = document.createElement('video');
                video.src = e.target.result;
                video.controls = true;
                postMediaPreview.appendChild(video);
            }
        }
        reader.readAsDataURL(file);
    }

});

resetBtn.addEventListener('click', () => {
    postForm.reset();
    postMediaPreview.innerHTML = "";
})

const togglePost = (btn) => {
    const postContext = btn.closest('.post-body').querySelector('p');
    const visible = postContext.querySelector('.visible-part');
    const hidden = postContext.querySelector('.hidden-part');
    const etc = postContext.querySelector('.etc');

    if (hidden.style.display === 'none') {
        hidden.style.display = 'inline';
        etc.style.display = 'none';
        btn.textContent = 'See less';
    }
    else {
        hidden.style.display = 'none';
        etc.style.display = 'inline';
        btn.textContent = 'See more';
    }
}

document.addEventListener('click', (e) => {
    const emojiBtn = document.getElementById('emojiBtn');
    const emojiDropdown = document.getElementById('emojiDropdown');
    if (!emojiDropdown.contains(e.target) && !emojiBtn.contains(e.target)) {
        emojiDropdown.style.display = 'none';
    }
}) 