window.onload = function() {

    tab_nav_project();
 
 }
 
 const  tab_nav_project = () => {
     const el = Array.from(document.querySelectorAll('.nav-i-project'));
     const elContent = Array.from(document.querySelectorAll('.item-contenus'));
     el.forEach(i => {
         i.addEventListener('click', (e) => {
             e.preventDefault();
             for(let i = 0; i < el.length; i++) {
                 if(el[i] === e.target) {
                     el[i].classList.add('active');
                 } else {
                     el[i].classList.remove('active');
                 }
             
             }
             const index = el.indexOf(e.target);
 
             for(let i = 0; i < elContent.length; i++) {
                 if(i === index) {
 
                     elContent[i].classList.add('active-contenus');
                     gsap.fromTo(elContent[i], {
                         opacity: 0,
                         y: 100,
                         stagger: 1
                     }, {
                         opacity: 1,
                         y: 0,
                         duration: 1,
                         stagger: .7
                     });           
  
                 } else {
                     elContent[i].classList.remove('active-contenus');
                 }
             }
 
         })
     
     })
 } 