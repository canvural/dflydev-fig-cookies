<?php

declare(strict_types=1);

namespace Dflydev\FigCookies;

use function array_filter;
use function array_map;
use function assert;
use function explode;
use function is_array;
use function preg_split;

class StringUtil
{
    /** @return string[] */
    public static function splitOnAttributeDelimiter(string $string) : array
    {
        $splitAttributes = preg_split('@\s*[;]\s*@', $string);

        assert(is_array($splitAttributes));

        return array_filter($splitAttributes);
    }

    /** @return string[] */
    public static function splitCookiePair(string $string) : array
    {
        $pairParts    = explode('=', $string, 2);
        $pairParts[1] = $pairParts[1] ?? '';

        return array_map('urldecode', $pairParts);
    }
}
