// -----------------blog index fiter js----------------------
$(document).ready(function () {
    $('.filter-blog').show();
    $('.filter-button-blog').removeClass('active');
    $('.filter-button-blog[data-filter="all"]').addClass('active');

    $(".filter-button-blog").click(function () {
        var value = $(this).attr('data-filter');

        $('.filter-button-blog').removeClass('active');
        $(this).addClass('active');

        if (value == "all") {
            $('.filter-blog').show('1000');
        } else {
            $(".filter-blog").not('.' + value).hide('3000');
            $('.filter-blog').filter('.' + value).show('3000');
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    // Select elements
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const navbar = document.querySelector('#navbar');
    const dropdownLinks = document.querySelectorAll('.navbar .dropdown > a');

    // Toggle mobile nav
    mobileNavToggle.addEventListener('click', () => {
        navbar.classList.toggle('navbar-mobile');
        mobileNavToggle.classList.toggle('bx-menu');
        mobileNavToggle.classList.toggle('bx-x');
    });

    // Toggle dropdown in mobile nav
    dropdownLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (navbar.classList.contains('navbar-mobile')) {
                e.preventDefault();

                // Toggle the dropdown-active class on the parent <li>
                const parentLi = link.parentNode;
                const subMenu = parentLi.querySelector('ul');

                // Close any other open dropdowns in mobile view
                document.querySelectorAll('.dropdown-active').forEach(activeDropdown => {
                    if (activeDropdown !== parentLi) {
                        activeDropdown.classList.remove('dropdown-active');
                    }
                });

                // Toggle the current dropdown
                parentLi.classList.toggle('dropdown-active');

                // Ensure sub-menu visibility
                if (subMenu) {
                    subMenu.style.display = parentLi.classList.contains('dropdown-active') ? 'block' : 'none';
                }
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Asia Section
    const showMoreBtnAsia = document.getElementById("showMoreBtnAsia");
    const showLessBtnAsia = document.getElementById("showLessBtnAsia");
    const asiaColumns = document.querySelectorAll(".filter.asia .flag-column");

    asiaColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {
                flag.classList.add("hidden-flag");
            }
        });
    });

    showMoreBtnAsia.addEventListener("click", function () {
        const hiddenFlags = document.querySelectorAll(".filter.asia .hidden-flag");
        hiddenFlags.forEach((flag) => {
            flag.classList.remove("hidden-flag");
        });
        showMoreBtnAsia.style.display = "none";
        showLessBtnAsia.style.display = "inline-block";
    });

    showLessBtnAsia.addEventListener("click", function () {
        asiaColumns.forEach((column) => {
            const flags = column.querySelectorAll(".flag-item");
            flags.forEach((flag, index) => {
                if (index >= 5) {
                    flag.classList.add("hidden-flag");
                }
            });
        });
        showLessBtnAsia.style.display = "none";
        showMoreBtnAsia.style.display = "inline-block";
    });

    // Europe Section
    const showMoreBtnEurope = document.getElementById("showMoreBtnEurope");
    const showLessBtnEurope = document.getElementById("showLessBtnEurope");
    const europeColumns = document.querySelectorAll(".filter.europe .flag-column");

    europeColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {
                flag.classList.add("hidden-flag");
            }
        });
    });

    showMoreBtnEurope.addEventListener("click", function () {
        const hiddenFlags = document.querySelectorAll(".filter.europe .hidden-flag");
        hiddenFlags.forEach((flag) => {
            flag.classList.remove("hidden-flag");
        });
        showMoreBtnEurope.style.display = "none";
        showLessBtnEurope.style.display = "inline-block";
    });

    showLessBtnEurope.addEventListener("click", function () {
        europeColumns.forEach((column) => {
            const flags = column.querySelectorAll(".flag-item");
            flags.forEach((flag, index) => {
                if (index >= 5) {
                    flag.classList.add("hidden-flag");
                }
            });
        });
        showLessBtnEurope.style.display = "none";
        showMoreBtnEurope.style.display = "inline-block";
    });

    // North America Section
    const showMoreBtnNorthAmerica = document.getElementById("showMoreBtnNorthAmerica");
    const showLessBtnNorthAmerica = document.getElementById("showLessBtnNorthAmerica");
    const northAmericaColumns = document.querySelectorAll(".filter.north-america .flag-column");

    northAmericaColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {
                flag.classList.add("hidden-flag");
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const showMoreBtnNorthAmerica = document.getElementById("showMoreBtnNorthAmerica");
        const showLessBtnNorthAmerica = document.getElementById("showLessBtnNorthAmerica");
        const northAmericaColumns = document.querySelectorAll(".filter.north-america");

        // Check if elements exist before adding event listeners
        if (showMoreBtnNorthAmerica && showLessBtnNorthAmerica) {
            showMoreBtnNorthAmerica.addEventListener("click", function () {
                const hiddenFlags = document.querySelectorAll(".filter.north-america .hidden-flag");
                hiddenFlags.forEach((flag) => {
                    flag.classList.remove("hidden-flag");
                });
                showMoreBtnNorthAmerica.style.display = "none";
                showLessBtnNorthAmerica.style.display = "inline-block";
            });

            showLessBtnNorthAmerica.addEventListener("click", function () {
                northAmericaColumns.forEach((column) => {
                    const flags = column.querySelectorAll(".flag-item");
                    flags.forEach((flag, index) => {
                        if (index >= 5) {
                            flag.classList.add("hidden-flag");
                        }
                    });
                });
                showLessBtnNorthAmerica.style.display = "none";
                showMoreBtnNorthAmerica.style.display = "inline-block";
            });
        }
    });


    // South America Section
    const showMoreBtnSouthAmerica = document.getElementById("showMoreBtnSouthAmerica");
    const showLessBtnSouthAmerica = document.getElementById("showLessBtnSouthAmerica");
    const southAmericaColumns = document.querySelectorAll(".filter.south-america .flag-column");

    southAmericaColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {
                flag.classList.add("hidden-flag");
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const showMoreBtnSouthAmerica = document.getElementById("showMoreBtnSouthAmerica");
        const showLessBtnSouthAmerica = document.getElementById("showLessBtnSouthAmerica");
        const southAmericaColumns = document.querySelectorAll(".filter.south-america");
    
        // Ensure elements exist before adding event listeners
        if (showMoreBtnSouthAmerica && showLessBtnSouthAmerica) {
            showMoreBtnSouthAmerica.addEventListener("click", function () {
                const hiddenFlags = document.querySelectorAll(".filter.south-america .hidden-flag");
                hiddenFlags.forEach((flag) => {
                    flag.classList.remove("hidden-flag");
                });
                showMoreBtnSouthAmerica.style.display = "none";
                showLessBtnSouthAmerica.style.display = "inline-block";
            });
    
            showLessBtnSouthAmerica.addEventListener("click", function () {
                southAmericaColumns.forEach((column) => {
                    const flags = column.querySelectorAll(".flag-item");
                    flags.forEach((flag, index) => {
                        if (index >= 5) {
                            flag.classList.add("hidden-flag");
                        }
                    });
                });
                showLessBtnSouthAmerica.style.display = "none";
                showMoreBtnSouthAmerica.style.display = "inline-block";
            });
        } else {
            console.error('Error: One or both buttons not found.');
        }
    });
    
    // Australia Section
    const showMoreBtnAustralia = document.getElementById("showMoreBtnAustralia");
    const showLessBtnAustralia = document.getElementById("showLessBtnAustralia");
    const australiaColumns = document.querySelectorAll(".filter.australia .flag-column");

    australiaColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {
                flag.classList.add("hidden-flag");
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const showMoreBtnAustralia = document.getElementById("showMoreBtnAustralia");
        const showLessBtnAustralia = document.getElementById("showLessBtnAustralia");
        const australiaColumns = document.querySelectorAll(".filter.australia");
    
        // Ensure elements exist before adding event listeners
        if (showMoreBtnAustralia && showLessBtnAustralia) {
            showMoreBtnAustralia.addEventListener("click", function () {
                const hiddenFlags = document.querySelectorAll(".filter.australia .hidden-flag");
                hiddenFlags.forEach((flag) => {
                    flag.classList.remove("hidden-flag");
                });
                showMoreBtnAustralia.style.display = "none";
                showLessBtnAustralia.style.display = "inline-block";
            });
    
            showLessBtnAustralia.addEventListener("click", function () {
                australiaColumns.forEach((column) => {
                    const flags = column.querySelectorAll(".flag-item");
                    flags.forEach((flag, index) => {
                        if (index >= 5) {
                            flag.classList.add("hidden-flag");
                        }
                    });
                });
                showLessBtnAustralia.style.display = "none";
                showMoreBtnAustralia.style.display = "inline-block";
            });
        } else {
            console.error('Error: One or both buttons are not found in the DOM.');
        }
    }); 

    // Africa Section
    const showMoreBtnAfrica = document.getElementById("showMoreBtnAfrica");
    const showLessBtnAfrica = document.getElementById("showLessBtnAfrica");
    const africaColumns = document.querySelectorAll(".filter.africa .flag-column");

    africaColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {
                flag.classList.add("hidden-flag");
            }
        });
    });

    showMoreBtnAfrica.addEventListener("click", function () {
        const hiddenFlags = document.querySelectorAll(".filter.africa .hidden-flag");
        hiddenFlags.forEach((flag) => {
            flag.classList.remove("hidden-flag");
        });
        showMoreBtnAfrica.style.display = "none";
        showLessBtnAfrica.style.display = "inline-block";
    });

    showLessBtnAfrica.addEventListener("click", function () {
        africaColumns.forEach((column) => {
            const flags = column.querySelectorAll(".flag-item");
            flags.forEach((flag, index) => {
                if (index >= 5) {
                    flag.classList.add("hidden-flag");
                }
            });
        });
        showLessBtnAfrica.style.display = "none";
        showMoreBtnAfrica.style.display = "inline-block";
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Africa Section
    const showMoreBtnAfrica = document.getElementById("showMoreBtnAfrica");
    const showLessBtnAfrica = document.getElementById("showLessBtnAfrica");
    const africaColumns = document.querySelectorAll(".filter.africa .flag-column");

    // Initially hide all flags in the second column
    africaColumns.forEach((column) => {
        const flags = column.querySelectorAll(".flag-item");
        flags.forEach((flag, index) => {
            if (index >= 5) {  // Hide all flags after the 6th one
                flag.classList.add("hidden-flag");
            }
        });
    });

    // Show More button click event
    showMoreBtnAfrica.addEventListener("click", function () {
        const hiddenFlags = document.querySelectorAll(".filter.africa .hidden-flag");
        hiddenFlags.forEach((flag) => {
            flag.classList.remove("hidden-flag");
        });
        showMoreBtnAfrica.style.display = "none";  // Hide Show More button
        showLessBtnAfrica.style.display = "inline-block";  // Show Show Less button
    });

    // Show Less button click event
    showLessBtnAfrica.addEventListener("click", function () {
        africaColumns.forEach((column) => {
            const flags = column.querySelectorAll(".flag-item");
            flags.forEach((flag, index) => {
                if (index >= 5) {  // Hide flags after the 6th one
                    flag.classList.add("hidden-flag");
                }
            });
        });
        showLessBtnAfrica.style.display = "none";  // Hide Show Less button
        showMoreBtnAfrica.style.display = "inline-block";  // Show Show More button
    });
})

$(document).ready(function () {
    function showActiveContent() {
        // Get the active filter button
        var activeFilter = $('.filter-button.active').data('filter');

        // Hide all sections initially
        $('.filter').hide();

        // Show only the active section
        $('.filter.' + activeFilter).show();
    }

    // Show active content on page load
    showActiveContent();

    // Handle filter button clicks
    $(".filter-button").click(function () {
        var value = $(this).data('filter');

        // Toggle visibility of the content based on the selected filter
        $(".filter").hide();
        $('.filter.' + value).show();

        // Remove 'active' class from all buttons and add to the clicked one
        $(".filter-button").removeClass("active");
        $(this).addClass("active");
    });
});

// ******************** Pricing Dropdown ****************************
$(document).ready(function () {
    // Function to show content based on the selected filter with unique names
    function updatePricingTableDisplay() {
        // Get the value of the selected country from unique dropdown
        var selectedFilter = $('.country-select-unique').val();

        // Hide all filterable bodies with unique class
        $('.pricing-content-filter').hide();

        // Show the filter that matches the selected value
        $('.' + selectedFilter).show();
    }

    // Update the display on page load with the unique function
    updatePricingTableDisplay();

    // Handle changes in the dropdown with unique class
    $('.country-select-unique').change(updatePricingTableDisplay);
});


// ******************** faq Dropdown for mobile ****************************
$(document).ready(function () {
    function updateFAQDisplay() {
        var selectedCategory = $('#faq-category-select').val();
        $('.faq-content').hide();
        $('.' + selectedCategory).fadeIn();
    }

    updateFAQDisplay();
    $('#faq-category-select').change(updateFAQDisplay);
});

$('.slide-down-to-sec').click(function () {
    $('html, body').animate({
        scrollTop: $('section').next().offset().top
    }, 1000);
});

// Custom Scripts for Pelican Template //

jQuery(function ($) {
    "use strict";

    $('.carousel-test').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        navText: ["<i class='bi bi-arrow-left'></i>", "<i class='bi bi-arrow-right'></i>"],
        autoplay: false,
        autoplayTimeout: 3000,
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

    $('.carousel-pricing').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        navText: ["<i class='bi bi-arrow-left'></i>", "<i class='bi bi-arrow-right'></i>"],
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            900: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    })

    $('.carousel-slide-for').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
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

    // --------------------Event---------------------------

    $(document).ready(function () {

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage = 5;
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: true,
            dots: true,
            loop: true,
            responsiveRefreshRate: 200,
            navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: false,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 1,
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {

            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }


            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });

    // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
    var mainbottom = $('#main').offset().top;

    // on scroll,
    $(window).on('scroll', function () {

        // we round here to reduce a little workload
        stop = Math.round($(window).scrollTop());
        if (stop > mainbottom) {
            $('.navbar').addClass('past-main');
            $('.navbar').addClass('effect-main')
        } else {
            $('.navbar').removeClass('past-main');
        }

    });


    /* faq accordion */
    $(document).ready(function () {
        // Add minus icon for collapse element which
        // is open by default
        $(".collapse.show").each(function () {
            $(this).prev(".card-header").find(".bx")
                .addClass("bx-minus").removeClass("bx-plus");
        });
        // Toggle plus minus icon on show hide
        // of collapse element
        $(".collapse").on('show.bs.collapse', function () {
            $(this).prev(".card-header").find(".bx")
                .removeClass("bx-plus").addClass("bx-minus");
        }).on('hide.bs.collapse', function () {
            $(this).prev(".card-header").find(".bx")
                .removeClass("bx-minus").addClass("bx-plus");
        });
    }); 
});


/* ==================== Calculator ====================*/
function calculateResult() {
    let input = document.getElementById("transactionInput").value;
    let num = parseFloat(input);

    if (isNaN(num) || num < 0) {
        alert("Please enter a valid number.");
        return;
    }

    let rate = getRate(num);
    let result = num * rate;
    document.getElementById("result").innerText = `£${result.toFixed(5)}`;

    // Calculate other currencies
    updateCurrencyResults(result);
}

function updateRate() {
    let input = document.getElementById("transactionInput").value;
    let num = parseFloat(input);

    let rate = getRate(num);
    document.getElementById("rateDisplay").value = `£${rate}`;
}

function getRate(num) {
    if (num <= 15000) return 0.082;
    if (num <= 25000) return 0.049;
    if (num <= 35000) return 0.041;
    if (num <= 45000) return 0.033;
    if (num <= 55000) return 0.025;
    if (num <= 75000) return 0.016;
    if (num <= 100000) return 0.008;
    if (num <= 250000) return 0.004;
    if (num <= 500000) return 0.0008;
    if (num <= 1000000) return 0.0004;
    if (num <= 5000000) return 0.00008;
    if (num <= 10000000) return 0.00004;
    if (num <= 100000000) return 0.00002;
    return 0.00001;
}

function updateCurrencyResults(gbpAmount) {
    // Conversion rates
    const eurRate = 1.20;
    const cadRate = 1.86;
    const audRate = 2.07;
    const aedRate = 4.74;
    const usdRate = 1.29;

    // Calculating the other currencies
    const eurAmount = (gbpAmount * eurRate).toFixed(2);
    const cadAmount = (gbpAmount * cadRate).toFixed(2);
    const audAmount = (gbpAmount * audRate).toFixed(2);
    const aedAmount = (gbpAmount * aedRate).toFixed(2);
    const usdAmount = (gbpAmount * usdRate).toFixed(2);

    // Displaying the results
    document.getElementById("eurResult").innerText = `${eurAmount} EUR`;
    document.getElementById("cadResult").innerText = `${cadAmount} CAD`;
    document.getElementById("audResult").innerText = `${audAmount} AUD`;
    document.getElementById("aedResult").innerText = `${aedAmount} AED`;
    document.getElementById("usdResult").innerText = `${usdAmount} USD`;
}



document.querySelectorAll(".remit-power-text").forEach(item => {
    item.addEventListener("mouseover", function () {
        document.getElementById("dynamicImage").src = this.getAttribute("data-image");
    });
});