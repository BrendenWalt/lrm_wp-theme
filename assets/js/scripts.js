document.addEventListener("DOMContentLoaded", function(event) { 
    console.log ("JS Loaded");

    // Query Selectors
    var hamburger = document.getElementById("mobile-nav");
    var links = document.getElementById("nav-links");
    var toTop = document.getElementById("toTop");
    var pageBody = document.getElementsByTagName("body");
    var navBar = document.getElementById("site-nav");
 
    // Sticky Nav on Scroll


    function stickyNav() {
      var stickyHeight = screen.height*.30;
      if (scrollY > (screen.height - stickyHeight)) {
        navBar.classList.add("sticky-nav");
      }else {
        navBar.classList.remove("sticky-nav");
      }
    }

    window.addEventListener("scroll", stickyNav);

    // Click Handlers
    // Show Mobile Menu on Hamburger Click
    var onHamburgerClick = function(event) {
      event.preventDefault();
      console.log("Hamburger clicked");
      console.log(links);
      links.classList.add("mobile-menu");
    }

    // Scroll to top of Site
    var onToTopClick = function(event) {
      event.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }

    // Click Listeners
    hamburger.addEventListener("click", onHamburgerClick);
    toTop.addEventListener("click", onToTopClick);

});


