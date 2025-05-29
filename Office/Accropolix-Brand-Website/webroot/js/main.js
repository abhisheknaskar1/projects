
  /* -----------------data driven--------------------- */
$(document).ready(function () {
  $(".dashboard-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    dotsData: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
});

$(document).ready(function () {
  $(".hero-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    dotsData: true,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
});

$(document).ready(function () {
  $('.carousel3').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  })
});

  //  ----------------------career page js -------------------
  function changeText() {
    const spanElement = document.getElementById('slider');
    
    // Array of texts to cycle through
    const texts = ['Research', 'Engineer', 'Transform'];
    
    let index = 0;
    
    // Change text every 3 seconds
    setInterval(() => {
      spanElement.textContent = texts[index];
      index = (index + 1) % texts.length;
    }, 2000);
  }
  
  // Call the function to start text cycling
  changeText();  
  
const tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
const firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '400px', // Adjust the height as needed
        width: '500', // Adjust the width as needed
        videoId: 'Dn0PWPyT4BQ',
        playerVars: {
            'autoplay': 1,
            'controls': 0,
            'loop': 1,
            'mute': 1, // Start with the video muted
            'playlist': 'Dn0PWPyT4BQ', // Loop video
            'enablejsapi': 1,
            'modestbranding': 1, // Hide YouTube logo and title
            'rel': 0,
            'showinfo': 0
        },
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    document.getElementById('mute-toggle').addEventListener('click', function () {
        if (player.isMuted()) {
            player.unMute();
            document.getElementById('mute-toggle').textContent = 'Mute';
        } else {
            player.mute();
            document.getElementById('mute-toggle').textContent = 'Unmute';
        }
    });
}

function onPlayerReady(event) {
    document.getElementById('mute-toggle').addEventListener('click', function () {
        if (player.isMuted()) {
            player.unMute();
            document.getElementById('mute-toggle').textContent = 'Mute';
        } else {
            player.mute();
            document.getElementById('mute-toggle').textContent = 'Unmute';
        }
    });
}

var $heroSlide = $(".hero-slide")
    .slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        speed: 1000,
        autoplaySpeed: 3000,
        autoplay: true,
        dots:true
    })
  .on({
    beforeChange: function(event, slick, currentSlide, nextSlide) {
      $(".slick-slide", this).eq(currentSlide).addClass("preve-slide");
      $(".slick-slide", this).eq(nextSlide).addClass("slide-animation");
    },
    afterChange: function() {
      $(".preve-slide", this).removeClass("preve-slide　slide-animation");
    }
  });
$heroSlide.find(".slick-slide").eq(0).addClass("slide-animation");




$('.logos-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 3
            }
        },{
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
});

$('.team-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5500,
  arrows: false,
  dots: true,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 1199,
    settings: {
        slidesToShow: 3
    }
},{
      breakpoint: 768,
      settings: {
          slidesToShow: 2
      }
  }, {
      breakpoint: 520,
      settings: {
          slidesToShow: 1
      }
  }]
});


 /**
   * Easy selector helper function
   */
 const select = (el, all = false) => {
  el = el.trim()
  if (all) {
    return [...document.querySelectorAll(el)]
  } else {
    return document.querySelector(el)
  }
}

const on = (type, el, listener, all = false) => {
  let selectEl = select(el, all)
  if (selectEl) {
    if (all) {
      selectEl.forEach(e => e.addEventListener(type, listener))
    } else {
      selectEl.addEventListener(type, listener)
    }
  }
}
 /**
   * Mobile nav toggle
   */
 on('click', '.mobile-nav-toggle', function(e) {
  select('#navbar').classList.toggle('navbar-mobile')
  this.classList.toggle('bx-menu')
  this.classList.toggle('bx-x')
})

/**
 * Mobile nav dropdowns activate
 */
on('click', '.navbar .dropdown > a', function(e) {
  if (select('#navbar').classList.contains('navbar-mobile')) {
    e.preventDefault()
    this.nextElementSibling.classList.toggle('dropdown-active')
  }
}, true)

/**
 * Scrool with ofset on links with a class name .scrollto
 */
on('click', '.scrollto', function(e) {
  if (select(this.hash)) {
    e.preventDefault()

    let navbar = select('#navbar')
    if (navbar.classList.contains('navbar-mobile')) {
      navbar.classList.remove('navbar-mobile')
      let navbarToggle = select('.mobile-nav-toggle')
      navbarToggle.classList.toggle('bi-list')
      navbarToggle.classList.toggle('bi-x')
    }
    scrollto(this.hash)
  }
}, true)

//video pagination script by soumen
// Returns an array of maxLength (or less) page numbers
// where a 0 in the returned array denotes a gap in the series.
// Parameters:
//   totalPages:     total number of pages
//   page:           current page
//   maxLength:      maximum size of returned array
function getPageList(totalPages, page, maxLength) {
  if (maxLength < 5) throw "maxLength must be at least 5";

  function range(start, end) {
    return Array.from(Array(end - start + 1), (_, i) => i + start);
  }

  var sideWidth = maxLength < 9 ? 1 : 2;
  var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
  var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
  if (totalPages <= maxLength) {
    // no breaks in list
    return range(1, totalPages);
  }
  if (page <= maxLength - sideWidth - 1 - rightWidth) {
    // no break on left of page
    return range(1, maxLength - sideWidth - 1)
      .concat([0])
      .concat(range(totalPages - sideWidth + 1, totalPages));
  }
  if (page >= totalPages - sideWidth - 1 - rightWidth) {
    // no break on right of page
    return range(1, sideWidth)
      .concat([0])
      .concat(
        range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
      );
  }
  // Breaks on both sides
  return range(1, sideWidth)
    .concat([0])
    .concat(range(page - leftWidth, page + rightWidth))
    .concat([0])
    .concat(range(totalPages - sideWidth + 1, totalPages));
}

$(function() {
  // Number of items and limits the number of items per page
  var numberOfItems = $("#jar .content").length;
  var limitPerPage = 2;
  // Total pages rounded upwards
  var totalPages = Math.ceil(numberOfItems / limitPerPage);
  // Number of buttons at the top, not counting prev/next,
  // but including the dotted buttons.
  // Must be at least 5:
  var paginationSize = 7;
  var currentPage;

  function showPage(whichPage) {
    if (whichPage < 1 || whichPage > totalPages) return false;
    currentPage = whichPage;
    $("#jar .content")
      .hide()
      .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
      .show();
    // Replace the navigation items (not prev/next):
    $(".pagination li").slice(1, -1).remove();
    getPageList(totalPages, currentPage, paginationSize).forEach(item => {
      $("<li>")
        .addClass(
          "page-item " +
            (item ? "current-page " : "") +
            (item === currentPage ? "active " : "")
        )
        .append(
          $("<a>")
            .addClass("page-link")
            .attr({
              href: "javascript:void(0)"
            })
            .text(item || "...")
        )
        .insertBefore("#next-page");
    });
    return true;
  }



  // Show the page links
  $("#jar").show();
  showPage(1);

  // Use event delegation, as these items are recreated later
  $(
    document
  ).on("click", ".pagination li.current-page:not(.active)", function() {
    return showPage(+$(this).text());
  });
  $("#next-page").on("click", function() {
    return showPage(currentPage + 1);
  });

  $("#previous-page").on("click", function() {
    return showPage(currentPage - 1);
  });
  $(".pagination").on("click", function() {
    $("html,body").animate({ scrollTop: 0 }, 0);
  });
});

//aos
AOS.init();
    $(document).ready(function() {
        var texts = $('.change-text');
        var counter = 0;
        function changeText() {
            var currentText = texts.eq(counter);
            var nextText = texts.eq((counter + 1) % texts.length);
            currentText.fadeOut(1000, function() {
                nextText.fadeIn(1000);
            });
            counter = (counter + 1) % texts.length;
            setTimeout(changeText, 3000); // Change text every 3 seconds
        }
        changeText(); // Start the animation
    });

    
/* ================================ New carousel Homepage JS  =======================================*/


    
    $(".hover").mouseleave(
      function () {
        $(this).removeClass("hover");
      }
    );


    
      /**
       * filter button
       */
    
      
      $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
    //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
    //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
    $(this).removeClass("active");
    }
    $(this).addClass("active");
    
    
    
$(document).ready(function () {
  $('.carousel4').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 4000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  })
});

    $(".case-two__carousel").owlCarousel({
      loop: true,
    margin: 10,
    nav: false,
    dots: false,
    dotsData: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 2
        },
        1024: {
          items: 3
        },
        1200: {
          items: 3
        }
      }
    });
  
// --------------------------Home------------------------------------------------

// ---------------------Accro seo result---------------------------------
    $('.about-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })

    function toggleCards() {
      const hiddenCards = document.querySelectorAll('.hidden-card');
      const btn = document.getElementById('gallery-btn');
      let areHiddenCardsVisible = false;
    
      hiddenCards.forEach(card => {
          if (card.style.display === 'none' || card.style.display === '') {
              card.style.display = 'block';
              areHiddenCardsVisible = true;
          } else {
              card.style.display = 'none';
          }
      });
    
      // Update the button text based on the current visibility of the hidden cards
      btn.innerText = areHiddenCardsVisible ? 'Show Less' : 'Show More';
    }

    // -------------------------- Our expertise -----------------------------
     /**
   * Initiate glightbox 
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });
  

   // -------------------------- Seo Header -----------------------------

  function changeText() {
    const spanElement = document.getElementById('slider-data');
    
    const texts = ['get discovered when customers search for you','how do i keep visitors on my website longer', 'what makes visitors stay on a website'];
    
    let index = 0;
    
    setInterval(() => {
      spanElement.textContent = texts[index];
      index = (index + 1) % texts.length;
    }, 2000);
  }

  changeText();





  







    