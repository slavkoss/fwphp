<?php
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html

?>
<a href="https://phpenthusiast.com/blog/the-factory-design-pattern-in-php">https://phpenthusiast.com/blog/the-factory-design-pattern-in-php</a>
<?php
class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }
}

class AutomobileFactory
{
    public static function create($make, $model)
    {
        return new Automobile($make, $model);
    }
}

echo '<p>05. FACTORY PATTERN, eg a class AutomobileFactory creates object of class Automobile.</p>';
// have the factory create the Automobile object
$veyron = AutomobileFactory::create('Bugatti', 'Veyron');
print_r('Output (maker, model) : ' . $veyron->getMakeAndModel()); // outputs "Bugatti Veyron"

?>
<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>If you need to change, rename, or replace the Automobile class later on you can do so and you will only have to modify the code in the factory, INSTEAD OF EVERY PLACE IN YOUR PROJECT that uses the Automobile class. 
<li>If creating the object is a COMPLICATED JOB you can do all of the work in the factory.
If you are making a fairly large or complex project you may save yourself a lot of trouble
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');