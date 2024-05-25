// body element
const body = document.body;

// .content element
const contentEl = document.querySelector('.content');

// Scroll Trigger
gsap.registerPlugin(ScrollTrigger);

// Disable scroll initially
body.classList.add('no-scroll');



// H1 Titles
let textWrapper = document.querySelector('.title-1')
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
let textWrapper2 = document.querySelector('.title-2')
textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter'>$&</span>");


// Intro


let tl = gsap.timeline({
    delay: 1.4,
    ease: 'power3.inOut'
})
    .add(() => {
        // pointer events none to the content
        body.classList.add('content--hidden');
        lenis.stop();
    }, 'start');


tl.fromTo(".video-w", {
    transform: "translate(0, 100svh)",
    clipPath: "inset(40vh 36vw round 1rem)",
}, {
    transform: "translate(0, 0px)",
    clipPath: "inset(26vh 26vw round 1rem)",
    duration: 1.4,
    ease: "power2.out",
});


tl.to(".video-w", {
    delay: .2,
    clipPath: "inset(0px round 0rem)",
    duration: .8,
    ease: "expoScale(0.5,7,none)",
});

tl.to('.title-1 .letter', { opacity: 1, y: '0', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', stagger: '.05' }, 'syncStart')
tl.to('.title-2 .letter', { opacity: 1, y: '0', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', stagger: '.03' }, "-=1.2")

tl.fromTo('.hero .bottom-info', {
    ease: "power2.out",
    y: 300,
}, {
    y: 0,
    onComplete: () => {
        // Remove the class to show the content
        body.classList.remove('content--hidden');
        // Enable scroll
        body.classList.remove('no-scroll');

        lenis.start();
    }
}, 'syncStart')


/*Smooth Scroll*/
const lenis = new Lenis({
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
})

lenis.on('scroll', (e) => {
    console.log(e)
})

lenis.on('scroll', ScrollTrigger.update)

gsap.ticker.add((time) => {
    lenis.raf(time * 1000)
})

gsap.ticker.lagSmoothing(0)

/*

let paragraphs = [...document.querySelectorAll('.show-p')];
let spans = [];

paragraphs.forEach(paragraph => {
    let htmlString = '';
    let pArray = paragraph.textContent.split('');
    for (let i = 0; i < pArray.length; i++) {
        htmlString += `<span>${pArray[i]}</span>`;
    }
    paragraph.innerHTML = htmlString;
})

spans = [...document.querySelectorAll('.show-p span')];

function revealSpans() {
    for (let i = 0; i < spans.length; i++) {
        if (spans[i].parentElement.getBoundingClientRect().top < window.innerHeight / 2) {
            let { left, top } = spans[i].getBoundingClientRect();
            top = top - (window.innerHeight * .1);
            let opacityValue = 1 - ((top * .01) + (left * 0.001)) < 0.1 ? 0.1 : 1 - ((top * .01) + (left * 0.001)).toFixed(3);
            opacityValue = opacityValue > 1 ? 1 : opacityValue.toFixed(3);
            spans[i].style.opacity = opacityValue;
        }
    }
}

window.addEventListener('scroll', () => {
    revealSpans()
})
revealSpans()
*/
window.addEventListener('resize', function () {
    "use strict";
    window.scrollTo(0, 0);
    window.location.reload();
});