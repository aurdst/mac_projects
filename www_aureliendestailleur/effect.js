// // ------ ------ ------ SCROLL EFFECT ----- ------ ------

// const movePath = {   // NEED REPEAR FUNCTION addIndicators();
//     curviness: 1.25,
//     autoRotate: false,
//     values:[{x: 100, y:-20},
//         {x: 100, y:-50},
//         {x: 80, y:-80},
//         {x: 90, y:-120},
//         {x: 100, y:-220},
//         {x: 150, y:-320},
//         {x: 250, y:-260},
//         {x: 350, y:-50},
//         {x: 650, y:-60}]
//     };
// const tween = new TimelineLite();

// tween.add(
//     TweenLite.to('#pictmac', 1, {
//         bezier: movePath,
//         ease : Power1.easeInOut
//     })
// );

// const controller = new ScrollMagic.Controller();

// const scene = new ScrollMagic.Scene({
//     triggerElement: "#section_yellow_bg_animation",
//     duration: 1000,
//     triggerHook: 0
// })
//     .setTween(tween)
//     // .addIndicators()
//     .setPin("#section_yellow_bg_animation")
//     .addTo(controller);


// NAV BAR EFFECT


const navigation = document.querySelector('.nav_bar');

window.addEventListener('scroll', () => {

    if(window.scrollY > 30){
        navigation.classList.add('.nav_bar_anim');
    } else {
        navigation.classList.remove('.nav_bar_anim');
    }
})


// CLICK EVENT 


window.addEventListener('click', (e) =>{

    const rond = document.createElement('div');
    rond.className = 'clickAnim';
    rond.style.top = `${e.pageY - 10}px`;
    rond.style.left = `${e.pageX - 10}px`
    document.body.appendChild(rond);

    setTimeout(() => {
        rond.remove();
    }, 1000)
})

var cursor = document.querySelector(".cursor");
var cursor2 = document.querySelector(".cursor2");

document.addEventListener("mousemove", function(e){
    cursor.style.cssText = cursor2.style.cssText = 'left :'+ e.clientX 
    + 'px; top:' +e.clientY+"px;";
});


// Mouse effect

var position = document.documentElement;

position.addEventListener("mousemove", e => {
    position.style.setProperty('--x', e.clientX + 'px');
    position.style.setProperty('--y', e.clientY + 'px');
})


// EFFECT TO CHANGE SCREEN


const wipe = document.querySelector('.wipe_transition');

const TLAnim = new TimelineMax();  

function delay(n){
    return new Promise((done) => {
        setTimeout(() =>{
            done();
        }, n)
    })
}

barba.init({

    sync: true,

    transitions:[
        {
            async leave(){
                
                const done = this.async();

                TLAnim.to(wipe, {left: '0%', ease: "power2.out", duration: 0.5})

                await delay(1000);
                done();
            },
            enter(){ 

                TLAnim.to(wipe, {left: '100%', ease:"power2.in", duration: 0.5})
                .set(wipe, {left:'-100%'})

            }
        }        
    ]
 
})


// EFFECT SCROLL


// let bg = document.getElementById("bg");
// let pictmac = document.getElementById("pictmac");
// let iphone12 = document.getElementById("iphone12");
// let element3 = document.getElementById("element3");
// let element4 = document.getElementById("element4");

// window.addEventListener('scroll', function(){
//     var value = window.scrollY * 2;

//     pictmac.style.right = value * .15 + 'px';
//     iphone12.style.left = value * .15 + 'px';
//     iphone12.style.top = value * .1 + 'px';
// })