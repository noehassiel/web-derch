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

//H1 Titles Phone
let textWrapperP = document.querySelector('.title-1-phone')
textWrapperP.innerHTML = textWrapperP.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
let textWrapper2P = document.querySelector('.title-2-phone')
textWrapper2P.innerHTML = textWrapper2P.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
let textWrapper3P = document.querySelector('.title-3-phone')
textWrapper3P.innerHTML = textWrapper3P.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
let textWrapper4P = document.querySelector('.title-4-phone')
textWrapper4P.innerHTML = textWrapper4P.textContent.replace(/\S/g, "<span class='letter'>$&</span>");



// Modal Links
let links = document.querySelectorAll('.menu-modal-links');
links.forEach(link => {

    link.addEventListener('click', () => {
        $('#exampleModal').modal('hide');
    });
});



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



//Responsive
tl.to('.title-1-phone .letter', { opacity: 1, y: '0', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', stagger: '.05' }, 'syncStart')
tl.to('.title-2-phone .letter', { opacity: 1, y: '0', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', stagger: '.03' }, "-=1.2")
tl.to('.title-3-phone .letter', { opacity: 1, y: '0', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', stagger: '.03' }, "-=1.2")
tl.to('.title-4-phone .letter', { opacity: 1, y: '0', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)', stagger: '.03' }, "-=1.2")



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

        $('nav').removeClass('hide');

        $('#cta').css('opacity', '1');

        lenis.start();
    }
}, 'syncStart');


/*Smooth Scroll*/
const lenis = new Lenis({
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
})

/*
let nav = document.querySelector('nav');
let scrolledDown = false;
*/


let nav = document.querySelector('nav'); // Adjust this selector to match your nav element
let previousScroll = 0;
let scrolledDown = false;

lenis.on('scroll', (e) => {
    console.log(e)

    /* Check if the page has scrolled down at least 40px
    if (e.scroll > 120 && !scrolledDown) {
        nav.classList.add('scrolled');
        scrolledDown = true;
    } else if (e.scroll <= 120 && scrolledDown) {
        nav.classList.remove('scrolled');
        scrolledDown = false;
    }
    */

    let currentScroll = e.scroll;

    if (currentScroll > 40 && currentScroll > previousScroll) {
        // Scrolling down
        nav.classList.add('scrolling-down');
        nav.classList.remove('scrolling-up');
        scrolledDown = true;
    } else if (currentScroll > 40 && currentScroll < previousScroll) {
        // Scrolling up
        nav.classList.add('scrolling-up');
        nav.classList.remove('scrolling-down');
    } else if (currentScroll <= 40) {
        // When near the top of the page
        nav.classList.remove('scrolling-down', 'scrolling-up');
    }

    previousScroll = currentScroll;


})

lenis.on('scroll', ScrollTrigger.update)

gsap.ticker.add((time) => {
    lenis.raf(time * 1000)
})

gsap.ticker.lagSmoothing(0)


gsap.to('.hero', {
    scrollTrigger: {
        trigger: ".hero",
        scrub: true,
        start: "7% top",
        end: "+=1000",
        toggleClass: "border"
    },
    scale: 0.95,
})


const section_2 = document.getElementById("servicios");
let box_items = gsap.utils.toArray(".horizontal__item");

gsap.to(box_items, {
    xPercent: -100 * (box_items.length - 1),
    ease: "sine.out",
    scrollTrigger: {
        trigger: section_2,
        pin: true,
        scrub: 2,
        snap: 1 / (box_items.length - 1),
        end: "+=" + section_2.offsetWidth
    }
});

// Images parallax
gsap.utils.toArray('.img-container').forEach(container => {
    const img = container.querySelector('img');

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: container,
            scrub: true,
            pin: false,
        }
    });

    tl.fromTo(img, {
        yPercent: -20,
        ease: 'none'
    }, {
        yPercent: 20,
        ease: 'none'
    });
});


/*SERVICIOS*/
let services = document.querySelectorAll('.service-btn');
services.forEach(service => {

    service.addEventListener('click', () => {
        $('.full-card-service').addClass('show');


        body.classList.add('no-scroll');
        nav.classList.add('hide');
        lenis.stop();


        let serviceType = service.getAttribute('data-service');
        // Selecciona o crea el div que se va a mostrar
        let div = document.querySelector('#service-wrap');

        // Remueve todas las clases que empiezan con 'service-' para evitar acumulación de clases
        div.className = div.className.replace(/\bservice-\S+/g, '');

        // Añade la clase correspondiente basada en data-service
        div.classList.add('service-' + serviceType);
    });


});




$("#service-overlay").on("click", function () {
    $(".full-card-service").removeClass('show');

    lenis.start();

    $('nav').removeClass('hide');
    // Enable scroll
    body.classList.remove('no-scroll');
});


$("#close-service").on("click", function () {
    $(".full-card-service").removeClass('show');

    lenis.start();

    $('nav').removeClass('hide');
    // Enable scroll
    body.classList.remove('no-scroll');
});


/*FOOTER*/


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
