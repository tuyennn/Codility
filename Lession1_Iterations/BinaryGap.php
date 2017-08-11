<?php /*

A binary gap within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N.

For example, number 9 has binary representation 1001 and contains a binary gap of length 2. The number 529 has binary representation 1000010001 and contains two binary gaps: one of length 4 and one of length 3. The number 20 has binary representation 10100 and contains one binary gap of length 1. The number 15 has binary representation 1111 and has no binary gaps.

Write a function:

    function solution($N);

that, given a positive integer N, returns the length of its longest binary gap. The function should return 0 if N doesn't contain a binary gap.

For example, given N = 1041 the function should return 5, because N has binary representation 10000010001 and so its longest binary gap is of length 5.

Assume that:

        N is an integer within the range [1..2,147,483,647].

Complexity:

        expected worst-case time complexity is O(log(N));
        expected worst-case space complexity is O(1).


 */

/**
 * BinaryGap task.
 *
 * CODILITY ANALYSIS: https://codility.com/demo/results/training2BYP78-7M7/
 * LEVEL: EASY
 * Correctness: 100%
 * Performance: not assessed
 * Task score:  100%
 *
 * @param int $N Positive integer N
 *
 * @return int Length of longest binary gap
 */

function solution($N)
{
    // Which Binary it should be
    $binary = decbin($N);

    // Result of the test
    $result = 0;

    // Length of this binary
    $length = strlen($binary);

    if (!((false === strpos($binary, '0')) || (stripos($binary, '1') == strrpos($binary, '1')))) {

        $index = null;

        for ($i = 0; $i < $length; $i++) {
            // Count from 1st 1 to the next 1 the 1xxxxx1
            if ($binary[$i] == 1) {
                if (is_null($index)) {
                    // First round $index = 1; $i = 0
                    $index = $i;
                } else {
                    // Next rounds
                    $tmp = $i - $index - 1;
                    $result = ($tmp > $result) ? $tmp : $result;
                    $index = $i;
                }
            }
        }
    }

    return $result;
}


