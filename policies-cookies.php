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
                    <div class="cookies-policy">

                        <h2>Política de Cookies</h2>

                        <p>
                            Conforme a lo dispuesto en el artículo 22.2 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (LSSI-CE), FIDE ASESORES LEGALES Y TRIBUTARIOS, S.L.P informa sobre el uso de cookies en el sitio web.
                        </p>

                        <p>
                            Las cookies son pequeños archivos que se descargan en su dispositivo al acceder a determinadas páginas web. Permiten almacenar y recuperar información sobre los hábitos de navegación de un usuario y mejorar la experiencia de navegación.
                        </p>

                        <h2>¿Qué tipos de cookies utiliza esta web?</h2>

                        <ul>
                            <li><strong>Cookies técnicas:</strong> necesarias para el funcionamiento de la web.</li>
                            <li><strong>Cookies de personalización:</strong> permiten recordar preferencias del usuario.</li>
                            <li><strong>Cookies de análisis:</strong> permiten medir la actividad de la web y elaborar estadísticas de navegación.</li>
                        </ul>

                        <h2>Cookies propias</h2>

                        <table class="cookie-table">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Titular</th>
                                    <th>Cookie</th>
                                    <th>Finalidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Técnica</td>
                                    <td>FIDE</td>
                                    <td>cookiePreferences</td>
                                    <td>Guardar las preferencias de consentimiento del usuario.</td>
                                </tr>
                                <tr>
                                    <td>Técnica</td>
                                    <td>FIDE</td>
                                    <td>fideComplianceCookie</td>
                                    <td>Registrar la aceptación de la política de cookies.</td>
                                </tr>
                                <tr>
                                    <td>Técnica</td>
                                    <td>WordPress</td>
                                    <td>wp-settings-4</td>
                                    <td>Almacenar preferencias de configuración del usuario.</td>
                                </tr>
                                <tr>
                                    <td>Técnica</td>
                                    <td>WordPress</td>
                                    <td>wp-settings-time-4</td>
                                    <td>Gestionar la fecha de configuración del usuario.</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2>Cookies de terceros</h2>

                        <table class="cookie-table">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Titular</th>
                                    <th>Cookie</th>
                                    <th>Finalidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Análisis</td>
                                    <td>Google LLC</td>
                                    <td>_ga</td>
                                    <td>Obtención de estadísticas anónimas de navegación.</td>
                                </tr>
                                <tr>
                                    <td>Análisis</td>
                                    <td>Google LLC</td>
                                    <td>_ga_Q4BCZX9RGE</td>
                                    <td>Google Analytics 4. Medición y análisis del tráfico del sitio web.</td>
                                </tr>
                            </tbody>
                        </table>

                        <h2>Gestión y desactivación de cookies</h2>

                        <p>
                            Puede permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de su navegador:
                        </p>

                        <ul>
                            <li>Google Chrome</li>
                            <li>Mozilla Firefox</li>
                            <li>Microsoft Edge</li>
                            <li>Safari</li>
                            <li>Opera</li>
                        </ul>

                        <p>
                            La desactivación de algunas cookies puede afectar al correcto funcionamiento del sitio web.
                        </p>

                        <h2>Información adicional</h2>

                        <p>
                            Para obtener más información sobre el tratamiento de sus datos personales puede consultar nuestra Política de Privacidad.
                        </p>

                        <p>
                            <strong>Última actualización:</strong> 30 de marzo de 2026.
                        </p>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <style>
        .cookies-policy {
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .cookie-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 30px;
        }

        .cookie-table th,
        .cookie-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .cookie-table th {
            background: #f5f5f5;
            font-weight: 600;
        }

        .cookies-policy h2 {
            margin-top: 30px;
        }

        .cookies-policy ul {
            padding-left: 20px;
        }

        @media (max-width: 1024px) and (min-width: 768px) {
            .grid-container {
                width: 90%;
                /* Ajusta el ancho del contenedor */
                margin: 0 auto;
                /* Centra el contenedor horizontalmente */
            }


            .post-container {
                width: 100%;
                /* Asegúrate de que ocupa todo el ancho disponible */
                padding: 20px;
                /* Espacio interno */
                box-sizing: border-box;
                /* Incluye el padding dentro del ancho */
            }

            .single-post-content {
                font-size: 16px;
                /* Ajusta el tamaño del texto si es necesario */
                line-height: 1.5;
                /* Mejora la legibilidad */
            }

            .tabcontent {
                width: 100%;
                /* Se asegura de que ocupe el ancho del contenedor */
                padding: 15px;
            }

        }
    </style>

</main>
<section>





    <?php get_footer(); ?>