  <nav>
    <header>
      <h1>Internet Joke Database</h1>
    </header>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php?joke/list">Jokes List</a></li>
      <li><a href="index.php?joke/edit">Add a new Joke</a></li>

      <?php if ($loggedIn): ?>
      <li><a href="index.php?login/logout">Log out</a></li>
      <?php else: ?>
      <li><a href="index.php?login/login">Log in</a></li>
      <?php endif; ?>

    </ul>
  </nav>

  <main>
  <?=$output?>
  </main>


<!--
<li><a href="/">Home</a></li>
<li><a href="/joke/list">Jokes List</a></li>
-->