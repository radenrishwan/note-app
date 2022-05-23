<?php

namespace Seior\PHP\Uas;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    public function testRegex()
    {
        $path = '/profile/users/raden/123123';

        $pattern = '#^/profile/users/([0-9a-zA-Z]*)/([0-9a-zA-Z]*)#';

        $result = preg_match($pattern, $path, $results);

        self::assertEquals(1, $result);

        array_shift($results);

        var_dump($results);
    }
}