document.addEventListener("DOMContentLoaded", function(event) { 

    // Query Selectors
    var anchors = document.getElementsByClassName('menu-item')
    var hamburger = document.getElementById("mobile-nav");
    var links = document.getElementsByClassName("nav-links");
    var toTop = document.getElementById("toTop");
    var pageBody = document.getElementsByTagName("body");
    var navBar = document.getElementById("site-nav");
    var navLinks = document.getElementsByClassName("nav-links-wrapper");
    // Sticky Nav on Scroll

    function stickyNav() {
      var stickyHeight = screen.height*.30;
      if (scrollY > (screen.height - stickyHeight)) {
        navBar.classList.add("sticky-nav");
        toTop.classList.add("stick-to-top");
      }else {
        navBar.classList.remove("sticky-nav");
        toTop.classList.remove("stick-to-top");
      }
    }

    window.addEventListener("scroll", stickyNav);

    // Click Handlers
    // Show Mobile Menu on Hamburger Click
    var onHamburgerClick = function(event) {
      event.preventDefault();
      console.log(links);
      links[0].classList.add("mobile-menu");
      if (navLinks[0].classList.contains("show-menu")) {
        navLinks[0].classList.remove("show-menu");
        console.log ("Hiding Mobile menu!");
      } else {
        navLinks[0].classList.add("show-menu");
        console.log("Showing Mobile menu");
      }
      
    }

    // Anchor Link Scrolling
    var onAnchorClick = function(event) {
      if (navLinks[0].classList.contains("show-menu")) {
        navLinks[0].classList.remove("show-menu");
      }
      console.log("anchor click");
      var link = this.getElementsByTagName("a");
      var linkHref= link[0].getAttribute("href");
      var target = document.querySelector(linkHref)
      
      target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
      });
      history.pushState(null, null, linkHref)
      event.preventDefault();
      
    }

    var onEscapeClick = function(e) {
      console.log(e.key);
      if(e.key === "Escape") {
        if (navLinks[0].classList.contains("show-menu")) {
          navLinks[0].classList.remove("show-menu");
        }
      }
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
    for (var i = 0; i < anchors.length; i++) {
      anchors[i].addEventListener('click', onAnchorClick, false);
    }
    document.addEventListener("keyup", onEscapeClick);

});


