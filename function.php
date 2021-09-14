<?php
// 関数を作成したら合わせて呼び出し側も作成すると分かりやすくなる
function multiply($a, $b)
{
    return $a * $b;
}

echo multiply(3, 5) . PHP_EOL;
