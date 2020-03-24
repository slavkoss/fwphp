<?php
/**
*    domain layer   03. EXAMPLE OF A BUSINESS EXCEPTION
* simple class containing a specific message. It extends DomainException instead of PHP’s \Exception directly. That gives us more control and helps to treat domain exceptions in a special way.
*/

declare(strict_types = 1);

namespace Domain\Exception;

use Domain\Model\Run;
use Domain\Model\Runner;

final class RunNotParticipated extends DomainException //domain layer 03. EXAMPLE OF A BUSINESS EXCEPTION
{
    public static function forRun(Run $run, Runner $runner): self
    {
        return new self(
            sprintf("Runner %s didn't participate in run %s", $runner->getId(), $run->getId())
        );
    }
}
