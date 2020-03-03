<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Global_conf.php was AbstractEntity.php
namespace Model;

abstract class Global_conf
{

    /**
     * Magic _ _set, _ _get and to Array : To avoid calling mutators and accessors
     * every time we access DOMAIN OBJECT FIELDS, we can use some boilerplate (expression, formulation)
     * PHP _ _set, _ _get for mapping client code references from NONEXISTENT PROPERTIES
     * TO THE CORRESPONDING DOMAIN OBJECTS METHODS - without cluttering too much of the model’s API.
     */

    /**
     * Map the setting of non-existing fields to a mutator fn when
     * possible, otherwise assign matching field
     */
    public function __set($name, $value) {
        // called from eg User.php(45)
        //$field = '_' . strtolower($name);
        $field = strtolower($name);

        if (!property_exists($this, $field)) {
            throw new \InvalidArgumentException(
              "Setting field '$field' does not exist in entity :"
              . json_encode($this->toArray())
            );
        }

        $mutator = "set" . ucfirst(strtolower($name));
                if ('1') { echo '<br />'. __METHOD__ .'() method SAYS : ';
                //echo '<pre> $this='; print_r($this); echo '</pre>';
                echo '<span>'; 
                  echo ' <b>$field='.$field ; 
                  echo ', $mutator = '.$mutator.'</b> = fn which is called only if exists';
                echo '</span>';
                //echo '<pre>$field has $value='; print_r($value); echo '</pre>'; 
                }
        if ( method_exists($this, $mutator)
             and is_callable(array($this, $mutator))
        ) {
            $this->$mutator($value) ;
        }
        else {
            $this->$field = $value;
        }


        return $this;
    }

    /**
     * Map the getting of non-existing properties to an accessor fn when 
     * possible, otherwise access matching field
     */
    public function __get($name) {
        //we echo fldname in DB tblrow, '_' is for Domain M fldname
        $field = "_" . strtolower($name);
        //$field = strtolower($name);
                if ('') { echo ''. __METHOD__ .'() method SAYS :</h3>';
                echo '<pre>';
                  echo '$this='; print_r($this);
                  echo 'Returned only if fn exists $accessor='; print_r($accessor); 
                  echo 'ELSE return matching field name $field='; print_r($field); 
                echo '</pre>'; }
                        /*$this=Model\User Object
                        (
                            [_id:protected] => 
                            [_username:protected] => Everchanging Joe
                            [_email:protected] => joe@example.com
                            [_url:protected] => 
                        ) */
        //As opposed with isset(), property_exists() returns TRUE even if the propertyhas the value NULL. 
        if (!property_exists($this, $field)) {
            throw new \InvalidArgumentException(
              "Getting the field '$field' is not valid for this entity."
              . json_encode($this->toArray())
            );
        }

        $accessor = 'get' . ucfirst(strtolower($name)); //method name

        return ( //method or attribute name
          (method_exists($this, $accessor) and is_callable(array($this, $accessor)))
          ? $this->$accessor() : $this->$field
        ) ;
    }

    /**
     * Get the entity fields
     */
    public function toArray() {
        return get_object_vars($this);
    }
}

    /*
      Fatal error: Uncaught InvalidArgumentException:
        Setting field 'id' is not valid for entity :{"_id":null,"_comment":"POST1 COMMENT1","_user":{}}
        in <MODULE_PATH>\A bstractEntity.php:27
      Stack trace:
      #0 <MODULE_PATH>\Comment_db.php(22): Model\A bstractEntity->__set('id', 45)
      #1 <MODULE_PATH>\get_data_mysql_blog.php(39): 
            ModelMapper\Comment_db->i nsert(Object(Model\Comment), 105, 68)
      #2 <MODULE_PATH>\index.php(21): db_test()
      #3 {main} thrown in <MODULE_PATH>\A bstractEntity.php on line 27
    */