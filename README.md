# PHP-Str

Convenient object-oriented operations on strings

## Requirements

 * PHP 5.3.0+

## Installation

 * Install via [Composer](https://getcomposer.org/) (recommended)

   `$ composer require delight-im/str`

   Include the Composer autoloader:

   `require __DIR__.'/vendor/autoload.php';`

 * or

 * Install manually

   * Copy the contents of the [`src`](src) directory to a subfolder of your project
   * Include the files in your code via `require` or `require_once`

## Usage

Creating instances from any string:

```php
new Str('Hello w☺rld')
// or
new Str('Hello w☺rld', 'UTF-8')
// or
Str::from('Hello world')
// or
Str::from('Hello world', 'ISO-8859-1')
```

Chaining methods:

```php
new Str('Hello w☺rld')->containsIgnoreCase('W☺') // => bool(true)
// or
new Str('<b>Hello w☺rld</b>')->escapeForHtml()->containsIgnoreCase('<b>') // => bool(false)
```

Methods available on instances:

```php
/**
 * Returns whether this string starts with the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $prefix the other string to search for
 * @return bool whether the supplied other string can be found at the beginning of this string
 */
public function startsWith($prefix);

/**
 * Returns whether this string starts with the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $prefix the other string to search for
 * @return bool whether the supplied other string can be found at the beginning of this string
 */
public function startsWithIgnoreCase($prefix);

/**
 * Returns whether this string contains the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $infix the other string to search for
 * @return bool whether the supplied other string is contained in this string
 */
public function contains($infix);

/**
 * Returns whether this string contains the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $infix the other string to search for
 * @return bool whether the supplied other string is contained in this string
 */
public function containsIgnoreCase($infix);

/**
 * Returns whether this string ends with the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $suffix the other string to search for
 * @return bool whether the supplied other string can be found at the end of this string
 */
public function endsWith($suffix);

/**
 * Returns whether this string ends with the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $suffix the other string to search for
 * @return bool whether the supplied other string can be found at the end of this string
 */
public function endsWithIgnoreCase($suffix);

/**
 * Escapes this string for safe use in HTML
 *
 * @return static this instance for chaining
 */
public function escapeForHtml();

/**
 * Alias of `count`
 *
 * @return int
 */
public function length();
```

Checking the length of an instance:

```php
count($strInstance)
```

## Contributing

All contributions are welcome! If you wish to contribute, please create an issue first so that your feature, problem or question can be discussed.

## License

```
Copyright (c) delight.im <info@delight.im>

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```
