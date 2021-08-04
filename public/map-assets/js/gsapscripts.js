var menuBtn = document.querySelector(".menu-btn");
var aboutSlides = document.querySelector(".about-slide")
var hideBtn = document.querySelector(".hide-abt")

hideBtn.addEventListener("click", () => aboutSlides.classList.remove('open'))


var tl = gsap.timeline({defaults: {duration: 1 }})

tl.pause(true);
tl.to(".about-slide", {
    clipPath: 'circle(100%)',
    opacity: 1,
    visibility:"visible"

})

tl.from(".abt img", {
    yPercent: -100
},"-=0.5")

tl.from('.abt p', {
    y: '30px',
    opacity: 0,
},'-=0.8')

tl.from('.navs a span', {
    opacity: 0,
    yPercent: 100,

}, "-=1");


menuBtn.addEventListener("click", () => {
    tl.play();
} )

hideBtn.addEventListener("click", () => {
    tl.reverse(0.7);
} )
