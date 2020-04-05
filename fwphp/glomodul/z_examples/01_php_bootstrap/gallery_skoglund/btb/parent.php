<?php

class A {
  static $a=1;

  static function modified_a() {
    return self::$a + 10;
  }
	public function hello() {
		echo "Hello<br />";
	} 
}
class B extends A {
  static function attr_test() {
    echo parent::$a;
  }
  static function method_test() {
    echo parent::modified_a();
  }
	public function instance_test() {
		echo parent::hello();
	}
  public function hello() { 
    echo "*******";
    parent::hello();
    echo "*******";
  }
}

echo B::$a . "<br />";
echo B::modified_a() . "<br />";

echo B::attr_test() ."<br />";
echo B::method_test() . "<br />";

$object = new B();
$object->instance_test();
$object->hello();

?>