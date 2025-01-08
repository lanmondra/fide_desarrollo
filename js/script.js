
var dropCookie = true;                      
var cookieDuration = 90;                   
var cookieName = 'fideComplianceCookie';    
var cookieValue = 'on';   
var accepted = false;           

function initCookies() {
    if (!checkCookie(cookieName)) {
        showPolicyModal(); // Mostrar modal al cargar
        blockInteraction(); // Deshabilitar interacción hasta aceptar cookies
    }
}

function showPolicyModal() {
    // Crear overlay para deshabilitar interacción
    var overlay = document.createElement('div');
    overlay.setAttribute('id', 'cookie-overlay');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(50, 50, 50, 0.8)'; // Fondo gris semitransparente
    overlay.style.zIndex = '999'; // Asegurar que esté sobre todo el contenido
    document.body.appendChild(overlay);

    // Crear modal de configuración de cookies
    var modal = document.createElement('div');
    modal.setAttribute('id', 'policy-modal');
    modal.style.position = 'fixed';
    modal.style.top = '50%';
    modal.style.left = '50%';
    modal.style.borderRadius = '5px';
    modal.style.transform = 'translate(-50%, -50%)';
    modal.style.width = '80%';
    modal.style.maxWidth = '600px';
    modal.style.backgroundColor = '#fff';
    modal.style.padding = '20px';
    modal.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
    modal.style.zIndex = '1000'; // Sobre el overlay
    modal.style.pointerEvents = 'auto';

    modal.innerHTML = `
    <h2 style="line-height: 25px; font-family: 'IBM Plex Sans', sans-serif;">Configuración de Cookies</h2>
    <span style="line-height: 25px; font-family: 'IBM Plex Sans', sans-serif;">
        En FIDE utilizamos cookies y tecnologías similares para garantizar el correcto funcionamiento de nuestro sitio web, 
        mejorar tu experiencia de navegación, analizar el uso del sitio y personalizar el contenido. 
        Puedes configurar tus preferencias de cookies a continuación.
    </span>
    <h4 style="line-height: 25px; font-family: 'IBM Plex Sans', sans-serif;">Selecciona las cookies que desea aceptar:</h4>
    <form id="cookie-form" style="line-height: 25px; font-family: 'IBM Plex Sans', sans-serif;">
        <label>
            <input type="checkbox" name="cookie-essentials" checked disabled>
            Cookies esenciales: necesarias para el funcionamiento del sitio web
        </label><br>
        <label>
            <input type="checkbox" name="cookie-preferences" checked>
            Cookies de personalización: permiten mostrar contenido relevante y adaptado a tus intereses.
        </label><br>           
    </form>
    <div style="margin-top: 20px; text-align: center;">
    <a href="https://www.fide.es/politica-de-cookies/" target="_blank" style="display: block; margin-bottom: 15px; color: #AC0600; text-decoration: underline; font-family: 'IBM Plex Sans', sans-serif;">
        Leer nuestra política de cookies
    </a>
    <div style="display: flex; justify-content: space-between;">
        <button onclick="saveCookiePreferences();" style="padding: 10px 20px; background-color: #AC0600; color: #fff; border-radius: 30px; cursor: pointer; font-family: 'IBM Plex Sans', sans-serif;">Aceptar</button>
        <button onclick="closePolicyModal();" style="padding: 10px 20px; background-color: #000; color: #fff; border-radius: 30px; cursor: pointer; font-family: 'IBM Plex Sans', sans-serif;">Rechazar</button>
    </div>
</div>
`;

    document.body.appendChild(modal);
}

function saveCookiePreferences() {
    var form = document.getElementById('cookie-form');
    var preferences = {
        essentials: true, // Siempre activadas
        preferences: form.elements['cookie-preferences'].checked
    };
    document.cookie = `cookiePreferences=${JSON.stringify(preferences)}; path=/; max-age=${cookieDuration * 24 * 60 * 60}`;
    createCookie(cookieName, cookieValue, cookieDuration); // Guardar cookie principal

    accepted = true; // Establecer accepted en true
    closePolicyModal(); // Cerrar el modal
    allowInteraction(); // Habilitar la interacción con la página
}

function createCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + value + expires + "; path=/";
}

function checkCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function closePolicyModal() {
    var modal = document.getElementById('policy-modal');
    if (modal) {
        modal.parentNode.removeChild(modal);
    }
    allowInteraction(); // Permitir interacción con la página
}

function allowInteraction() {
    var overlay = document.getElementById('cookie-overlay');
    if (overlay) {
        overlay.parentNode.removeChild(overlay); // Eliminar overlay
    }
    document.body.style.pointerEvents = 'auto'; // Habilitar interacción
}

function blockInteraction() {
    document.body.style.pointerEvents = 'none'; // Deshabilitar interacción inicial
}

// Inicializar cookies al cargar la página
window.onload = initCookies;




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


