<?php

namespace Diko\FontSwitcher\Plugin;

use Magento\Framework\View\Page\Config;

class PageConfigPlugin
{
    private const USE_CDN = true; // Установите false для локальных шрифтов

    public function beforeAddRemotePageAsset(Config $subject, $url, $type = null, $properties = [])
    {
        if (self::USE_CDN) {
            // Заменяем локальный путь на CDN
            $url = str_replace(
                'fonts/JosefinSans/',
                'https://cdn.example.com/fonts/JosefinSans/',
                $url
            );
        }
        return [$url, $type, $properties];
    }
}
