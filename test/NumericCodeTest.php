<?php

declare(strict_types=1);

namespace Iso3166Test\Part1;

use Iso3166\Part1\NumericCode;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function ctype_upper;
use function is_integer;
use function str_replace;

class NumericCodeTest extends TestCase
{
    /**
     * @test
     */
    public function constantValuesAreLowercase()
    {
        $reflectionClass = new ReflectionClass(NumericCode::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $value) {
            $this->assertTrue(is_int($value));
        }
    }

    /**
     * @test
     */
    public function constantKeysAreUpperCase()
    {
        $reflectionClass = new ReflectionClass(NumericCode::class);
        $values          = $reflectionClass->getConstants();

        foreach ($values as $key => $value) {
            $keyWithoutUnderscore = str_replace('_', '', $key);

            $this->assertTrue(ctype_upper($keyWithoutUnderscore));
        }
    }
}
