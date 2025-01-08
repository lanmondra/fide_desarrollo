<?php /* Template Name: Politica de cookies*/ ?>

<?php get_header(); ?>



    <section>

        <div class="grid-container">
            <div class="grid">
            	<hr class="generic-hr short-hr-after-breadcrumb">
            </div>
        </div>

    </section>
    <main> 
    <div class="grid-container">
        <div class="grid">
            <div class="post-container">
                <div class="single-post-content px16 line24">
                <h3>Nuestra Política de Cookies</h3>
                <p>En <strong  class="highlight" >FIDE <spam class="tax-legal" >Tax & Legal</spam></strong> utilizamos cookies para mejorar la experiencia de navegación y analizar estadísticas sobre el uso del sitio.</p>
   
                <h2>¿Qué son las cookies?</h2>
                Las cookies son pequeños archivos de texto que un servidor web envía al navegador del usuario y que se almacenan en su dispositivo. 
                Estas cookies permiten al sitio web reconocer al usuario en visitas posteriores, facilitar la navegación y ofrecer servicios personalizados. 
                También son útiles para recopilar información anónima sobre el comportamiento de los usuarios con el fin de mejorar continuamente la experiencia de uso.
                Es importante destacar que este sitio web no tiene acceso a las cookies establecidas por otros servidores ni puede modificar su contenido.

                <h2>Tipos de cookies utilizadas en este sitio web</h2>
                <p>En <strong class="highlight" >FIDE <spam class="tax-legal" >Tax & Legal</spam></strong> empleamos tanto cookies propias como de terceros, cada una con finalidades específicas:</p>
                <!-- Contenido de las Pestañas -->
                <div id="cookies-propias" class="tabcontent" style="display: block;">
                        <h4>1. Cookies propias</h4>
                        <p>Estas cookies se utilizan para garantizar el correcto funcionamiento del sitio web y mejorar la experiencia del usuario. No requieren consentimiento 
                        previo según el artículo 22.2 de la Ley de Servicios de la Sociedad de la Información (LSSI):</p>
                        <p><strong>* lang: Permite recordar el idioma seleccionado por el usuario para navegar en el sitio.</br>
                        * cookieConsent: Registra si el usuario ha aceptado la política de cookies.</strong></p>
                    </div>

                    <div id="cookies-terceros" class="tabcontent" style="display: block;">
                        <h4>2. Cookies de terceros</h4>
                        <p>Utilizamos servicios externos para recopilar datos anónimos con fines analíticos:</br>
                        <strong>* Google Analytics (_ga, _gid, _gat, _gali): Estas cookies permiten conocer cómo los usuarios interactúan con el sitio web y elaborar informes de rendimiento. Para más información, puede consultar la política de cookies de Google.</strong></p>
                    </div>
                    <h2>Aceptación de la política de cookies</h2>
                    <p>Al navegar por este sitio web, entendemos que acepta el uso de cookies según lo indicado en esta política. Sin embargo, siempre tiene la opción de gestionar sus preferencias y bloquear aquellas cookies que no desee habilitar.

Este sitio web puede contener enlaces a sitios de terceros cuyas políticas de cookies son independientes. Al acceder a dichos sitios, le recomendamos revisar sus respectivas políticas de privacidad para decidir si acepta sus términos.</p>
                </div>
            </div>  
        </div>              
    </div>
    <style>
.tabs {
    display: flex;
    justify-content: start;
    margin-bottom: 15px;
}
.highlight{
    color: #AC0600;
}
.tax-legal{
    font-style: italic;
}

.tablinks {
    background-color: #f1f1f1;
    color: black;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
    margin-right: 10px;
    border-radius: 5px;
}

.tablinks:hover {
    background-color: #ddd;
}

.tablinks.active {
    background-color: #AC0600;
    color: white;
}

.tabcontent {
    display: none;
    padding: 15px;
    border-top: none;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 15px;
}

@media (max-width: 1024px) and (min-width: 768px) {
    .grid-container {
        width: 90%; /* Ajusta el ancho del contenedor */
        margin: 0 auto; /* Centra el contenedor horizontalmente */
    }

    .grid {
        display: flex; 
        flex-direction: column; /* Para una mejor disposición vertical */
        align-items: center;
    }

    .post-container {
        width: 100%; /* Asegúrate de que ocupa todo el ancho disponible */
        padding: 20px; /* Espacio interno */
        box-sizing: border-box; /* Incluye el padding dentro del ancho */
    }

    .single-post-content {
        font-size: 16px; /* Ajusta el tamaño del texto si es necesario */
        line-height: 1.5; /* Mejora la legibilidad */
    }

    .tabcontent {
        width: 100%; /* Se asegura de que ocupe el ancho del contenedor */
        padding: 15px;
    }
   
}
</style>
    
    </main>
    <section>
		




<?php get_footer(); ?>