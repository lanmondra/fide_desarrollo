// COOKIES STUFF
// COOKIES STUFF
// COOKIES STUFF

// Creare's 'Implied Consent' EU Cookie Law Banner v:2.4
// Conceived by Robert Kent, James Bavington & Tom Foyster
 
var dropCookie = true;                      // "false" disables the Cookie, allowing you to style the banner
var cookieDuration = 90;                    // Number of days before the cookie expires, and the banner reappears
var cookieName = 'fideComplianceCookie';    // Name of our cookie
var cookieValue = 'on';                     // Value of cookie
 
function createDiv(){
    var bodytag = document.getElementsByTagName('body')[0];
    var div = document.createElement('div');
    div.setAttribute('id','cookie-law');
    div.innerHTML = '<div class="grid-container"><div class="unselectable grid cookie-container"><div class="cookie-text"><img src="https://www.fide.es/wp-content/themes/fide2019/images/icons-info.svg"><span>Fide.es utiliza cookies para mejorar la experiencia de sus usuarios. <a class="cookie-law-link" href="https://www.fide.es/politica-de-cookies/" target="_blank" rel="nofollow" title="Pol&iacute;tica de cookies">Ver política de cookies</a></span></div><a class="cookie-close-button" href="javascript:void(0);" onclick="removeMe();"><span class="cookie-accept">ACEPTAR</span></a></div></div>';    
    bodytag.insertBefore(div,bodytag.firstChild);

    // document.getElementsByTagName('body')[0].className+='cookiebanner';
    // Adds a class to the <body> tag when the banner is visible
}

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000)); 
        var expires = "; expires="+date.toGMTString(); 
    }
    else var expires = "";
    if (window.dropCookie) { 
        document.cookie = name+"="+value+expires+"; path=/"; 
    }
}

function checkCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function removeMe() {
    createCookie(window.cookieName, window.cookieValue, window.cookieDuration); // Create the cookie
    var element = document.getElementById('cookie-law');
    element.parentNode.removeChild(element);
}

// END OF COOKIES STUFF
// END OF COOKIES STUFF
// END OF COOKIES STUFF



// START OF (DOCUMENT).READY CODE
// START OF (DOCUMENT).READY CODE
// START OF (DOCUMENT).READY CODE

$(document).ready(function() {

    // COOKIE STUFF

    if (checkCookie(window.cookieName) != window.cookieValue) {
        createDiv();                                           
    }                                                          



    // BROKEN IMAGES BEAUTIFY

    $('img').on("error", function() {
        $(this).attr('src', 'localhost/fide/wp-content/wp-themes/fide2019/images/missing-img.jpg');
    });  



    // DESKTOP SUB-MENU DROPDOWN SHOW

    if ( $(".hamburger").css("display") == "none" ) {
        $(".js-top-section").mouseenter(
            function(event) {
                if ( $(".bottom-nav-container").css("display") == "none" ) { 
                    $(".bottom-nav-container").animate({
                        height: "toggle"
                    }, 200);
                }
            }
        );
        $("nav").mouseleave(
            function(event) {
                if ( $(".bottom-nav-container").css("display") == "block" ) { 
                    $(".bottom-nav-container").animate({
                        height: "toggle"
                    }, 200);
                    $(".js-active-border").toggleClass("js-active-border").css("display","none");
                }
            }
        );        
    }



    // TOGGLE HOVER-BORDER & SUBMENU CONTENT - FOR EACH SECTION ON MOUSE-ENTER

    if ( $(".hamburger").css("display") == "none" ) {
        $(".js-top-section").mouseenter(
            function(event) {
                $(".js-active-border").toggleClass("js-active-border").css("display","none");
                $(this).find(".hover-border").css("display","block").toggleClass("js-active-border");

                var idText = $(this).attr("id");
                var idWithoutJsPrefix = idText.replace("js-","");

                $(".js-active-submenu").toggleClass("js-active-submenu").css("display","none");
                $(".submenu-" + idWithoutJsPrefix).toggleClass("js-active-submenu").css("display","block");
            }
        );
    }



    // RESPONSIVE MENU DROPDOWN

    if ( $(".hamburger").css("display") == "inline-block") {
        $(".js-showmenu").click(
            function(event) {
                $(".rootmenu").animate({
                    height: "toggle"
                }, 200);
            }
        );
    }



// EVERYTHING CHECKED JEREZ
// EVERYTHING CHECKED JEREZ
// EVERYTHING CHECKED JEREZ
// EVERYTHING CHECKED JEREZ
// EVERYTHING CHECKED JEREZ
// EVERYTHING CHECKED JEREZ
// EVERYTHING CHECKED JEREZ



    // HERO IMAGE SLIDESHOW

    $(".js-hero-01").delay(2000).fadeToggle("slow","linear",
        function () {$(".js-hero-02").fadeToggle("slow","linear",
            function () {$(".js-hero-02").delay(4000).fadeToggle("slow","linear"); $(".js-hero-03").delay(4700).fadeToggle("slow","linear",
                function () {$(".js-hero-03").delay(4000).fadeToggle("slow","linear"); $(".js-hero-04").delay(4700).fadeToggle("slow","linear",
                    function () {$(".js-hero-04").delay(4000).fadeToggle("slow","linear"); $(".js-hero-01").delay(4700).fadeToggle("slow","linear",
                        function () {$(".js-hero-01").delay(4000).fadeToggle("slow","linear"); $(".js-hero-02").delay(4700).fadeToggle("slow","linear",
                            function () {$(".js-hero-02").delay(4000).fadeToggle("slow","linear"); $(".js-hero-03").delay(4700).fadeToggle("slow","linear",
                                function () {$(".js-hero-03").delay(4000).fadeToggle("slow","linear"); $(".js-hero-04").delay(4700).fadeToggle("slow","linear",
                                    function () {$(".js-hero-04").delay(4000).fadeToggle("slow","linear"); $(".js-hero-01").delay(4700).fadeToggle("slow","linear",
                                        function () {$(".js-hero-01").delay(4000).adeToggle("slow","linear"); $(".js-hero-02").delay(4700).fadeToggle("slow","linear",
                                            function () {$(".js-hero-02").delay(4000).fadeToggle("slow","linear"); $(".js-hero-03").delay(4700).fadeToggle("slow","linear",
                                                function () {$(".js-hero-03").delay(4000).fadeToggle("slow","linear"); $(".js-hero-04").delay(4700).fadeToggle("slow","linear",
                                                    function () {$(".js-hero-04").delay(4000).fadeToggle("slow","linear"); $(".js-hero-01").delay(4700).fadeToggle("slow","linear",
                                                        function () {$(".js-hero-01").delay(4000).fadeToggle("slow","linear"); $(".js-hero-02").delay(4700).fadeToggle("slow","linear",
                                                            function () {$(".js-hero-02").delay(4000).fadeToggle("slow","linear"); $(".js-hero-03").delay(4700).fadeToggle("slow","linear",
                                                                function () {$(".js-hero-03").delay(4000).fadeToggle("slow","linear"); $(".js-hero-04").delay(4700).fadeToggle("slow","linear",
                                                                    function () {$(".js-hero-04").delay(4000).fadeToggle("slow","linear"); $(".js-hero-01").delay(4700).fadeToggle("slow","linear");}
                                                                );}
                                                            );}
                                                        );}
                                                    );}
                                                );}
                                            );}
                                        );}
                                    );}
                                );}
                            );}
                        );}
                    );}
                );}
            );}
        );}
    );



















    // REVIEW - EXPAND SEARCH INPUT ON MOBILE - AND CHANGE SEARCH SUBMIT BACKGROUND
    $(".search-input").click(

        function() {

            if ( $(".header-height").css("height") == "96px") {
                $(".header-logo").hide();
                // $(".search-input").attr("placeholder", "Cercar...");
                $(".search-container").addClass("search-container-enabled");
                // $(".search-container").removeClass("search-container").animate({
                //     -ms-grid-column: "1",
                //     -ms-grid-column-span: "23",
                //     grid-column: "1 / span 23",
                //     margin: auto "0"
                // }, 200);

                $(".search-input").addClass("show-placeholder");
                $(".search-input").addClass("search-input-enabled");
            }

            $("#searchsubmit").css("border-style", "none");
            $(".search-input").css("border-style", "solid");
        }
    );



    // REVIEW - ENABLE LOADING ICON
    $(".search-form").submit(
        function(event) {

        // Pending of adding "required" to the input field and working out the validation tooltip
            // if ( $(".search-input").attr("value", "") ) {
            //     return;
            // } else {
          
                $(".search-icon").animate({
                    opacity: "toggle"
                }, 50);
                $("#search-icon-loading").delay(25).animate({
                    opacity: "toggle"
                }, 100);
            // }
        }
    );



    // REVIEW - ENABLE LOADING ICON ---> FOR BIG SEARCH INPUT
    $(".search-page-form").submit(
        function(event) {

        // Pending of adding "required" to the input field and working out the validation tooltip
            // if ( $(".search-input").attr("value", "") ) {
            //     return;
            // } else {
                $("#search-page-icon-loading").delay(25).animate({
                    opacity: "toggle"
                }, 100);
            // }
        }
    );



});

// END OF (DOCUMENT).READY CODE
// END OF (DOCUMENT).READY CODE
// END OF (DOCUMENT).READY CODE


