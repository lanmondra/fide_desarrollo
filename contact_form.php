<?php

function get_the_ip() {
    
    if ( isset ( $_SERVER["HTTP_X_FORWARDED_FOR"] )) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif ( isset( $_SERVER["HTTP_CLIENT_IP"] )) {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    else {
        return $_SERVER["REMOTE_ADDR"];
    }
}



function contact_form_code( $atts ) {
 

    
    extract( shortcode_atts( array(

        "email"         => "fide@fide.es",
        "subject"       => "",
        "label_name"    => "Nombre",
        "label_email"   => "Email",
        "label_company" => "Empresa",
        "label_phone"   => "Teléfono",
        "label_message" => "Mensaje",
        "label_check"   => "Aceptación política de privacidad",
        "label_submit"  => "ENVIAR",

        // the error message when at least one of the required fields are empty:
        "error_empty"   => '<span style="color: #AC0600;">Por favor, rellena los campos: Nombre, Email y mensaje.',

        // the error message when the e-mail address is not valid:
        "error_noemail" => '<span style="color: #AC0600;">Por favor, introduce una dirección de Email válida.',

        // the error message when the checkbox is not checked:
        "error_check"   => '<span style="color: #AC0600;">Es necesario que leas y aceptes nuestra política de privacidad',

        // and the success message when the e-mail is sent:
        "success"       => '<hr class="generic-hr">
                        <img class="message-sent-icon" src="https://www.fide.es/wp-content/themes/fide2019/images/icons-menu-newsletter.svg">
                        <div class="message-sent-text">                         
                            <b>Tu mensaje ha sido enviado.</b><br>Gracias por ponerte en contacto con nosotros.
                        </div>'

    ), $atts ) );



    // if the <form> element is POSTed, run the following code
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $error = false;
        // set the "required fields" to check
        $required_fields = array( "your_name", "email", "message" );

        // this part fetches everything that has been POSTed, sanitizes them and lets us use them as $form_data['subject']
        foreach ( $_POST as $field => $value ) {
            if ( get_magic_quotes_gpc() ) {
                $value = stripslashes( $value );
            }
            $form_data[$field] = strip_tags( $value );
        }

        // if the required fields are empty, switch $error to TRUE and set the result text to the shortcode attribute named 'error_empty'
        foreach ( $required_fields as $required_field ) {
            $value = trim( $form_data[$required_field] );
            if ( empty( $value ) ) {
                $error = true;
                $result = $error_empty;
            }
        }

        // and if the e-mail is not valid, switch $error to TRUE and set the result text to the shortcode attribute named 'error_noemail'
        if ( ! is_email( $form_data['email'] ) ) {
            $error = true;
            $result = $error_noemail;
        }

        // and if the checkbox is not checked, switch $error to TRUE and set the result text to the shortcode attribute named 'error_check'
        if ( !isset($form_data['privacy_check']) ) {
            $error = true;
            $result = $error_check;
        }

        // but if $error is still FALSE, put together the POSTed variables and send the e-mail!
        if ( $error == false ) {
            // get the website's name and puts it in front of the subject
            $email_subject = " FIDE - Formulario de contacto ";
            // get the message from the form and add the IP address of the user below it
            $email_message = $form_data['message'] . "---" . "\n\nNombre: " . $form_data['your_name'] . "\nEmail: " . $form_data['email'] . "\nEmpresa: " . $form_data['company'] . "\nTeléfono: " . $form_data['phone'] . "\nDirección IP: " . get_the_ip();
            // set the e-mail headers with the user's name, e-mail address and character encoding
            $headers  = "From: " . $form_data['your_name'] . " <" . $form_data['email'] . ">\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\n";
            $headers .= "Content-Transfer-Encoding: 8bit\n";
            // send the e-mail with the shortcode attribute named 'email' and the POSTed data
            wp_mail( $email, $email_subject, $email_message, $headers );
            // and set the result text to the shortcode attribute named 'success'
            $result = $success;
            // ...and switch the $sent variable to TRUE
            $sent = true;
        }
    }



    // if there's no $result text (meaning there's no error or success, meaning the user just opened the page and did nothing) there's no need to show the $info variable
    if ( $result != "" ) {
        $info = '<div class="info">' . $result . '</div>';
    }
    // anyways, let's build the form! (remember that we're using shortcode attributes as variables with their names)
    $email_form = '
    <form class="contact-form" method="post" action="' . get_permalink() . '">

        <div>
            <input type="text" name="your_name" id="cf_name" placeholder="Nombre" size="50" maxlength="50" value="' . $form_data['your_name'] . '" required title="Introduzca su nombre (campo requerido)">
        </div>
        <div>
            <input type="email" name="email" id="cf_email" placeholder="Email" size="50" maxlength="50" value="' . $form_data['email'] . '" required title="Introduzca su email (campo requerido)">
        </div>
        <div>
            <input type="text" name="company" id="cf_company" placeholder="Empresa" size="50" maxlength="50" value="' . $company . $form_data['company'] . '" title="Introduzca el nombre de su empresa (opcional)">
        </div>
        <div>
            <input type="text" name="phone" id="cf_phone" placeholder="Teléfono" size="50" maxlength="50" value="' . $phone . $form_data['phone'] . '" title="Introduzca su número de teléfono (opcional)">
        </div>
        <div>
            <textarea name="message" id="cf_message" placeholder="Mensaje" cols="50" rows="15" required title="Introduzca su mensaje (campo requerido)">' . $form_data['message'] . '</textarea>
        </div>
        <div>
            <label for="cf_check" class="check-label">
                <input type="checkbox" name="privacy_check" value="' . $form_data['privacy_check'] . '" name="check" id="cf_check" required title="Es necesario que lea y acepte nuestra política de privacidad para que podamos procesar sus datos">
                He leído y acepto la <a href="https://www.fide.es/politica-de-privacidad/" target="_blank" style="text-decoration:underline;">política de privacidad</a>.
            </label>
        </div>
        <div>
            <input class="submit" type="submit" value="' . $label_submit . '" name="send" id="cf_send" />
        </div>

    </form>';



    if ( $sent == true ) {
        return $info;
    } else {
        return $info . $email_form;
    }

    
    
}



add_shortcode( 'contact', 'contact_form_code' );



?>