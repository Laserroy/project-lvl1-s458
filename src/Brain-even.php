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
namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
/**
 * Ask and print username
 * 
 * @param integer $num given number
 * 
 * @return boolean
 */
function isEven($num)
{
    return $num % 2 === 0;
}

/**
 * Start end game
 * 
 * @return game result
 */
function startBrainEvenGame()
{

    line('Welcome to the Brain Game! ');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 1; $i <= 3; $i += 1) {
        $givenNum = rand(0, 99);
        $properAnswer = isEven($givenNum) ? 'yes' : 'no';
        line("Question: %s!", $givenNum);
        $userAnswer = prompt('Your answer');
        if ($properAnswer !== $userAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $properAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    line("Congratulations, %s!", $name);
}
