const API_URL = 'http://localhost/social-media/api/stories.php';
let storySlides = [];

const menuBtn = document.querySelector('.menu-toggle-btn');
const menuIcon = document.querySelector('.menu-icon');
const offcanvas = document.querySelector('.offcanvas');
const dropdown = document.querySelector('.offcanvas .dropdown');
const dropdownIcon = document.querySelector('.offcanvas .dropdown .toggle-dropdown i');
const dropdownList = document.querySelector('.offcanvas .dropdown-list');
const overlay = document.querySelector('.overlay');
const storySection = document.querySelector('.story-section');
const leftBtn = document.querySelector('.slider-btn.left');
const rightBtn = document.querySelector('.slider-btn.right');

fetch(API_URL)
    .then(res => res.json())
    .then(data => {
        storySlides = data;

        storySlides.forEach(story => {
            const storyLink = document.createElement('a');
            const storyVideo = document.createElement('video');
            storyLink.href = `singlePageStory.php?v=${story.id}`;
            storyLink.className = 'story-id';
            storyVideo.src = story.story_path;

            storyLink.appendChild(storyVideo);
            storySection.appendChild(storyLink);
        })
        // Initial check
        updateButtons();

    })

// INITIALIZE TOOLTIP EVERYWHERE
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl, {
         delay: { "show": 300, "hide": 100 },
         animation: true,
         trigger: 'hover',
    })
})

// SPLASH SCREEN ON LOADING....
const splash = document.querySelector('.splash-screen');
const start = performance.now(); // ⏱ Track when the splash started

window.addEventListener('load', () => {
    const end = performance.now();
    const loadTime = end - start;
    const minDisplayTime = 500; // minimum splash display duration in ms

    const delay = Math.max(0, minDisplayTime - loadTime);

    setTimeout(() => {
        splash.classList.add('hidden');
        setTimeout(() => splash.remove(), 400); // Fade out duration match
    }, delay);
});


// MENU TOGGLE START
const toggleMenu = () => {
    offcanvas.classList.toggle('show');
    menuIcon.classList.toggle('fa-xmark');
    overlay.classList.toggle('display');
    document.body.classList.toggle('overflow-hidden');
}
// MENU TOGGLE END

// DETECT CLICK OUTSIDE OFFCANVAS START
document.addEventListener('click', (e) => {
    if (offcanvas.classList.contains('show') && !offcanvas.contains(e.target) && !menuBtn.contains(e.target)) {
        offcanvas.classList.remove('show');
        menuIcon.classList.remove('fa-xmark');
        overlay.classList.remove('display');
        document.body.classList.remove('overflow-hidden');
    }
})
// DETECT CLICK OUTSIDE OFFCANVAS END

// MOBILE VIEW DROPDOWN TOGGLE START
dropdown.addEventListener('click', () => {
    if (dropdownIcon.style.rotate === '180deg') {
        Object.assign(dropdownIcon.style, {
            rotate: '0deg',
            backgroundColor: 'transparent',
            color: 'black'
        })
        dropdownList.style.display = 'none';
    }
    else {
        Object.assign(dropdownIcon.style, {
            rotate: '180deg',
            backgroundColor: 'rgb(74, 182, 74)',
            color: 'white'
        })
        dropdownList.style.display = 'block';

    }
})
// MOBILE VIEW DROPDOWN TOGGLE END

// STORY SLIDER START
const scrollAmount = 520;

function updateButtons() {
    const scrollLeft = storySection.scrollLeft;
    const maxScrollLeft = storySection.scrollWidth - storySection.clientWidth;

    leftBtn.style.display = scrollLeft <= 0 ? 'none' : 'block';
    rightBtn.style.display = scrollLeft >= maxScrollLeft - 1 ? 'none' : 'block';
}

// Update on scroll
storySection.addEventListener('scroll', updateButtons);

// Scroll on button click and then update
leftBtn?.addEventListener('click', () => {
    storySection.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    setTimeout(updateButtons, 300); // Adjust delay if needed
});

rightBtn?.addEventListener('click', () => {
    storySection.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    setTimeout(updateButtons, 300); // Adjust delay if needed
});
// STORY SLIDER END




