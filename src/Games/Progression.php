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
/**
 * Makes progression with random numbers
 *
 * @return progression
 */
function createProgression()
{
    $progressionLength = 10;
    $currentValue = rand(0, 10);
    $increaseStep = rand(1, 5);
    $result = [$currentValue];
    for ($i = 0; $i < $progressionLength; $i += 1) {
        $currentValue += $increaseStep;
        $result[] = $currentValue;
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
function makeQuestionString($numbers, $hiddenNumIndex)
{
    $result = '';
    foreach ($numbers as $key => $value) {
        if ($key === $hiddenNumIndex) {
            $result .= '.. ';
            continue;
        }
        $result .= "{$value} ";
    }
    return $result;
}
/**
 * Runs this calc game
 *
 * @return console game
 */
function startGame()
{
    $gameParams = function () {
        $progression = createProgression();
        $hiddenNumIndex = rand(0, count($progression) - 1);
        $properAnswer = $progression[$hiddenNumIndex];
        $gameQuestion = makeQuestionString($progression, $hiddenNumIndex);
        return [$gameQuestion, $properAnswer];
    };
    playGame(DESCRIPTION, $gameParams);
}
