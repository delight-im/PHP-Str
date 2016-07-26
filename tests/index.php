<?php

/*
 * PHP-Str (https://github.com/delight-im/PHP-Str)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

// enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'stdout');

// enable assertions
ini_set('assert.active', 1);
ini_set('zend.assertions', 1);
ini_set('assert.exception', 1);

header('Content-type: text/html; charset=utf-8');

require __DIR__.'/../vendor/autoload.php';

use Delight\Str\Str;

$testStr = 'Hello Hello w☺rld w☺rld';
$testStrObj = Str::from($testStr);

assert($testStrObj->startsWith('He') === true);
assert($testStrObj->startsWith('he') === false);
assert($testStrObj->startsWith('el') === false);
assert($testStrObj->startsWith('El') === false);
assert($testStrObj->startsWithIgnoreCase('He') === true);
assert($testStrObj->startsWithIgnoreCase('he') === true);
assert($testStrObj->startsWithIgnoreCase('el') === false);
assert($testStrObj->startsWithIgnoreCase('El') === false);

assert($testStrObj->contains('o w') === true);
assert($testStrObj->contains('o W') === false);
assert($testStrObj->contains('m') === false);
assert($testStrObj->contains('M') === false);
assert($testStrObj->contains('He') === true);
assert($testStrObj->contains('he') === false);
assert($testStrObj->contains('ld') === true);
assert($testStrObj->contains('lD') === false);
assert($testStrObj->containsIgnoreCase('o w') === true);
assert($testStrObj->containsIgnoreCase('o W') === true);
assert($testStrObj->containsIgnoreCase('m') === false);
assert($testStrObj->containsIgnoreCase('M') === false);
assert($testStrObj->containsIgnoreCase('He') === true);
assert($testStrObj->containsIgnoreCase('he') === true);
assert($testStrObj->containsIgnoreCase('ld') === true);
assert($testStrObj->containsIgnoreCase('lD') === true);

assert($testStrObj->endsWith('ld') === true);
assert($testStrObj->endsWith('lD') === false);
assert($testStrObj->endsWith('rl') === false);
assert($testStrObj->endsWith('rL') === false);
assert($testStrObj->endsWithIgnoreCase('ld') === true);
assert($testStrObj->endsWithIgnoreCase('lD') === true);
assert($testStrObj->endsWithIgnoreCase('rl') === false);
assert($testStrObj->endsWithIgnoreCase('rL') === false);

assert((string) Str::from(" \r\n".$testStr." \n")->trim() === $testStr);
assert((string) Str::from(" \r\n".$testStr." \n")->trim('ab') === " \r\n".$testStr." \n");
assert((string) Str::from("ab cd".$testStr." d c b a")->trim('ab') === " cd".$testStr." d c b ");
assert((string) Str::from("ab cd".$testStr." d c b a")->trim('ab', true) === "cd".$testStr." d c");

assert((string) Str::from(" \r\n".$testStr." \n")->trimStart() === $testStr." \n");
assert((string) Str::from(" \r\n".$testStr." \n")->trimStart('ab') === " \r\n".$testStr." \n");
assert((string) Str::from("ab cd".$testStr." d c b a")->trimStart('ab') === " cd".$testStr." d c b a");
assert((string) Str::from("ab cd".$testStr." d c b a")->trimStart('ab', true) === "cd".$testStr." d c b a");

assert((string) Str::from(" \r\n".$testStr." \n")->trimEnd() === " \r\n".$testStr);
assert((string) Str::from(" \r\n".$testStr." \n")->trimEnd('ab') === " \r\n".$testStr." \n");
assert((string) Str::from("ab cd".$testStr." d c b a")->trimEnd('ab') === "ab cd".$testStr." d c b ");
assert((string) Str::from("ab cd".$testStr." d c b a")->trimEnd('ab', true) === "ab cd".$testStr." d c");

assert((string) $testStrObj->start() === 'H');
assert((string) $testStrObj->start(0) === '');
assert((string) $testStrObj->start(5) === 'Hello');
assert((string) $testStrObj->start(11) === 'Hello Hello');
assert((string) $testStrObj->start(13) === 'Hello Hello w');
assert((string) $testStrObj->start(14) === 'Hello Hello w☺');
assert((string) $testStrObj->start(15) === 'Hello Hello w☺r');

assert((string) $testStrObj->end() === 'd');
assert((string) $testStrObj->end(0) === '');
assert((string) $testStrObj->end(5) === 'w☺rld');
assert((string) $testStrObj->end(11) === 'w☺rld w☺rld');
assert((string) $testStrObj->end(13) === 'o w☺rld w☺rld');
assert((string) $testStrObj->end(14) === 'lo w☺rld w☺rld');
assert((string) $testStrObj->end(15) === 'llo w☺rld w☺rld');

assert((string) $testStrObj->toLowerCase() === 'hello hello w☺rld w☺rld');
assert((string) $testStrObj->toUpperCase() === 'HELLO HELLO W☺RLD W☺RLD');

assert((string) $testStrObj->replace('Hello') === '  w☺rld w☺rld');
assert((string) $testStrObj->replace('hello') === $testStr);
assert((string) $testStrObj->replace('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replace('hello', 'Bonjour') === $testStr);
assert((string) $testStrObj->replaceIgnoreCase('Hello') === '  w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('hello') === '  w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');

assert((string) $testStrObj->replaceFirst('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirst('hello', 'Bonjour') === $testStr);
assert((string) $testStrObj->replaceFirstIgnoreCase('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirstIgnoreCase('hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld');

assert((string) $testStrObj->replaceLast('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceLast('hello', 'Bonjour') === $testStr);
assert((string) $testStrObj->replaceLastIgnoreCase('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceLastIgnoreCase('hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld');

assert(count($testStrObj->split(' ')) === 4);
assert(count($testStrObj->split(' ', 3)) === 3);
assert(count($testStrObj->split(' ', 5)) === 4);
assert(count($testStrObj->split(' Hello w☺rld ')) === 2);

assert(count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/')) === 3);
assert(count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 2)) === 2);
assert(count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 4)) === 3);

assert((string) $testStrObj->beforeFirst('Hello') === '');
assert((string) $testStrObj->beforeFirst('o H') === 'Hell');
assert((string) $testStrObj->beforeFirst('d w☺rl') === 'Hello Hello w☺rl');
assert((string) $testStrObj->beforeFirst('w☺rld') === 'Hello Hello ');
assert((string) $testStrObj->beforeLast('Hello') === 'Hello ');
assert((string) $testStrObj->beforeLast('o H') === 'Hell');
assert((string) $testStrObj->beforeLast('d w☺rl') === 'Hello Hello w☺rl');
assert((string) $testStrObj->beforeLast('w☺rld') === 'Hello Hello w☺rld ');

assert((string) $testStrObj->between('Hello', 'w☺rld') === ' Hello w☺rld ');
assert((string) $testStrObj->between('w☺rld', 'w☺rld') === ' ');
assert((string) $testStrObj->between('w☺rld', 'Hello') === '');

assert((string) $testStrObj->afterFirst('Hello') === ' Hello w☺rld w☺rld');
assert((string) $testStrObj->afterFirst('o H') === 'ello w☺rld w☺rld');
assert((string) $testStrObj->afterFirst('d w☺rl') === 'd');
assert((string) $testStrObj->afterFirst('w☺rld') === ' w☺rld');
assert((string) $testStrObj->afterLast('Hello') === ' w☺rld w☺rld');
assert((string) $testStrObj->afterLast('o H') === 'ello w☺rld w☺rld');
assert((string) $testStrObj->afterLast('d w☺rl') === 'd');
assert((string) $testStrObj->afterLast('w☺rld') === '');

assert((string) $testStrObj->escapeForHtml() === $testStr);
assert((string) Str::from('<b>'.$testStr.'</b>')->escapeForHtml() === '&lt;b&gt;'.$testStr.'&lt;/b&gt;');

assert((string) $testStrObj->normalizeLineEndings() === $testStr);
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings() === "a\nb\nc\nd".$testStr."a\nb\nc\nd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\r\n") === "a\r\nb\r\nc\r\nd".$testStr."a\r\nb\r\nc\r\nd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\r") === "a\rb\rc\rd".$testStr."a\rb\rc\rd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\n") === "a\nb\nc\nd".$testStr."a\nb\nc\nd");

assert((string) $testStrObj->reverse() === 'dlr☺w dlr☺w olleH olleH');

assert(count($testStrObj) === 23);
assert($testStrObj->count() === 23);
assert($testStrObj->length() === 23);

echo 'ALL TESTS PASSED';
