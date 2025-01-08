<?php /* Template Name: Politica de privacidad*/ ?>

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
                <div class="privacy-policy">
    <!--<h1>Política de Privacidad</h1> -->
    <p>En <strong class="highlight">FIDE <spam class="tax-legal" >Tax & Legal</spam></strong>, valoramos tu privacidad y nos comprometemos a proteger tus datos personales. Esta política describe cómo recopilamos, utilizamos y protegemos tu información cuando interactúas con nuestro sitio web.</p>
<!--
    <h2>1. Responsable del Tratamiento</h2>
    <p><strong>Nombre:</strong> FIDE Tax & Legal<br>
       <strong>Dirección:</strong> [Indica dirección]<br>
       <strong>Correo electrónico:</strong> [Indica correo]<br>
       <strong>Teléfono:</strong> [Indica teléfono]</p> -->

    <h2>1. Datos que Recopilamos</h2>
    <ul>
        <li>Información de contacto: nombre, correo electrónico, teléfono, etc.</li>
        <li>Datos de navegación: dirección IP, tipo de navegador, dispositivo utilizado, etc.</li>
        <li>Información adicional que nos proporcionas voluntariamente.</li>
    </ul>

    <h2>2. Finalidad del Tratamiento</h2>
    <p>Utilizamos tus datos para:</p>
    <ul>
        <li>Responder a consultas y solicitudes.</li>
        <li>Enviar comunicaciones relacionadas con nuestros servicios.</li>
        <li>Mejorar la funcionalidad y experiencia del usuario en el sitio web.</li>
    </ul>

    <h2>3. Derechos del Usuario</h2>
    <p>Tienes derecho a:</p>
    <ul>
        <li>Acceder, rectificar o eliminar tus datos personales.</li>
        <li>Solicitar la limitación u oposición al tratamiento de tus datos.</li>
        <li>Presentar una reclamación ante la Agencia Española de Protección de Datos.</li>
    </ul>

    <p>Para ejercer estos derechos, puedes contactarnos a través del correo electrónico <strong class="highlight">fide@fide.es</strong> indicando en el asunto "Protección de Datos".</p>

    <h2>4. Seguridad de la Información</h2>
    <p>Adoptamos medidas técnicas y organizativas adecuadas para garantizar la seguridad de tus datos y prevenir accesos no autorizados, pérdidas o alteraciones.</p>

    <h2>5. Modificaciones de la Política</h2>
    <p>Nos reservamos el derecho de actualizar esta política en cualquier momento. Te recomendamos revisarla periódicamente para mantenerte informado.</p>
</div>

                

                </div>
            </div>  
        </div>              
    </div>

    <style>
   .privacy-policy {
    font-family: 'IBM Plex Sans', sans-serif;
    color: #333;
    line-height: 1.6;
    padding: 20px;
    margin: 20px auto;
    max-width: 800px;
    border-radius: 8px;
    /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);*/
    background-color: #fff; /* Fondo blanco para mejor contraste */
}

.tax-legal{
    font-style: italic;
}
.privacy-policy h1 {
    font-size: 2em;
    color: #AC0600;
    margin-bottom: 10px;
    text-align: center;
}

.privacy-policy h2 {
    font-size: 1.5em;
    /* color: #AC0600; */
    margin-top: 20px;
    /* border-bottom: 2px solid #ddd; */
    padding-bottom: 5px;
}

.privacy-policy p {
    margin: 10px 0;
    font-size: 1em;
}

.privacy-policy ul {
    padding-left: 20px;
    list-style-type: disc;
}

.privacy-policy li {
    margin: 5px 0;
}

.privacy-policy .highlight {
    color: #AC0600;
    font-weight: bold;
}

/* --- Media Query for Tablets (iPads, etc.) --- */
@media (max-width: 1024px) {
    .privacy-policy {
        padding: 15px;
        margin: 15px;
        font-size: 0.95em;
        width: 680px;
    }
    .privacy-policy h1 {
        font-size: 1.8em;
    }
    .privacy-policy h2 {
        font-size: 1.4em;
    }
}

/* --- Media Query for Smaller Tablets and Large Phones --- */
@media (max-width: 768px) {
    .privacy-policy {
        padding: 10px;
        margin: 10px;
        font-size: 0.9em;
        width: 580px;
    }
    .privacy-policy h1 {
        font-size: 1.6em;
    }
    .privacy-policy h2 {
        font-size: 1.3em;
    }
}

/* --- Media Query for Small Screens (Phones) --- */
@media (max-width: 480px) {
    .privacy-policy {
        padding: 8px;
        margin: 8px;
        font-size: 0.85em;
        width: 350px;
    }
    .privacy-policy h1 {
        font-size: 1.4em;
    }
    .privacy-policy h2 {
        font-size: 1.2em;
    }
}


    </style>

    
    </main>
    <section>
		




<?php get_footer(); ?>