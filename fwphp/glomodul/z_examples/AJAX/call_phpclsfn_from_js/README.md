# MyPHP
A javascript package for accessing php classes and functions within a .js file

# How to use 
<b> In your PHP index.php or ROOT entry file </b>

let's assume you are using your index.php for your root entry

```
  <?php
  
   .. other includes and settings
   
   include_once('MyPHP.php'); 
   // just after your includes and autoloaders.
   
   .. some codes here or 
   // call listener here
   MyPHP::listen();

   // just in case you need to use authentication with every incoming request
   // You can use this instead
   MyPHP::listen('-hashed-auth-(md5/sha1)');
   
   ..the rest of your code here
  
  ?>
```

# MyPHP client config
1. Open MyPHP.js
2. Set your http request url

```
  ;function MyPHP()
  {
    ..other default settings here
    
    // we just need to set this url to our php app
    this.url = 'https://www.example.com/index.php'; // we used index.php as our entry point remember ?
    
    ..other codes here
```

# Quick example to kickstart
lets create a new file called index.html

```
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <!-- include MyPHP.js -->
    <script src="MyPHP.js"></script>

    <!-- use MyPHP class -->
    <script>
        const php = new MyPHP;
        php.auth = 'hashed-key';

        // call a php class
        const phpClass = php.fromClass('Authentication' or 'Moorexa\\Authentication', <pass aguments for constructor here>);
        
        // call a method in that class
        phpClass.method('login', <arguments>);
        
        // you can keep chaining here...

        // finally let's call this class
        php.call(phpClass).then((response)=>{
            // returns a promise.
        });

        // calling a function is quite simple also
        php.call('say_hello', <arguments>).then((response)=>{
            // returns a promise
        });

        // if your response has a script tag and you need to update your dom, just call
        php.html(response);
        
    </script>
</body>
</html>
```
