<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;


class Email {
    public $nombre;
    public $email;
    public $token;
    
    public function __construct($nombre, $email, $token) 
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        // Create the email object
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Port =587;
        $mail->Username = 'peluqueriaapp@outlook.es';
        $mail->Password = 'ta7jJmh8bFTRUQxs';


        $mail->setFrom('peluqueriaapp@outlook.es', 'https://oyster-app-mzcjx.ondigitalocean.app/');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';
        // Use HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong> " .  $this->nombre . "</strong>. Has creado tu cuenta en nuestra App web, confirma tu cuenta en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://oyster-app-mzcjx.ondigitalocean.app/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si no has sido tú, solo ignora este email. Disculpa las molestias.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Send email
        $mail->send();
    }

    public function enviarInstrucciones() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Port =587;
        $mail->Username = 'peluqueriaapp@outlook.es';
        $mail->Password = 'ta7jJmh8bFTRUQxs';


        $mail->setFrom('peluqueriaapp@outlook.es', 'https://oyster-app-mzcjx.ondigitalocean.app/');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong> " .  $this->nombre . "</strong>. Has solicitado reestablecer tu cuenta en Nuestra App web.Sigue el siguiente enlace para hacerlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='https://oyster-app-mzcjx.ondigitalocean.app/confirmar-cuenta?token=" . $this->token . "'>Restablecer contraseña</a></p>";
        $contenido .= "<p>Si no has sido tú, solo ignora este email. Disculpa las molestias.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Send email
        $mail->send();
    }

}
