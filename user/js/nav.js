const menu = document.querySelector('.menu');
const remove = document.querySelector('.close');
const mobile = document.querySelector('.mobile');
const mobnav = document.querySelector('.mobnav');
const about = document.querySelector('#about');




menu.addEventListener('click', () => {
    
    menu.style.display = "none"
    remove.style.display = "inline" 
    mobnav.style.width = "80%"
    mobnav.style.height = "85%"
    mobnav.style.position = "fixed"
    // mobile.style.marginLeft = "0rem"
    // mobile.style.display = "inline"
});
remove.addEventListener('click', () => {
    
    remove.style.display = "none"
    menu.style.display = "inline" 
    mobnav.style.width = "0vw"
});

if(window.matchMedia("prefers-color-scheme : dark").matches){
  documentElement.setAttribute("dark", true);
}

  
  //Get the button
  const scrolltotop = document.querySelector("#scrolltotop");

// When the user scrolls down 500px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    scrolltotop.style.display = "block";
  } else {
    scrolltotop.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document using jquery
  scrolltotop.addEventListener("click", function (){
      window.scrollTo(0,0);
    // $("html, body").animate({scrollTop:0},"slow");
  });

// to ask for location
const successCallBack = (position) => {
  console.log(position)
}
const errorCallBack = (error) => {
  console.error(error)
}
navigator.geolocation.getCurrentPosition(successCallBack,errorCallBack);

// show elements on scroll
window.addEventListener('scroll', reveal);

function reveal(){
  var reveals = document.querySelectorAll('.reveal');

  for(var j=0; j<reveals.length; j++){
    var windowHeight = window.innerHeight;
    var revealtop = reveals[j].getBoundingClientRect().top;
    var revealpoint = 150;

    if (revealtop < windowHeight - revealpoint){
      reveals[j].classList.add('active');
    }
    else{
      reveals[j].classList.remove('active');
    }
  }
};




