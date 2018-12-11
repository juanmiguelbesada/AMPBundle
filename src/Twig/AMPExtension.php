<?php

namespace JuanMiguelBesada\AMPBundle\Twig;

use MatthiasMullie\Minify\CSS as MinifyCSS;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AMPExtension extends  AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('minifyCSS', [$this, 'minifyCSS'], ['is_safe' => ['all']])
        ];
    }

    public function minifyCSS($css, array $options = [])
    {
        //Remove any !important declaration
        $css = str_replace('!important', '', $css);

        $minify = new MinifyCSS($css);

        if (isset($options['importExtensions']) && \is_array($options['importExtensions'])) {
            $minify->setImportExtensions($options['importExtensions']);
        }

        if (isset($options['maxImportSize']) && is_int($options['maxImportSize'])) {
            $minify->setMaxImportSize($options['maxImportSize']);
        }

        return $minify->minify();
    }
}
