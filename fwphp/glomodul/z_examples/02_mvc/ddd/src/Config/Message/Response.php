<?php

namespace App\Config\Message;

/**
 * Class R esponse
 */
final class Response implements ResponseInterface
{
    /** @var string */
    private $content = 'NO CONTENT';

    /**
     * R esponse constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
      //ggg
    }

    /**
     * @inheritDoc
     */
    public function getContent(): string
    {
      //ggg
        return $this->content;
    }
}
