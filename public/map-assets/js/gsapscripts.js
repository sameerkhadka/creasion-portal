var donateBtn = document.querySelector('.donate-btn');
var donateBox = document.querySelector('.donate-popup');
var donateHide = document.querySelector('.hide-donate');

var tl2 = gsap.timeline();
tl2.pause(true);

tl2.to(".donate-popup", {
    opacity: 1,
    visibility:"visible",
    duration: 0.8,

})
tl2.from(".donate-container", {
    scale: 0,
    duration: 0.5,
})


donateBtn.addEventListener("click", () => {
    tl2.play();
} )

donateHide.addEventListener("click", () => {
    tl2.reverse(0.7);
} )



var menuBtn = document.querySelectorAll(".menu-btn");
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


menuBtn.forEach(btn => {
    btn.addEventListener("click", () => {
        tl.play();
    } )
});



hideBtn.addEventListener("click", () => {
    tl.reverse(0.7);
} )

preloader = gsap.timeline({repeat: -1});
preloader.set("circle#c1", {autoAlpha:.7})
  .to("circle#c1", .5, {scale: .2, x: "+=5", transformOrigin:"50% 50%"})
  .to("circle#c1", .5, {scale:1, x: "-=5",transformOrigin:"50% 50%"} );

//animate second circle


$(function() {
    $('.accordion').find('.accordion-title').on('click', function(){
        // Adds Active Class
        $(this).toggleClass('active');
        // Expand or Collapse This Panel
        $(this).next().slideToggle('fast');

    
        // Hide The Other Panels
        $('.accordion-content').not($(this).next()).slideUp('fast');
        // Removes Active Class From Other Titles
        $('.accordion-title').not($(this)).removeClass('active');       
    });
});