const fileInput = document.querySelectorAll('.fileInput');
const previewImage = document.querySelectorAll('.previewImage');
const coverBtns = document.querySelector('.profile-details .cover-photo .cover-btns');
const clearImage = document.querySelectorAll('.cancel-btn');

fileInput.forEach((input, index,) => {
    input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            coverBtns.style.visibility = 'visible';
            reader.addEventListener('load', function (e) {
                previewImage[index].src = e.target.result;
            })

            reader.readAsDataURL(file);
        }
    })

})


clearImage.forEach((btn, index,) => {
    btn.addEventListener('click', () => {
        coverBtns.style.visibility = 'hidden';
        previewImage[index].style.visibility = 'hidden';
        previewImage[index].src = '';
    })
});