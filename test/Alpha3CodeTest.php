<?php

declare(strict_types=1);

namespace Iso3166Test\Part1;

use Iso3166\Part1\Alpha3Code;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function ctype_upper;
use function str_replace;

class Alpha3CodeTest extends TestCase
{
    /**
     * @test
     */
    public function constantValuesAreLowercase()
    {
        $reflectionClass = new ReflectionClass(Alpha3Code::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $value) {
            $this->assertTrue(ctype_upper($value));
        }
    }

    /**
     * @test
     */
    public function constantKeysAreUpperCase()
    {
        $reflectionClass = new ReflectionClass(Alpha3Code::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $key => $value) {
            $keyWithoutUnderscore = str_replace('_', '', $key);

            $this->assertTrue(ctype_upper($keyWithoutUnderscore));
        }
    }
}
