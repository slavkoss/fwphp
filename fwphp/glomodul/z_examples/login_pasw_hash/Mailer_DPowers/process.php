<?php
$expected = ['name', 'email', 'ticket_type', 'dietary_needs', 'interests', 'accept_terms'];
$required = ['name', 'email', 'accept_terms'];

if (!isset($_POST['accept_terms'])) {
    $_POST['accept_terms'] = '';
}

// check $_POST array
foreach ($_POST as $key => $value) {
    if (in_array($key, $expected)) {
        if (!is_array($value)) {
            $value = trim($value);
        }
        if (empty($value) && in_array($key, $required)) {
            $$key = '';
            $missing[] = $key;
        } else {
            $$key = $value;
        }
    }
}

// check e mail address
if (!in_array($email, $missing)) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $errors['email'] = 'Please use a valid e mail address';
    }
}

// check file upload
if (empty($_FILES) || $_FILES['photo']['error'] == 2) {
    $errors['photo'] = 'File exceeds maximum size (1 MB)';
} elseif ($_FILES['photo']['error'] == 4) {
    $errors['photo'] = 'You must select a photo';
} elseif ($_FILES['photo']['error'] > 0) {
    $errors['photo'] = 'There was an error uploading the file';
}

// check MIME type
$permitted = ['image/jpeg', 'image/png', 'image/gif'];
if (!empty($_FILES['photo']['type']) && !in_array($_FILES['photo']['type'], $permitted)) {
    if (isset($errors['photo'])) {
        $errors['photo'] .= ' &mdash; file format must be JPG, PNG, or GIF';
    } else {
        $errors['photo'] = 'Photo must be JPG, PNG, or GIF';
    }
}

// make sure file was genuinely uploaded
if ($_FILES['photo']['error'] === 0 && !is_uploaded_file($_FILES['photo']['tmp_name'])) {
    $errors['photo'] = "Sorry, can't handle that file";
}

// process only if there are no errors or missing fields
if (!$errors && !$missing) 
{
    //require_once __DIR__ . '/config.php';

                  // see ***1 set up replacements for decorator plugin

  try 
  {
                  // see ***2 create a transport

        // get image data from the temporary file
        $image_name = $_FILES['photo']['name']; //001_DPowers.jpg
        $image_tmpname = $_FILES['photo']['tmp_name'];
        $image_data = file_get_contents($_FILES['photo']['tmp_name']); //J:\xampp\tmp\php943E.tmp
        /*$photo = $message->embed(Swift_Image::newInstance(
            $image_data, $_FILES['photo']['name']
            , $_FILES['photo']['type'])
            )
        ; */

        // create the first part of the HTML output
        //$html = EOTXT
        ob_start();
        ?>
        <html lang="en">
        <head>
          <meta http-equiv="content-type" content="text/html; charset=UTF-8">
          <title>Art Conference Registration</title>
        </head>
        <body bgcolor="#EBEBEB" link="#B64926" vlink="#FFB03B">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EBEBEB">
            <tr>
            <td>
              <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td style="padding-top: 0.5em">
              <h1 style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif; color: #0E618C; text-align:
              center">Art Conference Registration</h1>
              </td>
            </tr>
            <tr>
              <td style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif; color: #1B1B1B; font-size: 14px; padding: 1em">
              <p>#greeting#</p>
              <ul>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        $text = ''; // initialize variable for plain text version
        // add each form element to the HTML and plain text content
        foreach ($expected as $item) {
            if (isset($$item)) {
                $value = $$item;
                $label = ucwords(str_replace('_', ' ', $item));
                $html .= "<li><b>$label:</b> ";
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }
                $html .= "$value</li>";
                $text .= "$label: $value\r\n";
            }
        }

        // complete the HTML content
        $html .= '</ul></td></tr>';
        // HTML for the image
        $html .= '<tr><td style="font-family: \'Lucida Grande\', \'Lucida Sans Unicode\',
    Verdana, sans-serif; color: #1B1B1B; font-size: 14px; padding: 1em">
    <p>#photo# ';
        ob_start();
        echo "<pre>\$_FILES="; print_r($_FILES); echo "</pre>";
        $html .= ob_get_contents();
        ob_end_clean();
        $html .= '</p></td></tr>';
        $html .= '<tr><td align="center"><img src="'
           . $image_name //$photo
           . '" alt="' . $image_name . '"></td></tr>';
        $html .= '</table></body></html>';

        // set the HTML body and add the plain text version
        //$message->setBody($html, 'text/html')->addPart($text, 'text/plain');
        $body    = $html ;
        $altbody = $text ;

        // initialize variables to track the e mails
        $sent = 0;
        $failures = [];

        /* // send the m essages
        foreach ($replacements as $recipient => $values) {
            $message->setTo($recipient);
            $sent += $mailer->send($message, $failures);
        } */
        
        require_once __DIR__ . '/PHPMailer_send.php';


        header('Location: thanks.php');
        exit;
        // if both messages have been sent, redirect to relevant page
        //if ($sent == 2) { header('Location: thanks.php'); exit; }
    /*
    // handle failures
        $num_failed = count($failures);
        if ($num_failed == 2) {
            $f = 'both';
        } elseif ($num_failed == 1 && in_array($email, $failures)) {
            $f = 'email';
        } else {
            $f = 'reg';
        } 

    // IMPORTANT: log an error before redirecting

        header("Location: error.php?f=$f");
        exit;
     */
  } catch (Exception $e) {
        echo $e->getMessage();
  }
}


                  /* ***1
                  // set up replacements for decorator plugin
                  $replacements = [
                      $email =>
                          ['#subject#' => 'Confirmation of Roux Art Conference registration',
                              '#greeting#' => "$name, thank you for registering for the Roux Academy
                          Art Conference. This is a record of your registration details.",
                              '#photo#' => 'This photo will be used for your registration badge.'],
                      'secret@foundationphp.com' =>
                          ['#subject#' => "Art Conference Registration for $name",
                              '#greeting#' => "Registration details for $name.",
                              '#photo#' => 'Registration photo.']
                  ];
                  */


                  /*
                    // ***2 create a transport
                    $transport = Swift_SmtpTransport::newInstance($smtp_server, 465, 'ssl')
                        ->setUsername($username)
                        ->setPassword($password);
                    $mailer = Swift_Mailer::newInstance($transport);

                    // register the decorator and replacements
                    $decorator = new Swift_Plugins_DecoratorPlugin($replacements);
                    $mailer->registerPlugin($decorator);

                    // initialize the message
                    $message = Swift_Message::newInstance()
                        ->setSubject('#subject#')
                        ->setFrom($from);
                    */