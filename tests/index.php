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

$testStr = "Hello w☺rld";

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

assert((string) Str::from($testStr)->escapeForHtml() === $testStr);
assert((string) Str::from('<b>'.$testStr.'</b>')->escapeForHtml() === '&lt;b&gt;'.$testStr.'&lt;/b&gt;');

assert(count(Str::from($testStr)) === 11);
assert(Str::from($testStr)->count() === 11);
assert(Str::from($testStr)->length() === 11);
