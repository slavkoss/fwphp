<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['title']; ?></h1>
    <p>This is a simple PHP MVC framework</p>
    <h2>Features:</h2>
    <ul>
        <li>URL Rewriting with mod_rewrite</li>
        <li>Full MVC Workflow</li>
        <li>Core PDO Database Library</li>
        <li>Flash Messaging</li>
    </ul>
    <!--
    <h2>MVC Workflow:</h2>
    <ol>
        <li>Create a file in the controllers folder such as <strong>Posts.php</strong></li>
        <li>Create a class such as <strong>Posts</strong> and extend the <strong>Controller</strong> class</li>
        <li>Create an <strong>index()</strong> method which is the default. Access it at <strong>http://yourapp/posts</strong></li>
        <li>Create another method like <strong>add()</strong> and access it at <strong>http://yourapp/posts/add</strong></li>
        <li>You can add an optional parameter to a method such as <strong>show($id)</strong> and access at <strong>http://yourapp/posts/show/12</strong>. You can then access the "12" with <strong>$id</strong> in your <strong>show($id)</strong> method</li>
    </ol>
    <h2>Creating a View</h2>
    <ol>
        <li>Create a file in the views folder such as <strong>index.php</strong> or in a subfolder like <strong>posts/index.php</strong></li>
        <li>Load the view in your controller method with <br>
        <code><pre>$this->view('posts/index');</pre></code></li>
        <li>You can pass data into the view as an associative array like this <br>
        <code><pre>$this->view('posts/index', ['title' => 'Hello World']);</pre></code></li>
        <li>You can access that value in the view with<br>
        <code><pre>&lt;?php echo $data['title'] ?&gt;</pre></code></li>
    </ol>
    <h2>Creating a Model</h2>
    <ol>
        <li>Create a file in the models folder such as <strong>Post.php</strong></li>
        <li>Create a class such as <strong>Post</strong></li>
        <li>To use the database library, create a <strong>private $db</strong> property, then create a constructor and instantiate a new db instance with<br>
        <code><pre>$this->db = new Database;</pre></code></li>

    </ol>
    -->
<?php require APPROOT . '/views/inc/footer.php'; ?>