var menuBtn = document.querySelector(".menu-btn");
var aboutSlides = document.querySelector(".about-slide")
var hideBtn = document.querySelector(".hide-abt")

menuBtn.addEventListener("click", () => aboutSlides.classList.add('open') )
hideBtn.addEventListener("click", () => aboutSlides.classList.remove('open'))