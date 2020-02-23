<?php
namespace Model;

abstract class AbstractEntity
{
    /**
     * Map the setting of non-existing fields to a mutator when
     * possible, otherwise use the matching field
     */
    public function __set($name, $value) {
        // called from eg User.php(45)
        //$field = "_" . strtolower($name);
        $field = strtolower($name);
                echo '<pre>__set $this='; print_r($this); echo '</pre>';
                echo '<pre>$field='; print_r($field); echo '</pre>';
        if (!property_exists($this, $field)) {
            throw new \InvalidArgumentException(
                "Setting the field '$field' is not valid for this entity.");
        }

        $mutator = "set" . ucfirst(strtolower($name));
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
     * Map the getting of non-existing properties to an accessor when 
     * possible, otherwise use the matching field
     */
    public function __get($name) {
        $field = "_" . strtolower($name);
        //$field = strtolower($n ame);
                echo '<pre>__get $this='; print_r($this); echo '</pre>';
                echo '<pre>$field='; print_r($field); echo '</pre>';
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
                "Getting the field '$field' is not valid for this entity.");
        }

        $accessor = "get" . ucfirst(strtolower($name));

        return ( method_exists($this, $accessor) 
                 and is_callable(array($this, $accessor)))
            ? $this->$accessor() : $this->field;
    }

    /**
     * Get the entity fields
     */
    public function toArray() {
        return get_object_vars($this);
    }
}