<?php

/**
 * MyPHP listener. 
 * @author Amadi ifeanyi
 * @repo https://github.com/amadiify/MyPHP
 */

// class definition starts here
class MyPHP
{
    /** @var String $auth sets authentication for incoming requests */
    protected $auth = null; // can be a hashed md5 value or sha1. But should be hashed.

    /**
     * Listen
     *
     * To use, just call MyApp::listen();
     * or call MyApp::listen('--hashed-value-for-auth');
     *
     * @param String $auth Hashed value for authentication
     * @return json response object
     **/
    public static function Listen($auth = null)
    {
        self::$auth = $auth;

        if (isset($_GET['4d5be6954a37f1076eb6d698fbce26c2']))
    {   
            // clear buffer
      ob_clean();
            ob_start(); // start buffer
            
            // should we continue
            $continue = true;
            $message = null;

            // a simple php function to check if an index exists in an array
            // we would be using this function in MyApp class
            // sorry i placed it here. You can refactor this code and place
            // this function in your library file.
            if (!function_exists('is_avail'))
            {
                function is_avail($id, $array)
                {
                    if (isset($array[$id]))
                    {
                        return $array[$id];
                    }
                    else
                    {
                        return null;
                    }
                } 
                // -end here
            }

            // manages authentication
            if (self::$auth !== null)
            {
                if (isset($_GET['auth']))
                {
                    $auth = $_GET['auth'];
                    if ($auth != self::$auth)
                    {
                        $continue = false;
                        echo "Authentication failed! Could not continue.";
                    } 
                }
                else
                {
                    $continue = false;
                    echo "auth params not found. Authentication could not be made.";
                }
            }

            // all good! then we continue
            if ($continue)
            {
                $post = self::postData();

                // function requests.
                if (isset($post['function']))
                {
                    $func = $post['function'];
                    $args = $post['arguments'];

                    if (function_exists($func))
                    {
                        if ($args != null)
                        {
                            $args = json_decode($args);
                            echo call_user_func_array($func, $args->data);
                        }
                        else
                        {
                            echo call_user_func($func);
                        }
                    }
                }
                // class requests.
                elseif (isset($post['class']))
                {
                    $obj = json_decode($post['class']);
                    $static = null;

                    if (isset($obj->staticMethod))
                    {
                        $classArgs = json_decode($obj->classArgs)->data;
                        $methArgs = json_decode($obj->staticMethodArgs)->data;
                        $class = $obj->class;
                        $method = $obj->staticMethod;

                        if (class_exists($class))
                        {
                            $static = $class::{$method}(
                                is_avail(0, $methArgs),
                                is_avail(1, $methArgs),
                                is_avail(2, $methArgs),
                                is_avail(3, $methArgs),
                                is_avail(4, $methArgs),
                                is_avail(5, $methArgs),
                                is_avail(6, $methArgs)
                            );
                        
                        }
                    }
                    
                    if (isset($obj->method) && count($obj->method) > 0)
                    {
                        if ($static == null)
                        {
                            $classArgs = json_decode($obj->classArgs)->data;
                            $class = $obj->class;

                            if (class_exists($class))
                            {
                                $static = new $class(
                                    is_avail(0, $classArgs),
                                    is_avail(1, $classArgs),
                                    is_avail(2, $classArgs),
                                    is_avail(3, $classArgs),
                                    is_avail(4, $classArgs),
                                    is_avail(5, $classArgs),
                                    is_avail(6, $classArgs)
                                );

                                $failed = [];

                                foreach($obj->method as $i => $meth)
                                {
                                    if (is_object($static))
                                    {
                                        try
                                        {
                                            $methArgs = json_decode($obj->methodArgs[$i])->data;
                                            $static = $static->{$meth}(
                                                is_avail(0, $methArgs),
                                                is_avail(1, $methArgs),
                                                is_avail(2, $methArgs),
                                                is_avail(3, $methArgs),
                                                is_avail(4, $methArgs),
                                                is_avail(5, $methArgs),
                                                is_avail(6, $methArgs)
                                            );
                                        }
                                        catch(Exception $e)
                                        {
                                            $failed[] = $e->getMessage();
                                        }
                                
                                    }
                                }

                                if (count($failed) > 0)
                                {
                                    echo 'Something went wrong. Error: '. json_encode($failed);
                                }
                            }
                            else
                            {
                                echo 'Class {'.$class.'} not found!';
                            }
                        }
                        else
                        {
                            $failed = [];

                            foreach($obj->method as $i => $meth)
                            {
                                if (is_object($static))
                                {
                                    try
                                    {
                                        $methArgs = json_decode($obj->methodArgs[$i])->data;
                                        $static = $static->{$meth}(
                                            is_avail(0, $methArgs),
                                            is_avail(1, $methArgs),
                                            is_avail(2, $methArgs),
                                            is_avail(3, $methArgs),
                                            is_avail(4, $methArgs),
                                            is_avail(5, $methArgs),
                                            is_avail(6, $methArgs)
                                        );
                                    }
                                    catch(Exception $e)
                                    {
                                        $failed[] = $e->getMessage();
                                    }
                            
                                }
                            }

                            if (count($failed) > 0)
                            {
                                echo 'Something went wrong. Error: '. json_encode($failed);
                            }
                        }
                    }

                    if (isset($obj->call))
                    {
                        $call = $obj->call;
                        $callArgs = json_decode($obj->callArgs)->data;

                        if (is_object($static))
                        {
                            $static = $static->{$call}(
                                is_avail(0, $callArgs),
                                is_avail(1, $callArgs),
                                is_avail(2, $callArgs),
                                is_avail(3, $callArgs),
                                is_avail(4, $callArgs),
                                is_avail(5, $callArgs),
                                is_avail(6, $callArgs)
                            );
                        }
                    }

                    if ($static != null && (is_object($static) || is_array($static)))
                    {
                        if (is_object($static))
                        {
                            $static = toArray($static);
                        }

                        echo json_encode($static);

                    }
                    elseif ($static != null && (!is_object($static) && !is_array($static)))
                    {
                        echo $static;
                    }
                }
            }

            $response = ob_get_contents();
            ob_clean();
            
            ob_start();

            // set content type for this output.
            header('Content-Type: application/json');

            echo json_encode(['response' => $response]);

            // kill what's left of the page and return json output only.
            die();
    }
    }

    /**
     * PostData
     *
     * I created this method just incase you can't read your POST DATA. It's just a fallback method
     *
     * @return Array
     **/
    public function postData()
    {
        // read php input stream.
        $input = file_get_contents('php://input');

        // alternative to array_map
        // mine acts like javascript array_map. could return a new array, pass a key and the array for direct manipulation
        // we would be using this function here.
        // sorry i placed it here. You can refactor this code and place
        // this function in your library file.
        if (!function_exists('array_each'))
        {
            function array_each($callback, $array)
            {
                if (is_array($callback))
                {
                    $copy = $callback;
                    $callback = $array;
                    $array = $copy;
                    $copy = null;
                }

                if (is_array($array) && count($array) > 0)
                {
                    $ref = new \ReflectionFunction($callback);
                    $params = $ref->getParameters();
                    $leng = count($array);

                    $new_array = []; 

                    $is_numeric = false;

                    foreach ($array as $key => $val)
                    {
                        $returned = call_user_func($callback, $val, $key, $array);

                        if ($returned != null)
                        {
                            $new_array[$key] = $returned;
                        }
                    }

                    return $new_array;
                }
            }
            // end here
        }

        // $_POST empty and input stream has Content-Disposition ?
    if (strlen($input) > 0 && count($_POST) == 0 || count($_POST) > 0)
    {
      $postsize = "---".sha1(strlen($input))."---";

      preg_match_all('/([-]{4,})([^\s]+)[\n|\s]{0,}/', $input, $match);

      if (count($match) > 0)
      {
        $input = preg_replace('/([-]{4,})([^\s]+)[\n|\s]{0,}/', '', $input);
      }

      // extract the content-disposition
      preg_match_all("/(Content-Disposition: form-data; name=)+(.*)/m", $input, $matches);

      // let's get the keys
      if (count($matches) > 0 && count($matches[0]) > 0)
      {
        $keys = array_each(function($key){
          $key = trim($key);
          $key = preg_replace('/^["]/','',$key);
          $key = preg_replace('/["]$/','',$key);
          $key = preg_replace('/[\s]/','',$key);
          return $key;
        }, $matches[2]);

        $input = preg_replace("/(Content-Disposition: form-data; name=)+(.*)/m", $postsize, $input);

        // now let's get key value
        $inputArr = explode($postsize, $input);

        $values = array_each(function($val){
          $val = preg_replace('/[\n]/','',$val);
          if (preg_match('/[\S]/', $val))
          {
            return trim($val);
          }
        }, $inputArr);

        // now combine the key to the values
        $post = array_combine($keys, $values);
        if (is_array($post))
        {
          $newPost = [];

          foreach ($post as $key => $val)
          {
            if (preg_match('/[\[]/', $key))
            {
              $k = substr($key, 0, strpos($key, '['));
              $child = substr($key, strpos($key, '['));
              $child = preg_replace('/[\[|\]]/','', $child);
              $newPost[$k][$child] = $val;
            }
            else
            {
              $newPost[$key] = $val;
            }
          }

          $_POST = count($newPost) > 0 ? $newPost : $post;
        }
      }
    }

    return $_POST;
    }
}
// -end here
