https://developers.nl/blog/35/hexagonal-architecture-in-php  2016.07.11
Yordi Pauptit : "Hexagonal Architecture in PHP"

See https://github.com/JunaidQadirB/ddd-php inspired by Yordi Pauptit article.

http://dev1:8083/fwphp/glomodul/mkd/?i/showhtml/path/J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\ha_post_readme.md

# Hexagonal Architecture in PHP (it is also called ports & adapters)
### What is hexagonal architecture?
As described by [Alistair Cockburn](http://alistair.cockburn.us/Hexagonal+architecture), HA is a way of coding your app without being dependent on any external libraries or frameworks. All **app specific logic** should be contained an not be tightly coupled. By defining interfaces at the boundaries of your app, you will allow external libraries to implement functionality hidden within your actual app.

Recently my ex-colleague and buddy [Marco](http://canwedothis.com/) sent me a link to [this article](http://fideloper.com/hexagonal-architecture), on hexagonal architecture. And although it's a very interesting article, it does leave me with some questions on HOW TO ACTUALLY IMPLEMENT HA. Of course, the ways explained in this article are not set in stone, and one can just take parts of the ARCHITECTURAL PATTERN. Let's find out what parts suit me, by coding a small application.

<br />
### Layers are not explicitly defined by Alistair Cockburn
1. Domain layer  
  Your domain layer will contain all objects that define the domain.
  1. The models you create for it live in this layer, 
  2. as do the interfaces/ports to retrieve data regarding your models.
  3. Also exceptions that can be thrown by your interface implementors will reside in this layer.

2. Application layer  -  Working in DDD (Domain Driven Development) and CQRS these will typically be Commands and Queries, as well as the Events that will be triggered after Commands are executed. Events will not be covered in this post.  
  Although arguable, I'd like to store all actions that can be taken on the models from the domain layer in the application layer. Since actions are what your application actually is.  

3. Infrastructure layer  -  Where all actual implementations/adapters of interfaces/ports defined in domain will be. Eg if we have a 
  1. Post model,
  2. with a PostRepositoryInterface defined in our Domain layer,
  3. we'll implement the repository here in infrastr. layer.



<br /><br /><br />
## Creating the app

Since we'll be pushing this to GitHub, we'll also initialize git and add an ignore file.

    $ mkdir app && cd app && mkdir src
    $ git init
    $ touch .gitignore

Three folders for layers

    $ mkdir src/Domain
    $ mkdir src/Application
    $ mkdir src/Infrastructure

### Domain layer
Let's create a Post model, and define some basic ways to retrieve Posts. We want all Post related objects to be in the same namespace for convenience.

1. src/**Domain**/Post/Post.php to store your model definition in
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\Post.php
namespace Post\Domain\ha_posts_pauptit;

class Post
{
    public $id;
    public $title;
    public $contents;
}
```

Now define the interface to retrieve instances of a post. This will be an interface and not the actual implementation of the retrieval from a data source. Our domain does not care where to store our data, it just cares about getting the data.

2. src/**Domain**/Post/iPostRepo.php   (or PostRepositoryInterface.php)
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iPostRepo.php
namespace Post\Domain\ha_posts_pauptit;

interface iPostRepo
{
    public function create(Post $post);
}
```

For completeness, we'll also add a generic PostException. I'd recommend more specific exceptions, like PostNotFoundException when you're actually going to use the code for more than education.

3. src/**Domain**/Post/Exception/PostException.php
    
````php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\PostException.php
namespace Post\Domain\ha_posts_pauptit;

class PostException extends Exception {}
```


### Application layer
Commands are meant to write, and Queries are meant to read.

Queries are similar to Commands in type of handling. The main distinct between the two, is that **Commands should not return any output**. Commands should be fired, and assumed successful unless there is an exception thrown.

Queries are meant to return output, **Queries should not alter state**. 

We're going to create one Command to create a Post (and obviously store it "somewhere").

So there is going to be a generic way to execute commands. We want to create :
1. iCmd  (CommandInterface) so we're able to typehint them

2. iCmdBus  (CommandBusInterface) (remember, we don't care here how it executes those commands, we just want it to execute them)

3. iCmdHndl  (CommandHandlerInterface)  implementors will contain the logic that the Command describes.

1. src/**Application**/Command/iCmdBus.php
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iCmdBus.php
namespace Post\App\Cmd\ha_posts_pauptit;

interface iCmdBus
{
    public function execute(iCmd $command);
}
```


2. src/**Application**/Command/iCmd.php
    
```php
<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iCmd.php
namespace Post\App\Cmd\ha_posts_pauptit;

interface iCmd {}
```


3. src/**Application**/Command/iCmdHndl.php
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iCmdHndl.php
namespace Post\App\Cmd\ha_posts_pauptit;

interface iCmdHndl
{
    public function handle(iCmd $command);
}
```

Now we're going to create **CreatePostCommand (immutable data object)** and its CreatePostHandler. These will contain **actual app logic**.  

CreatePostCommand will not create a Post instance, just **scalar attributes needed to create the post**. We do not want it to be an object, since objects are references, and **commands should not be able to alter after creating them**.

4. src/**Application**/Command/Post/CrePostCmd.php
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\CrePostCmd.php
namespace Post\App\Cmd\ha_posts_pauptit;

//use App\Common\Contracts\Cmd\Post\iCmd;

class CrePostCmd implements iCmd
{
  private $title;
  private $contents;

  public function __construct($title, $contents)
  {
      $this->title = $title;
      $this->contents = $contents;
  }

  public function getTitle()
  {
      return $this->title;
  }

  public function getContents()
  {
      return $this->contents;
  }
}
```

5. src/**Application**/Command/Post/Handler/CrePostHndl.php
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\CrePostHndl.php
namespace Post\App\Cmd\ha_posts_pauptit;

use Post\Domain\ha_posts_pauptit\iPostRepo ;
use Post\App\Cmd\ha_posts_pauptit\iCmd ;
use Post\Domain\ha_posts_pauptit\Post ;

class CrePostHndl implements iCmdHndl
{
    private $postRepository;

    // We'll use constructor injection to inject this handlers
    // dependencies. We'll typehint the interface since we do not
    // care where to store it at this point.
    public function __construct(iPostRepo $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    // Since we are not permitted more specific types of the
    // CommandInterface, we'll have to check its type. 
    public function handle(iCmd $command)
    {
        if (!$command instanceof CrePostCmd) {
            throw new Exception("CreatePostHandler can only handle CreatePostCommand");
        }

        $post = new Post;
        $post->id = uniqid();
        $post->title = $command->getTitle();
        $post->contents = $command->getContents();

        $this->postRepository->create($post);
    }
}
```

Our Application part is done for the moment. We've created 
1. **ports/interfaces to run Commands**, which should be implemented in Infrastructure layer
2. **Command to create a new Post and store it**.



### Infrastructure layer
In our Infrastructure layer, we'll implement the CommandBusInterface, or "port", to our Application layer. This can be very simple, depending on your needs. As in this app we'll need direct feedback (through the throwing of exceptions) whether our Command is successful, we'll create a SynchronousCommandBus.

1. src/**Infrastructure**/CmdBus/SynchrCmdBus.php
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\SynchrCmdBus.php
namespace Post\Infrastr\ha_posts_pauptit;

//use App\Common\Contracts\Command\CommandBusInterface;
//use App\Common\Contracts\Command\CommandHandlerInterface;
//use App\Common\Contracts\Command\CommandInterface;

use Post\App\Cmd\ha_posts_pauptit\iCmdBus ;
use Post\App\Cmd\ha_posts_pauptit\iCmd ;
use Post\App\Cmd\ha_posts_pauptit\iCmdHndl ;

class SynchrCmdBus implements iCmdBus
{
  /** @var CommandHandlerInterface[] */
  private $handlers = [];

  public function execute(iCmd $command)
  {
    $commandName = get_class($command);

    // Check if Command that's given is actually registered to be handled here.
    if (!array_key_exists($commandName, $this->handlers)) {
        throw new Exception("{$commandName} is not supported by the SynchronousCommandBus.");
    }

    return $this->handlers[$commandName]->handle($command);
  }

  // Now all we need is a function to register handlers
  public function register($commandName, iCmdHndl $handler) //$command
  {
    $this->handlers[$commandName] = $handler;
    return $this;
  }
}

```

For testing purposes, we'll create a simple in-memory PostRepository.

2. src/**Infrastructure**/Persistence/PostRepo.php
    
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\PostRepo.php
namespace Post\Infrastr\ha_posts_pauptit;

use Post\Domain\ha_posts_pauptit\iPostRepo;
use Post\Domain\ha_posts_pauptit\Post ;

class PostRepo implements iPostRepo
{
    public $posts = [];

    public function create(Post $post)
    {
        $this->posts[] = $post;

        // Obviously, this is for testing purposes only
        echo "Post with id {$post->id} was created.";
    }
}
```

We're all set now! We should be able to test it by 
1. creating a SynchronousCommandBus,
2. register our Command and Handler 
3. and try to execute it.
 
It should run and output **"Post with id ### was created."**.

```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\index.php  or test.php

namespace Post\ha_posts_pauptit;

use B12phpfw\core\zinc\Autoload ;

use Post\Infrastr\ha_posts_pauptit\SynchrCmdBus ;
use Post\Infrastr\ha_posts_pauptit\PostRepo ;

use Post\App\Cmd\ha_posts_pauptit\CrePostHndl ;
use Post\App\Cmd\ha_posts_pauptit\CrePostCmd ;

$module_towsroot = '../../../../../' ;  //to web server doc root or our doc root by ISP
$app_dir_path = str_replace('\\','/', dirname(__DIR__) ) ; //to app dir eg "glomodul" dir and app

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'1.0.0.0 ha post', 'vendor_namesp_prefix'=>'' //B12phpfw
  //1.3 Dirs where are CLASS SCRIPTS TO INCLUDE AUTOMATICALLY (A u t o l o a d)
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=$module_path=thismodule_cls_dir_path
      /////dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
  ]
] ;

//2. global cls loads classes scripts automatically
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 



//In Infrastr layer we implement iCmdBus, or "port" from Infrastr layer to our App layer.
//For direct feedback (through throwing of exceptions) whether our Command is successful :
$cmdBus = new SynchrCmdBus(); 

$postRepo = new PostRepo; //cre : $this->posts[] = $post;
$cmdHndl  = new CrePostHndl($postRepo);

$cmdBus->register(CrePostCmd::class, $cmdHndl);

$cmd = new CrePostCmd(
    "This is the post title", 
    "And this is the content"
);

try {
  $cmdBus->execute($cmd);
} catch ( Exception $e ) {
  echo $e->getMessage();
}
```



<br /><br /><hr />
Yordi This article was first posted on [yordipauptit.com](https://www.yordipauptit.com/hexagonal-architecture-in-php/).

References:

*   [hexagonal architecture at fideloper](http://fideloper.com/hexagonal-architecture)
    
*   [alistair cockburn on hexagonal architecture](http://alistair.cockburn.us/Hexagonal+architecture)
    
