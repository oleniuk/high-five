let siteTitle = document.title;
let changeTitle;

window.addEventListener('blur', () => {
    let flag = true;
    changeTitle = setInterval(() => {
        document.title = flag ? "Please, don't go" : "Come back!";
        flag = !flag;
    }, 1500)
})

window.addEventListener('focus', () => {
    document.title = siteTitle;
    clearInterval(changeTitle);
})




//слайдер

document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".slider");
    const slides = document.querySelectorAll(".slide");
    const prevBtn = document.querySelector("#prev");
    const nextBtn = document.querySelector("#next");
    const currentSlideIndicator = document.querySelector("#current-slide");
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.style.display = "block";
            } else {
                slide.style.display = "none";
            }
        });

        currentSlideIndicator.textContent = `${index + 1}/${slides.length}`;
    }

    function nextSlide() {
        if (currentSlide < slides.length - 1) {
            currentSlide++;
            showSlide(currentSlide);
        }
    }

    function prevSlide() {
        if (currentSlide > 0) {
            currentSlide--;
            showSlide(currentSlide);
        }
    }

    nextBtn.addEventListener("click", nextSlide);
    prevBtn.addEventListener("click", prevSlide);

    showSlide(currentSlide);
});

//END слайдер