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

Usually, you'll want to set up the following shorthand in the global namespace of your PHP code:

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

### Available methods

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


// -----------------------------------------------------------------------------


/**
 * Returns whether this string starts with the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $prefix the other string to search for
 * @return bool whether the supplied other string can be found at the beginning of this string
 */
public function startsWithIgnoreCase($prefix);


// -----------------------------------------------------------------------------


/**
 * Returns whether this string contains the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $infix the other string to search for
 * @return bool whether the supplied other string is contained in this string
 */
public function contains($infix);


// -----------------------------------------------------------------------------


/**
 * Returns whether this string contains the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $infix the other string to search for
 * @return bool whether the supplied other string is contained in this string
 */
public function containsIgnoreCase($infix);


// -----------------------------------------------------------------------------


/**
 * Returns whether this string ends with the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $suffix the other string to search for
 * @return bool whether the supplied other string can be found at the end of this string
 */
public function endsWith($suffix);


// -----------------------------------------------------------------------------


/**
 * Returns whether this string ends with the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $suffix the other string to search for
 * @return bool whether the supplied other string can be found at the end of this string
 */
public function endsWithIgnoreCase($suffix);


// -----------------------------------------------------------------------------


/**
 * Removes all whitespace or the specified characters from both sides of this string
 *
 * @param string $charactersToRemove the characters to remove (optional)
 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
 * @return static this instance for chaining
 */
public function trim($charactersToRemove = null, $alwaysRemoveWhitespace = null);


// -----------------------------------------------------------------------------


/**
 * Removes all whitespace or the specified characters from the start of this string
 *
 * @param string $charactersToRemove the characters to remove (optional)
 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
 * @return static this instance for chaining
 */
public function trimStart($charactersToRemove = null, $alwaysRemoveWhitespace = null);


// -----------------------------------------------------------------------------


/**
 * Removes all whitespace or the specified characters from the end of this string
 *
 * @param string $charactersToRemove the characters to remove (optional)
 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
 * @return static this instance for chaining
 */
public function trimEnd($charactersToRemove = null, $alwaysRemoveWhitespace = null);


// -----------------------------------------------------------------------------


/**
 * Converts this string to lowercase
 *
 * @return static this instance for chaining
 */
public function toLowerCase();


// -----------------------------------------------------------------------------


/**
 * Converts this string to uppercase
 *
 * @return static this instance for chaining
 */
public function toUpperCase();


// -----------------------------------------------------------------------------


/**
 * Replaces all occurrences of the specified search string with the given replacement
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static this instance for chaining
 */
public function replace($searchFor, $replaceWith = null);


// -----------------------------------------------------------------------------


/**
 * Replaces all occurrences of the specified search string with the given replacement
 *
 * This operation is case-insensitive
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
public function replaceIgnoreCase($searchFor, $replaceWith = null);


// -----------------------------------------------------------------------------


/**
 * Replaces the first occurrence of the specified search string with the given replacement
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
public function replaceFirst($searchFor, $replaceWith = null);


// -----------------------------------------------------------------------------


/**
 * Replaces the first occurrence of the specified search string with the given replacement
 *
 * This operation is case-insensitive
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
public function replaceFirstIgnoreCase($searchFor, $replaceWith = null);


// -----------------------------------------------------------------------------


/**
 * Replaces the last occurrence of the specified search string with the given replacement
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
public function replaceLast($searchFor, $replaceWith = null);


// -----------------------------------------------------------------------------


/**
 * Replaces the last occurrence of the specified search string with the given replacement
 *
 * This operation is case-insensitive
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
public function replaceLastIgnoreCase($searchFor, $replaceWith = null);


// -----------------------------------------------------------------------------


/**
 * Splits this string into an array of substrings at the specified delimiter
 *
 * @param string $delimiter the delimiter to split the string at
 * @param int|null $limit the maximum number of substrings to return (optional)
 * @return static[] an array containing the substrings (which are instances of this class as well)
 */
public function split($delimiter, $limit = null);


// -----------------------------------------------------------------------------


/**
 * Splits this string into an array of substrings at the specified delimiter pattern
 *
 * @param string $delimiterPattern the regular expression (PCRE) to split the string at
 * @param int|null $limit the maximum number of substrings to return (optional)
 * @param int|null $flags any combination (bit-wise ORed) of PHP's `PREG_SPLIT_*` flags
 * @return static[] an array containing the substrings (which are instances of this class as well)
 */
public function splitByRegex($delimiterPattern, $limit = null, $flags = null);


// -----------------------------------------------------------------------------


/**
 * Returns the part of this string between the two specified substrings
 *
 * If there are multiple occurrences, the part with the maximum length will be returned
 *
 * @param string $start the substring whose first occurrence should delimit the start
 * @param string $end the substring whose last occurrence should delimit the end
 * @return static a new instance of this class
 */
public function between($start, $end);


// -----------------------------------------------------------------------------


/**
 * Escapes this string for safe use in HTML
 *
 * @return static this instance for chaining
 */
public function escapeForHtml();


// -----------------------------------------------------------------------------


/**
 * Normalizes all line endings in this string by using a single unified newline sequence (which may be specified manually)
 *
 * @param string|null $newlineSequence the target newline sequence to use (optional)
 * @return static this instance for chaining
 */
public function normalizeLineEndings($newlineSequence = null);
```

### Checking the length of a string

```php
$length = count($strInstance);
// or
$length = $strInstance->length();
```

### Creating instances from all entries in an array

```php
$instances = \Delight\Str\Str::fromArray($arrayOfStrings);
```

## Contributing

All contributions are welcome! If you wish to contribute, please create an issue first so that your feature, problem or question can be discussed.

## License

This project is licensed under the terms of the [MIT License](https://opensource.org/licenses/MIT).
