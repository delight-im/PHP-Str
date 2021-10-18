<?php

/*
 * PHP-Str (https://github.com/delight-im/PHP-Str)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

// enable error reporting
\error_reporting(E_ALL);
\ini_set('display_errors', 'stdout');

// enable assertions
\ini_set('assert.active', 1);
@\ini_set('zend.assertions', 1);
\ini_set('assert.exception', 1);

\header('Content-type: text/html; charset=utf-8');

require __DIR__.'/../vendor/autoload.php';

use Delight\Str\Str;

$testStr = 'Hello Hello w☺rld w☺rld';
$testStrObj = Str::from($testStr);

assert($testStrObj->startsWith('He') === true);
assert($testStrObj->startsWith('he') === false);
assert($testStrObj->startsWith('el') === false);
assert($testStrObj->startsWith('El') === false);
assert($testStrObj->startsWith('') === false);
assert($testStrObj->startsWithIgnoreCase('He') === true);
assert($testStrObj->startsWithIgnoreCase('he') === true);
assert($testStrObj->startsWithIgnoreCase('el') === false);
assert($testStrObj->startsWithIgnoreCase('El') === false);
assert($testStrObj->startsWithIgnoreCase('') === false);

assert($testStrObj->contains('o w') === true);
assert($testStrObj->contains('o W') === false);
assert($testStrObj->contains('m') === false);
assert($testStrObj->contains('M') === false);
assert($testStrObj->contains('He') === true);
assert($testStrObj->contains('he') === false);
assert($testStrObj->contains('ld') === true);
assert($testStrObj->contains('lD') === false);
assert($testStrObj->contains('') === false);
assert($testStrObj->containsIgnoreCase('o w') === true);
assert($testStrObj->containsIgnoreCase('o W') === true);
assert($testStrObj->containsIgnoreCase('m') === false);
assert($testStrObj->containsIgnoreCase('M') === false);
assert($testStrObj->containsIgnoreCase('He') === true);
assert($testStrObj->containsIgnoreCase('he') === true);
assert($testStrObj->containsIgnoreCase('ld') === true);
assert($testStrObj->containsIgnoreCase('lD') === true);
assert($testStrObj->containsIgnoreCase('') === false);

assert($testStrObj->endsWith('ld') === true);
assert($testStrObj->endsWith('lD') === false);
assert($testStrObj->endsWith('rl') === false);
assert($testStrObj->endsWith('rL') === false);
assert($testStrObj->endsWith('') === false);
assert($testStrObj->endsWithIgnoreCase('ld') === true);
assert($testStrObj->endsWithIgnoreCase('lD') === true);
assert($testStrObj->endsWithIgnoreCase('rl') === false);
assert($testStrObj->endsWithIgnoreCase('rL') === false);
assert($testStrObj->endsWithIgnoreCase('') === false);

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

assert((string) $testStrObj->first() === 'H');
assert((string) $testStrObj->first(0) === '');
assert((string) $testStrObj->first(5) === 'Hello');
assert((string) $testStrObj->first(11) === 'Hello Hello');
assert((string) $testStrObj->first(13) === 'Hello Hello w');
assert((string) $testStrObj->first(14) === 'Hello Hello w☺');
assert((string) $testStrObj->first(15) === 'Hello Hello w☺r');

assert((string) $testStrObj->last() === 'd');
assert((string) $testStrObj->last(0) === '');
assert((string) $testStrObj->last(5) === 'w☺rld');
assert((string) $testStrObj->last(11) === 'w☺rld w☺rld');
assert((string) $testStrObj->last(13) === 'o w☺rld w☺rld');
assert((string) $testStrObj->last(14) === 'lo w☺rld w☺rld');
assert((string) $testStrObj->last(15) === 'llo w☺rld w☺rld');

assert((string) $testStrObj->toLowerCase() === 'hello hello w☺rld w☺rld');
assert($testStrObj->isLowerCase() === false);
assert($testStrObj->toLowerCase()->isLowerCase() === true);

assert((string) $testStrObj->toUpperCase() === 'HELLO HELLO W☺RLD W☺RLD');
assert($testStrObj->isUpperCase() === false);
assert($testStrObj->toUpperCase()->isUpperCase() === true);

assert($testStrObj->isCapitalized() === true);
assert($testStrObj->toLowerCase()->isCapitalized() === false);
assert($testStrObj->toUpperCase()->isCapitalized() === true);

assert((string) $testStrObj->truncate(5) === 'He...');
assert((string) $testStrObj->truncate(5, '…') === 'Hell…');
assert((string) $testStrObj->truncate(5, '') === 'Hello');
assert((string) $testStrObj->truncate(11) === 'Hello He...');
assert((string) $testStrObj->truncate(13) === 'Hello Hell...');
assert((string) $testStrObj->truncate(14) === 'Hello Hello...');
assert((string) $testStrObj->truncate(15) === 'Hello Hello ...');
assert((string) $testStrObj->truncate(22) === 'Hello Hello w☺rld w...');
assert((string) $testStrObj->truncate(23) === $testStr);
assert((string) $testStrObj->truncate(24) === $testStr);

assert((string) $testStrObj->truncateSafely(5) === 'He...');
assert((string) $testStrObj->truncateSafely(5, '…') === 'Hell…');
assert((string) $testStrObj->truncateSafely(5, '') === 'Hello');
assert((string) $testStrObj->truncateSafely(11) === 'Hello ...');
assert((string) $testStrObj->truncateSafely(13) === 'Hello ...');
assert((string) $testStrObj->truncateSafely(14) === 'Hello Hello...');
assert((string) $testStrObj->truncateSafely(15) === 'Hello Hello ...');
assert((string) $testStrObj->truncateSafely(23) === $testStr);
assert((string) $testStrObj->truncateSafely(24) === $testStr);

assert($testStrObj->count() === 23);
assert($testStrObj->length() === 23);
assert(count($testStrObj) === 23);

assert($testStrObj->count('l') === 6);
assert($testStrObj->count('lo') === 2);
assert($testStrObj->count('☺') === 2);
assert($testStrObj->count(' ') === 3);
assert($testStrObj->count('L') === 0);
assert($testStrObj->count('x') === 0);
assert($testStrObj->count('') === 0);

assert((string) $testStrObj->cutStart(0) === $testStr);
assert((string) $testStrObj->cutStart(2) === 'llo Hello w☺rld w☺rld');
assert((string) $testStrObj->cutStart(9) === 'lo w☺rld w☺rld');
assert((string) $testStrObj->cutStart(13) === '☺rld w☺rld');
assert((string) $testStrObj->cutStart(14) === 'rld w☺rld');
assert((string) $testStrObj->cutStart(15) === 'ld w☺rld');

assert((string) $testStrObj->cutEnd(0) === $testStr);
assert((string) $testStrObj->cutEnd(2) === 'Hello Hello w☺rld w☺r');
assert((string) $testStrObj->cutEnd(9) === 'Hello Hello w☺');
assert((string) $testStrObj->cutEnd(13) === 'Hello Hell');
assert((string) $testStrObj->cutEnd(14) === 'Hello Hel');
assert((string) $testStrObj->cutEnd(15) === 'Hello He');

assert((string) $testStrObj->replace('Hello') === '  w☺rld w☺rld');
assert((string) $testStrObj->replace('hello') === $testStr);
assert((string) $testStrObj->replace('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replace('hello', 'Bonjour') === $testStr);
assert((string) $testStrObj->replace('', 'x') === $testStr);
assert((string) $testStrObj->replace('', '') === $testStr);
assert((string) $testStrObj->replaceIgnoreCase('Hello') === '  w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('hello') === '  w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('Hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('hello', 'Bonjour') === 'Bonjour Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceIgnoreCase('', 'x') === $testStr);
assert((string) $testStrObj->replaceIgnoreCase('', '') === $testStr);

assert((string) $testStrObj->replaceFirst('el') === 'Hlo Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirst('el', 'eeel') === 'Heeello Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirst('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirst('hello', 'Bonjour') === $testStr);
assert((string) $testStrObj->replaceFirst('', 'x') === $testStr);
assert((string) $testStrObj->replaceFirst('', '') === $testStr);
assert((string) $testStrObj->replaceFirstIgnoreCase('Hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirstIgnoreCase('hello', 'Bonjour') === 'Bonjour Hello w☺rld w☺rld');
assert((string) $testStrObj->replaceFirstIgnoreCase('', 'x') === $testStr);
assert((string) $testStrObj->replaceFirstIgnoreCase('', '') === $testStr);

assert((string) $testStrObj->replacePrefix(' Hello') === $testStr);
assert((string) $testStrObj->replacePrefix('Hello ') === 'Hello w☺rld w☺rld');
assert((string) $testStrObj->replacePrefix('Hello ', 'Bonjour ') === 'Bonjour Hello w☺rld w☺rld');
assert((string) $testStrObj->replacePrefix('hello ', 'Bonjour ') === $testStr);
assert((string) $testStrObj->replacePrefix('', 'x') === $testStr);
assert((string) $testStrObj->replacePrefix('', '') === $testStr);

assert((string) $testStrObj->replaceLast('w') === 'Hello Hello w☺rld ☺rld');
assert((string) $testStrObj->replaceLast('w', 'www') === 'Hello Hello w☺rld www☺rld');
assert((string) $testStrObj->replaceLast('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceLast('hello', 'Bonjour') === $testStr);
assert((string) $testStrObj->replaceLast('', 'x') === $testStr);
assert((string) $testStrObj->replaceLast('', '') === $testStr);
assert((string) $testStrObj->replaceLastIgnoreCase('Hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceLastIgnoreCase('hello', 'Bonjour') === 'Hello Bonjour w☺rld w☺rld');
assert((string) $testStrObj->replaceLastIgnoreCase('', 'x') === $testStr);
assert((string) $testStrObj->replaceLastIgnoreCase('', '') === $testStr);

assert((string) $testStrObj->replaceSuffix('w☺rld ') === $testStr);
assert((string) $testStrObj->replaceSuffix(' w☺rld') === 'Hello Hello w☺rld');
assert((string) $testStrObj->replaceSuffix(' w☺rld', ' earth') === 'Hello Hello w☺rld earth');
assert((string) $testStrObj->replaceSuffix(' W☺rld', ' earth') === $testStr);
assert((string) $testStrObj->replaceSuffix('', 'x') === $testStr);
assert((string) $testStrObj->replaceSuffix('', '') === $testStr);

assert(count($testStrObj->split(' ')) === 4);
assert(count($testStrObj->split(' ', 3)) === 3);
assert(count($testStrObj->split(' ', 5)) === 4);
assert(count($testStrObj->split(' Hello w☺rld ')) === 2);
assert(count($testStrObj->split(' hello w☺rld ')) === 1);
assert(count($testStrObj->split('')) === 1);

assert(count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/')) === 3);
assert(count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 2)) === 2);
assert(count($testStrObj->splitByRegex('/ (?=[A-Z])|(?<=[a-z]) (?!.*? )/', 4)) === 3);

assert(count(Str::from('One, two; three and four! Five? It\'s six.')->words()) === 8);
assert(count(Str::from('One, two; three and four! Five? It\'s six.')->words(4)) === 4);
assert(implode(' + ', Str::from('One, two; three and four! Five? It\'s six.')->words(3)) === 'One + two + three');

assert((string) $testStrObj->beforeFirst('Hello') === '');
assert((string) $testStrObj->beforeFirst('o H') === 'Hell');
assert((string) $testStrObj->beforeFirst('d w☺rl') === 'Hello Hello w☺rl');
assert((string) $testStrObj->beforeFirst('w☺rld') === 'Hello Hello ');
assert((string) $testStrObj->beforeFirst('W☺rld') === '');
assert((string) $testStrObj->beforeFirst('x') === '');
assert((string) $testStrObj->beforeFirst('') === '');
assert((string) $testStrObj->beforeLast('Hello') === 'Hello ');
assert((string) $testStrObj->beforeLast('o H') === 'Hell');
assert((string) $testStrObj->beforeLast('d w☺rl') === 'Hello Hello w☺rl');
assert((string) $testStrObj->beforeLast('w☺rld') === 'Hello Hello w☺rld ');
assert((string) $testStrObj->beforeLast('hello') === '');
assert((string) $testStrObj->beforeLast('x') === '');
assert((string) $testStrObj->beforeLast('') === '');

assert((string) $testStrObj->between('Hello', 'w☺rld') === ' Hello w☺rld ');
assert((string) $testStrObj->between('w☺rld', 'w☺rld') === ' ');
assert((string) $testStrObj->between('w☺rld', 'Hello') === '');
assert((string) $testStrObj->between('hello', 'w☺rld') === '');
assert((string) $testStrObj->between('Hello', 'W☺rld') === '');
assert((string) $testStrObj->between('hello', 'W☺rld') === '');
assert((string) $testStrObj->between('x', 'y') === '');

assert((string) $testStrObj->afterFirst('Hello') === ' Hello w☺rld w☺rld');
assert((string) $testStrObj->afterFirst('o H') === 'ello w☺rld w☺rld');
assert((string) $testStrObj->afterFirst('d w☺rl') === 'd');
assert((string) $testStrObj->afterFirst('w☺rld') === ' w☺rld');
assert((string) $testStrObj->afterLast('Hello') === ' w☺rld w☺rld');
assert((string) $testStrObj->afterLast('o H') === 'ello w☺rld w☺rld');
assert((string) $testStrObj->afterLast('d w☺rl') === 'd');
assert((string) $testStrObj->afterLast('w☺rld') === '');

assert($testStrObj->matches('/(?:[a-z]+) ([a-z]+) (\S+) \S+/i') === true);
assert($testStrObj->matches('/[a-z]+ [a-z]+ \S+ \S+/') === false);
assert($testStrObj->matches('/[a-zA-Z]+ [a-zA-Z]+ \S+ \S+/') === true);
assert($testStrObj->matches('/[a-z]/', $matches, true) === true);
assert(count($matches[0]) === 16);

assert(Str::from('bb')->equals('aa') === false);
assert(Str::from('bb')->equals('b') === false);
assert(Str::from('bb')->equals('bb') === true);
assert(Str::from('bb')->equals('bbb') === false);
assert(Str::from('bb')->equals('cc') === false);
assert(Str::from('bb')->equals('AA') === false);
assert(Str::from('bb')->equals('B') === false);
assert(Str::from('bb')->equals('BB') === false);
assert(Str::from('bb')->equals('BBB') === false);
assert(Str::from('bb')->equals('CC') === false);

assert(Str::from('bb')->equalsIgnoreCase('aa') === false);
assert(Str::from('bb')->equalsIgnoreCase('b') === false);
assert(Str::from('bb')->equalsIgnoreCase('bb') === true);
assert(Str::from('bb')->equalsIgnoreCase('bbb') === false);
assert(Str::from('bb')->equalsIgnoreCase('cc') === false);
assert(Str::from('bb')->equalsIgnoreCase('AA') === false);
assert(Str::from('bb')->equalsIgnoreCase('B') === false);
assert(Str::from('bb')->equalsIgnoreCase('BB') === true);
assert(Str::from('bb')->equalsIgnoreCase('BBB') === false);
assert(Str::from('bb')->equalsIgnoreCase('CC') === false);

assert($testStrObj->compareTo('g') < 0);
assert($testStrObj->compareTo('G') > 0);
assert($testStrObj->compareTo('hey') < 0);
assert($testStrObj->compareTo('Hey') < 0);
assert($testStrObj->compareTo('i') < 0);
assert($testStrObj->compareTo('I') < 0);
assert(Str::from('Chapter 2')->compareTo('chapter 2') < 0);
assert(Str::from('Chapter 2')->compareTo('Chapter 2') === 0);
assert(Str::from('Chapter 2')->compareTo('chapter 5') < 0);
assert(Str::from('Chapter 2')->compareTo('Chapter 5') < 0);
assert(Str::from('Chapter 2')->compareTo('chapter 10') < 0);
assert(Str::from('Chapter 2')->compareTo('Chapter 10') > 0);
assert(Str::from('Chapter 2')->compareTo('chapter 2', true) < 0);
assert(Str::from('Chapter 2')->compareTo('Chapter 2', true) === 0);
assert(Str::from('Chapter 2')->compareTo('chapter 5', true) < 0);
assert(Str::from('Chapter 2')->compareTo('Chapter 5', true) < 0);
assert(Str::from('Chapter 2')->compareTo('chapter 10', true) < 0);
assert(Str::from('Chapter 2')->compareTo('Chapter 10', true) < 0);

assert($testStrObj->compareToIgnoreCase('g') > 0);
assert($testStrObj->compareToIgnoreCase('G') > 0);
assert($testStrObj->compareToIgnoreCase('hey') < 0);
assert($testStrObj->compareToIgnoreCase('Hey') < 0);
assert($testStrObj->compareToIgnoreCase('i') < 0);
assert($testStrObj->compareToIgnoreCase('I') < 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('chapter 2') === 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 2') === 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('chapter 5') < 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 5') < 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('chapter 10') > 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 10') > 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('chapter 2', true) === 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 2', true) === 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('chapter 5', true) < 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 5', true) < 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('chapter 10', true) < 0);
assert(Str::from('Chapter 2')->compareToIgnoreCase('Chapter 10', true) < 0);

assert((string) $testStrObj->escapeForHtml() === $testStr);
assert((string) Str::from('<b>'.$testStr.'</b>')->escapeForHtml() === '&lt;b&gt;'.$testStr.'&lt;/b&gt;');

assert((string) $testStrObj->normalizeLineEndings() === $testStr);
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings() === "a\nb\nc\nd".$testStr."a\nb\nc\nd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\r\n") === "a\r\nb\r\nc\r\nd".$testStr."a\r\nb\r\nc\r\nd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\r") === "a\rb\rc\rd".$testStr."a\rb\rc\rd");
assert((string) Str::from("a\r\nb\nc\rd".$testStr."a\r\nb\nc\rd")->normalizeLineEndings("\n") === "a\nb\nc\nd".$testStr."a\nb\nc\nd");

assert((string) $testStrObj->reverse() === 'dlr☺w dlr☺w olleH olleH');

assert((string) Str::from('Hyper Text Markup Language')->acronym() === 'HTML');
assert((string) Str::from('Cascading Style Sheets')->acronym() === 'CSS');
assert((string) Str::from('PHP: Hypertext Preprocessor')->acronym() === 'PHP');
assert((string) Str::from('Light Amplification by Stimulated Emission of Radiation')->acronym(true) === 'LASER');

echo 'ALL TESTS PASSED';
