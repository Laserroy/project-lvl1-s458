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
namespace BrainGames\Games\Calc;
use function BrainGames\Engine\playGame;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS = ['+', '-', '*'];
/**
 * Calculates expression
 *
 * @param int $x        random namber
 * @param int $y        random namber
 * @param int $operator random operator from
 *
 * @return calculation result
 */
function calc($x, $y, $operator)
{
    switch ($operator) {
        case '*':
            return $x * $y;
        case '+':
            return $x + $y;
        case '-':
            return $x - $y;
    }
}
/**
 * Runs this calc game
 *
 * @return console game
 */
function startGame()
{
    $generateQuestionAnswer = function () {
        $x = rand(0, 100);
        $y = rand(0, 100);
        $operator = OPERATIONS[rand(0, count(OPERATIONS) - 1)];
        $gameQuestion = "{$x} {$operator} {$y}";
        $properAnswer = calc($x, $y, $operator);
        return [(string) $gameQuestion, (string) $properAnswer];
    };
    playGame(DESCRIPTION, $generateQuestionAnswer);
}
