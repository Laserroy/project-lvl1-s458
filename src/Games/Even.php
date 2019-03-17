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
namespace BrainGames\Games\Even;
use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
/**
 * Game rule
 *
 * @param int $num random number
 *
 * @return boolean is even
 */
function isEven($num)
{
    return $num % 2 === 0;
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
        $properAnswer = isEven($gameQuestion) ? 'yes' : 'no';
        return [$gameQuestion, (string) $properAnswer];
    };
    playGame(DESCRIPTION, $generateGameData);
}
