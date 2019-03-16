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
namespace BrainGames\Engine;
use function \cli\line;
use function \cli\prompt;
const GAME_STEPS = 3;
/**
 * Start end game
 *
 * @return game result
 */
function requestUserName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
/**
 * Start end game
 * 
 * @param string $gameDescription text game description
 * @param object $gameParams 
 * 
 * @return game result
 */
function playGame($gameDescription, $gameParams)
{
    line('Welcome to the Brain Game!');
    line($gameDescription);
    $userName = requestUserName();
    for ($i = 0; $i < GAME_STEPS; $i += 1) {
        [$question, $properAnswer] = $gameParams();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer == $properAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $properAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    line("Congratulations, %s!", $userName);
}

