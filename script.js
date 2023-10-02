// let list = document.querySelector('.slider .list');
// let items = document.querySelectorAll('.slider .list .item');
// let dots = document.querySelectorAll('.slider .dots li');
// let prev = document.getElementById('prev');
// let next = document.getElementById('next');

// let active = 0;
// let lengthItems = items.length - 1;

// prev.onclick = function () {
//     if (active - 1 < 0) {
//         active = lengthItems;
//     } else {
//         active = active - 1;
//     }
//     reloadSlider();
// };

// next.onclick = function(){
//     if(active + 1 > lengthItems) {
//         active = 0;
//     }else {
//         active = active + 1;
//     }
//     reloadSlider();
// }

// let refreshSlider = setInterval(()=> {next.click()}, 5000);
// function reloadSlider(){
//     let checkLeft = items[active].offsetLeft;
//     list.style.left = -checkLeft + 'px';

//     let lastActiveDot = document.querySelector('.slider .dots li.active');
//     lastActiveDot.classList.remove('active');
//     dots[active].classList.add('active');
// }


// var topbar1 = document.querySelector('.wrapper .top-bar1');
// window.addEventListener("scroll", ()=> {
//     if (document.documentElement.scrollTop > 40) {
//         topbar1.classList.add("sticky");
//     }else {
//         topbar1.classList.remove("sticky");
//     }
// })
// var topbar2 = document.querySelector('.wrapper .top-bar2');
// window.addEventListener("scroll", ()=> {
//     if (document.documentElement.scrollTop > 40) {
//         topbar2.classList.add("sticky");
//     }else {
//         topbar2.classList.remove("sticky");
//     }
// })
// var wrap = document.querySelector('.wrapper');
// window.addEventListener("scroll", ()=> {
//     if (document.documentElement.scrollTop > 40) {
//         wrap.classList.add("sticky");
//     }else {
//         wrap.classList.remove("sticky");
//     }
// })

// var nav = document.querySelector('.wrapper .navigation');
// window.addEventListener("scroll", ()=> {
//     if (document.documentElement.scrollTop > 40) {
//         nav.classList.add("sticky");
//     }else {
//         nav.classList.remove("sticky");
//     }
// })