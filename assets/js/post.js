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



// Post Trigger Part
document.querySelectorAll('.post').forEach(postEl => {
    postEl.querySelector('.post-media-trigger')?.addEventListener('click', () => {
        const authorname = postEl.dataset.authorname;
        const authorImage = postEl.dataset.authorimage;
        const context = postEl.dataset.context.replace(/\n/g, "<br>");
        const media = postEl.dataset.media;
        const mediaType = postEl.dataset.mediatype;

        document.querySelector('.preview-author-img').src = authorImage;
        document.querySelector('.preview-author-name').textContent = authorname;

        const previewContext = document.querySelector('.preview-context');
        previewContext.innerHTML = context;

        const maxLength = 400;

        if (context.length > maxLength) {
            const visiblePart = context.substring(0, maxLength);
            const hiddenPart = context.substring(maxLength);
            previewContext.innerHTML = `${visiblePart}<span class="dots">...</span><span class="hidden-part" style="display: none">${hiddenPart}</span><span class="see-more" style="cursor: pointer"> see more</span>`;

            previewContext.querySelector('.see-more').addEventListener('click', function () {
                const hiddenPart = previewContext.querySelector('.hidden-part');
                const dots = previewContext.querySelector('.dots');

                if (hiddenPart.style.display === 'none') {
                    hiddenPart.style.display = 'inline';
                    dots.style.display = 'none';
                    this.innerHTML = " see less";
                }
                else {
                    hiddenPart.style.display = 'none';
                    dots.style.display = 'inline';
                    this.innerHTML = " see more";
                }

            })
        }

        const previewMedia = document.querySelector('.preview-media');
        previewMedia.innerHTML = "";

        if (media) {
            if (mediaType === 'image') {
                const img = document.createElement('img');
                img.src = media;
                img.alt = "Post Media";
                previewMedia.appendChild(img);
            }
            else if (mediaType === "video") {
                const video = document.createElement('video');
                video.src = media;
                video.controls = true;
                video.muted = true;
                video.autoplay = true;
                previewMedia.appendChild(video);
            }
        }

    })
})