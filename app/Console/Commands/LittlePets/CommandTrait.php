<?php

namespace App\Console\Commands\LittlePets;

use Symfony\Component\Console\Formatter\OutputFormatterStyle;

trait CommandTrait
{
    protected function setColor(string $color)
    {
        $this->output->getFormatter()->setStyle($color, new OutputFormatterStyle($color));
    }
}
