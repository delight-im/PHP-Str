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
($testStrObj->startsWithBytes('He') === true) or \fail(__LINE__);
($testStrObj->startsWithBytes('he') === false) or \fail(__LINE__);
($testStrObj->startsWithBytes('el') === false) or \fail(__LINE__);
($testStrObj->startsWithBytes('El') === false) or \fail(__LINE__);
($testStrObj->startsWithBytes('') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints('He') === true) or \fail(__LINE__);
($testStrObj->startsWithCodePoints('he') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints('el') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints('El') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints('') === false) or \fail(__LINE__);

($testStrObj->startsWithIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('el') === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('El') === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase('') === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase('el') === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase('El') === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase('') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase('el') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase('El') === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase('') === false) or \fail(__LINE__);

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
(\bin2hex(Str::from($unicodeOnePlusTwoStr)->codePointAt(1)) === 'f09f92a9') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(4)) === 'b1') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->byteAt(5)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeTwoPlusTwoStr)->codePointAt(1)) === 'f09f87b1') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(4)) === 'a8') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->byteAt(5)) === 'e2') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeThreePlusTwoStr)->codePointAt(1)) === 'f09f91a8') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(1)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(2)) === '9f') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(4)) === 'a9') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->byteAt(5)) === 'f0') or \fail(__LINE__);
(\bin2hex(Str::from($unicodeFourPlusTwoStr)->codePointAt(1)) === 'f09f91a9') or \fail(__LINE__);

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

(Str::from('abc')->lengthInBytes() === 3) or \fail(__LINE__);
(Str::from('abc')->lengthInCodePoints() === 3) or \fail(__LINE__);
(Str::from('aöz')->lengthInBytes() === 4) or \fail(__LINE__);
(Str::from('aöz')->lengthInCodePoints() === 3) or \fail(__LINE__);
(Str::from($unicodeOnePlusTwoStr)->lengthInBytes() === 6) or \fail(__LINE__);
(Str::from($unicodeOnePlusTwoStr)->lengthInCodePoints() === 3) or \fail(__LINE__);
(Str::from($unicodeTwoPlusTwoStr)->lengthInBytes() === 10) or \fail(__LINE__);
(Str::from($unicodeTwoPlusTwoStr)->lengthInCodePoints() === 4) or \fail(__LINE__);
(Str::from($unicodeThreePlusTwoStr)->lengthInBytes() === 13) or \fail(__LINE__);
(Str::from($unicodeThreePlusTwoStr)->lengthInCodePoints() === 5) or \fail(__LINE__);
(Str::from($unicodeFourPlusTwoStr)->lengthInBytes() === 17) or \fail(__LINE__);
(Str::from($unicodeFourPlusTwoStr)->lengthInCodePoints() === 6) or \fail(__LINE__);

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

// BEGIN (IM)MUTABILITY

$a = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->startsWith(' § Wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->startsWithBytes(' § Wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->startsWithCodePoints(' § Wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->startsWithIgnoreCase(' § wOR');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->startsWithBytesIgnoreCase(' § wOR');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->startsWithCodePointsIgnoreCase(' § wOR');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->contains('orl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->containsIgnoreCase('OrL');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWith('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWithIgnoreCase('c! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trim();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trim('§ ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trim('§', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trimStart();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trimStart('§ ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trimStart('§', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trimEnd();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trimEnd('§ ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->trimEnd('§', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->first();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->first(3);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->last();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->last(3);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->byteAt(6);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->codePointAt(6);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->toLowerCase();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->isLowerCase();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->toUpperCase();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->isUpperCase();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->isCapitalized();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncate(5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncate(5, 'ooo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateSafely(11);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateSafely(11, 'ooo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->count();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->count('or');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->lengthInBytes();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->lengthInCodePoints();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->cutStart(4);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->cutEnd(5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replace('rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replace('rl', 'Rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceIgnoreCase('Rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceIgnoreCase('Rl', 'rL');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirst('wo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirst('wo', 'wO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstIgnoreCase('WO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstIgnoreCase('WO', 'wO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replacePrefix(' § W');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replacePrefix(' § W', 'Www');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLast('ld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLast('ld', 'lD');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastIgnoreCase('LD');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastIgnoreCase('LD', 'Ld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceSuffix('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceSuffix('C! § ', 'D!');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->split(' ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->split(' ', 5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->splitByRegex('[aeiou]');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->splitByRegex('[aeiou]', 3);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->splitByRegex('[aeiou]', 3, \PREG_SPLIT_NO_EMPTY);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->words();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->words(3);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->beforeFirst('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->beforeLast('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->between('o', 'l');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterFirst('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterLast('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->matches('(earth|world|globe)');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->matches('(earth|world|globe)', $d);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->matches('(earth|world|globe)', $d, true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->equals(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->equalsIgnoreCase(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareTo('Venus');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareTo('Venus', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToIgnoreCase('Venus');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToIgnoreCase('Venus', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->escapeForHtml();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->normalizeLineEndings();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->normalizeLineEndings("\r\n");
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->reverse();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->acronym();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->acronym(true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

// END (IM)MUTABILITY

// BEGIN BYTES VS CODE POINTS VS GRAPHEME CLUSTERS

// {6|6|6} + {2|1|1} + {2|1|1} + {3|2|1} + {6|6|6} + {3|1|1} + {5|5|5} + {4|1|1} + {5|5|5} + {8|2|1} + {5|5|5} + {11|3|1} + {5|5|5} + {16|5|1} + {5|5|5} + {2|1|1} + {2|1|1} + {3|1|1} + {6|6|6} + {2|1|1} + {2|1|1} + {3|2|1} + {6|6|6} {bytes|code points|grapheme clusters} = {112|72|63} {bytes|code points|grapheme clusters}
// ... + U+00F1 + U+00E4 + { U+006E + U+0303 } + ... + U+231A + ... + U+1F602 + ... + { U+1F1E6 + U+1F1F7 } + ... + { U+1F468 + U+200D + U+1F37C } + ... + { U+1F575 U+FE0F U+200D U+2640 U+FE0F } + ... + U+00C5 + U+00C4 + U+212B + ... + U+00F1 + U+00DC + { U+006E + U+0303 } + ...
//   where
//     U+00F1 = { U+006E + U+0303 }
//     U+00C5 = U+212B
$testStr = " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ";
$testStrObj = Str::from($testStr);

($testStrObj->startsWith(" abc a") === true) or \fail(__LINE__);
($testStrObj->startsWith(" abc b") === false) or \fail(__LINE__);
($testStrObj->startsWith(" abc a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->startsWith(" abc a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->startsWith(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->startsWith(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->startsWith(" abc a\u{00F1}\u{00E4}\u{00F1}a") === false) or \fail(__LINE__);
($testStrObj->startsWith(" abc a\u{00F1}\u{00E4}\u{00F1}b") === false) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a") === true) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc b") === false) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a\u{00F1}\u{00E4}\u{00F1}a") === false) or \fail(__LINE__);
($testStrObj->startsWithBytes(" abc a\u{00F1}\u{00E4}\u{00F1}b") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a") === true) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc b") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a\u{00F1}\u{00E4}\u{00F1}a") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePoints(" abc a\u{00F1}\u{00E4}\u{00F1}b") === false) or \fail(__LINE__);

($testStrObj->startsWithIgnoreCase(" aBc a") === true) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc b") === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{00D1}a") === false) or \fail(__LINE__);
($testStrObj->startsWithIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{00D1}b") === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a") === true) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc b") === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{00D1}a") === false) or \fail(__LINE__);
($testStrObj->startsWithBytesIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{00D1}b") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a") === true) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc b") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{00D1}a") === false) or \fail(__LINE__);
($testStrObj->startsWithCodePointsIgnoreCase(" aBc a\u{00D1}\u{00C4}\u{00D1}b") === false) or \fail(__LINE__);

// END BYTES VS CODE POINTS VS GRAPHEME CLUSTERS

echo 'ALL TESTS PASSED' . "\n";
