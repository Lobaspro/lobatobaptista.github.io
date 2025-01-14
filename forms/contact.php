<?php
  /**
  */

  // receber mensagem
  $receiving_email_address = 'raio.vermelho75@gmail.com';

  if( file_exists($php_email_form = 'C:\Users\bapti\Downloads\Personal\Personal\assets\vendor\php-email-form' )) {
    include( $php_email_form );
  } else {
    die( 'Não é possível carregar a biblioteca "PHP Email Form"!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
