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
namespace BrainGames\Games\Prime;
use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
/**
 * Game rule
 *
 * @param int $num random number
 *
 * @return boolean is even
 */
function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
/**
 * Runs this game
 *
 * @return console game
 */
function startGame()
{
    $generateGameData = function () {
        $gameQuestion = rand(0, 100);
        $properAnswer = isPrime($gameQuestion) ? 'yes' : 'no';
        return [$gameQuestion, (string) $properAnswer];
    };
    playGame(DESCRIPTION, $generateGameData);
}
