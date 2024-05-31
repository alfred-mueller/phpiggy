<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    public function __construct(private string $basepath)
    {
    }

    public function render($template, array $data = [])
    {
        extract($data, EXTR_SKIP);
        include "{$this->basepath}/{$template}";
    }
}
