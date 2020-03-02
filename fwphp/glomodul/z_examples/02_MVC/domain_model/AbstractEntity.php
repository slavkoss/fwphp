<?php
//Magic _ _set, _ _get and to Array : To avoid calling mutators and accessors every time we access DOMAIN OBJECT FIELDS, we can use some boilerplate (expression, formulation) PHP _ _set, _ _get for mapping client code references from NONEXISTENT PROPERTIES TO THE CORRESPONDING DOMAIN OBJECTS METHODS - without cluttering too much of the model’s API.
namespace Model;

abstract class AbstractEntity
{
    /**
     * Map the setting of non-existing fields to a mutator fn when
     * possible, otherwise assign matching field
     */

    /*
      Fatal error: Uncaught InvalidArgumentException: Setting field 'id' is not valid for entity :{"_id":null,"_comment":"POST1 COMMENT1","_user":{}} in <MODULE_PATH>\AbstractEntity.php:27
      Stack trace:
      #0 <MODULE_PATH>\Comment_db.php(22): Model\AbstractEntity->__set('id', 45)
      #1 <MODULE_PATH>\get_data_mysql_blog.php(39): 
            ModelMapper\Comment_db->i nsert(Object(Model\Comment), 105, 68)
      #2 <MODULE_PATH>\index.php(21): db_test()
      #3 {main} thrown in <MODULE_PATH>\AbstractEntity.php on line 27
    */
    public function __set($name, $value) {
        // called from eg User.php(45)
        //$field = '_' . strtolower($name);
        $field = strtolower($name);

        if (!property_exists($this, $field)) {
            throw new \InvalidArgumentException(
              "Setting field '$field' is not valid for entity :"
              . json_encode($this->toArray())
            );
        }

        $mutator = "set" . ucfirst(strtolower($name));
                if ('1') { echo ''. __METHOD__ .'() method SAYS :</h3>';
                //echo '<pre> $this='; print_r($this); echo '</pre>';
                echo '<pre>Called only if fn exists $mutator='; print_r($mutator); echo '</pre>';
                echo '<pre>$field='; print_r($field); echo '</pre>';
                echo '<pre>$field has $value='; print_r($value); echo '</pre>'; }
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
                echo '<pre> $this='; print_r($this); echo '</pre>';
                //echo '<pre>Returned only if fn exists $accessor='; print_r($accessor); echo '</pre>';
                echo '<pre>ELSE return matching field name $field='; print_r($field); echo '</pre>'; }
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