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
namespace BrainGames\Games\BrainEven;
use function BrainGames\Engine\playGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
/**
 * Start end game
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
 * Runs this calc game
 * 
 * @return console game
 */
function startGame()
{
    $gameParams = function () {
        $x = rand(0, 100);
        $gameQuestion = "{$x}";
        $properAnswer = isEven($x) ? 'yes' : 'no';
        return [$gameQuestion, $properAnswer];
    };
    playGame(DESCRIPTION, $gameParams);
}