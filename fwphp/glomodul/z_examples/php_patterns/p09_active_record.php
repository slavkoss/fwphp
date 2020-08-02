<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\DataMapper;
// https://phpenthusiast.com/blog/design-patterns
// https://github.com/domnikl/DesignPatternsPHP
// https://designpatternsphp.readthedocs.io/en/latest/README.html
?>

<a href="https://designpatternsphp.readthedocs.io/en/latest/Structural/DataMapper/README.html">https://designpatternsphp.readthedocs.io/en/latest/Structural/DataMapper/README.html</a>


<?php
// 1. User.php
class User
{
    private string $username;
    private string $email;

    public static function fromState(array $state): User
    {
        // validate state before accessing keys!
        return new self(
            $state['username'],
            $state['email']
        );
    }

    public function __construct(string $username, string $email)
    {
        // validate parameters before setting them!

        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}




// 2. UserMapper.php
//declare(strict_types=1);
//namespace DesignPatterns\Structural\DataMapper;
use InvalidArgumentException;

class UserMapper
{
    private StorageAdapter $adapter;

    public function __construct(StorageAdapter $storage)
    {
        $this->adapter = $storage;
    }

    /**
     * finds a user from storage based on ID and returns a User object located
     * in memory. Normally this kind of logic will be implemented using the Repository pattern.
     * However the important part is in mapRowToUser() below, that will create a business object from the
     * data fetched from storage
     */
    public function findById(int $id): User
    {
        $result = $this->adapter->find($id);

        if ($result === null) {
            throw new InvalidArgumentException("User #$id not found");
        }

        return $this->mapRowToUser($result);
    }

    private function mapRowToUser(array $row): User
    {
        return User::fromState($row);
    }
}





// 3. StorageAdapter.php
//declare(strict_types=1);
//namespace DesignPatterns\Structural\DataMapper;

class StorageAdapter
{
    private array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param int $id
     *
     * @return array|null
     */
    public function find(int $id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }
}


$storage = new StorageAdapter([1 => ['username' => 'domnikl', 'email' => 'liebler.dominik@gmail.com']]);
$mapper = new UserMapper($storage);

$user = $mapper->findById(1);

//$this->assertInstanceOf(User::class, $user);
echo '<pre>$user='; print_r($user) ; echo '</pre>';




?>
<p>09. DATA MAPPER PATTERN - unlike Active Record pattern, the data model follows Single Responsibility Principle.</p>

<p>A Data Mapper, is a Data Access Layer that performs bidirectional transfer of data between a persistent data store (often a <b>relational database</b>) and an in memory data representation (<b>domain layer</b>).The layer is composed of one or more mappers (or Data Access Objects), performing the data transfer. </p>

<p> The goal of the pattern is to keep the in memory representation and the persistent data store independent of each other and the data mapper itself. </p>

<p>Mapper implementations vary in scope. Generic mappers will handle many different domain entity types, dedicated mappers will handle one or a few.</p>



<p>Pros (benefits, advantages) and Cons</p>
<ol>
<li>
</ol>


<br /><br />
<?php
include(dirname(dirname(dirname(dirname(__DIR__)))) .'/zinc/showsource.php');