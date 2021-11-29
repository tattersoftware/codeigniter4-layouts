<?php

namespace Tests\Support\Config;

class Registrar
{
    /**
     * Adds a layout to the config to verify it
     * supports using Registrars.
     *
     * @return array<string,string>
     */
    public static function Layouts(): array
    {
        return [
            'foo' => 'bar',
        ];
    }
}
