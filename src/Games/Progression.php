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
const PROGRETION_LENGTH = 10;
/**
 * Makes progression with random numbers
 *
 * @return progression
 */
function createProgression()
{
    $currentValue = rand(0, 10);
    $increaseStep = rand(1, 5);
    $result = [];
    for ($i = 0; $i < PROGRETION_LENGTH; $i += 1) {
        $result[] = $currentValue;
        $currentValue += $increaseStep;
    }
    return $result;
}
/**
 * Makes string represent of given progression
 *
 * @param array $numbers        income progression
 * @param int   $hiddenNumIndex index of hiden number
 *
 * @return progression string
 */
function createHiddenNumQuestion($numbers, $hiddenNumIndex)
{
    $numbers[$hiddenNumIndex] = '..';
    return implode(' ', $numbers);
}
/**
 * Runs this calc game
 *
 * @return console game
 */
function startGame()
{
    $generateQuestionAnswer = function () {
        $progression = createProgression();
        $hiddenNumIndex = rand(0, count($progression) - 1);
        $properAnswer = $progression[$hiddenNumIndex];
        $gameQuestion = createHiddenNumQuestion($progression, $hiddenNumIndex);
        return [(string) $gameQuestion, (string) $properAnswer];
    };
    playGame(DESCRIPTION, $generateQuestionAnswer);
}
