<?php

namespace BrainGames\Cli;

$autoloadPath1 = __DIR__ . '/../../autoload.php';
$autoloadPath2 = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require $autoloadPath1;
} else {
    require $autoloadPath2;
}

function run()
{
    \cli\line('Welcome to the Brain Game!');
    $name = \cli\prompt('May I have your name?');
    \cli\line("Hello, %s!", $name);

}
