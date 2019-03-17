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
namespace BrainGames\Games\Progression;
use function BrainGames\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
/**
 * Makes progression with random numbers
 *
 * @param int $startValue   start value
 * @param int $increaseStep increase value
 * @param int $length       size
 *
 * @return array numbers
 */
function createProgression($startValue, $increaseStep, $length)
{
    $result = [];
    for ($i = 0; $i < $length; $i += 1) {
        $result[] = $startValue + $i * $increaseStep;
    }
    return $result;
}
/**
 * Runs this progression game
 *
 * @return console game
 */
function startGame()
{
    $generateGameData = function () {
        $startValue = rand(0, 10);
        $increaseStep = rand(1, 5);
        $progression = createProgression($startValue, $increaseStep, PROGRESSION_LENGTH);
        $hiddenNumIndex = rand(0, PROGRESSION_LENGTH - 1);
        $properAnswer = $progression[$hiddenNumIndex];
        $progression[$hiddenNumIndex] = '..';
        $gameQuestion = implode(' ', $progression);
        return [$gameQuestion, (string) $properAnswer];
    };
    playGame(DESCRIPTION, $generateGameData);
}
