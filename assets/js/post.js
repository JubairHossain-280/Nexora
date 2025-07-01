window.addEventListener('DOMContentLoaded', () => {
    const postContext = document.querySelector('.post-context');
    console.log(postContext);
    if (postContext) postContext.focus();

})

const postForm = document.querySelector('.post-form');
const resetBtn = document.querySelector('.my-modal-close');
const postMedia = document.getElementById('post-media');
const postMediaPreview = document.querySelector('.post-media-preview');
const postContext = document.querySelector('.post-context');
const CreatePostBtn = document.querySelector('.create-post-btn');

postMedia.addEventListener('change', function () {
    const file = this.files[0];
    const fileType = file.type;
    postMediaPreview.innerHTML = "";
    if (file) {
        CreatePostBtn.style.cursor = 'pointer';
        CreatePostBtn.style.filter = 'grayscale(0) opacity(1)';
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
    else {
        CreatePostBtn.style.cursor = 'not-allowed';
        CreatePostBtn.style.filter = 'grayscale(100) opacity(0.5)';
    }

});

resetBtn.addEventListener('click', () => {
    postForm.reset();
    postMediaPreview.innerHTML = "";
    CreatePostBtn.style.cursor = 'not-allowed';
    CreatePostBtn.style.filter = 'grayscale(100) opacity(0.5)';
})

postContext.addEventListener('input', function () {
    if (this.value.trim() !== '') {
        CreatePostBtn.style.cursor = 'pointer';
        CreatePostBtn.style.filter = 'grayscale(0) opacity(1)';
    }
    else {
        CreatePostBtn.style.cursor = 'not-allowed';
        CreatePostBtn.style.filter = 'grayscale(100) opacity(0.5)';
    }
})

CreatePostBtn.addEventListener('click', function () {
    if (postContext.value.trim() !== '' || postMedia.files.length > 0) {
        postForm.submit();
    }
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

// Fetch comments for the post
function loadComments(postId, commentList) {
    fetch(`api/comments.php?post_id=${postId}`)
        .then(response => response.json())
        .then(data => {
            commentList.innerHTML = "";

            if (data.length === 0) {
                commentList.innerHTML = `<p class='no-comments'>
                    <img src="assets/img/document-94.png" alt="no_comments">
                    <span>
                        <strong>No comments yet.</strong> <br>
                        Be the first to comment.
                    </span>
                    </p>`;
                return;
            }

            data.forEach(comment => {
                const commentDiv = document.createElement('div');
                commentDiv.classList.add('comment');

                commentDiv.innerHTML = `
                                            <div class="comment-author">
                                                <img src="${comment.profile_image}" alt="profile">
                                            </div>
                                            <div class="comment-body">
                                                <strong>${comment.username}</strong> <br>
                                                ${comment.comment_text}
                                            </div>
                                        `;

                commentList.appendChild(commentDiv);
            });
        })
        .catch(error => {
            console.error("Failed to load comments", error);
        });
}

// Post Trigger Part
document.querySelectorAll('.post').forEach(postEl => {
    const postId = postEl.dataset.postid;
    const modalId = `postPreviewModal-${postId}`;

    postEl.querySelector('.post-media-trigger')?.addEventListener('click', () => {
        const modal = document.getElementById(modalId);

        modal.querySelector('.preview-author-img').src = postEl.dataset.authorimage;
        modal.querySelector('.preview-author-name').textContent = postEl.dataset.authorname;

        // Set post context
        const context = postEl.dataset.context.replace(/\n/g, "<br>");
        const previewContext = modal.querySelector('.preview-context');

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
        } else {
            previewContext.innerHTML = context;
        }

        // Set post media
        const media = postEl.dataset.media;
        const mediaType = postEl.dataset.mediatype;

        const previewMedia = modal.querySelector('.preview-media');
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

        // Load comments
        const commentList = modal.querySelector('.comment-list');
        loadComments(postId, commentList);

        const commentForm = modal.querySelector('.comment-section form');
        const commentBox = modal.querySelector('.comment-section form .comment-box');
        const commentBtn = modal.querySelector('.comment-section form .comment-btn');

        // Submit comment
        commentForm.onsubmit = function (e) {
            e.preventDefault();
            const comment = commentBox.value.trim();
            if (comment === '') return;

            const formData = new FormData();
            formData.append('post_id', postId);
            formData.append('comment', comment);

            fetch('api/addcomment.php', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(response => {
                    if (response.status === 'success') {
                        commentBox.value = '';
                        commentBtn.style.cursor = 'not-allowed';
                        commentBtn.style.filter = 'brightness(0.5)';
                        loadComments(postId, commentList);
                    } else {
                        throw new Error(response)
                    }
                })
                .catch(error => {
                    console.error('Error: ' + error);
                    alert('Failed to add comment: ' + error.message);
                })
        }

        commentBox.addEventListener('input', function () {
            if (this.value.trim() !== '') {
                commentBtn.style.cursor = 'pointer';
                commentBtn.style.filter = 'brightness(1)';
            }
            else {
                commentBtn.style.cursor = 'not-allowed';
                commentBtn.style.filter = 'brightness(0.5)';

            }
        })

        // Reset comment box
        modal.querySelector('.my-modal-close').addEventListener('click', () => {
            commentBox.value = '';
            commentBtn.style.cursor = 'not-allowed';
            commentBtn.style.filter = 'brightness(0.5)';
        });



    })
})

