<?php declare(strict_types=1);
//        G L O B A L  C O N T R O L L E R
//namespace Handlers;

abstract class C_gloHandler
{
    private $redirectUri = '';

    abstract public function handle(): string;

    public function getPageTitle(): string
    {
        return 'Fwphp site';
    }

    public function requestRedirect(string $uri)
    {
        $this->redirectUri = $uri;
        header("Location: $uri", true);
    }

    public function willRedirect(): bool
    {
        return strlen($this->redirectUri) > 0;
    }
}
