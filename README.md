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

Usually, you'll want to set up the following shorthand in your PHP code:

```php
function s($str, $charset = null) {
    return new \Delight\Str\Str($str, $charset);
}
```

This lets you create string objects by simply wrapping strings in `s(...)`.

With that shorthand in place, creating instances from any string is as simple as this:

```php
s('Hello w☺rld')
// or
s('Hello w☺rld', 'UTF-8')
// or
s('Hello world', 'ISO-8859-1')
```

Chaining methods:

```php
s('Hello w☺rld')->containsIgnoreCase('W☺') // => bool(true)
// or
s('<b>Hello w☺rld</b>')->escapeForHtml()->containsIgnoreCase('<b>') // => bool(false)
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
 * Converts this string to lowercase
 *
 * @return static this instance for chaining
 */
public function toLowerCase();

/**
 * Converts this string to uppercase
 *
 * @return static this instance for chaining
 */
public function toUpperCase();

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

This project is licensed under the terms of the [MIT License](https://opensource.org/licenses/MIT).
