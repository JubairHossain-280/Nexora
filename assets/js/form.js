const form = document.querySelector('.form');
const showPassBtn = document.querySelectorAll('.password-field button');
const passInput = document.querySelectorAll('.password-field input');


// SHOW PASSWORD START
showPassBtn.forEach((btn, index) => {
  const input = passInput[index];
  const icon = btn.querySelector('i');
  btn.addEventListener('click', () => {
    if (input.type === 'password') {
      input.setAttribute('type', 'text');
      input.style.padding = '0';
      input.style.boxShadow = 'none';
      icon.classList.add('fa-eye');
      icon.classList.remove('fa-eye-slash');
    } else {
      input.setAttribute('type', 'password');
      icon.classList.add('fa-eye-slash');
      icon.classList.remove('fa-eye');
    }
  });
});
// SHOW PASSWORD END

// FILE READER START
const fileInput = document.getElementById('fileInput');
const previewStory = document.querySelector('.previewStory');
const storyBtns = document.querySelector('.create-story .story-btns');
const clearStory = document.querySelector('.cancel-btn')
const playBtn = document.querySelector('.preview-container .play-btn i');

fileInput.addEventListener('change', function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      previewStory.src = e.target.result;
      previewStory.style.display = 'block';
      playBtn.style.visibility = 'visible';
      storyBtns.style.visibility = 'visible';
    };

    reader.readAsDataURL(file);
  }
});

previewStory.addEventListener('click', function () {
  if (this.paused) {
    this.play();
    playBtn.style.visibility = 'hidden';
  } else {
    this.pause();
    playBtn.style.visibility = 'visible';
  }
});

clearStory.addEventListener('click', function () {
  fileInput.value = '';
  previewStory.src = '';
  previewStory.style.display = 'none';
  storyBtns.style.visibility = 'hidden';
  playBtn.style.visibility = 'hidden';
})

// FILE READER END 