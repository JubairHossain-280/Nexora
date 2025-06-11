const API_URL2 = 'http://localhost/social-media/api/userstories.php';
const urlParams = new URLSearchParams(window.location.search);
const currentStoryId = parseInt(urlParams.get('v'));

let stories = [];
let currentIndex = 0;

const storyElement = document.querySelector('.story-container .story');
const tapIcon = document.querySelector('.tap-icon');
const prevBtn = document.querySelector('.single-story .previous');
const nxtBtn = document.querySelector('.single-story .next');


fetch(API_URL2)
    .then(res => res.json())
    .then(data => {
        // console.log('fetching data:', data);
        stories = data;
        currentIndex = stories.findIndex(story => parseInt(story.id) === currentStoryId);

        if (currentIndex === -1) {
            alert('Story Not Found!');
            return;
        }

        const showStory = (index) => {
            const story = stories[index];
            storyElement.src = story.story_path;
            storyElement.load();
            storyElement.play();
            showHideBtns();
        }

        const showHideBtns = () => {
            if (currentIndex === 0) {
                prevBtn.style.visibility = 'hidden';
            }
            else {
                prevBtn.style.visibility = 'visible';
            }

            if (currentIndex === stories.length - 1) {
                nxtBtn.style.visibility = 'hidden';
            }
            else {
                nxtBtn.style.visibility = 'visible';
            }
        }

        showStory(currentIndex);

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showStory(currentIndex);
                updateUrl(stories[currentIndex].id);
            }
        })

        nxtBtn.addEventListener('click', () => {
            if (currentIndex < stories.length - 1) {
                currentIndex++;
                showStory(currentIndex);
                updateUrl(stories[currentIndex].id);
            }
        })

        const updateUrl = (storyId) => {
            const newUrl = `${window.location.pathname}?v=${storyId}`;
            window.history.replaceState(null, '', newUrl);
        }
    })


storyElement.addEventListener('click', () => {
    if (storyElement.paused) {
        storyElement.play();
        tapIcon.innerHTML = '<i class="fa-solid fa-play"></i>';
    } else {
        storyElement.pause();
        tapIcon.innerHTML = '<i class="fa-solid fa-pause"></i>';
    }

    // Remove and re-add animation class to restart it
    tapIcon.classList.remove('animate');
    void tapIcon.offsetWidth; // Force reflow to restart animation
    tapIcon.classList.add('animate');
});

