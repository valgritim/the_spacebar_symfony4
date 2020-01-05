<?php

namespace App\Twig;

use Twig\TwigFilter;
use App\Twig\AppRuntime;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('cached_markdown', [AppRuntime::class, 'processMarkdown'], ['is_safe' => ['html']]),
        ];
    }
}


