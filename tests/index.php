<?php

/*
 * PHP-Str (https://github.com/delight-im/PHP-Str)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

// enable error reporting
\error_reporting(\E_ALL);
\ini_set('display_errors', 'stdout');

\header('Content-Type: text/plain; charset=utf-8');

require __DIR__ . '/../vendor/autoload.php';

function fail($lineNumber) {
	exit('Error on line ' . $lineNumber . "\n");
}

use Delight\Str\Str;

$testStr = 'Hello Hello w☺rld w☺rld';
$testStrObj = Str::from($testStr);
$unicodeOnePlusTwoStr = \base64_decode('YfCfkqli', true); // U+1F4A9
$unicodeTwoPlusTwoStr = \base64_decode('YfCfh7Hwn4e6Yg==', true); // U+1F1F1 + U+1F1FA
$unicodeThreePlusTwoStr = \base64_decode('YfCfkajigI3wn6axYg==', true); // U+1F468 + U+200D + U+1F9B1
$unicodeFourPlusTwoStr = \base64_decode('YfCfkanwn4++4oCN8J+msWI=', true); // U+1F469 + U+1F3FE + U+200D + U+1F9B1
$japaneseUtf8Str = \base64_decode('44GT44KT44Gr44Gh44Gv44CB5LiW55WM77yB', true);
$japaneseUtf8StartStr = \base64_decode('44GT44KT44Gr44Gh44Gv', true);
$japaneseUtf8EndStr = \base64_decode('5LiW55WM77yB', true);
$japaneseEucJpStr = \mb_convert_encoding($japaneseUtf8Str, 'EUC-JP', 'UTF-8');

($testStrObj->startsWith('He') === true) or \fail(__LINE__);
($testStrObj->startsWith('he') === false) or \fail(__LINE__);
($testStrObj->startsWith('el') === false) or \fail(__LINE__);
($testStrObj->startsWith('El') === false) or \fail(__LINE__);
($testStrObj->startsWith('') === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('el') === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('El') === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('') === false) or \fail(__LINE__);

($testStrObj->contains('o w') === true) or \fail(__LINE__);
($testStrObj->contains('o W') === false) or \fail(__LINE__);
($testStrObj->contains('m') === false) or \fail(__LINE__);
($testStrObj->contains('M') === false) or \fail(__LINE__);
($testStrObj->contains('He') === true) or \fail(__LINE__);
($testStrObj->contains('he') === false) or \fail(__LINE__);
($testStrObj->contains('ld') === true) or \fail(__LINE__);
($testStrObj->contains('lD') === false) or \fail(__LINE__);
($testStrObj->contains('') === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('o w') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('o W') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('m') === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('M') === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('') === false) or \fail(__LINE__);

($testStrObj->endsWith('ld') === true) or \fail(__LINE__);
($testStrObj->endsWith('lD') === false) or \fail(__LINE__);
($testStrObj->endsWith('rl') === false) or \fail(__LINE__);
($testStrObj->endsWith('rL') === false) or \fail(__LINE__);
($testStrObj->endsWith('') === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('rl') === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('rL') === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('') === false) or \fail(__LINE__);

((string) Str::from(" \r\n" . $testStr . " \n")->trim() === $testStr) or \fail(__LINE__);
((string) Str::from(" \r\n" . $testStr . " \n")->trim('ab') === " \r\n" . $testStr . " \n") or \fail(__LINE__);
((string) Str::from("ab cd" . $testStr . " d c b a")->trim('ab') === " cd" . $testStr . " d c b ") or \fail(__LINE__);
((string) Str::from("ab cd" . $testStr . " d c b a")->trim('ab', true) === "cd" . $testStr . " d c") or \fail(__LINE__);

((string) Str::from(" \r\n" . $testStr . " \n")->trimStart() === $testStr . " \n") or \fail(__LINE__);
((string) Str::from(" \r\n" . $testStr . " \n")->trimStart('ab') === " \r\n" . $testStr . " \n") or \fail(__LINE__);
((string) Str::from("ab cd" . $testStr . " d c b a")->trimStart('ab') === " cd" . $testStr . " d c b a") or \fail(__LINE__);
((string) Str::from("ab cd" . $testStr . " d c b a")->trimStart('ab', true) === "cd" . $testStr . " d c b a") or \fail(__LINE__);

((string) Str::from(" \r\n" . $testStr . " \n")->trimEnd() === " \r\n" . $testStr) or \fail(__LINE__);
((string) Str::from(" \r\n" . $testStr . " \n")->trimEnd('ab') === " \r\n" . $testStr . " \n") or \fail(__LINE__);
((string) Str::from("ab cd" . $testStr . " d c b a")->trimEnd('ab') === "ab cd" . $testStr . " d c b ") or \fail(__LINE__);
((string) Str::from("ab cd" . $testStr . " d c b a")->trimEnd('ab', true) === "ab cd" . $testStr . " d c") or \fail(__LINE__);

((string) $testStrObj->first() === 'H') or \fail(__LINE__);
((string) $testStrObj->first(0) === '') or \fail(__LINE__);
((string) $testStrObj->first(5) === 'Hello') or \fail(__LINE__);
((string) $testStrObj->first(11) === 'Hello Hello') or \fail(__LINE__);
((string) $testStrObj->first(13) === 'Hello Hello w') or \fail(__LINE__);
((string) $testStrObj->first(14) === 'Hello Hello w☺') or \fail(__LINE__);
((string) $testStrObj->first(15) === 'Hello Hello w☺r') or \fail(__LINE__);

((string) $testStrObj->last() === 'd') or \fail(__LINE__);
((string) $testStrObj->last(0) === '') or \fail(__LINE__);
((string) $testStrObj->last(5) === 'w☺rld') or \fail(__LINE__);
((string) $testStrObj->last(11) === 'w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->last(13) === 'o w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->last(14) === 'lo w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->last(15) === 'llo w☺rld w☺rld') or \fail(__LINE__);

(\bin2hex(Str::from($unicodeOnePlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeOnePlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeOnePlusTwoStr)->byteAt(4)) === 'a9') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeOnePlusTwoStr)->byteAt(5)) === '62') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(4)) === 'b1') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(5)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(4)) === 'a8') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(5)) === 'e2') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(4)) === 'a9') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(5)) === 'f0') or \fail(__LINE__);

((string) $testStrObj->toLowerCase() === 'hello hello w☺rld w☺rld') or \fail(__LINE__);
($testStrObj->isLowerCase() === false) or \fail(__LINE__);
($testStrObj->toLowerCase()->isLowerCase() === true) or \fail(__LINE__);

((string) $testStrObj->toUpperCase() === 'HELLO HELLO W☺RLD W☺RLD') or \fail(__LINE__);
($testStrObj->isUpperCase() === false) or \fail(__LINE__);
($testStrObj->toUpperCase()->isUpperCase() === true) or \fail(__LINE__);

($testStrObj->isCapitalized() === true) or \fail(__LINE__);
($testStrObj->toLowerCase()->isCapitalized() === false) or \fail(__LINE__);
($testStrObj->toUpperCase()->isCapitalized() === true) or \fail(__LINE__);

((string) $testStrObj->truncate(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncate(5, '…') === 'Hell…') or \fail(__LINE__);
((string) $testStrObj->truncate(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncate(11) === 'Hello He...') or \fail(__LINE__);
((string) $testStrObj->truncate(13) === 'Hello Hell...') or \fail(__LINE__);
((string) $testStrObj->truncate(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncate(15) === 'Hello Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncate(22) === 'Hello Hello w☺rld w...') or \fail(__LINE__);
((string) $testStrObj->truncate(23) === $testStr) or \fail(__LINE__);
((string) $testStrObj->truncate(24) === $testStr) or \fail(__LINE__);

((string) $testStrObj->truncateSafely(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(5, '…') === 'Hell…') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(11) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(13) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(15) === 'Hello Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(23) === $testStr) or \fail(__LINE__);
((string) $testStrObj->truncateSafely(24) === $testStr) or \fail(__LINE__);

($testStrObj->count() === 23) or \fail(__LINE__);
($testStrObj->length() === 23) or \fail(__LINE__);
(\count($testStrObj) === 23) or \fail(__LINE__);

($testStrObj->count('l') === 6) or \fail(__LINE__);
($testStrObj->count('lo') === 2) or \fail(__LINE__);
($testStrObj->count('☺') === 2) or \fail(__LINE__);
($testStrObj->count(' ') === 3) or \fail(__LINE__);
($testStrObj->count('L') === 0) or \fail(__LINE__);
($testStrObj->count('x') === 0) or \fail(__LINE__);
($testStrObj->count('') === 0) or \fail(__LINE__);

((string) $testStrObj->cutStart(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutStart(2) === 'llo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutStart(9) === 'lo w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutStart(13) === '☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutStart(14) === 'rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutStart(15) === 'ld w☺rld') or \fail(__LINE__);

((string) $testStrObj->cutEnd(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutEnd(2) === 'Hello Hello w☺rld w☺r') or \fail(__LINE__);
((string) $testStrObj->cutEnd(9) === 'Hello Hello w☺') or \fail(__LINE__);
((string) $testStrObj->cutEnd(13) === 'Hello Hell') or \fail(__LINE__);
((string) $testStrObj->cutEnd(14) === 'Hello Hel') or \fail(__LINE__);
((string) $testStrObj->cutEnd(15) === 'Hello He') or \fail(__LINE__);

((string) $testStrObj->replace('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replace('hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replace('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceFirst('el') === 'Hlo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirst('el', 'eeel') === 'Heeello Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirst('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirst('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replacePrefix(' Hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix('Hello ') === 'Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefix('Hello ', 'Bonjour ') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefix('hello ', 'Bonjour ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceLast('w') === 'Hello Hello w☺rld ☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLast('w', 'www') === 'Hello Hello w☺rld www☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLast('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLast('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceSuffix('w☺rld ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(' w☺rld') === 'Hello Hello w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(' w☺rld', ' earth') === 'Hello Hello w☺rld earth') or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(' W☺rld', ' earth') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('', '') === $testStr) or \fail(__LINE__);

(\count($testStrObj->split(' ')) === 4) or \fail(__LINE__);
(\count($testStrObj->split(' ', 3)) === 3) or \fail(__LINE__);
(\count($testStrObj->split(' ', 5)) === 4) or \fail(__LINE__);
(\count($testStrObj->split(' Hello w☺rld ')) === 2) or \fail(__LINE__);
(\count($testStrObj->split(' hello w☺rld ')) === 1) or \fail(__LINE__);
(\count($testStrObj->split('')) === 1) or \fail(__LINE__);

(\count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/')) === 3) or \fail(__LINE__);
(\count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 2)) === 2) or \fail(__LINE__);
(\count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 4)) === 3) or \fail(__LINE__);

(\count(Str::from('One, two; three and four! Five? It\'s six.')->words()) === 8) or \fail(__LINE__);
(\count(Str::from('One, two; three and four! Five? It\'s six.')->words(4)) === 4) or \fail(__LINE__);
(\implode(' + ', Str::from('One, two; three and four! Five? It\'s six.')->words(3)) === 'One + two + three') or \fail(__LINE__);

((string) $testStrObj->beforeFirst('Hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirst('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeFirst('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeFirst('w☺rld') === 'Hello Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeFirst('W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirst('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirst('') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLast('Hello') === 'Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeLast('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeLast('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeLast('w☺rld') === 'Hello Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->beforeLast('hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLast('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLast('') === '') or \fail(__LINE__);

((string) $testStrObj->between('Hello', 'w☺rld') === ' Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->between('w☺rld', 'w☺rld') === ' ') or \fail(__LINE__);
((string) $testStrObj->between('w☺rld', 'Hello') === '') or \fail(__LINE__);
((string) $testStrObj->between('hello', 'w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->between('Hello', 'W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->between('hello', 'W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->between('x', 'y') === '') or \fail(__LINE__);
((string) $testStrObj->between('Hello', '') === '') or \fail(__LINE__);
((string) $testStrObj->between('', 'w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->between('', '') === '') or \fail(__LINE__);

((string) $testStrObj->afterFirst('Hello') === ' Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirst('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirst('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterFirst('w☺rld') === ' w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirst('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirst('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirst('') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('Hello') === ' w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLast('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLast('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterLast('w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('') === '') or \fail(__LINE__);

($testStrObj->matches('/(?:[a-z]+) ([a-z]+) (\S+) \S+/i') === true) or \fail(__LINE__);
($testStrObj->matches('/[a-z]+ [a-z]+ \S+ \S+/') === false) or \fail(__LINE__);
($testStrObj->matches('/[a-zA-Z]+ [a-zA-Z]+ \S+ \S+/') === true) or \fail(__LINE__);
($testStrObj->matches('/[a-z]/', $matches, true) === true) or \fail(__LINE__);
(\count($matches[0]) === 16) or \fail(__LINE__);

(Str::from('bb')->equals('aa') === false) or \fail(__LINE__);
(Str::from('bb')->equals('b') === false) or \fail(__LINE__);
(Str::from('bb')->equals('bb') === true) or \fail(__LINE__);
(Str::from('bb')->equals('bbb') === false) or \fail(__LINE__);
(Str::from('bb')->equals('cc') === false) or \fail(__LINE__);
(Str::from('bb')->equals('AA') === false) or \fail(__LINE__);
(Str::from('bb')->equals('B') === false) or \fail(__LINE__);
(Str::from('bb')->equals('BB') === false) or \fail(__LINE__);
(Str::from('bb')->equals('BBB') === false) or \fail(__LINE__);
(Str::from('bb')->equals('CC') === false) or \fail(__LINE__);

(Str::from('bb')->equalsIgnoreCase('aa') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('b') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('bb') === true) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('bbb') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('cc') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('AA') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('B') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('BB') === true) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('BBB') === false) or \fail(__LINE__);
(Str::from('bb')->equalsIgnoreCase('CC') === false) or \fail(__LINE__);

($testStrObj->compareTo('g') < 0) or \fail(__LINE__);
($testStrObj->compareTo('G') > 0) or \fail(__LINE__);
($testStrObj->compareTo('hey') < 0) or \fail(__LINE__);
($testStrObj->compareTo('Hey') < 0) or \fail(__LINE__);
($testStrObj->compareTo('i') < 0) or \fail(__LINE__);
($testStrObj->compareTo('I') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('chapter 2') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('Chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('Chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('chapter 10') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('Chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('chapter 2', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('Chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('Chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('chapter 10', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareTo('Chapter 10', true) < 0) or \fail(__LINE__);

($testStrObj->compareToIgnoreCase('g') > 0) or \fail(__LINE__);
($testStrObj->compareToIgnoreCase('G') > 0) or \fail(__LINE__);
($testStrObj->compareToIgnoreCase('hey') < 0) or \fail(__LINE__);
($testStrObj->compareToIgnoreCase('Hey') < 0) or \fail(__LINE__);
($testStrObj->compareToIgnoreCase('i') < 0) or \fail(__LINE__);
($testStrObj->compareToIgnoreCase('I') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('chapter 10', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 10', true) < 0) or \fail(__LINE__);

((string) $testStrObj->escapeForHtml() === $testStr) or \fail(__LINE__);
((string) Str::from('<b>' . $testStr . '</b>')->escapeForHtml() === '&lt;b&gt;' . $testStr . '&lt;/b&gt;') or \fail(__LINE__);

((string) $testStrObj->normalizeLineEndings() === $testStr) or \fail(__LINE__);
((string) Str::from("a\r\nb\nc\rd" . $testStr . "a\r\nb\nc\rd")->normalizeLineEndings() === "a\nb\nc\nd" . $testStr . "a\nb\nc\nd") or \fail(__LINE__);
((string) Str::from("a\r\nb\nc\rd" . $testStr . "a\r\nb\nc\rd")->normalizeLineEndings("\r\n") === "a\r\nb\r\nc\r\nd" . $testStr . "a\r\nb\r\nc\r\nd") or \fail(__LINE__);
((string) Str::from("a\r\nb\nc\rd" . $testStr . "a\r\nb\nc\rd")->normalizeLineEndings("\r") === "a\rb\rc\rd" . $testStr . "a\rb\rc\rd") or \fail(__LINE__);
((string) Str::from("a\r\nb\nc\rd" . $testStr . "a\r\nb\nc\rd")->normalizeLineEndings("\n") === "a\nb\nc\nd" . $testStr . "a\nb\nc\nd") or \fail(__LINE__);

((string) $testStrObj->reverse() === 'dlr☺w dlr☺w olleH olleH') or \fail(__LINE__);

((string) Str::from('Hyper Text Markup Language')->acronym() === 'HTML') or \fail(__LINE__);
((string) Str::from('Cascading Style Sheets')->acronym() === 'CSS') or \fail(__LINE__);
((string) Str::from('PHP: Hypertext Preprocessor')->acronym() === 'PHP') or \fail(__LINE__);
((string) Str::from('Light Amplification by Stimulated Emission of Radiation')->acronym(true) === 'LASER') or \fail(__LINE__);

echo 'ALL TESTS PASSED' . "\n";
