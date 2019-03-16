<?php
/**
 * Php version 7.2
 *
 * @category Sample
 * @package  Sample
 * @author   Pavel <deectro@gmail.com>
 * @license  BSD https://en.wikipedia.org/wiki/BSD_licenses
 * @link     test
 */
namespace BrainGames\Games\Gcd;
use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
/**
 * Game rule
 *
 * @param int $a random number
 * @param int $b random number
 *
 * @return int greater divisor
 */
function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
/**
 * Runs this gcd game
 *
 * @return console game
 */
function startGame()
{
    $gameParams = function () {
        $x = rand(0, 100);
        $y = rand(0, 100);
        $gameQuestion = "{$x} {$y}";
        $properAnswer = gcd($x, $y);
        return [$gameQuestion, $properAnswer];
    };
    playGame(DESCRIPTION, $gameParams);
}