document.addEventListener("DOMContentLoaded", function(event) { 
    console.log ("JS Loaded");

    // Query Selectors
    var anchors = document.getElementsByClassName('menu-item')
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
      console.log("Hamburger clicked");
      console.log(links);
      links.classList.add("mobile-menu");
    }

    // Anchor Link Scrolling
    var onAnchorClick = function(event) {
      // event.preventDefault();
      var link = this.getElementsByTagName("a");
      var linkHref= link[0].getAttribute("href");
      console.log(linkHref);
      // var href = link[0].data('href');
      // console.log(href);
      linkHref.scrollIntoView({
        behavior: 'smooth'
      });
      
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

});


