//owl-main slider

$(document).ready(function() {
    $('#owl-schoolslider').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 3000, 
        smartSpeed: 2000, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 1
            },
            768: {
                items: 1
            },
            1170: {
                items: 1
            }
        }
    });
});




//owl-main slider

$(document).ready(function() {
    $('#owl-schoolslider-two').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 2000, 
        smartSpeed: 1500, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 1
            },
            768: {
                items: 1
            },
            1170: {
                items: 1
            }
        }
    });
});



//owl-main slider

$(document).ready(function() {
    $('#owl-schoolslider-three').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 4000, 
        smartSpeed: 1000, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 1
            },
            768: {
                items: 1
            },
            1170: {
                items: 1
            }
        }
    });
});



//curated owl-slider

$(document).ready(function() {
    $('#owl-curatedslider').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 3000, 
        smartSpeed: 1000, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 1
            },
            768: {
                items: 1
            },
            1170: {
                items: 1
            }
        }
    });
});


//owl-exclusiveslider

$(document).ready(function() {
    $('#owl-exclusiveslider').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 3000, 
        smartSpeed: 1000, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 1
            },
            768: {
                items: 1
            },
            1170: {
                items: 1
            }
        }
    });
});


//owl-main slider

$(document).ready(function() {
    $('#owl-specification').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: false,
        nav: true,
        autoplayTimeout: 5000, 
        smartSpeed: 1000, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 1
            },
            768: {
                items: 1
            },
            1170: {
                items: 1
            }

        }
    });
});




//cour-partners slider

$(document).ready(function() {
    $('#owl-partnerslider').owlCarousel({
        loop: true,
        center: false,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 3000, 
        smartSpeed: 1000, // Corrected from "smartspeed"
        responsive: {
            0: {
                items: 1
            },
            370: {
                items: 2
            },
            768: {
                items: 3
            },
            1170: {
                items: 5
            }
        }
    });
});

$(document).ready(function() {
    $('.carousel3').owlCarousel({
        loop: true,
        autoplay: false,
        margin: 10,
        nav: true,
        dots: false,
        autoplayTimeout: 3000, 
        smartSpeed: 1000,
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
    });
});

(function ($) {

    $.fn.select3 = function (options) {
        var dataItems = [];
        var selectorID = '#' + this.attr('id');

        $(selectorID).find('option').each(function (index, element) {

            if (element.text != '') {
                dataItems.push(element.text.trim());
            }
            else {
                dataItems.push(element.value.trim());
            }

        });

        var opts = $.extend({}, $.fn.select3.defaults, options);

        var idDiv = this.attr('id') + 'searchSelect3';
        var idInput = this.attr('id') + 'searchSelect3_Input';
        var idClose = this.attr('id') + 'searchSelect3_Times';
        var idDown = this.attr('id') + 'searchSelect3_Caret_Down';
        var idList = this.attr('id') + 'searchSelect3_List';
        var idListLi = this.attr('id') + 'searchSelect3_List_LI';

        var selectorDiv = '#' + this.attr('id') + 'searchSelect3';
        var selectorInput = '#' + this.attr('id') + 'searchSelect3_Input';
        var selectorClose = '#' + this.attr('id') + 'searchSelect3_Times';
        var selectorDown = '#' + this.attr('id') + 'searchSelect3_Caret_Down';
        var selectorList = '#' + this.attr('id') + 'searchSelect3_List';
        var selectorListLi = '#' + this.attr('id') + 'searchSelect3_List_LI';

        var buildELement = $('<div class="searchSelect3" id="' + idDiv + '" style="position:relative;"><input class="searchSelect3_Input" placeholder="' + opts.placeholder + '" value="' + opts.defaultvalue + '" id="' + idInput + '"><span class="fa fa-times searchSelect3_Times" id="' + idClose + '"></span><span class="fa fa-caret-down searchSelect3_Caret_Down" id="' + idDown + '"></span></div>');

        if ($(selectorDiv).length > 0) {
            $(selectorDiv).remove();
        }

        this.after(buildELement);

        if (opts.width > 0) {
            $(selectorInput).css('width', opts.width);
            $(selectorDown).css('left', (opts.width - 20));
            $(selectorClose).css('left', (opts.width - 40));
        }


        var cache = {};
        var drew = false;
        this.hide();

        $(document).on('click', function (e) {
            //untuk menghilangkan list saat unfocus
            if ($(e.target).parent().is("li[id*='" + idListLi + "']") == false) {
                if ($(e.target).attr('id') != idInput && $(e.target).attr('id') != idDown) {
                    $(selectorList).empty();
                    $(selectorList).css('z-index', -1);
                    $(selectorClose).hide();
                }
            }      

        });

        var showList = function (query, valuee) {

            //Check if we've searched for this term before
            if (query in cache) {
                results = cache[query];
            } else {
                //Case insensitive search for our people array
                var results = $.grep(dataItems, function (item) {
                    return item.search(RegExp(query, "i")) != -1;
                });

                //Add results to cache
                cache[query] = results;
            }

            //First search
            $(selectorList).css('z-index', opts.zIndex);


            if (drew == false) {
                //Create list for results
                $(selectorInput).after('<ul id="' + idList + '" class="searchSelect3_List" style="z-index:' + opts.zIndex + '"></ul>');

                if (opts.width > 0) {

                    $(selectorList).css('width', opts.width);

                }

                if (opts.widthList > 0)
                {
                    $(selectorList).css('width', opts.widthList);
                }

                //Prevent redrawing/binding of list
                drew = true;

                //Bind click event to list elements in results
                $(selectorList).on("click", "li", function () {
                    var nilai = $(this).text()
                    $(selectorInput).val(nilai);
                    $(selectorID).val(nilai);
                    $(selectorList).empty();
                    $(selectorClose).show();
                    $(selectorList).css('z-index', -1);
                    $(selectorID).change();
                });


            }
                //Clear old results
            else {
                $(selectorList).empty();
            }

            var counter = 0;
            //Add results to the list
            for (term in results) {
                counter++;
                $(selectorList).append("<li id=" + idListLi + counter + "><label>" + results[term] + "</label></li>");
            }   

        };
        $(selectorInput).on('click', function (e) {
            var query = $(this).val();

            showList('', query);


            $(selectorClose).hide();
            if (query.length > 0) {
                $(selectorClose).show();
            }

        });

        $(selectorInput).on('keyup', function (e) {
            $(selectorList).empty();
            var query = $(selectorInput).val();
            showList(query, query);

            $(selectorClose).hide();
            if (query.length > 0) {
                $(selectorClose).show();
            }

            $(selectorID).change();
        });

        //bila key tab di tekan maka akan pindah ke DOM lain, maka dari itu mesti di HIDE LIST nya
        $(selectorInput).on('keydown', function (e) {
            if (e.which == 9) {
                $(selectorList).empty();
                $(selectorList).css('z-index', -1);
                $(selectorClose).hide();
            }
        });

        $(selectorDown).on('click', function (e) {
            var query = $(this).val();
            if ($(selectorList).find('li').length == 0) {
                showList('', query);
            }
            else {
                //$(selectorList).css('z-index', -1);
                $(selectorList).empty();
                $(selectorList).css('z-index', -1);
            }

            $(selectorClose).hide();
            if (query.length > 0) {
                $(selectorClose).show();
            }

        });

        $(selectorClose).on('click', function (e) {
            $(selectorInput).val('');
            $(selectorClose).hide();
            $(selectorID).change();

        });


        return this;
    };

    $.fn.select3.defaults = {
        placeholder: "",
        zIndex: 1,
        defaultvalue: "",
        width: 0,
        widthList: 0
    };

}(jQuery));
/* END select3.js */


$(document).ready(function(e){
  $('#selectBankList').select3({ placeholder: 'Location', zIndex: 100 });    
});


$(document).ready(function() {
    $('.carousel4').owlCarousel({
        loop: true,
        autoplay: false,
        margin: 10,
        nav: true,
        dots: true,
        autoplayTimeout: 3000, 
        smartSpeed: 1000,
        navText : ["<i class='bi bi-arrow-left'></i>","<i class='bi bi-arrow-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
})