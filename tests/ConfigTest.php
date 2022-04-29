<?php

use Tests\Support\TestCase;

/**
 * @internal
 */
final class ConfigTest extends TestCase
{
    public function testUsesDefaultAsFallback()
    {
        $result = config('Layouts')->banana;

        $this->assertSame('Tatter\Layouts\Views\Layouts\Default', $result);
    }

    public function testSupportsRegistrars()
    {
        $result = config('Layouts')->foo;

        $this->assertSame('bar', $result);
    }
}
