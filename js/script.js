var dropCookie = true;
var cookieDuration = 90;
var cookieName = "fideComplianceCookie";
var cookieValue = "on";
var accepted = false;

function initCookies() {
    const isCookiePage =
        window.location.pathname.includes('politica-de-cookies');

    if (isCookiePage) {
        return;
    }
  if (!checkCookie(cookieName)) {
    showCookieBanner();
  }
}

function showCookieBanner() {
  var overlay = document.createElement("div");
  overlay.id = "cookie-overlay";

  overlay.style.position = "fixed";
  overlay.style.top = "0";
  overlay.style.left = "0";
  overlay.style.width = "100%";
  overlay.style.height = "100%";
  overlay.style.background = "rgba(50,50,50,.8)";
  overlay.style.zIndex = "9999";

  document.body.appendChild(overlay);

  var banner = document.createElement("div");

  banner.id = "cookie-first-layer";

  banner.style.position = "fixed";
  banner.style.top = "50%";
  banner.style.left = "50%";
  banner.style.transform = "translate(-50%, -50%)";
  banner.style.width = "80%";
  banner.style.maxWidth = "600px";
  banner.style.background = "#fff";
  banner.style.padding = "25px";
  banner.style.zIndex = "10000";
  banner.style.borderRadius = "5px";
  banner.style.boxSizing = "border-box";
  banner.style.fontFamily = "'IBM Plex Sans', sans-serif";
  // banner.style.border = "3px solid #1e4f69";

  banner.innerHTML = `
        <h2 style="text-align:center;margin-bottom:30px;padding: 0px;color:#AC0600;">
            Utilización de cookies propias técnicas y de terceros técnicas y analíticas
        </h2>
        

        <p style="margin-bottom:20px;padding: 16px;    border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;">
            Este sitio web utiliza Cookies propias para recopilar información con la finalidad técnica, no se recaban ni
            ceden sus datos de carácter personal sin su consentimiento.
            Asimismo, se informa que este sitio web dispone de enlaces a sitios web de terceros con políticas de
            privacidad ajenas a <spam style="font-weight: 600;color:#AC0600;font-style: italic;">FIDE ASESORES LEGALES Y TRIBUTARIOS, S.L.P.</spam> Puede obtener más información en la 
            <a href="/fide/politica-de-cookies/" target="_blank"   style="text-decoration: underline; font-weight: 600;"> Política de Cookies</a>.
        </p>

        <div style="display:flex;justify-content:space-around;align-items:center;">

    <button
        style="padding:8px 16px;background-color:#AC0600;color:#fff;border-radius:4px;cursor:pointer;font-family:'IBM Plex Sans',sans-serif;font-size:13px;border:none;"
        onclick="acceptAllCookies()">
        ACEPTAR
    </button>

    <button
        style="padding:8px 16px;background-color:#736e6e;color:#fff;border-radius:4px;cursor:pointer;font-family:'IBM Plex Sans',sans-serif;font-size:13px;border:none;"
        onclick="openCookieConfiguration()">
        MÁS INFORMACION
    </button>

</div>
    `;

  document.body.appendChild(banner);
}

function openCookieConfiguration() {
  var banner = document.getElementById("cookie-first-layer");

  if (banner) {
    banner.remove();
  }

  showPolicyModal();
}

function showPolicyModal() {
  var oldOverlay = document.getElementById("cookie-overlay");

  if (oldOverlay) {
    oldOverlay.remove();
  }

  var overlay = document.createElement("div");
  overlay.setAttribute("id", "cookie-overlay");

  // Crear overlay para deshabilitar interacción
  // var overlay = document.createElement('div');
  // overlay.setAttribute('id', 'cookie-overlay');
  overlay.style.position = "fixed";
  overlay.style.top = "0";
  overlay.style.left = "0";
  overlay.style.width = "100%";
  overlay.style.height = "100%";
  overlay.style.backgroundColor = "rgba(50, 50, 50, 0.8)"; // Fondo gris semitransparente

  overlay.style.zIndex = "9999"; // Asegurar que esté sobre todo el contenido
  document.body.appendChild(overlay);

  // Crear modal de configuración de cookies
  var modal = document.createElement("div");
  modal.setAttribute("id", "policy-modal");
  modal.style.position = "fixed";
  modal.style.top = "50%";
  modal.style.left = "50%";
  modal.style.borderRadius = "5px";
  modal.style.transform = "translate(-50%, -50%)";
  modal.style.width = "80%";
  modal.style.maxWidth = "600px";
  modal.style.boxSizing = "border-box";
  modal.style.backgroundColor = "#fff";
  modal.style.padding = "20px";
  modal.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";
  modal.style.zIndex = "9999"; // Sobre el overlay
  modal.style.pointerEvents = "auto";
  //modal.style.border = "3px solid #1e4f69";
   modal.style.borderRadius = "5px";

  overlay.style.backdropFilter = "blur(4px)";
  overlay.style.webkitBackdropFilter = "blur(4px)";

  modal.innerHTML = `
   <div class="cookie-modal-wrapper">

        <div class="cookie-header">

            
             <div class="cookie-tabs">
            <button class="tab-btn active" data-tab="detalles"> Preferencias de Cookies </button>
            
        </div>
            <button class="cookie-close" onclick="rejectAllCookies()">  ✕ </button>
            
        </div>
       


    <!-- DETALLES -->
    <div id="detalles" class="cookie-content active">
     <strong>Puede habilitar y deshabilitar las cookies según sus finalidades:</strong>
        <div class="cookie-category">       
            <div class="cookie-category-header">       
                <div>
                    <strong>Técnicas:</strong><p> Necesarias para el funcionamiento del sitio web. </p>
                </div>
                <label class="cookie-switch cookie-switch-locked">
                    <input type="checkbox" checked disabled>
                    <span class="cookie-slider"></span>
                </label>
            </div>
        </div>

        <div class="cookie-category">
            <div class="cookie-category-header">
                <div>
                    <strong>Cookies analíticas</strong>
                    <p>Permiten analizar el uso de la web y obtener estadísticas
                    de navegación mediante Google Analytics.</p>
                </div>
               <label class="cookie-switch">
                    <input type="checkbox" id="cookie-analytics">
                    <span class="cookie-slider"></span>
                </label>
            </div>
        </div>
        <!-- FUTURO: Si se añaden más categorías de cookies (marketing, personalización, redes sociales, etc.) se añadirán aquí -->

    </div>

    <!-- FOOTER -->

    <div class="cookie-footer">
    <button
        class="cookie-btn cookie-btn-secondary"
        
        style="padding:8px 16px;background-color:#AC0600;color:#fff;border-radius:4px;cursor:pointer;font-family:'IBM Plex Sans',sans-serif;font-size:13px;border:none;"
        onclick="acceptAllCookies()">
        Aceptar todo
    </button>
    
      <button
        class="cookie-btn cookie-btn-primary"
       style="padding:8px 16px;background-color:#736e6e;color:#fff;border-radius:4px;cursor:pointer;font-family:'IBM Plex Sans',sans-serif;font-size:13px;border:none;"
        onclick="saveCookiePreferences()">
        Guardar Configuración
    </button>

   <button
        class=""
        style="padding:8px 16px;background-color:#000;color:#fff;border-radius:4px;cursor:pointer;font-family:'IBM Plex Sans',sans-serif;font-size:13px;border:none;"
        onclick="rejectAllCookies()">
        Rechazar todo
    </button>

</div>

</div>
`;

  document.body.appendChild(modal);
}

document.addEventListener("click", function (e) {
  if (!e.target.classList.contains("tab-btn")) {
    return;
  }

  const target = e.target.dataset.tab;

  document
    .querySelectorAll(".tab-btn")
    .forEach((btn) => btn.classList.remove("active"));

  document
    .querySelectorAll(".cookie-content")
    .forEach((tab) => tab.classList.remove("active"));

  e.target.classList.add("active");

  document.getElementById(target).classList.add("active");
});

function showTab(tabId) {
  document
    .querySelectorAll(".tab-btn")
    .forEach((btn) => btn.classList.remove("active"));

  document
    .querySelectorAll(".cookie-content")
    .forEach((tab) => tab.classList.remove("active"));

  document.querySelector('[data-tab="' + tabId + '"]').classList.add("active");

  document.getElementById(tabId).classList.add("active");
}

if (!document.getElementById("cookie-modal-styles")) {
  const style = document.createElement("style");

  style.id = "cookie-modal-styles";


  style.innerHTML = `
   .cookie-modal-wrapper,
  .cookie-modal-wrapper * {
    font-family: 'IBM Plex Sans', sans-serif;
  }

.cookie-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 45px;
    padding: 0;
    border-bottom: 1px solid #ddd;
}

.cookie-close {
    border: none;
    background: none;
    font-size: 28px;
    cursor: pointer;
    padding: 0;
    line-height: 1;
}

.cookie-logo strong{
    display:block;
    font-size:32px;
    color:#AC0600;
}

.cookie-logo span{
    font-size:12px;
    letter-spacing:2px;
}

.cookie-close{
    border:none;
    background:none;
    font-size:28px;
    cursor:pointer;
}

.cookie-tabs {
    display: flex;
    align-items: center;
    border: none;
    margin: 0 0 0 15px;
}

.tab-btn {
    border: none;
    background: white;
    padding: 0;
    font-weight: 600;
    font-size: 28px;
    color: #AC0600;
    cursor: pointer;
    font-size: 25px;
}

@media (max-width: 768px) {
    .tab-btn {
        font-size: 16px !important;
    }
}

.cookie-content {
    display: none;
    padding: 20px 10px;
}

.cookie-content.active{
    display:block;
}

.cookie-category{
    padding:20px 0;
}

.cookie-category-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
}

.cookie-footer{
    border-top:1px solid #ddd;
    padding-top:20px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    justify-content:center;
}

.cookie-btn{
    flex:1;
    padding:15px;
    font-size:18px;
    border-radius:4px;
    cursor:pointer;
}

.cookie-btn-primary{
    color:white;
    border:2px solid #0a0909;
}

.cookie-btn-secondary{
    color:#000;
    border:2px solid #0a0909;
}

.cookie-switch{
    position:relative;
    width:90px;
    height:30px;
    display:inline-block;
}

.cookie-switch input{
    display:none;
}

.cookie-slider{
    position:absolute;
    inset:0;
    border-radius:30px;
    background:#ccc;
    transition:.3s;
    cursor:pointer;
}

/* texto */
.cookie-slider:before{
    content:"Aceptar";
    position:absolute;
    top:50%;
    right:10px;
    transform:translateY(-50%);
    font-size:11px;
    font-weight:600;
    color:#fff;
}

/* circulo */
.cookie-slider:after{
    content:"";
    position:absolute;
    width:24px;
    height:24px;
    border-radius:50%;
    background:#fff;
    border:none;
    top:3px;
    left:3px;
    transition:.3s;
    box-shadow:0 1px 3px rgba(0,0,0,.3);
}

/* activado */
.cookie-switch input:checked + .cookie-slider:before{
    content:"Rechazar";
    right:auto;
    left:10px;
}

.cookie-switch input:checked + .cookie-slider{
    background:#AC0600;
}

.cookie-switch input:checked + .cookie-slider:after{
    transform:translateX(60px);
    background:#fff;
}

/* técnicas siempre activas */
.cookie-switch-locked{
    pointer-events:none;
    opacity:.7;
}

.cookie-switch-locked .cookie-slider{
    background:#AC0600;
}

.cookie-switch-locked .cookie-slider:before{
    content:"Aceptar";
    right:auto;
    left:10px;
    color:#fff;
}

.cookie-switch-locked .cookie-slider:after{
    transform:translateX(60px);
    background:#fff;
}

.cookie-category-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.cookie-category-header .cookie-switch{
    flex:0 0 90px;
    width:90px;
}

/* RECHAZADO */
.cookie-slider{
    background:#ccc;
}

/* ACEPTADO */
.cookie-switch input:checked + .cookie-slider{
    background:#AC0600;
}

.cookie-switch input:checked + .cookie-slider:after{
    transform:translateX(60px);
    background:#fff;
}
    
    `;

  document.head.appendChild(style);
}

function rejectAllCookies() {
  var preferences = {
    essentials: true,
    analytics: false,
  };

  document.cookie = `cookiePreferences=${JSON.stringify(preferences)}; path=/; max-age=${cookieDuration * 24 * 60 * 60}`;

  createCookie(cookieName, cookieValue, cookieDuration);

  closePolicyModal();
}
function acceptAllCookies() {
  document.cookie = `cookiePreferences=${JSON.stringify({
    essentials: true,
    analytics: true,
  })}; path=/; max-age=${cookieDuration * 24 * 60 * 60}`;

  createCookie(cookieName, cookieValue, cookieDuration);

  closePolicyModal();
}

function saveCookiePreferences() {
  var analyticsEnabled =
    document.getElementById("cookie-analytics")?.checked || false;

  var preferences = {
    essentials: true,
    analytics: analyticsEnabled,
  };

  document.cookie = `cookiePreferences=${JSON.stringify(preferences)}; path=/; max-age=${cookieDuration * 24 * 60 * 60}`;

  createCookie(cookieName, cookieValue, cookieDuration);

  accepted = true;

  closePolicyModal();
}

function createCookie(name, value, days) {
  var date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  var expires = "; expires=" + date.toUTCString();
  document.cookie = name + "=" + value + expires + "; path=/";
}

function checkCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function closePolicyModal() {
  var modal = document.getElementById("policy-modal");

  if (modal) {
    modal.remove();
  }

  var firstLayer = document.getElementById("cookie-first-layer");

  if (firstLayer) {
    firstLayer.remove();
  }

  var overlay = document.getElementById("cookie-overlay");

  if (overlay) {
    overlay.remove();
  }
}

function blockInteraction() {
  document.body.style.pointerEvents = "none"; // Deshabilitar interacción inicial
}



// Inicializar cookies al cargar la página
window.onload = initCookies;

// END OF COOKIES STUFF
// END OF COOKIES STUFF
// END OF COOKIES STUFF

// START OF (DOCUMENT).READY CODE
// START OF (DOCUMENT).READY CODE
// START OF (DOCUMENT).READY CODE

$(document).ready(function () {
  // COOKIE STUFF

  if (checkCookie(window.cookieName) != window.cookieValue) {
    createDiv();
  }

  // BROKEN IMAGES BEAUTIFY

  $("img").on("error", function () {
    $(this).attr(
      "src",
      "localhost/fide/wp-content/wp-themes/fide2019/images/missing-img.jpg",
    );
  });

  // DESKTOP SUB-MENU DROPDOWN SHOW

  if ($(".hamburger").css("display") == "none") {
    $(".js-top-section").mouseenter(function (event) {
      if ($(".bottom-nav-container").css("display") == "none") {
        $(".bottom-nav-container").animate(
          {
            height: "toggle",
          },
          200,
        );
      }
    });
    $("nav").mouseleave(function (event) {
      if ($(".bottom-nav-container").css("display") == "block") {
        $(".bottom-nav-container").animate(
          {
            height: "toggle",
          },
          200,
        );
        $(".js-active-border")
          .toggleClass("js-active-border")
          .css("display", "none");
      }
    });
  }

  // TOGGLE HOVER-BORDER & SUBMENU CONTENT - FOR EACH SECTION ON MOUSE-ENTER

  if ($(".hamburger").css("display") == "none") {
    $(".js-top-section").mouseenter(function (event) {
      $(".js-active-border")
        .toggleClass("js-active-border")
        .css("display", "none");
      $(this)
        .find(".hover-border")
        .css("display", "block")
        .toggleClass("js-active-border");

      var idText = $(this).attr("id");
      var idWithoutJsPrefix = idText.replace("js-", "");

      $(".js-active-submenu")
        .toggleClass("js-active-submenu")
        .css("display", "none");
      $(".submenu-" + idWithoutJsPrefix)
        .toggleClass("js-active-submenu")
        .css("display", "block");
    });
  }

  // RESPONSIVE MENU DROPDOWN

  if ($(".hamburger").css("display") == "inline-block") {
    $(".js-showmenu").click(function (event) {
      $(".rootmenu").animate(
        {
          height: "toggle",
        },
        200,
      );
    });
  }

  // EVERYTHING CHECKED JEREZ
  // EVERYTHING CHECKED JEREZ
  // EVERYTHING CHECKED JEREZ
  // EVERYTHING CHECKED JEREZ
  // EVERYTHING CHECKED JEREZ
  // EVERYTHING CHECKED JEREZ
  // EVERYTHING CHECKED JEREZ

  // HERO IMAGE SLIDESHOW

  $(".js-hero-01")
    .delay(2000)
    .fadeToggle("slow", "linear", function () {
      $(".js-hero-02").fadeToggle("slow", "linear", function () {
        $(".js-hero-02").delay(4000).fadeToggle("slow", "linear");
        $(".js-hero-03")
          .delay(4700)
          .fadeToggle("slow", "linear", function () {
            $(".js-hero-03").delay(4000).fadeToggle("slow", "linear");
            $(".js-hero-04")
              .delay(4700)
              .fadeToggle("slow", "linear", function () {
                $(".js-hero-04").delay(4000).fadeToggle("slow", "linear");
                $(".js-hero-01")
                  .delay(4700)
                  .fadeToggle("slow", "linear", function () {
                    $(".js-hero-01").delay(4000).fadeToggle("slow", "linear");
                    $(".js-hero-02")
                      .delay(4700)
                      .fadeToggle("slow", "linear", function () {
                        $(".js-hero-02")
                          .delay(4000)
                          .fadeToggle("slow", "linear");
                        $(".js-hero-03")
                          .delay(4700)
                          .fadeToggle("slow", "linear", function () {
                            $(".js-hero-03")
                              .delay(4000)
                              .fadeToggle("slow", "linear");
                            $(".js-hero-04")
                              .delay(4700)
                              .fadeToggle("slow", "linear", function () {
                                $(".js-hero-04")
                                  .delay(4000)
                                  .fadeToggle("slow", "linear");
                                $(".js-hero-01")
                                  .delay(4700)
                                  .fadeToggle("slow", "linear", function () {
                                    $(".js-hero-01")
                                      .delay(4000)
                                      .adeToggle("slow", "linear");
                                    $(".js-hero-02")
                                      .delay(4700)
                                      .fadeToggle(
                                        "slow",
                                        "linear",
                                        function () {
                                          $(".js-hero-02")
                                            .delay(4000)
                                            .fadeToggle("slow", "linear");
                                          $(".js-hero-03")
                                            .delay(4700)
                                            .fadeToggle(
                                              "slow",
                                              "linear",
                                              function () {
                                                $(".js-hero-03")
                                                  .delay(4000)
                                                  .fadeToggle("slow", "linear");
                                                $(".js-hero-04")
                                                  .delay(4700)
                                                  .fadeToggle(
                                                    "slow",
                                                    "linear",
                                                    function () {
                                                      $(".js-hero-04")
                                                        .delay(4000)
                                                        .fadeToggle(
                                                          "slow",
                                                          "linear",
                                                        );
                                                      $(".js-hero-01")
                                                        .delay(4700)
                                                        .fadeToggle(
                                                          "slow",
                                                          "linear",
                                                          function () {
                                                            $(".js-hero-01")
                                                              .delay(4000)
                                                              .fadeToggle(
                                                                "slow",
                                                                "linear",
                                                              );
                                                            $(".js-hero-02")
                                                              .delay(4700)
                                                              .fadeToggle(
                                                                "slow",
                                                                "linear",
                                                                function () {
                                                                  $(
                                                                    ".js-hero-02",
                                                                  )
                                                                    .delay(4000)
                                                                    .fadeToggle(
                                                                      "slow",
                                                                      "linear",
                                                                    );
                                                                  $(
                                                                    ".js-hero-03",
                                                                  )
                                                                    .delay(4700)
                                                                    .fadeToggle(
                                                                      "slow",
                                                                      "linear",
                                                                      function () {
                                                                        $(
                                                                          ".js-hero-03",
                                                                        )
                                                                          .delay(
                                                                            4000,
                                                                          )
                                                                          .fadeToggle(
                                                                            "slow",
                                                                            "linear",
                                                                          );
                                                                        $(
                                                                          ".js-hero-04",
                                                                        )
                                                                          .delay(
                                                                            4700,
                                                                          )
                                                                          .fadeToggle(
                                                                            "slow",
                                                                            "linear",
                                                                            function () {
                                                                              $(
                                                                                ".js-hero-04",
                                                                              )
                                                                                .delay(
                                                                                  4000,
                                                                                )
                                                                                .fadeToggle(
                                                                                  "slow",
                                                                                  "linear",
                                                                                );
                                                                              $(
                                                                                ".js-hero-01",
                                                                              )
                                                                                .delay(
                                                                                  4700,
                                                                                )
                                                                                .fadeToggle(
                                                                                  "slow",
                                                                                  "linear",
                                                                                );
                                                                            },
                                                                          );
                                                                      },
                                                                    );
                                                                },
                                                              );
                                                          },
                                                        );
                                                    },
                                                  );
                                              },
                                            );
                                        },
                                      );
                                  });
                              });
                          });
                      });
                  });
              });
          });
      });
    });

  // REVIEW - EXPAND SEARCH INPUT ON MOBILE - AND CHANGE SEARCH SUBMIT BACKGROUND
  $(".search-input").click(function () {
    if ($(".header-height").css("height") == "96px") {
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
  });

  // REVIEW - ENABLE LOADING ICON
  $(".search-form").submit(function (event) {
    // Pending of adding "required" to the input field and working out the validation tooltip
    // if ( $(".search-input").attr("value", "") ) {
    //     return;
    // } else {

    $(".search-icon").animate(
      {
        opacity: "toggle",
      },
      50,
    );
    $("#search-icon-loading").delay(25).animate(
      {
        opacity: "toggle",
      },
      100,
    );
    // }
  });

  // REVIEW - ENABLE LOADING ICON ---> FOR BIG SEARCH INPUT
  $(".search-page-form").submit(function (event) {
    // Pending of adding "required" to the input field and working out the validation tooltip
    // if ( $(".search-input").attr("value", "") ) {
    //     return;
    // } else {
    $("#search-page-icon-loading").delay(25).animate(
      {
        opacity: "toggle",
      },
      100,
    );
    // }
  });
});

// END OF (DOCUMENT).READY CODE
// END OF (DOCUMENT).READY CODE
// END OF (DOCUMENT).READY CODE
