<?php

declare(strict_types=1);

namespace Tests\Unit\Rules;

use App\Rules\ValidProtocol;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ValidProtocolTest extends TestCase
{
    #[Test]
    public function it_only_allows_http_or_https()
    {
        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'https://google.com',
            fail: fn () => $this->fail('The rules should pass')
        );

        $this->assertTrue(true);

        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'http://google.com',
            fail: fn () => $this->fail('The rules should pass')
        );

        $this->assertTrue(true);

        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'httpsgoogle.com',
            fail: fn () => $this->assertTrue(true),
        );

        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'https:google.com',
            fail: fn () => $this->assertTrue(true),
        );

        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'ftp://google.com',
            fail: fn () => $this->assertTrue(true),
        );

        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'https:/google.com',
            fail: fn () => $this->assertTrue(true),
        );

        (new ValidProtocol())->validate(
            attribute: 'url',
            value: 'googlehttps://.com',
            fail: fn () => $this->assertTrue(true),
        );
    }
}
