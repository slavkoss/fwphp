<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Art Conference: Registration Failed</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Roux Academy Art Conference</h1>
        <p>Join over 500 hundred of the most creative and brilliant minds of art colleges all around the world for
            lectures by world-renowned art scholars and artists.</p>
    </header>
    <main>
        <h2>Sorry, there was a problem</h2>
        <?php if (!isset($_GET['f'])) : ?>
        <p>It looks as though you landed on this page by accident.</p>
        <?php elseif ($_GET['f'] == 'both') : ?>
        <p>There was a problem with the registration system. Your details have not been registered. Please try again
            later.
        </p>
        <?php elseif ($_GET['f'] == 'reg') : ?>
        <p>There was a problem with the registration system. Although a confirmation email has been sent
            to the address you supplied, your details were not recorded correctly.</p>
        <?php else : ?>
        <p>There appears to be a problem with the email address you supplied.</p>
        <?php endif; ?>
    </main>
    <footer>
        <ul>
            <li><a href="#">About the Roux Academy</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Visit our website</a></li>
        </ul>
    </footer>
</div>
</body>
</html>