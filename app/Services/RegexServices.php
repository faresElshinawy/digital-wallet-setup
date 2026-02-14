<?php

namespace App\Services;

use Closure;
use Illuminate\Support\Arr;

class RegexServices
{
    /**
    * @pattern is the regex pattern we will use to exclude data from the string example
    * @content the content we want to exclude information from
    * @expectedResultKeys the keys we expect to get from the pattern provided
    */
    public function matchMany(string $pattern,string $content,array $expectedResultKeys = [],Closure $closure): array
    {
        preg_match(
            $pattern,
            $content,
            $matches
        );

        if(!empty($expectedResultKeys))
        {
            $matches = Arr::only($matches,$expectedResultKeys);
        }

        $results = $closure($matches);

        return $results;
    }

    /**
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
}
