<?php

declare(strict_types = 1);

namespace Domain\Model;

use Common\Id; // self-validatable class storing UUID
               // There is also RunType class which stores possible types of runs

final class Run //domain layer 01. RUN MODEL
{
    private $id;
    private $name;
    /**
     * Time limit in seconds
     */
    private $timeLimit;
    private $startAt;
    private $type;
    /**
     * Length in meters
     */
    private $length;


    public function __construct(
        Id $id,
        string $name,
        int $timeLimit,
        \DateTime $startAt,
        RunType $type,
        int $length
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->timeLimit = $timeLimit;
        $this->startAt = $startAt;
        $this->type = $type;
        $this->length = $length;
    }




    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTimeLimit(): int
    {
        return $this->timeLimit;
    }

    public function getStartAt(): \DateTime
    {
        return $this->startAt;
    }

    public function getType(): RunType
    {
        return $this->type;
    }

    public function getLength(): int
    {
        return $this->length;
    }
}

/**
* https://github.com/TheSoftwareHouse/fa-runner/tree/agnostic
* https://tsh.io/blog/how-create-framework-agnostic-application-php-1-3/
* https://tsh.io/blog/how-create-framework-agnostic-application-php-2-3/ with Laravel (Eloquent ORM)
* https://tsh.io/blog/how-to-create-framework-agnostic-application-php-3-3/ with Symfony  (Doctrine ORM)
*
* see https://github.com/thangchung/blog-core
*     https://hackernoon.com/clean-domain-driven-design-in-10-minutes-6037a59c8b7b
*     https://github.com/cloudnative-netcore/netcorekit
*     https://github.com/vietnam-devs/coolstore-microservices
* .NET SDK (v3.0.100-preview6) & NodeJS
* Blazor v3.0.0-preview6
* IdentityServer 4
* Entity Framework Core <---------
* Protobuf v3.8.0
* Swashbuckle v5.0.0-rc2
* AdminLTE v3.0.0-beta.1
*
* https://github.com/xhafan/coreddd/wiki
* https://xhafan.com/blog/2018/12/04/why-use-domain-driven-design.html
*
*
*  I prefer Doctrine’s ORM, as it has, in my opinion, clearer models and is a bit easier to use. However, in this specific case, its restrictions and rules were more difficult to follow than Eloquent ones.
*
* We haven’t touched our domain at all, just used different tools around - framework-agnostic application wrapped with completely different tools.  We have connected our business models to ORM and can read/write real data from an external source.
*
* Thanks to “Single Responsibility Principle” most of these classes are quite small and easy to read.
*
* We don’t care about run creation or runner registration here. 
* assumptions about storage state : there are already runs and runners inside
*
* Framework-agnostic (independence)  means that code containing BUSINESS RULES of your application is carefully SEPARATED FROM FRAMEWORK FILES. As a result, your domain doesn’t know anything about fw that is used to handle HTTP related communication. 
*
* ORM/third party libraries agnostic too. Moreover, I don’t want my business logic to be bound to Doctrine’s annotations or Eloquent model. It needs to be clean and fully working on its own.
*
* Neither DDD nor hexagonal architecture. We’re focusing on being framework-agnostic, so we will mix concepts from different patterns without using strictly any of them. 
*
* No tests in order to simplify.
*
*                domain layer   01. RUN MODEL
* few properties with a constructor and getters
*
*/