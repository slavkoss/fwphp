# SimpleMVC

## Backend
**SimpleMVC** is a simple PHP MVC framework

### Requirements ：

* PHP 5.6.0+

### Directories

```
project                 Root
├─app                   Applications
│  ├─controllers        Controllers
│  ├─models             Models
│  ├─views              Views
├─config                Configurations
├─core                  Framework Core files
├─static                Resources files : CSS, JS, Images
├─index.php             
```

### How to use

#### 1. Clone

```
https://github.com/doulmi/SimpleMVC.git
git checkout master
```

#### 2. Create Database 

#### 3. Modify configurations in config/config.php

```
return [
    'db' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'project',
    ],

    'defaultController' => 'Menus',
    'defaultAction' => 'index',
    'allowedCors' => true,
];

```

#### 4. Test
`http://localhost/`

## Frontend - Build with Vue-cli, Vuejs, Vuex, Vue-router, Axios

### install dependencies
```npm install```

### serve with hot reload at localhost:8080
```npm run dev```

### build for production with minification
```npm run build```
