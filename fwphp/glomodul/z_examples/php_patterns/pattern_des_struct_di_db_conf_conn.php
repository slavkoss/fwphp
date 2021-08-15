<?php
/*
https://readthedocs.org/projects/designpatternsphp/downloads/
https://github.com/DesignPatternsPHP/DesignPatternsPHP/tree/main/Behavioral/State  - PHP
https://wickedlysmart.com/head-first-design-patterns/  - Java,
    see https://kalkicode.com/ai/online-java-to-php-converter

DI (Dependency Injection) pattern Purpose
To implement a loosely coupled architecture in order to get better testable, maintainable and extendable code.

Usage
DBConf gets injected and DBConn will get all that it needs from $config.
Without DI, conﬁg would be created directly in DBConn - not good for testing and extending it.

Examples
• The Doctrine2 ORM uses DI e.g. for conﬁguration that is injected into a Connection object.
  For testing purposes, one can easily create a mock object of the conﬁguration and inject that into the Connection object
• many frameworks already have containers for DI that create objects via a conﬁguration array and inject them where needed (i.e. in Controllers)
*/

declare(strict_types=1);

namespace PattDesStruct\DI; // DesignPatterns\Behavioral\Structural

class DBConf
{
    private string $host ; private int $port ; 
    private string $username ; private string $password ;

    public function __construct(
        string $host, int $port, string $username, string $password
    ) {
      $this->host = $host ;         $this->port = $port ;
      $this->username = $username ; $this->password = $password ;
    }

    public function getHost(): string { return $this->host; }
    public function getPort(): int {return $this->port; }
    public function getUsername(): string { return $this->username; }
    public function getPassword(): string { return $this->password; }
}

class DBConn
{
    private $configuration ;

    public function __construct(DBConf $configuration) {
       $this->configuration = $configuration ;
    }

    public function getDsn(): string
    {
        // ONLY INJECTED CONFIG IS USED HERE, so there is a real separation of concerns here
        return sprintf(
            '%s:%s@%s:%d', // root:@localhost:1111
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getHost(),
            $this->configuration->getPort()
        );
    }
}

// Client code
$dbconn = new DBConn(new DBConf('localhost',1111,'root',''));
echo $dbconn->getDsn() ;