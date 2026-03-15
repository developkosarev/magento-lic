<?php

namespace Diko\FontSwitcher\Plugin;

use Magento\Framework\View\Page\Config;

class PageConfigPlugin
{
    private const USE_CDN = true; // Установите false для локальных шрифтов

    public function beforeAddPageAsset(Config $subject, $file, array $properties = [], $name = null)
    {
        if (self::USE_CDN) {
            //if (stripos($file, 'fonts/JosefinSans/josefin-sans-v23-latin-ext_latin-100.woff2') > 0) {
            //    $file = 'https://static.xxx.com/static/version1/theme-xxx/fonts/JosefinSans/josefin-sans-v23-latin-ext_latin-100.woff2';
            //}

            // Заменяем локальный путь на CDN
            //$file = str_replace(
            //    'fonts/JosefinSans/',
            //    'https://cdn.example.com/fonts/JosefinSans/',
            //    $file
            //);
        }
        return [$file, $properties, $name];
    }

    public function beforeAddRemotePageAsset(Config $subject, $url, $type = null, $properties = [])
    {
        if (self::USE_CDN) {
            // Заменяем локальный путь на CDN
            //$url = str_replace(
            //    'fonts/JosefinSans/',
            //    'https://cdn.example.com/fonts/JosefinSans/',
            //    $url
            //);
        }
        return [$url, $type, $properties];
    }
}
