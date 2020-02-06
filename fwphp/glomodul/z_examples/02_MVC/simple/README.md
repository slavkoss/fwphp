```
├── app                           # Main MVC file structure directory
│   ├── controllers               # Controllers directory
│   │   └── example.php           # Example Controller with functionality explanation
│   ├── models                    # Models directory
│   │   └── example.php           # Example Model with functionality explanation
│   └── views                     # Views directory, views are recommended in pure html, possible <?=$variable?> additions
├── core                          # Basically mvc engine directory
│   ├── app.php                   # Main framework file
│   ├── classes                   # Classes directory for possible autoloading
│   │   ├── controller.php        
│   │   └── model.php             
│   ├── config                    # Configuration directory
│   │   ├── database.php          
│   │   └── session.php           
│   └── helpers                   # Autoloaded helpers directory
│       └── examplehelper.php     
├── index.php                     # Endpoint url
├── public                        # Directory for all public resources, javascript files, stylesheets and vendor plugins
│   ├── javascripts               
│   ├── stylesheets               
│   └── vendor                    
└── .htaccess                     # htaccess rewriting all of requests to MVC endpoint /index.php
```
