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
($testStrObj->containsBytes('o w') === true) or \fail(__LINE__);
($testStrObj->containsBytes('o W') === false) or \fail(__LINE__);
($testStrObj->containsBytes('m') === false) or \fail(__LINE__);
($testStrObj->containsBytes('M') === false) or \fail(__LINE__);
($testStrObj->containsBytes('He') === true) or \fail(__LINE__);
($testStrObj->containsBytes('he') === false) or \fail(__LINE__);
($testStrObj->containsBytes('ld') === true) or \fail(__LINE__);
($testStrObj->containsBytes('lD') === false) or \fail(__LINE__);
($testStrObj->containsBytes('') === false) or \fail(__LINE__);
($testStrObj->containsCodePoints('o w') === true) or \fail(__LINE__);
($testStrObj->containsCodePoints('o W') === false) or \fail(__LINE__);
($testStrObj->containsCodePoints('m') === false) or \fail(__LINE__);
($testStrObj->containsCodePoints('M') === false) or \fail(__LINE__);
($testStrObj->containsCodePoints('He') === true) or \fail(__LINE__);
($testStrObj->containsCodePoints('he') === false) or \fail(__LINE__);
($testStrObj->containsCodePoints('ld') === true) or \fail(__LINE__);
($testStrObj->containsCodePoints('lD') === false) or \fail(__LINE__);
($testStrObj->containsCodePoints('') === false) or \fail(__LINE__);

($testStrObj->containsIgnoreCase('o w') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('o W') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('m') === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('M') === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase('') === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('o w') === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('o W') === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('m') === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('M') === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase('') === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('o w') === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('o W') === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('m') === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('M') === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('He') === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('he') === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase('') === false) or \fail(__LINE__);

($testStrObj->endsWith('ld') === true) or \fail(__LINE__);
($testStrObj->endsWith('lD') === false) or \fail(__LINE__);
($testStrObj->endsWith('rl') === false) or \fail(__LINE__);
($testStrObj->endsWith('rL') === false) or \fail(__LINE__);
($testStrObj->endsWith('') === false) or \fail(__LINE__);
($testStrObj->endsWithBytes('ld') === true) or \fail(__LINE__);
($testStrObj->endsWithBytes('lD') === false) or \fail(__LINE__);
($testStrObj->endsWithBytes('rl') === false) or \fail(__LINE__);
($testStrObj->endsWithBytes('rL') === false) or \fail(__LINE__);
($testStrObj->endsWithBytes('') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints('ld') === true) or \fail(__LINE__);
($testStrObj->endsWithCodePoints('lD') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints('rl') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints('rL') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints('') === false) or \fail(__LINE__);

($testStrObj->endsWithIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('rl') === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('rL') === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase('') === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase('rl') === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase('rL') === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase('') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase('ld') === true) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase('lD') === true) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase('rl') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase('rL') === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase('') === false) or \fail(__LINE__);

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
((string) $testStrObj->firstBytes() === 'H') or \fail(__LINE__);
((string) $testStrObj->firstBytes(0) === '') or \fail(__LINE__);
((string) $testStrObj->firstBytes(5) === 'Hello') or \fail(__LINE__);
((string) $testStrObj->firstBytes(11) === 'Hello Hello') or \fail(__LINE__);
((string) $testStrObj->firstBytes(13) === 'Hello Hello w') or \fail(__LINE__);
((string) $testStrObj->firstCodePoints() === 'H') or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(0) === '') or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(5) === 'Hello') or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(11) === 'Hello Hello') or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(13) === 'Hello Hello w') or \fail(__LINE__);

((string) $testStrObj->last() === 'd') or \fail(__LINE__);
((string) $testStrObj->last(0) === '') or \fail(__LINE__);
((string) $testStrObj->last(2) === 'ld') or \fail(__LINE__);
((string) $testStrObj->last(3) === 'rld') or \fail(__LINE__);
((string) $testStrObj->lastBytes() === 'd') or \fail(__LINE__);
((string) $testStrObj->lastBytes(0) === '') or \fail(__LINE__);
((string) $testStrObj->lastBytes(2) === 'ld') or \fail(__LINE__);
((string) $testStrObj->lastBytes(3) === 'rld') or \fail(__LINE__);
((string) $testStrObj->lastCodePoints() === 'd') or \fail(__LINE__);
((string) $testStrObj->lastCodePoints(0) === '') or \fail(__LINE__);
((string) $testStrObj->lastCodePoints(2) === 'ld') or \fail(__LINE__);
((string) $testStrObj->lastCodePoints(3) === 'rld') or \fail(__LINE__);

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

(Str::from(null)->isEmpty() === true) or \fail(__LINE__);
(Str::from('')->isEmpty() === true) or \fail(__LINE__);
(Str::from(0)->isEmpty() === false) or \fail(__LINE__);
(Str::from(1)->isEmpty() === false) or \fail(__LINE__);
(Str::from('0')->isEmpty() === false) or \fail(__LINE__);
(Str::from('1')->isEmpty() === false) or \fail(__LINE__);
(Str::from('a')->isEmpty() === false) or \fail(__LINE__);
(Str::from('abc')->isEmpty() === false) or \fail(__LINE__);
($testStrObj->isEmpty() === false) or \fail(__LINE__);

(Str::from('')->isAscii() === true) or \fail(__LINE__);
(Str::from("\t\n")->isAscii() === true) or \fail(__LINE__);
(Str::from(' !Aa}~')->isAscii() === true) or \fail(__LINE__);
(Str::from('W☺rld')->isAscii() === false) or \fail(__LINE__);
($testStrObj->isAscii() === false) or \fail(__LINE__);

(Str::from('')->isPrintableAscii() === true) or \fail(__LINE__);
(Str::from("\t\n")->isPrintableAscii() === false) or \fail(__LINE__);
(Str::from(' !Aa}~')->isPrintableAscii() === true) or \fail(__LINE__);
(Str::from('W☺rld')->isPrintableAscii() === false) or \fail(__LINE__);
($testStrObj->isPrintableAscii() === false) or \fail(__LINE__);

((string) $testStrObj->toLowerCase() === 'hello hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->toLowerCaseBytes() === 'hello hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->toLowerCaseCodePoints() === 'hello hello w☺rld w☺rld') or \fail(__LINE__);
($testStrObj->isLowerCase() === false) or \fail(__LINE__);
($testStrObj->toLowerCase()->isLowerCase() === true) or \fail(__LINE__);

((string) $testStrObj->toUpperCase() === 'HELLO HELLO W☺RLD W☺RLD') or \fail(__LINE__);
((string) $testStrObj->toUpperCaseBytes() === 'HELLO HELLO W☺RLD W☺RLD') or \fail(__LINE__);
((string) $testStrObj->toUpperCaseCodePoints() === 'HELLO HELLO W☺RLD W☺RLD') or \fail(__LINE__);
($testStrObj->isUpperCase() === false) or \fail(__LINE__);
($testStrObj->toUpperCase()->isUpperCase() === true) or \fail(__LINE__);

($testStrObj->isCapitalized() === true) or \fail(__LINE__);
($testStrObj->toLowerCase()->isCapitalized() === false) or \fail(__LINE__);
($testStrObj->toUpperCase()->isCapitalized() === true) or \fail(__LINE__);

((string) $testStrObj->truncate(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncate(5, '+') === 'Hell+') or \fail(__LINE__);
((string) $testStrObj->truncate(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncate(11) === 'Hello He...') or \fail(__LINE__);
((string) $testStrObj->truncate(13) === 'Hello Hell...') or \fail(__LINE__);
((string) $testStrObj->truncate(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncate(15) === 'Hello Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(5, '+') === 'Hell+') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(11) === 'Hello He...') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(13) === 'Hello Hell...') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncateBytes(15) === 'Hello Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(5, '+') === 'Hell+') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(11) === 'Hello He...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(13) === 'Hello Hell...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(15) === 'Hello Hello ...') or \fail(__LINE__);

((string) $testStrObj->truncateSafely(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(5, '+') === 'Hell+') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(11) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(13) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncateSafely(15) === 'Hello Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(5, '+') === 'Hell+') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(11) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(13) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(15) === 'Hello Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(5) === 'He...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(5, '+') === 'Hell+') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(5, '') === 'Hello') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(11) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(13) === 'Hello ...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(14) === 'Hello Hello...') or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(15) === 'Hello Hello ...') or \fail(__LINE__);

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
($testStrObj->countBytes('l') === 6) or \fail(__LINE__);
($testStrObj->countBytes('lo') === 2) or \fail(__LINE__);
($testStrObj->countBytes('☺') === 2) or \fail(__LINE__);
($testStrObj->countBytes(' ') === 3) or \fail(__LINE__);
($testStrObj->countBytes('L') === 0) or \fail(__LINE__);
($testStrObj->countBytes('x') === 0) or \fail(__LINE__);
($testStrObj->countBytes('') === 0) or \fail(__LINE__);
($testStrObj->countCodePoints('l') === 6) or \fail(__LINE__);
($testStrObj->countCodePoints('lo') === 2) or \fail(__LINE__);
($testStrObj->countCodePoints('☺') === 2) or \fail(__LINE__);
($testStrObj->countCodePoints(' ') === 3) or \fail(__LINE__);
($testStrObj->countCodePoints('L') === 0) or \fail(__LINE__);
($testStrObj->countCodePoints('x') === 0) or \fail(__LINE__);
($testStrObj->countCodePoints('') === 0) or \fail(__LINE__);

(Str::from('abc')->length() === 3) or \fail(__LINE__);
(Str::from('abc')->lengthInBytes() === 3) or \fail(__LINE__);
(Str::from('abc')->lengthInCodePoints() === 3) or \fail(__LINE__);
(Str::from('aöz')->length() === 3) or \fail(__LINE__);
(Str::from('aöz')->lengthInBytes() === 4) or \fail(__LINE__);
(Str::from('aöz')->lengthInCodePoints() === 3) or \fail(__LINE__);
(Str::from($unicodeOnePlusTwoStr)->length() === 3) or \fail(__LINE__);
(Str::from($unicodeOnePlusTwoStr)->lengthInBytes() === 6) or \fail(__LINE__);
(Str::from($unicodeOnePlusTwoStr)->lengthInCodePoints() === 3) or \fail(__LINE__);
(Str::from($unicodeTwoPlusTwoStr)->length() === 4) or \fail(__LINE__);
(Str::from($unicodeTwoPlusTwoStr)->lengthInBytes() === 10) or \fail(__LINE__);
(Str::from($unicodeTwoPlusTwoStr)->lengthInCodePoints() === 4) or \fail(__LINE__);
(Str::from($unicodeThreePlusTwoStr)->length() === 5) or \fail(__LINE__);
(Str::from($unicodeThreePlusTwoStr)->lengthInBytes() === 13) or \fail(__LINE__);
(Str::from($unicodeThreePlusTwoStr)->lengthInCodePoints() === 5) or \fail(__LINE__);
(Str::from($unicodeFourPlusTwoStr)->length() === 6) or \fail(__LINE__);
(Str::from($unicodeFourPlusTwoStr)->lengthInBytes() === 17) or \fail(__LINE__);
(Str::from($unicodeFourPlusTwoStr)->lengthInCodePoints() === 6) or \fail(__LINE__);

((string) $testStrObj->cutStart(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutStart(2) === 'llo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutStart(9) === 'lo w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutStart(13) === '☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(2) === 'llo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(9) === 'lo w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(13) === '☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(2) === 'llo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(9) === 'lo w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(13) === '☺rld w☺rld') or \fail(__LINE__);

((string) $testStrObj->cutEnd(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutEnd(1) === 'Hello Hello w☺rld w☺rl') or \fail(__LINE__);
((string) $testStrObj->cutEnd(2) === 'Hello Hello w☺rld w☺r') or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(1) === 'Hello Hello w☺rld w☺rl') or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(2) === 'Hello Hello w☺rld w☺r') or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(0) === $testStr) or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(1) === 'Hello Hello w☺rld w☺rl') or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(2) === 'Hello Hello w☺rld w☺r') or \fail(__LINE__);

((string) $testStrObj->replace('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replace('hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replace('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceBytes('hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceBytes('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints('hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceIgnoreCase('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase('hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase('hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase('Hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase('hello') === '  w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase('hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceFirst('el') === 'Hlo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirst('el', 'eeel') === 'Heeello Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirst('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirst('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes('el') === 'Hlo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes('el', 'eeel') === 'Heeello Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints('el') === 'Hlo Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints('el', 'eeel') === 'Heeello Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceFirstIgnoreCase('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase('hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase('hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replacePrefix(' Hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix('Hello ') === 'Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefix('Hello ', 'Bonjour ') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefix('hello ', 'Bonjour ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(' Hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes('Hello ') === 'Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes('Hello ', 'Bonjour ') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes('hello ', 'Bonjour ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(' Hello') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints('Hello ') === 'Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints('Hello ', 'Bonjour ') === 'Bonjour Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints('hello ', 'Bonjour ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceLast('w') === 'Hello Hello w☺rld ☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLast('w', 'www') === 'Hello Hello w☺rld www☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLast('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLast('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes('w') === 'Hello Hello w☺rld ☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes('w', 'www') === 'Hello Hello w☺rld www☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints('w') === 'Hello Hello w☺rld ☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints('w', 'www') === 'Hello Hello w☺rld www☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints('hello', 'Bonjour') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceLastIgnoreCase('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase('hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase('hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase('', '') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceSuffix('rld ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('rd') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('rld', 'rds') === 'Hello Hello w☺rld w☺rds') or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('ld', 'd') === 'Hello Hello w☺rld w☺rd') or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('D', 'ds') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('rld ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('rd') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('rld', 'rds') === 'Hello Hello w☺rld w☺rds') or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('ld', 'd') === 'Hello Hello w☺rld w☺rd') or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('D', 'ds') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes('', '') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('rld ') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('rd') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('rld', 'rds') === 'Hello Hello w☺rld w☺rds') or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('ld', 'd') === 'Hello Hello w☺rld w☺rd') or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('D', 'ds') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('', 'x') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints('', '') === $testStr) or \fail(__LINE__);

(\count($testStrObj->split(' ')) === 4) or \fail(__LINE__);
(\count($testStrObj->split(' ', 3)) === 3) or \fail(__LINE__);
(\count($testStrObj->split(' ', 5)) === 4) or \fail(__LINE__);
(\count($testStrObj->split(' Hello w')) === 2) or \fail(__LINE__);
(\count($testStrObj->split(' hello w')) === 1) or \fail(__LINE__);
(\count($testStrObj->split('')) === 1) or \fail(__LINE__);
(\count($testStrObj->splitBytes(' ')) === 4) or \fail(__LINE__);
(\count($testStrObj->splitBytes(' ', 3)) === 3) or \fail(__LINE__);
(\count($testStrObj->splitBytes(' ', 5)) === 4) or \fail(__LINE__);
(\count($testStrObj->splitBytes(' Hello w')) === 2) or \fail(__LINE__);
(\count($testStrObj->splitBytes(' hello w')) === 1) or \fail(__LINE__);
(\count($testStrObj->splitBytes('')) === 1) or \fail(__LINE__);
(\count($testStrObj->splitCodePoints(' ')) === 4) or \fail(__LINE__);
(\count($testStrObj->splitCodePoints(' ', 3)) === 3) or \fail(__LINE__);
(\count($testStrObj->splitCodePoints(' ', 5)) === 4) or \fail(__LINE__);
(\count($testStrObj->splitCodePoints(' Hello w')) === 2) or \fail(__LINE__);
(\count($testStrObj->splitCodePoints(' hello w')) === 1) or \fail(__LINE__);
(\count($testStrObj->splitCodePoints('')) === 1) or \fail(__LINE__);

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
((string) $testStrObj->beforeFirstBytes('Hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes('w☺rld') === 'Hello Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes('W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes('') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('Hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('w☺rld') === 'Hello Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints('') === '') or \fail(__LINE__);

((string) $testStrObj->beforeLast('Hello') === 'Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeLast('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeLast('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeLast('w☺rld') === 'Hello Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->beforeLast('hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLast('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLast('') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('Hello') === 'Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('w☺rld') === 'Hello Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes('') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('Hello') === 'Hello ') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('o H') === 'Hell') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('d w☺rl') === 'Hello Hello w☺rl') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('w☺rld') === 'Hello Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('hello') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('x') === '') or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints('') === '') or \fail(__LINE__);

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
((string) $testStrObj->betweenBytes('Hello', 'w☺rld') === ' Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('w☺rld', 'w☺rld') === ' ') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('w☺rld', 'Hello') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('hello', 'w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('Hello', 'W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('hello', 'W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('x', 'y') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('Hello', '') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('', 'w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenBytes('', '') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('Hello', 'w☺rld') === ' Hello w☺rld ') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('w☺rld', 'w☺rld') === ' ') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('w☺rld', 'Hello') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('hello', 'w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('Hello', 'W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('hello', 'W☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('x', 'y') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('Hello', '') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('', 'w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints('', '') === '') or \fail(__LINE__);

((string) $testStrObj->afterFirst('Hello') === ' Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirst('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirst('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterFirst('w☺rld') === ' w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirst('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirst('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirst('') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('Hello') === ' Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('w☺rld') === ' w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes('') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('Hello') === ' Hello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('w☺rld') === ' w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints('') === '') or \fail(__LINE__);

((string) $testStrObj->afterLast('Hello') === ' w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLast('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLast('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterLast('w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterLast('') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('Hello') === ' w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastBytes('') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('Hello') === ' w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('o H') === 'ello w☺rld w☺rld') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('d w☺rl') === 'd') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('w☺rld') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('hello') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('x') === '') or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints('') === '') or \fail(__LINE__);

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
($testStrObj->compareToBytes('g') < 0) or \fail(__LINE__);
($testStrObj->compareToBytes('G') > 0) or \fail(__LINE__);
($testStrObj->compareToBytes('hey') < 0) or \fail(__LINE__);
($testStrObj->compareToBytes('Hey') < 0) or \fail(__LINE__);
($testStrObj->compareToBytes('i') < 0) or \fail(__LINE__);
($testStrObj->compareToBytes('I') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('chapter 2') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('Chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('Chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('chapter 10') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('Chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('chapter 2', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('Chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('Chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('chapter 10', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytes('Chapter 10', true) < 0) or \fail(__LINE__);
($testStrObj->compareToCodePoints('g') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePoints('G') > 0) or \fail(__LINE__);
($testStrObj->compareToCodePoints('hey') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePoints('Hey') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePoints('i') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePoints('I') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('chapter 2') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('Chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('Chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('chapter 10') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('Chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('chapter 2', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('Chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('Chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('chapter 10', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePoints('Chapter 10', true) < 0) or \fail(__LINE__);

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
($testStrObj->compareToBytesIgnoreCase('g') > 0) or \fail(__LINE__);
($testStrObj->compareToBytesIgnoreCase('G') > 0) or \fail(__LINE__);
($testStrObj->compareToBytesIgnoreCase('hey') < 0) or \fail(__LINE__);
($testStrObj->compareToBytesIgnoreCase('Hey') < 0) or \fail(__LINE__);
($testStrObj->compareToBytesIgnoreCase('i') < 0) or \fail(__LINE__);
($testStrObj->compareToBytesIgnoreCase('I') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('Chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('Chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('Chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('Chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('Chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('chapter 10', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToBytesIgnoreCase('Chapter 10', true) < 0) or \fail(__LINE__);
($testStrObj->compareToCodePointsIgnoreCase('g') > 0) or \fail(__LINE__);
($testStrObj->compareToCodePointsIgnoreCase('G') > 0) or \fail(__LINE__);
($testStrObj->compareToCodePointsIgnoreCase('hey') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePointsIgnoreCase('Hey') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePointsIgnoreCase('i') < 0) or \fail(__LINE__);
($testStrObj->compareToCodePointsIgnoreCase('I') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('Chapter 2') === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('Chapter 5') < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('Chapter 10') > 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('Chapter 2', true) === 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('Chapter 5', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('chapter 10', true) < 0) or \fail(__LINE__);
(Str::from('Chapter 2')->compareToCodePointsIgnoreCase('Chapter 10', true) < 0) or \fail(__LINE__);

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
$c = $b->containsBytes('orl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->containsCodePoints('orl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->containsIgnoreCase('OrL');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->containsBytesIgnoreCase('OrL');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->containsCodePointsIgnoreCase('OrL');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWith('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWithBytes('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWithCodePoints('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWithIgnoreCase('c! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWithBytesIgnoreCase('c! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->endsWithCodePointsIgnoreCase('c! § ');
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
$c = $b->firstBytes();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->firstBytes(3);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->firstCodePoints();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->firstCodePoints(3);
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
$c = $b->lastBytes();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->lastBytes(3);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->lastCodePoints();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->lastCodePoints(3);
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
$c = $b->isEmpty();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->isAscii();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->isPrintableAscii();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->toLowerCase();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->toLowerCaseBytes();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->toLowerCaseCodePoints();
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
$c = $b->toUpperCaseBytes();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->toUpperCaseCodePoints();
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
$c = $b->truncateBytes(5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateBytes(5, 'ooo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateCodePoints(5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateCodePoints(5, 'ooo');
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
$c = $b->truncateBytesSafely(11);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateBytesSafely(11, 'ooo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateCodePointsSafely(11);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->truncateCodePointsSafely(11, 'ooo');
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
$c = $b->countBytes();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->countBytes('or');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->countCodePoints();
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->countCodePoints('or');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->length();
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
$c = $b->cutBytesAtStart(4);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->cutCodePointsAtStart(4);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->cutEnd(5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->cutBytesAtEnd(5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->cutCodePointsAtEnd(5);
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
$c = $b->replaceBytes('rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceBytes('rl', 'Rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceCodePoints('rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceCodePoints('rl', 'Rl');
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
$c = $b->replaceBytesIgnoreCase('Rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceBytesIgnoreCase('Rl', 'rL');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceCodePointsIgnoreCase('Rl');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceCodePointsIgnoreCase('Rl', 'rL');
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
$c = $b->replaceFirstBytes('wo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstBytes('wo', 'wO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstCodePoints('wo');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstCodePoints('wo', 'wO');
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
$c = $b->replaceFirstBytesIgnoreCase('WO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstBytesIgnoreCase('WO', 'wO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstCodePointsIgnoreCase('WO');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceFirstCodePointsIgnoreCase('WO', 'wO');
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
$c = $b->replacePrefixBytes(' § W');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replacePrefixBytes(' § W', 'Www');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replacePrefixCodePoints(' § W');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replacePrefixCodePoints(' § W', 'Www');
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
$c = $b->replaceLastBytes('ld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastBytes('ld', 'lD');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastCodePoints('ld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastCodePoints('ld', 'lD');
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
$c = $b->replaceLastBytesIgnoreCase('LD');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastBytesIgnoreCase('LD', 'Ld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastCodePointsIgnoreCase('LD');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceLastCodePointsIgnoreCase('LD', 'Ld');
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
$c = $b->replaceSuffixBytes('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceSuffixBytes('C! § ', 'D!');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceSuffixCodePoints('C! § ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->replaceSuffixCodePoints('C! § ', 'D!');
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
$c = $b->splitBytes(' ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->splitBytes(' ', 5);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->splitCodePoints(' ');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->splitCodePoints(' ', 5);
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
$c = $b->beforeFirstBytes('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->beforeFirstCodePoints('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->beforeLast('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->beforeLastBytes('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->beforeLastCodePoints('rld');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->between('o', 'l');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->betweenBytes('o', 'l');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->betweenCodePoints('o', 'l');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterFirst('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterFirstBytes('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterFirstCodePoints('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterLast('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterLastBytes('wor');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
((string) $b !== (string) $c && \gettype($b) === \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->afterLastCodePoints('wor');
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
$c = $b->compareToBytes('Venus');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToBytes('Venus', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToCodePoints('Venus');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToCodePoints('Venus', true);
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
$c = $b->compareToBytesIgnoreCase('Venus');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToBytesIgnoreCase('Venus', true);
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToCodePointsIgnoreCase('Venus');
((string) $a === (string) $b && \gettype($a) === \gettype($b)) or \fail(__LINE__);
(\gettype($b) !== \gettype($c)) or \fail(__LINE__);

$b = Str::from(" § World 'world' \u{1F30D} & \u{1F30E} & \u{1F30F} 'world' world\rA!\r\nB!\nC! § ");
$c = $b->compareToCodePointsIgnoreCase('Venus', true);
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

($testStrObj->contains("c a") === true) or \fail(__LINE__);
($testStrObj->contains("c b") === false) or \fail(__LINE__);
($testStrObj->contains("c a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->contains("c a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->contains("c a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->contains("c a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->contains("c a\u{00F1}\u{00E4}\u{00F1}a") === false) or \fail(__LINE__);
($testStrObj->contains("c a\u{00F1}\u{00E4}\u{00F1}b") === false) or \fail(__LINE__);
($testStrObj->containsBytes("c a") === true) or \fail(__LINE__);
($testStrObj->containsBytes("c b") === false) or \fail(__LINE__);
($testStrObj->containsBytes("c a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->containsBytes("c a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->containsBytes("c a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->containsBytes("c a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->containsBytes("c a\u{00F1}\u{00E4}\u{00F1}a") === false) or \fail(__LINE__);
($testStrObj->containsBytes("c a\u{00F1}\u{00E4}\u{00F1}b") === false) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a") === true) or \fail(__LINE__);
($testStrObj->containsCodePoints("c b") === false) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a\u{00F1}\u{00E4}\u{00F1}a") === false) or \fail(__LINE__);
($testStrObj->containsCodePoints("c a\u{00F1}\u{00E4}\u{00F1}b") === false) or \fail(__LINE__);

($testStrObj->containsIgnoreCase("C a") === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C b") === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C a\u{00D1}\u{00C4}\u{00D1}a") === false) or \fail(__LINE__);
($testStrObj->containsIgnoreCase("C a\u{00D1}\u{00C4}\u{00D1}b") === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a") === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C b") === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a\u{00D1}\u{00C4}\u{00D1}a") === false) or \fail(__LINE__);
($testStrObj->containsBytesIgnoreCase("C a\u{00D1}\u{00C4}\u{00D1}b") === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a") === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C b") === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a\u{00F1}") === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a\u{00F2}") === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === true) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a\u{00D1}\u{00C4}\u{00D1}a") === false) or \fail(__LINE__);
($testStrObj->containsCodePointsIgnoreCase("C a\u{00D1}\u{00C4}\u{00D1}b") === false) or \fail(__LINE__);

($testStrObj->endsWith("u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWith("v 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWith("\u{0303}u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWith("\u{0304}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWith("\u{00DC}\u{006E}\u{0303}u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWith("\u{00DD}\u{006E}\u{0303}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWith("u\u{00F1}\u{00DC}\u{00F1}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWith("v\u{00F1}\u{00DC}\u{00F1}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytes("u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithBytes("v 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytes("\u{0303}u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithBytes("\u{0304}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytes("\u{00DC}\u{006E}\u{0303}u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithBytes("\u{00DD}\u{006E}\u{0303}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytes("u\u{00F1}\u{00DC}\u{00F1}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytes("v\u{00F1}\u{00DC}\u{00F1}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("v 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("\u{0303}u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("\u{0304}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("\u{00DC}\u{006E}\u{0303}u 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("\u{00DD}\u{006E}\u{0303}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("u\u{00F1}\u{00DC}\u{00F1}u 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePoints("v\u{00F1}\u{00DC}\u{00F1}u 789 ") === false) or \fail(__LINE__);

($testStrObj->endsWithIgnoreCase("U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("V 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("\u{0303}U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("\u{0304}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("\u{00FC}\u{004E}\u{0303}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("\u{00FD}\u{004E}\u{0303}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("u\u{00D1}\u{00FC}\u{00D1}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithIgnoreCase("v\u{00D1}\u{00FC}\u{00D1}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("V 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("\u{0303}U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("\u{0304}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("\u{00FC}\u{004E}\u{0303}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("\u{00FD}\u{004E}\u{0303}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("u\u{00D1}\u{00FC}\u{00D1}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithBytesIgnoreCase("v\u{00D1}\u{00FC}\u{00D1}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("V 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("\u{0303}U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("\u{0304}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("\u{00FC}\u{004E}\u{0303}U 789 ") === true) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("\u{00FD}\u{004E}\u{0303}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("u\u{00D1}\u{00FC}\u{00D1}U 789 ") === false) or \fail(__LINE__);
($testStrObj->endsWithCodePointsIgnoreCase("v\u{00D1}\u{00FC}\u{00D1}U 789 ") === false) or \fail(__LINE__);

((string) $testStrObj->trim() === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->trim("abc789 ") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trim("abc789\u{00F1} ") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trim("abc789\u{006E}\u{0303} ") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trim("abc789\u{006E}\u{0303}u\u{00F1}\u{00E4} ") === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->trim(null, true) === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->trim("abc789", true) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trim("abc789\u{00F1}", true) === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trim("abc789\u{006E}\u{0303}", true) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trim("abc789\u{006E}\u{0303}u\u{00F1}\u{00E4}", true) === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);

((string) $testStrObj->trimStart() === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789 ") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789\u{00F1} ") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789\u{006E}\u{0303} ") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789\u{006E}\u{0303}u\u{00F1}\u{00E4} ") === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart(null, true) === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789", true) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789\u{00F1}", true) === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789\u{006E}\u{0303}", true) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->trimStart("abc789\u{006E}\u{0303}u\u{00F1}\u{00E4}", true) === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);

((string) $testStrObj->trimEnd() === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789\u{00F1} ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789\u{006E}\u{0303} ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789\u{006E}\u{0303}u\u{00F1}\u{00E4} ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->trimEnd(null, true) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789", true) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789\u{00F1}", true) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789\u{006E}\u{0303}", true) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->trimEnd("abc789\u{006E}\u{0303}u\u{00F1}\u{00E4}", true) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);

((string) $testStrObj->first() === " ") or \fail(__LINE__);
((string) $testStrObj->first(6) === " abc a") or \fail(__LINE__);
((string) $testStrObj->first(7) === " abc a\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->first(11) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") or \fail(__LINE__);
((string) $testStrObj->firstBytes() === " ") or \fail(__LINE__);
((string) $testStrObj->firstBytes(6) === " abc a") or \fail(__LINE__);
((string) $testStrObj->firstBytes(8) === " abc a\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->firstBytes(14) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") or \fail(__LINE__);
((string) $testStrObj->firstCodePoints() === " ") or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(6) === " abc a") or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(7) === " abc a\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->firstCodePoints(11) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") or \fail(__LINE__);

((string) $testStrObj->last() === " ") or \fail(__LINE__);
((string) $testStrObj->last(4) === "789 ") or \fail(__LINE__);
((string) $testStrObj->last(7) === "\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->last(8) === "\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->lastBytes() === " ") or \fail(__LINE__);
((string) $testStrObj->lastBytes(4) === "789 ") or \fail(__LINE__);
((string) $testStrObj->lastBytes(8) === "\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->lastBytes(9) === "\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->lastCodePoints() === " ") or \fail(__LINE__);
((string) $testStrObj->lastCodePoints(4) === "789 ") or \fail(__LINE__);
((string) $testStrObj->lastCodePoints(7) === "\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->lastCodePoints(8) === "\u{006E}\u{0303}u 789 ") or \fail(__LINE__);

((string) $testStrObj->byteAt(0) === " ") or \fail(__LINE__);
((string) $testStrObj->byteAt(3) === "c") or \fail(__LINE__);
((string) $testStrObj->byteAt(6) === "\xC3") or \fail(__LINE__);
((string) $testStrObj->byteAt(8) === "\xC3") or \fail(__LINE__);
((string) $testStrObj->byteAt(9) === "\xA4") or \fail(__LINE__);
((string) $testStrObj->codePointAt(0) === " ") or \fail(__LINE__);
((string) $testStrObj->codePointAt(3) === "c") or \fail(__LINE__);
((string) $testStrObj->codePointAt(6) === "\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->codePointAt(8) === "\u{006E}") or \fail(__LINE__);
((string) $testStrObj->codePointAt(9) === "\u{0303}") or \fail(__LINE__);

((string) $testStrObj->toLowerCase() === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00E5}\u{00E4}\u{00E5} 456 u\u{00F1}\u{00FC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->toLowerCaseBytes() === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->toLowerCaseCodePoints() === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00E5}\u{00E4}\u{00E5} 456 u\u{00F1}\u{00FC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);

((string) $testStrObj->toUpperCase() === " ABC A\u{00D1}\u{00C4}\u{004E}\u{0303}A DEF \u{231A} GHI \u{1F602} JKL \u{1F1E6}\u{1F1F7} MNO \u{1F468}\u{200D}\u{1F37C} PQR \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 U\u{00D1}\u{00DC}\u{004E}\u{0303}U 789 ") or \fail(__LINE__);
((string) $testStrObj->toUpperCaseBytes() === " ABC A\u{00F1}\u{00E4}\u{004E}\u{0303}A DEF \u{231A} GHI \u{1F602} JKL \u{1F1E6}\u{1F1F7} MNO \u{1F468}\u{200D}\u{1F37C} PQR \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 U\u{00F1}\u{00DC}\u{004E}\u{0303}U 789 ") or \fail(__LINE__);
((string) $testStrObj->toUpperCaseCodePoints() === " ABC A\u{00D1}\u{00C4}\u{004E}\u{0303}A DEF \u{231A} GHI \u{1F602} JKL \u{1F1E6}\u{1F1F7} MNO \u{1F468}\u{200D}\u{1F37C} PQR \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 U\u{00D1}\u{00DC}\u{004E}\u{0303}U 789 ") or \fail(__LINE__);
((string) Str::from("Stra\u{00DF}e")->toUpperCase() === 'STRASSE') or \fail(__LINE__);
((string) Str::from("Stra\u{00DF}e")->toUpperCaseBytes() === "STRA\u{00DF}E") or \fail(__LINE__);
((string) Str::from("Stra\u{00DF}e")->toUpperCaseCodePoints() === 'STRASSE') or \fail(__LINE__);

((string) $testStrObj->truncate(6) === " ab...") or \fail(__LINE__);
((string) $testStrObj->truncate(9) === " abc a...") or \fail(__LINE__);
((string) $testStrObj->truncate(10) === " abc a\u{00F1}...") or \fail(__LINE__);
((string) $testStrObj->truncate(12) === " abc a\u{00F1}\u{00E4}\u{006E}...") or \fail(__LINE__);
((string) $testStrObj->truncate(4, '~') === " ab~") or \fail(__LINE__);
((string) $testStrObj->truncate(7, '~') === " abc a~") or \fail(__LINE__);
((string) $testStrObj->truncate(8, '~') === " abc a\u{00F1}~") or \fail(__LINE__);
((string) $testStrObj->truncate(10, '~') === " abc a\u{00F1}\u{00E4}\u{006E}~") or \fail(__LINE__);
((string) $testStrObj->truncate(3, '') === " ab") or \fail(__LINE__);
((string) $testStrObj->truncate(6, '') === " abc a") or \fail(__LINE__);
((string) $testStrObj->truncate(7, '') === " abc a\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->truncate(9, '') === " abc a\u{00F1}\u{00E4}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(6) === " ab...") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(9) === " abc a...") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(11) === " abc a\u{00F1}...") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(14) === " abc a\u{00F1}\u{00E4}\u{006E}...") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(4, '~') === " ab~") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(7, '~') === " abc a~") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(9, '~') === " abc a\u{00F1}~") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(12, '~') === " abc a\u{00F1}\u{00E4}\u{006E}~") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(3, '') === " ab") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(6, '') === " abc a") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(8, '') === " abc a\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->truncateBytes(11, '') === " abc a\u{00F1}\u{00E4}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(6) === " ab...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(9) === " abc a...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(10) === " abc a\u{00F1}...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(12) === " abc a\u{00F1}\u{00E4}\u{006E}...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(4, '~') === " ab~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(7, '~') === " abc a~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(8, '~') === " abc a\u{00F1}~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(10, '~') === " abc a\u{00F1}\u{00E4}\u{006E}~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(3, '') === " ab") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(6, '') === " abc a") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(7, '') === " abc a\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->truncateCodePoints(9, '') === " abc a\u{00F1}\u{00E4}\u{006E}") or \fail(__LINE__);

((string) $testStrObj->truncateSafely(6) === " ...") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(9) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(10) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(12) === " abc a\u{00F1}\u{00E4}\u{006E}...") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(4, '~') === " ~") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(7, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(8, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(10, '~') === " abc a\u{00F1}\u{00E4}\u{006E}~") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(3, '') === " ") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(6, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(7, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateSafely(9, '') === " abc a\u{00F1}\u{00E4}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(6) === " ...") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(9) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(11) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(14) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(4, '~') === " ~") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(7, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(9, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(12, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(3, '') === " ") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(6, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(8, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateBytesSafely(11, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(6) === " ...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(9) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(10) === " abc ...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(12) === " abc a\u{00F1}\u{00E4}\u{006E}...") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(4, '~') === " ~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(7, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(8, '~') === " abc ~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(10, '~') === " abc a\u{00F1}\u{00E4}\u{006E}~") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(3, '') === " ") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(6, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(7, '') === " abc ") or \fail(__LINE__);
((string) $testStrObj->truncateCodePointsSafely(9, '') === " abc a\u{00F1}\u{00E4}\u{006E}") or \fail(__LINE__);

($testStrObj->count() === 72) or \fail(__LINE__);
($testStrObj->count("\u{00F1}") === 2) or \fail(__LINE__);
($testStrObj->countBytes() === 112) or \fail(__LINE__);
($testStrObj->countBytes("\u{00F1}") === 2) or \fail(__LINE__);
($testStrObj->countCodePoints() === 72) or \fail(__LINE__);
($testStrObj->countCodePoints("\u{00F1}") === 2) or \fail(__LINE__);

($testStrObj->length() === 72) or \fail(__LINE__);
($testStrObj->lengthInBytes() === 112) or \fail(__LINE__);
($testStrObj->lengthInCodePoints() === 72) or \fail(__LINE__);

((string) $testStrObj->cutStart(1) === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutStart(6) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutStart(7) === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutStart(11) === " def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(1) === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(6) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(8) === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtStart(14) === " def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(1) === "abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(6) === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(7) === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtStart(11) === " def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);

((string) $testStrObj->cutEnd(1) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->cutEnd(4) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u ") or \fail(__LINE__);
((string) $testStrObj->cutEnd(7) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->cutEnd(8) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(1) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(4) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u ") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(8) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->cutBytesAtEnd(9) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(1) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(4) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u ") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(7) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->cutCodePointsAtEnd(8) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);

((string) $testStrObj->replace("bc a") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replace("bc b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}") === " a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === " a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{00F1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a", 'zzz') === " azzz\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replace("bc b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}", 'zzz') === " azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === " azzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replace("bc a\u{00F1}\u{00E4}\u{00F1}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}") === " a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === " a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{00F1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a", 'zzz') === " azzz\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}", 'zzz') === " azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === " azzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytes("bc a\u{00F1}\u{00E4}\u{00F1}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}") === " a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === " a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{00F1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a", 'zzz') === " azzz\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}", 'zzz') === " azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === " azzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePoints("bc a\u{00F1}\u{00E4}\u{00F1}b", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceIgnoreCase("bC a") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a", 'zzz') === " azzz\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a", 'zzz') === " azzz\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceBytesIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}") === " a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === " a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a", 'zzz') === " azzz\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}", 'zzz') === " azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}a", 'zzz') === " azzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{004E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceCodePointsIgnoreCase("bC a\u{00D1}\u{00C4}\u{00D1}b", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceFirst("a") === " bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirst("z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{00F1}") === " abc a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0303}\u{00E4}\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0303}\u{00E4}\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("a", 'zzz') === " zzzbc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirst("z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{00F1}", 'zzz') === " abc azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}zzza def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0303}\u{00E4}\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirst("\u{006E}\u{0303}\u{00E4}\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("a") === " bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{00F1}") === " abc a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0303}\u{00E4}\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0303}\u{00E4}\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("a", 'zzz') === " zzzbc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{00F1}", 'zzz') === " abc azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}zzza def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0303}\u{00E4}\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytes("\u{006E}\u{0303}\u{00E4}\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("a") === " bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{00F1}") === " abc a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("a", 'zzz') === " zzzbc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{00F1}", 'zzz') === " abc azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}zzza def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceFirstIgnoreCase("A") === " bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("Z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{00D1}") === " abc a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0303}") === " abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("A", 'zzz') === " zzzbc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("Z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{00D1}", 'zzz') === " abc azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}zzza def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("A") === " bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("Z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0303}") === " abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("A", 'zzz') === " zzzbc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("Z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}zzza def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("A") === " bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("Z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{00D1}") === " abc a\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0303}") === " abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("A", 'zzz') === " zzzbc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("Z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{00D1}", 'zzz') === " abc azzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}zzza def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceFirstCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replacePrefix(" abc ") === "a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abd ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F1}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc a\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === " def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc ", 'zzz') === "zzza\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abd ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F1}", 'zzz') === "zzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc a\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === "zzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix("bc a\u{006E}\u{0303}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefix(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc ") === "a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abd ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F1}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc a\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === " def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc ", 'zzz') === "zzza\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abd ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F1}", 'zzz') === "zzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc a\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === "zzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes("bc a\u{006E}\u{0303}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixBytes(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc ") === "a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abd ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F1}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc a\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === " def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc ", 'zzz') === "zzza\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abd ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F1}", 'zzz') === "zzz\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc a\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === "zzz def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints("bc a\u{006E}\u{0303}\u{00E4}\u{00F1}a", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replacePrefixCodePoints(" abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceLast("u") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303} 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLast("z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{00F1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0303}\u{00E4}\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0303}\u{00E4}\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("u", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}zzz 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLast("z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}zzzu 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{00F1}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 uzzz\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0303}\u{00E4}\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLast("\u{006E}\u{0303}\u{00E4}\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("u") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303} 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{00F1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0303}\u{00E4}\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0303}\u{00E4}\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("u", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}zzz 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}zzzu 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{00F1}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 uzzz\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0303}\u{00E4}\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytes("\u{006E}\u{0303}\u{00E4}\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("u") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303} 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{00F1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("u", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}zzz 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}zzzu 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{00F1}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 uzzz\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePoints("\u{006E}\u{0303}\u{00E4}\u{00F2}", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceLastIgnoreCase("U") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303} 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("Z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{00D1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("U", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}zzz 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("Z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}zzzu 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{00D1}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 uzzz\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("U") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303} 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("Z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("U", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}zzz 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("Z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}zzzu 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastBytesIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("U") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303} 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("Z") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0304}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{00D1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("U", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}zzz 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("Z", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0303}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}zzzu 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0304}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{00D1}", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 uzzz\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D1}", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceLastCodePointsIgnoreCase("\u{004E}\u{0303}\u{00E4}\u{00D2}", 'zzz') === $testStr) or \fail(__LINE__);

((string) $testStrObj->replaceSuffix(" 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(" 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(" 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("\u{0303}u 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("\u{0303}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("\u{0303}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 ") or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789 ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(" 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}uzzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(" 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix(" 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("\u{0303}u 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}zzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("\u{0303}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("\u{0303}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 zzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789 ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffix("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes(" 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes(" 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes(" 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("\u{0303}u 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("\u{0303}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("\u{0303}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 ") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789 ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes(" 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}uzzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes(" 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes(" 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("\u{0303}u 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}zzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("\u{0303}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("\u{0303}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 zzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789 ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixBytes("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints(" 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints(" 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints(" 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("\u{0303}u 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("\u{0303}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("\u{0303}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 ") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789 ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 78a ") === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints(" 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}uzzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints(" 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints(" 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("\u{0303}u 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}zzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("\u{0303}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("\u{0303}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ", 'zzz') === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 zzz") or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{00F1}\u{00DC}\u{006E}\u{0303}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789 ", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 789", 'zzz') === $testStr) or \fail(__LINE__);
((string) $testStrObj->replaceSuffixCodePoints("u\u{006E}\u{0303}\u{00DC}\u{00F1}u 78a ", 'zzz') === $testStr) or \fail(__LINE__);

(\implode('§', $testStrObj->split("a")) === " §bc §\u{00F1}\u{00E4}\u{006E}\u{0303}§ def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("z")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{00E4}")) === " abc a\u{00F1}§\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{00E5}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{1F468}\u{200D}\u{1F37C}")) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno § pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{1F468}\u{200D}\u{1F37D}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{006E}\u{0303}")) === " abc a\u{00F1}\u{00E4}§a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}§u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{006E}\u{0302}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("a", 2)) === " §bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("z", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{00E4}", 2)) === " abc a\u{00F1}§\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{00E5}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{1F468}\u{200D}\u{1F37C}", 2)) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno § pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{1F468}\u{200D}\u{1F37D}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{006E}\u{0303}", 2)) === " abc a\u{00F1}\u{00E4}§a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->split("\u{006E}\u{0302}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("a")) === " §bc §\u{00F1}\u{00E4}\u{006E}\u{0303}§ def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("z")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{00E4}")) === " abc a\u{00F1}§\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{00E5}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{1F468}\u{200D}\u{1F37C}")) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno § pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{1F468}\u{200D}\u{1F37D}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{006E}\u{0303}")) === " abc a\u{00F1}\u{00E4}§a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}§u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{006E}\u{0302}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("a", 2)) === " §bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("z", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{00E4}", 2)) === " abc a\u{00F1}§\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{00E5}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{1F468}\u{200D}\u{1F37C}", 2)) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno § pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{1F468}\u{200D}\u{1F37D}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{006E}\u{0303}", 2)) === " abc a\u{00F1}\u{00E4}§a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitBytes("\u{006E}\u{0302}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("a")) === " §bc §\u{00F1}\u{00E4}\u{006E}\u{0303}§ def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("z")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{00E4}")) === " abc a\u{00F1}§\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{00E5}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{1F468}\u{200D}\u{1F37C}")) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno § pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{1F468}\u{200D}\u{1F37D}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{006E}\u{0303}")) === " abc a\u{00F1}\u{00E4}§a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}§u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{006E}\u{0302}")) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("a", 2)) === " §bc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("z", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{00E4}", 2)) === " abc a\u{00F1}§\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{00E5}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{1F468}\u{200D}\u{1F37C}", 2)) === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno § pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{1F468}\u{200D}\u{1F37D}", 2)) === $testStr) or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{006E}\u{0303}", 2)) === " abc a\u{00F1}\u{00E4}§a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
(\implode('§', $testStrObj->splitCodePoints("\u{006E}\u{0302}", 2)) === $testStr) or \fail(__LINE__);

(\implode('§', Str::from(" abc aa def ghi jkl mno pqr 123 456 uu 789 ")->words()) === "abc§aa§def§ghi§jkl§mno§pqr§123§456§uu§789") or \fail(__LINE__);
(\implode('§', Str::from(" abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl mno pqr 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ")->words()) === "abc§a\u{00F1}\u{00E4}a§def§\u{231A}§ghi§\u{1F602}§jkl§mno§pqr§123§\u{00C5}\u{00C4}\u{212B}§456§u\u{00F1}\u{00DC}u§789") or \fail(__LINE__);
(\implode('§', Str::from(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ")->words()) === "abc§a\u{00F1}\u{00E4}\u{006E}\u{0303}a§def§\u{231A}§ghi§\u{1F602}§jkl§\u{1F1E6}\u{1F1F7}§mno§\u{1F468}\u{200D}\u{1F37C}§pqr§\u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F}§123§\u{00C5}\u{00C4}\u{212B}§456§u\u{00F1}\u{00DC}\u{006E}\u{0303}u§789") or \fail(__LINE__);
(\implode('§', Str::from(" abc aa def ghi jkl mno pqr 123 456 uu 789 ")->words(9)) === "abc§aa§def§ghi§jkl§mno§pqr§123§456") or \fail(__LINE__);
(\implode('§', Str::from(" abc a\u{00F1}\u{00E4}a def \u{231A} ghi \u{1F602} jkl mno pqr 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}u 789 ")->words(12)) === "abc§a\u{00F1}\u{00E4}a§def§\u{231A}§ghi§\u{1F602}§jkl§mno§pqr§123§\u{00C5}\u{00C4}\u{212B}§456") or \fail(__LINE__);
(\implode('§', Str::from(" abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ")->words(15)) === "abc§a\u{00F1}\u{00E4}\u{006E}\u{0303}a§def§\u{231A}§ghi§\u{1F602}§jkl§\u{1F1E6}\u{1F1F7}§mno§\u{1F468}\u{200D}\u{1F37C}§pqr§\u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F}§123§\u{00C5}\u{00C4}\u{212B}§456") or \fail(__LINE__);

((string) $testStrObj->beforeFirst("c") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("z") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("c a\u{00F1}") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("c a\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("c a\u{00F1}\u{00E4}\u{006E}\u{0303}") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("c a\u{00F1}\u{00E4}\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("c a\u{006E}\u{0303}\u{00E4}\u{00F1}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirst("c a\u{006E}\u{0303}\u{00E4}\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("z") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c a\u{00F1}") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c a\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c a\u{00F1}\u{00E4}\u{006E}\u{0303}") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c a\u{00F1}\u{00E4}\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c a\u{006E}\u{0303}\u{00E4}\u{00F1}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstBytes("c a\u{006E}\u{0303}\u{00E4}\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("z") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c a\u{00F1}") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c a\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c a\u{00F1}\u{00E4}\u{006E}\u{0303}") === " ab") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c a\u{00F1}\u{00E4}\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c a\u{006E}\u{0303}\u{00E4}\u{00F1}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeFirstCodePoints("c a\u{006E}\u{0303}\u{00E4}\u{00F2}") === "") or \fail(__LINE__);

((string) $testStrObj->beforeLast("u") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}") or \fail(__LINE__);
((string) $testStrObj->beforeLast("z") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLast("\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->beforeLast("\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLast("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->beforeLast("\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLast("\u{00F1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u") or \fail(__LINE__);
((string) $testStrObj->beforeLast("\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("u") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("z") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("\u{00F1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u") or \fail(__LINE__);
((string) $testStrObj->beforeLastBytes("\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("u") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("z") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("\u{006E}\u{0303}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("\u{00F1}") === " abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u") or \fail(__LINE__);
((string) $testStrObj->beforeLastCodePoints("\u{00F2}") === "") or \fail(__LINE__);

((string) $testStrObj->between("c a", "u 7") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}") or \fail(__LINE__);
((string) $testStrObj->between("c a", "u 8") === "") or \fail(__LINE__);
((string) $testStrObj->between("c z", "u 8") === "") or \fail(__LINE__);
((string) $testStrObj->between(" def ", " 456 ") === "\u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B}") or \fail(__LINE__);
((string) $testStrObj->between(" def ", " 457 ") === "") or \fail(__LINE__);
((string) $testStrObj->between(" deg ", " 457 ") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{00F1}", "\u{00DC}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->between("a\u{00F1}", "\u{00DD}") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{00F2}", "\u{00DD}") === "") or \fail(__LINE__);
((string) $testStrObj->between("f \u{231A} g", "\u{212B} 4") === "hi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}") or \fail(__LINE__);
((string) $testStrObj->between("f \u{231A} g", "\u{212B} 5") === "") or \fail(__LINE__);
((string) $testStrObj->between("f \u{231A} h", "\u{212B} 5") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{00F1}\u{00E4}\u{006E}\u{0303}a ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}u") === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456") or \fail(__LINE__);
((string) $testStrObj->between("a\u{00F1}\u{00E4}\u{006E}\u{0303}a ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}v") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{00F1}\u{00E4}\u{006E}\u{0303}b ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}v") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{006E}\u{0303}\u{00E4}\u{00F1}a ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}u") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{006E}\u{0303}\u{00E4}\u{00F1}a ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}v") === "") or \fail(__LINE__);
((string) $testStrObj->between("a\u{006E}\u{0303}\u{00E4}\u{00F1}b ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("c a", "u 7") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("c a", "u 8") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("c z", "u 8") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes(" def ", " 456 ") === "\u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B}") or \fail(__LINE__);
((string) $testStrObj->betweenBytes(" def ", " 457 ") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes(" deg ", " 457 ") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{00F1}", "\u{00DC}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{00F1}", "\u{00DD}") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{00F2}", "\u{00DD}") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("f \u{231A} g", "\u{212B} 4") === "hi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("f \u{231A} g", "\u{212B} 5") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("f \u{231A} h", "\u{212B} 5") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{00F1}\u{00E4}\u{006E}\u{0303}a ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}u") === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{00F1}\u{00E4}\u{006E}\u{0303}a ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{00F1}\u{00E4}\u{006E}\u{0303}b ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{006E}\u{0303}\u{00E4}\u{00F1}a ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}u") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{006E}\u{0303}\u{00E4}\u{00F1}a ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenBytes("a\u{006E}\u{0303}\u{00E4}\u{00F1}b ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("c a", "u 7") === "\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("c a", "u 8") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("c z", "u 8") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints(" def ", " 456 ") === "\u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B}") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints(" def ", " 457 ") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints(" deg ", " 457 ") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{00F1}", "\u{00DC}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{00F1}", "\u{00DD}") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{00F2}", "\u{00DD}") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("f \u{231A} g", "\u{212B} 4") === "hi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("f \u{231A} g", "\u{212B} 5") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("f \u{231A} h", "\u{212B} 5") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{00F1}\u{00E4}\u{006E}\u{0303}a ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}u") === "def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{00F1}\u{00E4}\u{006E}\u{0303}a ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{00F1}\u{00E4}\u{006E}\u{0303}b ", " u\u{00F1}\u{00DC}\u{006E}\u{0303}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{006E}\u{0303}\u{00E4}\u{00F1}a ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}u") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{006E}\u{0303}\u{00E4}\u{00F1}a ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}v") === "") or \fail(__LINE__);
((string) $testStrObj->betweenCodePoints("a\u{006E}\u{0303}\u{00E4}\u{00F1}b ", " u\u{006E}\u{0303}\u{00DC}\u{00F1}v") === "") or \fail(__LINE__);

((string) $testStrObj->afterFirst("c") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirst("z") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirst("c a\u{00F1}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirst("c a\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirst("c a\u{00F1}\u{00E4}\u{006E}\u{0303}") === "a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirst("c a\u{00F1}\u{00E4}\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirst("c a\u{006E}\u{0303}\u{00E4}\u{00F1}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirst("c a\u{006E}\u{0303}\u{00E4}\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("z") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c a\u{00F1}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c a\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c a\u{00F1}\u{00E4}\u{006E}\u{0303}") === "a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c a\u{00F1}\u{00E4}\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c a\u{006E}\u{0303}\u{00E4}\u{00F1}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstBytes("c a\u{006E}\u{0303}\u{00E4}\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c") === " a\u{00F1}\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("z") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c a\u{00F1}") === "\u{00E4}\u{006E}\u{0303}a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c a\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c a\u{00F1}\u{00E4}\u{006E}\u{0303}") === "a def \u{231A} ghi \u{1F602} jkl \u{1F1E6}\u{1F1F7} mno \u{1F468}\u{200D}\u{1F37C} pqr \u{1F575}\u{FE0F}\u{200D}\u{2640}\u{FE0F} 123 \u{00C5}\u{00C4}\u{212B} 456 u\u{00F1}\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c a\u{00F1}\u{00E4}\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c a\u{006E}\u{0303}\u{00E4}\u{00F1}") === "") or \fail(__LINE__);
((string) $testStrObj->afterFirstCodePoints("c a\u{006E}\u{0303}\u{00E4}\u{00F2}") === "") or \fail(__LINE__);

((string) $testStrObj->afterLast("u") === " 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLast("z") === "") or \fail(__LINE__);
((string) $testStrObj->afterLast("\u{0303}") === "u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLast("\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLast("\u{006E}\u{0303}") === "u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLast("\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLast("\u{00F1}") === "\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLast("\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("u") === " 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("z") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("\u{0303}") === "u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("\u{006E}\u{0303}") === "u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("\u{00F1}") === "\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastBytes("\u{00F2}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("u") === " 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("z") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("\u{0303}") === "u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("\u{006E}\u{0303}") === "u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("\u{006E}\u{0304}") === "") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("\u{00F1}") === "\u{00DC}\u{006E}\u{0303}u 789 ") or \fail(__LINE__);
((string) $testStrObj->afterLastCodePoints("\u{00F2}") === "") or \fail(__LINE__);

(Str::from(" abc a")->compareTo(" abc a") === 0) or \fail(__LINE__);
(Str::from(" abc a")->compareTo(" abc b") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareTo(" abc 9") > 0) or \fail(__LINE__);
(Str::from(" abc a")->compareTo(" abd a") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareTo(" abb a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareTo("abc a\u{00F1}") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareTo("abc a\u{00F2}") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareTo("abc a\u{00F0}") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareTo("abc a\u{0101}") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareTo("abc a\u{00E1}") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}9") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{00F1}\u{00E4}\u{006E}\u{0304}a") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{00F1}\u{00E4}\u{006E}\u{0302}a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{006E}\u{0303}\u{00E4}\u{00F2}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareTo("abc a\u{006E}\u{0303}\u{00E4}\u{00F0}a") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareTo("abc2") === 0) or \fail(__LINE__);
(Str::from("abc2")->compareTo("abc10") > 0) or \fail(__LINE__);
(Str::from("abc2")->compareTo("abc1") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareTo("abc\u{00F1}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareTo("abc\u{00F1}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareTo("abc\u{00F1}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{006E}\u{0303}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{006E}\u{0303}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{006E}\u{0303}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{00F1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{00F1}10") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{00F1}1") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareTo("abc2", true) === 0) or \fail(__LINE__);
(Str::from("abc2")->compareTo("abc10", true) < 0) or \fail(__LINE__);
(Str::from("abc2")->compareTo("abc1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareTo("abc\u{00F1}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareTo("abc\u{00F1}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareTo("abc\u{00F1}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{006E}\u{0303}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{006E}\u{0303}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{006E}\u{0303}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{00F1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{00F1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareTo("abc\u{00F1}1", true) !== 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytes(" abc a") === 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytes(" abc b") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytes(" abc 9") > 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytes(" abd a") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytes(" abb a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytes("abc a\u{00F1}") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytes("abc a\u{00F2}") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytes("abc a\u{00F0}") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytes("abc a\u{0101}") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytes("abc a\u{00E1}") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}9") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{00F1}\u{00E4}\u{006E}\u{0304}a") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{00F1}\u{00E4}\u{006E}\u{0302}a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{006E}\u{0303}\u{00E4}\u{00F2}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytes("abc a\u{006E}\u{0303}\u{00E4}\u{00F0}a") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytes("abc2") === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytes("abc10") > 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytes("abc1") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytes("abc\u{00F1}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytes("abc\u{00F1}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytes("abc\u{00F1}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{006E}\u{0303}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{006E}\u{0303}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{006E}\u{0303}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{00F1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{00F1}10") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{00F1}1") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytes("abc2", true) === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytes("abc10", true) < 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytes("abc1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytes("abc\u{00F1}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytes("abc\u{00F1}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytes("abc\u{00F1}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{006E}\u{0303}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{006E}\u{0303}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{006E}\u{0303}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{00F1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{00F1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytes("abc\u{00F1}1", true) !== 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePoints(" abc a") === 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePoints(" abc b") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePoints(" abc 9") > 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePoints(" abd a") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePoints(" abb a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePoints("abc a\u{00F1}") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePoints("abc a\u{00F2}") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePoints("abc a\u{00F0}") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePoints("abc a\u{0101}") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePoints("abc a\u{00E1}") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}b") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}9") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{00F1}\u{00E4}\u{006E}\u{0304}a") < 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{00F1}\u{00E4}\u{006E}\u{0302}a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{006E}\u{0303}\u{00E4}\u{00F1}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{006E}\u{0303}\u{00E4}\u{00F2}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePoints("abc a\u{006E}\u{0303}\u{00E4}\u{00F0}a") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePoints("abc2") === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePoints("abc10") > 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePoints("abc1") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePoints("abc\u{00F1}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePoints("abc\u{00F1}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePoints("abc\u{00F1}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{006E}\u{0303}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{006E}\u{0303}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{006E}\u{0303}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{00F1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{00F1}10") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{00F1}1") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePoints("abc2", true) === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePoints("abc10", true) < 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePoints("abc1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePoints("abc\u{00F1}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePoints("abc\u{00F1}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePoints("abc\u{00F1}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{006E}\u{0303}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{006E}\u{0303}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{006E}\u{0303}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{00F1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{00F1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePoints("abc\u{00F1}1", true) !== 0) or \fail(__LINE__);

(Str::from(" abc a")->compareToIgnoreCase(" aBC a") === 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToIgnoreCase(" aBC b") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToIgnoreCase(" aBC 9") > 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToIgnoreCase(" aBD a") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToIgnoreCase(" aBB a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToIgnoreCase("aBC a\u{00D1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToIgnoreCase("aBC a\u{00D2}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToIgnoreCase("aBC a\u{00D0}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToIgnoreCase("aBC a\u{00E1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToIgnoreCase("aBC a\u{00C1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0304}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0302}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D2}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D0}a") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToIgnoreCase("aBC2") === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToIgnoreCase("aBC10") > 0) or \fail(__LINE__);
(Str::from("abc2")->compareToIgnoreCase("aBC1") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToIgnoreCase("aBC\u{00D1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToIgnoreCase("aBC\u{00D1}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToIgnoreCase("aBC\u{00D1}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{004E}\u{0303}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{004E}\u{0303}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{004E}\u{0303}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{00D1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{00D1}10") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{00D1}1") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToIgnoreCase("aBC2", true) === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToIgnoreCase("aBC10", true) < 0) or \fail(__LINE__);
(Str::from("abc2")->compareToIgnoreCase("aBC1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToIgnoreCase("aBC\u{00D1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToIgnoreCase("aBC\u{00D1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToIgnoreCase("aBC\u{00D1}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{004E}\u{0303}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{004E}\u{0303}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{004E}\u{0303}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{00D1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{00D1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToIgnoreCase("aBC\u{00D1}1", true) !== 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytesIgnoreCase(" aBC a") === 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytesIgnoreCase(" aBC b") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytesIgnoreCase(" aBC 9") > 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytesIgnoreCase(" aBD a") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToBytesIgnoreCase(" aBB a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytesIgnoreCase("aBC a\u{00D1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytesIgnoreCase("aBC a\u{00D2}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytesIgnoreCase("aBC a\u{00D0}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytesIgnoreCase("aBC a\u{00E1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToBytesIgnoreCase("aBC a\u{00C1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0304}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0302}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D2}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToBytesIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D0}a") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytesIgnoreCase("aBC2") === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytesIgnoreCase("aBC10") > 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytesIgnoreCase("aBC1") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytesIgnoreCase("aBC\u{00D1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytesIgnoreCase("aBC\u{00D1}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytesIgnoreCase("aBC\u{00D1}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{004E}\u{0303}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{004E}\u{0303}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{004E}\u{0303}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{00D1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{00D1}10") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{00D1}1") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytesIgnoreCase("aBC2", true) === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytesIgnoreCase("aBC10", true) < 0) or \fail(__LINE__);
(Str::from("abc2")->compareToBytesIgnoreCase("aBC1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytesIgnoreCase("aBC\u{00D1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytesIgnoreCase("aBC\u{00D1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToBytesIgnoreCase("aBC\u{00D1}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{004E}\u{0303}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{004E}\u{0303}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{004E}\u{0303}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{00D1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{00D1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToBytesIgnoreCase("aBC\u{00D1}1", true) !== 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePointsIgnoreCase(" aBC a") === 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePointsIgnoreCase(" aBC b") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePointsIgnoreCase(" aBC 9") > 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePointsIgnoreCase(" aBD a") < 0) or \fail(__LINE__);
(Str::from(" abc a")->compareToCodePointsIgnoreCase(" aBB a") > 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePointsIgnoreCase("aBC a\u{00D1}") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePointsIgnoreCase("aBC a\u{00D2}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePointsIgnoreCase("aBC a\u{00D0}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePointsIgnoreCase("aBC a\u{00E1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}")->compareToCodePointsIgnoreCase("aBC a\u{00C1}") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}a") === 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0303}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0304}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{00D1}\u{00C4}\u{004E}\u{0302}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}b") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D1}9") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D2}a") !== 0) or \fail(__LINE__);
(Str::from("abc a\u{00F1}\u{00E4}\u{006E}\u{0303}a")->compareToCodePointsIgnoreCase("aBC a\u{004E}\u{0303}\u{00C4}\u{00D0}a") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePointsIgnoreCase("aBC2") === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePointsIgnoreCase("aBC10") > 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePointsIgnoreCase("aBC1") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{004E}\u{0303}2") === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{004E}\u{0303}10") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{004E}\u{0303}1") > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}2") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}10") !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}1") !== 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePointsIgnoreCase("aBC2", true) === 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePointsIgnoreCase("aBC10", true) < 0) or \fail(__LINE__);
(Str::from("abc2")->compareToCodePointsIgnoreCase("aBC1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{00F1}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{004E}\u{0303}2", true) === 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{004E}\u{0303}10", true) < 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{004E}\u{0303}1", true) > 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}2", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}10", true) !== 0) or \fail(__LINE__);
(Str::from("abc\u{006E}\u{0303}2")->compareToCodePointsIgnoreCase("aBC\u{00D1}1", true) !== 0) or \fail(__LINE__);

// END BYTES VS CODE POINTS VS GRAPHEME CLUSTERS

echo 'ALL TESTS PASSED' . "\n";
