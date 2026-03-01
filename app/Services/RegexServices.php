<?php

namespace App\Services;

use Closure;
use Illuminate\Support\Arr;

class RegexServices
{
    /**
    * @pattern is the regex pattern we will use to exclude data from the string example ^(?P<amount>\d+,\d{2})\/\/(?P<reference>\d+)\/\/(?P<date>\d{8})$ (make sure to specify the keys for each field we will get from the provided pattern)
    * @content the content we want to exclude information from
    * @expectedResultKeys the keys we expect to get from the pattern provided
    */
    public function matchMany(string $pattern,string $content,array $expectedResultKeys = [],?Closure $closure = null): array
    {
        preg_match(
            $pattern,
            $content,
            $matches
        );

        $results = Arr::only($matches,$expectedResultKeys);

        if(!is_null($closure))
        {
            $results = $closure($results);
        }

        return $results;
    }

    /**
    * the method is handling excluding key value patterns and turn it into an associative array key => value pairs
    * @pattern is the regex pattern we will use to exclude data from the string example
    * @content the content we want to exclude information from
    */
    public function matchPairs(string $pattern,string $content): array
    {
        preg_match_all(
            $pattern,
            $content,
            $matches,
            PREG_SET_ORDER
        );

        $results = collect($matches)->mapWithKeys(function ($match) {
            return [$match[1] => $match[2]];
        })->toArray();

        return $results;
    }

    public function clearMultipleLinesString(string $content,$separator = '\n'): string
    {
        $content = str_replace(["\r\n", "\r"], "\n", trim($content, '"'));

        $content = preg_replace('/[ \t]*\n[ \t]*/', $separator, $content);

        $lines = array_map('trim', explode($separator, $content));

        return implode($separator, $lines);
    }
}
