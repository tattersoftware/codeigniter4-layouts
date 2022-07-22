<?php

use Tests\Support\TestCase;

/**
 * @internal
 */
final class ConfigTest extends TestCase
{
    public function testUsesDefaultAsFallback(): void
    {
        $result = config('Layouts')->banana;

        $this->assertSame('Tatter\Layouts\Views\Layouts\Default', $result);
    }

    public function testSupportsRegistrars(): void
    {
        $result = config('Layouts')->foo;

        $this->assertSame('bar', $result);
    }
}
