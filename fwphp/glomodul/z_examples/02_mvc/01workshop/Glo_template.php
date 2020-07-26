<?php declare(strict_types=1);

//namespace Components;

class Glo_template
{
    public static $viewsPath = __DIR__ .'/'; // . '/../templates'

    private $tplName; //t e m p l a t e  n a m e

    public function __construct(string $tplName)
    {
        $this->tplName = $tplName;
    }

    private function getFilepath(): string
    {
      return self::$viewsPath . $this->tplName;
    }

    function render(array $ViewData = []): string
    {
      extract($ViewData, EXTR_OVERWRITE);
      ob_start();
      require $this->getFilepath();
      $rendered = ob_get_clean();

      return (string)$rendered;
    }
}
