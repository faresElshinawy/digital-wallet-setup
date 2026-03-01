<?php

namespace App\Services;

use Doctrine\Inflector\InflectorFactory;
use Illuminate\Support\Str;

class XmlServices
{
    public function generate(array $data, float $version = 1.0, string $encoding = 'utf-8', string $rootTag = 'root'): string
    {
        $xmlMetaData = "<?xml version=\"$version\" encoding=\"$encoding\"?>\n";

        $content = $this->arrayToXml($data, $rootTag);

        return $xmlMetaData . $content;
    }

    private function arrayToXml(array $data, string $parentTag = '', int $level = 0): string
    {
        $indent = str_repeat("    ", $level);
        $xml = $parentTag ? "$indent<$parentTag>\n" : '';

        foreach ($data as $key => $value) {
            $tag = $level >= 1 && is_numeric($key) ? InflectorFactory::create()->build()->singularize($parentTag) : Str::studly($key);

            if (is_array($value)) {
                $xml .= $this->arrayToXml($value, $tag, $level + 1,$key);
                continue;
            }

            $escaped = htmlspecialchars((string)$value, ENT_QUOTES | ENT_XML1);
            $xml .= str_repeat("    ", $level + 1) . "<$tag>$escaped</$tag>\n";
        }

        if ($parentTag) {
            $xml .= "$indent</$parentTag>\n";
        }

        return $xml;
    }
}
