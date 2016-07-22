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

assert(Str::from($testStr)->startsWith('He') === true);
assert(Str::from($testStr)->startsWith('he') === false);
assert(Str::from($testStr)->startsWith('el') === false);
assert(Str::from($testStr)->startsWith('El') === false);
assert(Str::from($testStr)->startsWithIgnoreCase('He') === true);
assert(Str::from($testStr)->startsWithIgnoreCase('he') === true);
assert(Str::from($testStr)->startsWithIgnoreCase('el') === false);
assert(Str::from($testStr)->startsWithIgnoreCase('El') === false);

assert(Str::from($testStr)->contains('o w') === true);
assert(Str::from($testStr)->contains('o W') === false);
assert(Str::from($testStr)->contains('m') === false);
assert(Str::from($testStr)->contains('M') === false);
assert(Str::from($testStr)->contains('He') === true);
assert(Str::from($testStr)->contains('he') === false);
assert(Str::from($testStr)->contains('ld') === true);
assert(Str::from($testStr)->contains('lD') === false);
assert(Str::from($testStr)->containsIgnoreCase('o w') === true);
assert(Str::from($testStr)->containsIgnoreCase('o W') === true);
assert(Str::from($testStr)->containsIgnoreCase('m') === false);
assert(Str::from($testStr)->containsIgnoreCase('M') === false);
assert(Str::from($testStr)->containsIgnoreCase('He') === true);
assert(Str::from($testStr)->containsIgnoreCase('he') === true);
assert(Str::from($testStr)->containsIgnoreCase('ld') === true);
assert(Str::from($testStr)->containsIgnoreCase('lD') === true);

assert(Str::from($testStr)->endsWith('ld') === true);
assert(Str::from($testStr)->endsWith('lD') === false);
assert(Str::from($testStr)->endsWith('rl') === false);
assert(Str::from($testStr)->endsWith('rL') === false);
assert(Str::from($testStr)->endsWithIgnoreCase('ld') === true);
assert(Str::from($testStr)->endsWithIgnoreCase('lD') === true);
assert(Str::from($testStr)->endsWithIgnoreCase('rl') === false);
assert(Str::from($testStr)->endsWithIgnoreCase('rL') === false);

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

assert((string) Str::from($testStr)->toLowerCase() === 'hello hello w☺rld w☺rld');
assert((string) Str::from($testStr)->toUpperCase() === 'HELLO HELLO W☺RLD W☺RLD');

assert((string) Str::from($testStr)->replace('Hello') === '  w☺rld w☺rld');
assert((string) Str::from($testStr)->replace('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');

assert(count(Str::from($testStr)->split(' ')) === 4);
assert(count(Str::from($testStr)->split(' ', 3)) === 3);
assert(count(Str::from($testStr)->split(' ', 5)) === 4);
assert(count(Str::from($testStr)->split(' Hello w☺rld ')) === 2);

assert(count(Str::from($testStr)->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/')) === 3);
assert(count(Str::from($testStr)->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 2)) === 2);
assert(count(Str::from($testStr)->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 4)) === 3);

assert((string) Str::from($testStr)->escapeForHtml() === $testStr);
assert((string) Str::from('<b>'.$testStr.'</b>')->escapeForHtml() === '&lt;b&gt;'.$testStr.'&lt;/b&gt;');

assert((string) Str::from($testStr)->normalizeLineEndings() === $testStr);
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings() === "a\nb\nc\nd".$testStr."a\nb\nc\nd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\r\n") === "a\r\nb\r\nc\r\nd".$testStr."a\r\nb\r\nc\r\nd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\r") === "a\rb\rc\rd".$testStr."a\rb\rc\rd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\n") === "a\nb\nc\nd".$testStr."a\nb\nc\nd");

assert(count(Str::from($testStr)) === 23);
assert(Str::from($testStr)->count() === 23);
assert(Str::from($testStr)->length() === 23);

echo 'ALL TESTS PASSED';
