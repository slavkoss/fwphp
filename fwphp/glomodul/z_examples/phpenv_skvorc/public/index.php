<?php

//use Particle\Validator\Validator;

//require_once '../vendor/autoload.php';

/*
$file = '../storage/database.db';
if (is_writable('../storage/database.local.db')) {
    $file = '../storage/database.local.db';
}
$database = new medoo([
    'database_type' => 'sqlite',
    'database_file' => $file
]);
*/
//$comment = new SitePoint\Comment($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    /* $v = new Validator();
    $v->required('name')->lengthBetween(1, 100)->alnum(true);
    $v->required('email')->email()->lengthBetween(5, 255);
    $v->required('comment')->lengthBetween(10, null);

    $result = $v->validate($_POST);

    if ($result->isValid()) { */

        try {
            /* $comment
                ->setName($_POST['name'])
                ->setEmail($_POST['email'])
                ->setComment($_POST['comment'])
                ->save(); */

            header('Location: /');

            return;

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    /*} else {
        dump($result->getMessages());
    } */
}

?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--link rel="favicon" href="favicon.ico"-->
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/custom.css">

    <!--script src="js/vendor/modernizr-2.8.3.min.js"></script-->
</head>



<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an
    <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</p>
<![endif]-->


<?php
//foreach ($comment->findAll() as $comment) : ?>

    <div class="comment">
        <h3>On <?php //echo $comment->getSubmissionDate() ; ?>, 
               <?php //echo $comment->getName() ?> wrote:</h3>

        <p><?php echo 'aaaaaaa'; //$comment->getComment(); ?></p>
    </div>

<?php //endforeach; ?>

<form method="post">
    <label>Name: <input type="text" name="name" placeholder="Your name"></label>
    <label>Email: <input type="text" name="email" placeholder="your@email.com"></label>
    <label>Comment: <textarea name="comment" cols="30"
                              rows="10"></textarea></label>
    <input type="submit" value="Save">

    <br><br><span style="color: gray;"><p>šđčćž aaaaaa bbbbbbbbbbbb cccccccccc šđčćž nnnnnnnnnnnnn bbbbbbbbbbb llllllllllllllll ffffffffff ddddddddddddd nnnnnnnn
    <p>hhhhhhhh jjjjjj
    </span>

</form>


<?= '<br><br><span style="color: gray;"><p><hr style="color: silver;">This is '. __FILE__ .' šđčćž aaaaaa bbbbbbbbbbbb cccccccccc šđčćž nnnnnnnnnnnnn bbbbbbbbbbb llllllllllllllll ffffffffff ddddddddddddd nnnnnnnn
<p>hhhhhhhh jjjjjj
</span>' ?>

</body>
</html>
