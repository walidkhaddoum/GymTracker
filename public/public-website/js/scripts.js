$(document).ready(function(){
    
    //OS and browsers check========================/
    function getOS() {
      var userAgent = window.navigator.userAgent,
          platform = window.navigator.platform,
          macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
          windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
          iosPlatforms = ['iPhone', 'iPad', 'iPod'],
          os = null;

      if (macosPlatforms.indexOf(platform) !== -1) {
        os = 'Mac OS';
      } else if (iosPlatforms.indexOf(platform) !== -1) {
        os = 'iOS';
      } else if (windowsPlatforms.indexOf(platform) !== -1) {
        os = 'Windows';
      } else if (/Android/.test(userAgent)) {
        os = 'Android';
      } else if (!os && /Linux/.test(platform)) {
        os = 'Linux';
      }

      return os;
    }
    
    if (getOS() == "Windows") {
        $("body").addClass("os-windows");
        
        function scrollbarWidth() {
            var block = $('<div>').css({'height':'50px','width':'50px'}),
                indicator = $('<div>').css({'height':'200px'});

            $('body').append(block.append(indicator));
            var w1 = $('div', block).innerWidth();    
            block.css('overflow-y', 'scroll');
            var w2 = $('div', block).innerWidth();
            $(block).remove();
            return (w1 - w2);
        }

        $("head").append('<style>body.lg-on {margin-right: '+scrollbarWidth()+'px;}</style>');
    }
    
    if (getOS() == "iOS") {
        $("body").addClass("os-ios");
    }
    
    if (navigator.userAgent.search("Chrome") >= 0) {
        $("body").addClass("chrome-browser");
    }
    else if (navigator.userAgent.search("Firefox") >= 0) {
        $("body").addClass("firefox-browser");
        $("head").append("<style>.body-margin {margin-right:"+scrollbarWidth()+"px}</style>");  
    }
    else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("body").addClass("safari-browser");
    }
    else if (navigator.userAgent.search("Opera") >= 0) {
        $("body").addClass("opera-browser");
    }
    
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    
    if (/IEMobile|Windows Phone/i.test(navigator.userAgent)) {
        var windowsPhone = true;
    }
    //OS check========================/
    
    
    //Popup fix========================/
    function popupFunction(){  
        if((iOS == true) || (windowsPhone == true)) {
            var scrollTop = $(window).scrollTop();
            var windowH = $(window).innerHeight();

            $("body").addClass("pop-up-open");
            $("body").attr("data-top", scrollTop);
            if (windowsPhone == true) {
                $("body").css("top", scrollTop);
            }
            $("body").css({
                "top": "-" + scrollTop + "px"
            });
        } 
    }

    function popupCloseFunction(){
        if((iOS == true) || (windowsPhone == true)) {
            var scTop = $("body").attr("data-top");
            if (windowsPhone == true) {
                var scTop = $("body").css("top");
            }
            var suffix = scTop.match(/\d+/);
            $("body").removeClass("pop-up-open");
            $("body").removeAttr("style");

            $("html, body").scrollTop(parseInt(suffix));
        }
    }
    //Popup fix========================/
    
    
    //if IE========================/
    function msieversion() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))
        {
            //alert("IE");
            $("body").addClass("ie-browser");
            
            $(".ie-img").each(function(){
                var thisDiv = $(this),
                    thisImg = thisDiv.children("img"),
                    imgSrc = thisImg.attr("src");
                thisImg.hide();
                thisDiv.attr("style", "background-image: url(" + imgSrc + "); background-size: cover; background-position: center center; background-repeat: no-repeat;")
            });
        }
        else 
        {
            // not IE
        }
        return false;
    }
    msieversion();
    //if IE========================/
    
    
    
    //Footer fix========================/
    $(window).on('resize',function() {
        var footerHeight = $(".footer").innerHeight(),
            windowHeight = $(window).innerHeight(),
            containerHeight = $(".container").innerHeight();
        
//        alert(windowHeight);
//        alert(containerHeight);
        
        if (!$(".footer").hasClass("absolute")) {
            if (containerHeight < windowHeight) {
                $(".footer").addClass("absolute");
                $(".container").addClass("fullheight");
            }
        } else {
            if ((containerHeight+footerHeight) >= windowHeight) {
                $(".footer").removeClass("absolute");
                $(".container").removeClass("fullheight");
            }
        }
        
    });
    //Footer fix========================/


    $(window).trigger('resize');
    
    
    //LightGallery========================/
    $('.lightgallery').lightGallery({
        //mode: 'lg-slide-circular',
        counter: false,
        closable: true
    });
    //LightGallery========================/
    
    
    
    //Calendar========================/
    $(".js_calendar").datepicker({
      dateFormat: "d MM yy",
        dayNamesMin: [ "S", "M", "T", "W", "T", "F", "S" ],
        monthNames: [ "January", "February", "March", "April", "May", "June", "Jule", "August", "September", "Oktober", "November", "December" ],
        setDate: "today",
        firstDay: 0
    });
    
     $(".js_calendar").datepicker().datepicker("setDate", new Date());
     
    
    $(window).on("load", function(){
        $(".js_calendar").each(function(){
            var thisInput = $(this);
            
            var thisParent = thisInput.parent();
            var thisVal = thisInput.val();
            var date = thisVal.split(' ');

            var day = date[0];
            var month = date[1];
            var year = date[2];

            $(".js-day").text(day);
            $(".js-month").text(month);
            $(".js-year").text(year);
            
            $(".input-date-value").val(day + " " + month + " " + year);
        });
    });
    
    $(".js_calendar").on("change", function(){
        var thisParent = $(this).parent();
        var thisVal = $(this).val();
        var date = thisVal.split(' ');
        var dateValueInput = $(this).siblings(".input-date-value");
        
        var day = date[0];
        var month = date[1];
        var year = date[2];
        
        var thisDayDiv = thisParent.find(".js-day");
        var thisMonthDiv = thisParent.find(".js-month");
        var thisYearDiv = thisParent.find(".js-year");
        
        thisDayDiv.text(day);
        thisMonthDiv.text(month);
        thisYearDiv.text(year);
        
        dateValueInput.val(day + " " + month + " " + year);
    });
    
    if (!device.desktop()) {
        
        $(".js-date").append('<input type="date" class="mobile-date">');
    
        var months = [
            "January", "February", "March", "April", "May", "June", "Jule", "August", "September", "Oktober", "November", "December"
        ]
        
        $(".js-date .mobile-date").on("change", function(){
            var thisParent = $(this).parent();
            var thisVal = $(this).val();
            var date = thisVal.split('-');
            var thisDatePicker = $(this).siblings(".input-date");
            var dateValueInput = $(this).siblings(".input-date-value");
            var day = date[2];
            var day = day.replace(/^0+/, '');
            var month = date[1];
            var month = months[+month-1];
            var year = date[0];

                thisDatePicker.datepicker().datepicker("setDate", (day + " " + month + " " + year));

            var thisDayDiv = thisParent.find(".js-day");
            var thisMonthDiv = thisParent.find(".js-month");
            var thisYearDiv = thisParent.find(".js-year");

            thisDayDiv.text(day);
            thisMonthDiv.text(month);
            thisYearDiv.text(year);
            
            dateValueInput.val(day + " " + month + " " + year);
        });
    }
    //Calendar========================/
    
    
    //Dropdown menu========================/
    if (device.desktop()) {
        if (window.innerWidth > 1260) {
            $(".dropdown_li").on({
                mouseenter: function () {
                    var thisLi = $(this),
                       thisA = thisLi.children("a"),
                       thisMenu = thisLi.children("ul");

                    if (window.innerWidth > 1200) {
                        thisMenu.stop( true, true ).fadeIn(120);
                    }

                    if (window.innerWidth <= 1200) {
                        thisMenu.stop( true, true ).slideDown();
                    }
                        thisA.addClass("hover");
                },
                mouseleave: function () {
                    var thisLi = $(this),
                   thisA = thisLi.children("a"),
                   thisMenu = thisLi.children("ul");

                    if (window.innerWidth > 1200) {
                        thisMenu.stop( true, true ).fadeOut(120);
                    }

                    if (window.innerWidth <= 1200) {
                        thisMenu.stop( true, true ).slideUp();
                    }
                  thisA.removeClass("hover");
                }
            });
        }
        
        if (window.innerWidth <= 1260) {
            $(".dropdown_li > a").on("click", function(e){
                e.preventDefault();
                var thisA = $(this),
                   thisLi = thisA.parent(),
                   thisMenu = thisA.next("ul");
                    thisMenu.stop( true, true ).slideToggle();
                  thisA.toggleClass("hover");
            });
        } else {
            $(".dropdown_li > a").on("click", function(e){
                e.preventDefault();
            });
        }
        
    }
    
    if (!device.desktop()) {
        $(".dropdown_li > a").on("click", function(e){
            e.preventDefault();
            var thisA = $(this),
               thisLi = thisA.parent(),
               thisMenu = thisA.next("ul");
            
            if (device.tablet()) {
                $(".dropdown_ul").not(thisMenu).slideUp();
                
                $(document).on("click", function (e){
                    var div = $("#menu-ul");
                    if (!div.is(e.target)
                        && div.has(e.target).length === 0) {
                            $(".dropdown_ul").slideUp();
                    }
                });
            }
            
                thisMenu.stop( true, true ).slideToggle();
              thisA.toggleClass("hover");
            
            
        });
    }
    //Dropdown menu========================/
    
    
    //Select label========================/
    $(".js-select").on("change", function(){
        var thisVal = $(this).val();
        var thisParent = $(this).parents(".select_div"),
            thisTextVal = thisParent.children(".select_val");
        
        thisTextVal.text(thisVal);
    });
    //Select label========================/
    
    
    
    //Main slider mobile height========================/
    if (($(".top_slider").length) && ((device.desktop()) && (device.portrait()) || ((device.tablet()) && (device.landscape())))) {
            $("body").append("<div id='setHeight' style='position:fixed; top:0; bottom:0;left:0;right:0;z-index:-10'></div>")
             var activeHeight = $("#setHeight").innerHeight();
             $("#setHeight").remove();
            $(".top_slider").innerHeight(activeHeight);
            $(".top_slider .right").innerHeight($(".top_slider .right").innerHeight());
        
        if ((window.innerWidth > 480) && (window.innerWidth <= 1000)) {
            $(".top_slider .arrows .arrow").css({
            "top": "auto",
            "bottom": $(".top_slider .right").innerHeight() + "px"
        });
        }
    }
    //Main slider mobile height========================/
    
    
    //404 page========================/
    if (($(".page-404").length) && (!device.desktop()) && (device.portrait())) {
            $("body").append("<div id='setHeight' style='position:fixed; top:0; bottom:0;left:0;right:0;z-index:-10'></div>")
             var activeHeight = $("#setHeight").innerHeight();
             $("#setHeight").remove();
            $(".page-404").innerHeight(activeHeight);
    }
    //404 page========================/
    
    
    
    //Mobile menu ========================/
    $("#menu_btn").on("click", function(){
        var thisBtn = $(this),
            menu = $("#menu");
        
        $("html, body").addClass("locked");
        $("#overlay").fadeIn();
        menu.addClass("opened");
        popupFunction();
    });
    
    $("#menu-close, #overlay").on("click", function(){
        $("html, body").removeClass("locked");
        $("#menu").removeClass("opened");
        $("#overlay").fadeOut();
        popupCloseFunction();
    });
    //Mobile menu ========================/
    
    
    //Main slider Light version========================/
    if ($("#main_slider").length) {
        $('#main_slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            swipe: true,
            fade: true,
            touchMove: true,
            draggable: true,
            autoplay: true,
            speed: 600,
            autoplaySpeed: 20000,
            prevArrow: $('.top_slider .arrow.prev'),
            nextArrow: $('.top_slider .arrow.next')
        });
        
        $("#main_slider .slide").each(function(){
            var thisSlide = $(this),
                thisColor = thisSlide.attr("data-color"),
                thisBtn = thisSlide.find(".btn");
            
            thisSlide.find(".right_bottom").attr("style", "background-color: " + thisColor);
            thisSlide.find("i").attr("style", "background-color: " + thisColor);
            thisSlide.find(".p").children("a").css({
                "color": thisColor,
                "border-color": thisColor
            });
            thisBtn.css("background-color", thisColor);
        });
    }
    
    
    //Main slider Dark version ========================/
    if ($("#main_slider-dark").length) {
        $('#main_slider-dark').slick({
            arrows: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            swipe: true,
            fade: false,
            touchMove: true,
            draggable: true,
            autoplay: true,
            speed: 300,
            autoplaySpeed: 20000,
            prevArrow: $('.top_slider .arrow.prev'),
            nextArrow: $('.top_slider .arrow.next')
        });
    }
    
    
    //Different colors posts ========================/
    $(".schedule .item").each(function(){
       var thisItem = $(this);
        thisItem.append('<div class="bg"></div>');
         var thisCategory = thisItem.find(".category");
        thisCategory.append("<span class='point'></span>");
        var thisBg = thisItem.find(".bg");
        var thisBtn = thisItem.find(".btn");
        
        if (thisItem.attr("data-color")) {
            
            var thisColor = thisItem.attr("data-color");
            
            thisCategory.children(".point").css("background-color", thisColor);
            thisBg.css("background-color", thisColor);
            thisBtn.css("color", thisColor);
        }
    });
    
    if ($(".classes_item").length) {
        $(".classes_item").append('<div class="bg"></div>');
    }
    
    if ($(".lessons").length) {
        $(".lesson-item").append('<div class="bg"></div>');
    }
    
    if ($(".classes_page").length) {
        var thisColor = $("body").attr("data-color");
        
        $(".classes_header .left .content .btn.js-change").css("background-color", thisColor);
        $(".classes_header .right.js-change").css("background-color", thisColor);
        $(".classes_page .top_panel .right .btn.js-change").css("color", thisColor);
        $(".date-span").css("color", thisColor);
        $(".date-field").css("border-color", thisColor);
        $(".schedule .item_top .category .point").css("background-color", thisColor);
        $(".schedule .item .bg").css("background-color", thisColor);
        $(".schedule .item .btn").css("color", thisColor);
        
        if ($(".lessons").length) {
            $(".lessons .lessons_top").css("background-color", thisColor);
            
            $(".lesson-item .bg").css("background-color", thisColor);
        }
    }
    
    if ($(".price-page").length) {
        $(".js-price-item").each(function(){
           var thisItem = $(this),
               thisColor = thisItem.attr("data-color");
            
            if (thisItem.attr("data-color-type") == "light") {
                thisItem.addClass("light-color");
            }
            
            thisItem.find(".lessons_top").css("background-color", thisColor);
            thisItem.find(".bg").css("background-color", thisColor);
        });
    }
    
    $("*[data-color-type='light']").each(function(){
        $(this).addClass("light-color");
    });
    //Different colors posts ========================/
    
    
    //Classes slider ========================/
    if (($("#classes_slider").length) && device.desktop()) {
        $('#classes_slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            swipe: true,
            fade: false,
            touchMove: true,
            draggable: true,
            autoplay: true,
            variableWidth: true,
            speed: 500,
            autoplaySpeed: 20000,
            prevArrow: $('.classes .arrow.prev'),
            nextArrow: $('.classes .arrow.next')
        });
    }
    //Classes slider ========================/
    
    
    //Trainers slider ========================/
    if (($("#trainers_slider").length) && device.desktop()) {
        $('#trainers_slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            swipe: true,
            fade: false,
            touchMove: true,
            draggable: true,
            autoplay: true,
            variableWidth: true,
            speed: 500,
            autoplaySpeed: 20000,
            prevArrow: $('.trainers .arrow.prev'),
            nextArrow: $('.trainers .arrow.next')
        });
    }
    //Trainers slider ========================/
    
    
    //Awards slider ========================/
    if (($("#awards-slider").length) && device.desktop()) {
        $('#awards-slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            swipe: true,
            fade: false,
            touchMove: true,
            draggable: true,
            autoplay: true,
            variableWidth: true,
            speed: 700,
            autoplaySpeed: 20000,
            prevArrow: $('#awards .arrow.prev'),
            nextArrow: $('#awards .arrow.next')
        });
    }
    //Awards slider ========================/
    
    
    //Gallery slider ========================/
    if (($("#photo-slider").length) && device.desktop()) {
        $('#photo-slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            swipe: true,
            fade: false,
            touchMove: true,
            draggable: true,
            autoplay: true,
            variableWidth: true,
            speed: 400,
            autoplaySpeed: 20000,
            prevArrow: $('.photogallery .arrow.prev'),
            nextArrow: $('.photogallery .arrow.next')
        });
    }
    //Gallery slider ========================/
    
    
    //Classes post set background image ========================/
    if ($(".classes_item").length) {
        $(".classes_item").each(function(){
            var thisItem = $(this),
                thisBg = thisItem.children(".bg"),
                thisImg = thisItem.find(".js-image").attr("src");
            
            thisBg.attr("style", "background-image: url("+thisImg+")");
        });
    }
    //Classes post set background image ========================/
    
    
    //Sliders on Single page ========================/
    if ($(".slider").length) {
        $('.slider').each(function(key, item) {
            
          var sliderIdName = 'slider' + key;
          this.id = sliderIdName;
          var sliderId = '#' + sliderIdName;
            
          $(sliderId).slick({
            arrows: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            swipe: true,
            touchMove: false,
            draggable: false,
            autoplay: true,
            variableWidth: true,
            speed: 500,
            autoplaySpeed: 20000,
              centerMode: true,
              responsive: [
                {
                  breakpoint: 1000,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                      variableWidth: false,
                      centerMode: false,
                      arrows: false
                  }
                }]
          });
            
        });    
    }
    //Sliders on Single page ========================/
    
    
    
    //Lessons Accordion ========================/
    if ($("#lessons-accordion").length) {
        $(".lessons_top").on("click", function(){
            var thisTop = $(this),
                thisBottom = thisTop.next(),
                thisItem = thisTop.parent();
            
            thisItem.toggleClass("active");
            thisBottom.slideToggle();
        });
    }
    //Lessons Accordion ========================/
    
    
    //FAQ Accordion ========================/
    if ($("#faq_list").length) {
        $(".faq-question").on("click", function(){
            var thisQuestion = $(this),
                thisAnswer = thisQuestion.next(),
                thisItem = thisQuestion.parent();
            
            thisItem.toggleClass("active");
            thisAnswer.slideToggle();
        });
    }
    //FAQ Accordion ========================/
    
    
    //Vacancies accordion ========================/
    if ($("#vacancies_list").length) {
        $(".vacancy-head").on("click", function(){
            var thisHead = $(this),
                thisBody = thisHead.next(),
                thisItem = thisHead.parent();
            
            thisItem.toggleClass("active");
            thisBody.slideToggle();
        });
    }
    //Vacancies accordion ========================/
    
    
    //Static page navigation ========================/
    if ($(".js-section").length) {
        $(".js-section").each(function(key, item){
            var sectionIdName = 'js-section' + key;
              this.id = sectionIdName;
              var sectionId = '#' + sectionIdName;
            var thisTitle = $(this).attr("data-title");
             
            $("#sidebar ul").append("<li><a href='"+sectionId+"' class='js-anchor'>"+thisTitle+"</a></li>");
        });
        
        
        var sections = $('.js-section')
        , nav = $('#sidebar')
        , nav_height = nav.outerHeight();

        $(window).on('scroll', function () {
            var cur_pos = $(this).scrollTop();

            sections.each(function() {
                var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

                if (cur_pos >= top && cur_pos <= bottom) {
                    nav.find('a').removeClass('active');
                    sections.removeClass('active');
                    $(this).addClass('active');
                    nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
                }
            });
        
            if (cur_pos < ($("#js-section0").offset().top)) {
                $('#sidebar').find('a').removeClass('active');
                $("#js-section0").removeClass('active');
            }
        });

        nav.find('a').on('click', function () {
            var $el = $(this)
            , id = $el.attr('href');

            $('html, body').animate({
                scrollTop: $(id).offset().top
            }, 500);

            return false;
        });

    
        $(window).on("resize", function(){
            if ($("#sidebar").length) {
                var sidebarOffset = $("#sidebar").offset().top; 
                var page_content_top = $(".static .wrap_float").offset().top;
                
                $(window).on("scroll", function(){
                    var sidebarHeight = $(".sidebar").outerHeight();
                    var page_content_Height = $(".static .wrap_float").outerHeight();
                    var w_top = $(window).scrollTop();
                    
                    if((w_top>sidebarOffset) && (!$(".sidebar").hasClass("fixed"))) {
                        $(".sidebar").addClass("fixed");
                    }

                    if(w_top<=sidebarOffset) {
                        $(".sidebar").removeClass("fixed");
                    }

                    if(w_top>((page_content_top + page_content_Height)-sidebarHeight) ) {
                        $(".sidebar").addClass("bottom");
                    }

                    if(w_top<=((page_content_top + page_content_Height)-sidebarHeight) ) {
                        $(".sidebar").removeClass("bottom");
                    }
                });
            }
        });
    }
    //Static page navigation ========================/
    
    
    //Anchor link========================/
    $("a.js-anchor").on("click",function(e){
        e.preventDefault();
        var thisHref = $(this).attr("href");
        var plansOffset=$(thisHref).offset().top;
        $("html, body").animate({
            scrollTop:plansOffset
        },500);
    });
    //Anchor link ========================/
    
    
    //User rating========================/
    $(".user-rating .star").on({
        mouseenter: function () {
            var thisStar = $(this),
               thisParent = thisStar.parent(".stars"),
               thisStarNum = thisStar.index();
              thisParent.children(".star").removeClass("filled");
              thisParent.children(".star").slice(0,thisStarNum+1).addClass("filled");
        },
        mouseleave: function () {
            var thisStar = $(this),
               thisParent = thisStar.parent(".stars"),
               thisStarNum = thisStar.index();
              thisParent.children(".star").removeClass("filled");
        }
    });

    $(".user-rating .star").on("click", function(e){
        e.preventDefault();
        var thisStar = $(this),
           thisParent = thisStar.parent(".stars"),
           thisStarNum = thisStar.index();

          thisParent.children(".star").removeClass("selected");
          thisParent.children(".star").slice(0,thisStarNum+1).addClass("selected");
    });
    //User rating========================/
    
    
    //History slider========================/
    if ($("#history-content").length) {
        
        var activeSlide = $("#history-content .content.active").index();
        var activeYear = $("#history-controls .year-item.active");
        
        activeYear.prev().addClass("prev-year");
        activeYear.next().addClass("next-year");
        
        $("#history-content").slick({
            arrows: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            fade: true,
            swipe: false,
            touchMove: false,
            draggable: false,
            autoplay: false,
            speed: 500,
            autoplaySpeed: 20000,
            initialSlide: activeSlide,
            prevArrow: $('#history-controls .arrow.prev'),
            nextArrow: $('#history-controls .arrow.next')
          });
        
        $('#history-content').on('beforeChange', function(event, 
         slick, currentSlide, nextSlide){
            var nextSlide = $(slick.$slides[nextSlide]).index(),
                thisSlide = $("#history-content .content.slick-current").index();
            
            if (nextSlide > thisSlide) {
                $("#history-controls .year-item.active").removeClass("active");
                $("#history-controls .year-item").removeClass("prev-year");
                $("#history-controls .year-item").removeClass("next-year");
                $("#history-controls .year-item").eq(thisSlide).addClass("prev-year");
                $("#history-controls .year-item").eq(nextSlide).addClass("active");
                $("#history-controls .year-item").eq(nextSlide).next().addClass('next-year');
            } else {
                $("#history-controls .year-item.active").removeClass("active");
                $("#history-controls .year-item").removeClass("prev-year");
                $("#history-controls .year-item").removeClass("next-year");
                $("#history-controls .year-item").eq(thisSlide).addClass("next-year");
                $("#history-controls .year-item").eq(nextSlide).addClass("active");
                $("#history-controls .year-item").eq(nextSlide).prev().addClass('prev-year');
            }
        });
    }
    //History slider========================/
    
    
    //Only numbers input tel========================/
    $('.js-tel').on('keydown', function(e){
      if(e.key.length == 1 && e.key.match(/[^0-9+'"]/)){
        return false;
      };
    });
    //Only numbers input tel========================/
    
    
    //Modal open
    $('.getModal').on('click', function(e){
        e.preventDefault();
        var thisLink = $(this);
        var target_modal = $(this).attr("data-href");
        $(target_modal).arcticmodal({
            openEffect:{speed:200},
            beforeOpen: function(data, el) {
                popupFunction();
                
                if (thisLink.hasClass("js-video")) {
                    var src = thisLink.attr("data-src");

                    $("#video_wrap").append('<iframe src="https://www.youtube.com/embed/'+src+'?rel=0&autoplay=1" allow="autoplay; fullscreen" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0"></iframe>')
                }
            },
            afterClose: function(data, el) {
                popupCloseFunction();
                $("#video_wrap").empty();
            }
        });
    });
    
    $('.modal_close').on('click', function(){
        $(this).arcticmodal('close');
    });
    //Modal open
    
    
    //temp scripts
    $('.js-send-btn').on('click', function(e){
        e.preventDefault();
        $.arcticmodal('close');
        $("#success").arcticmodal();
    });
    
});	
