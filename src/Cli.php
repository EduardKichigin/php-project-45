<?php

declare(strict_types=1);

namespace BrainGames\Cli;

use function BrainGames\Engine\greet;

function welcome(): void
{
    greet();
}
