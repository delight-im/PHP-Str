# PHP-Str

Convenient object-oriented operations on strings

## Requirements

 * PHP 5.3.0+
   * Multibyte String extension (`mbstring`)

## Installation

 1. Include the library via Composer [[?]](https://github.com/delight-im/Knowledge/blob/master/Composer%20(PHP).md):

    ```
    $ composer require delight-im/str
    ```

 1. Include the Composer autoloader:

    ```php
    require __DIR__ . '/vendor/autoload.php';
    ```

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
$str = s('Hello w☺rld');
// or
$str = s('Hello w☺rld', 'UTF-8');
```

If you don’t want to set up that shorthand, however, you can still create instances easily:

```php
$str = \Delight\Str\Str::from('Hello w☺rld');
// or
$str = \Delight\Str\Str::from('Hello w☺rld', 'UTF-8');
```

### Available methods

 * `startsWith`
   * `startsWithBytes`
   * `startsWithCodePoints`
 * `startsWithIgnoreCase`
   * `startsWithBytesIgnoreCase`
   * `startsWithCodePointsIgnoreCase`
 * `contains`
   * `containsBytes`
   * `containsCodePoints`
 * `containsIgnoreCase`
   * `containsBytesIgnoreCase`
   * `containsCodePointsIgnoreCase`
 * `endsWith`
   * `endsWithBytes`
   * `endsWithCodePoints`
 * `endsWithIgnoreCase`
   * `endsWithBytesIgnoreCase`
   * `endsWithCodePointsIgnoreCase`
 * `trim`
 * `trimStart`
 * `trimEnd`
 * `first`
   * `firstBytes`
   * `firstCodePoints`
 * `last`
   * `lastBytes`
   * `lastCodePoints`
 * `byteAt`
 * `codePointAt`
 * `isEmpty`
 * `isAscii`
 * `isPrintableAscii`
 * `toLowerCase`
   * `toLowerCaseBytes`
   * `toLowerCaseCodePoints`
 * `isLowerCase`
 * `toUpperCase`
   * `toUpperCaseBytes`
   * `toUpperCaseCodePoints`
 * `isUpperCase`
 * `isCapitalized`
 * `truncate`
   * `truncateBytes`
   * `truncateCodePoints`
 * `truncateSafely`
   * `truncateBytesSafely`
   * `truncateCodePointsSafely`
 * `count`
   * `countBytes`
   * `countCodePoints`
 * `length`
   * `lengthInBytes`
   * `lengthInCodePoints`
 * `cutStart`
   * `cutBytesAtStart`
   * `cutCodePointsAtStart`
 * `cutEnd`
   * `cutBytesAtEnd`
   * `cutCodePointsAtEnd`
 * `replace`
   * `replaceBytes`
   * `replaceCodePoints`
 * `replaceIgnoreCase`
   * `replaceBytesIgnoreCase`
   * `replaceCodePointsIgnoreCase`
 * `replaceFirst`
   * `replaceFirstBytes`
   * `replaceFirstCodePoints`
 * `replaceFirstIgnoreCase`
   * `replaceFirstBytesIgnoreCase`
   * `replaceFirstCodePointsIgnoreCase`
 * `replacePrefix`
   * `replacePrefixBytes`
   * `replacePrefixCodePoints`
 * `replaceLast`
   * `replaceLastBytes`
   * `replaceLastCodePoints`
 * `replaceLastIgnoreCase`
   * `replaceLastBytesIgnoreCase`
   * `replaceLastCodePointsIgnoreCase`
 * `replaceSuffix`
   * `replaceSuffixBytes`
   * `replaceSuffixCodePoints`
 * `split`
   * `splitBytes`
   * `splitCodePoints`
 * `splitByRegex`
 * `words`
 * `beforeFirst`
 * `beforeLast`
 * `between`
 * `afterFirst`
 * `afterLast`
 * `matches`
 * `equals`
 * `equalsIgnoreCase`
 * `compareTo`
 * `compareToIgnoreCase`
 * `escapeForHtml`
 * `normalizeLineEndings`
 * `reverse`
 * `acronym`

```php
/**
 * Returns whether this string starts with the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $prefix the other string to search for
 * @return bool whether the supplied other string can be found at the beginning of this string
 */
function startsWith($prefix);
function startsWithBytes($prefix);
function startsWithCodePoints($prefix);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string starts with the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $prefix the other string to search for
 * @return bool whether the supplied other string can be found at the beginning of this string
 */
function startsWithIgnoreCase($prefix);
function startsWithBytesIgnoreCase($prefix);
function startsWithCodePointsIgnoreCase($prefix);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string contains the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $infix the other string to search for
 * @return bool whether the supplied other string is contained in this string
 */
function contains($infix);
function containsBytes($infix);
function containsCodePoints($infix);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string contains the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $infix the other string to search for
 * @return bool whether the supplied other string is contained in this string
 */
function containsIgnoreCase($infix);
function containsBytesIgnoreCase($infix);
function containsCodePointsIgnoreCase($infix);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string ends with the supplied other string
 *
 * This operation is case-sensitive
 *
 * @param string $suffix the other string to search for
 * @return bool whether the supplied other string can be found at the end of this string
 */
function endsWith($suffix);
function endsWithBytes($suffix);
function endsWithCodePoints($suffix);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string ends with the supplied other string
 *
 * This operation is case-insensitive
 *
 * @param string $suffix the other string to search for
 * @return bool whether the supplied other string can be found at the end of this string
 */
function endsWithIgnoreCase($suffix);
function endsWithBytesIgnoreCase($suffix);
function endsWithCodePointsIgnoreCase($suffix);


////////////////////////////////////////////////////////////////////////////////


/**
 * Removes all whitespace or the specified characters from both sides of this string
 *
 * @param string $charactersToRemove the characters to remove (optional)
 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
 * @return static this instance for chaining
 */
function trim($charactersToRemove = null, $alwaysRemoveWhitespace = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Removes all whitespace or the specified characters from the start of this string
 *
 * @param string $charactersToRemove the characters to remove (optional)
 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
 * @return static this instance for chaining
 */
function trimStart($charactersToRemove = null, $alwaysRemoveWhitespace = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Removes all whitespace or the specified characters from the end of this string
 *
 * @param string $charactersToRemove the characters to remove (optional)
 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
 * @return static this instance for chaining
 */
function trimEnd($charactersToRemove = null, $alwaysRemoveWhitespace = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the first character or the specified number of characters from the start of this string
 *
 * @param int|null $length the number of characters to return from the start (optional)
 * @return static a new instance of this class
 */
function first($length = null);
function firstBytes($length = null);
function firstCodePoints($length = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the last character or the specified number of characters from the end of this string
 *
 * @param int|null $length the number of characters to return from the end (optional)
 * @return static a new instance of this class
 */
function last($length = null);
function lastBytes($length = null);
function lastCodePoints($length = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the byte at the specified position of this string
 *
 * @param int $index the zero-based position of the byte to return
 * @return string the byte at the specified position
 */
function byteAt($index);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the code point at the specified position of this string
 *
 * @param int $index the zero-based position of the code point to return
 * @return string the code point at the specified position
 */
function codePointAt($index);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string is empty
 *
 * @return bool
 */
public function isEmpty();


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string consists entirely of ASCII characters
 *
 * @return bool
 */
public function isAscii();


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string consists entirely of printable ASCII characters
 *
 * @return bool
 */
public function isPrintableAscii();


////////////////////////////////////////////////////////////////////////////////


/**
 * Converts this string to lowercase
 *
 * @return static this instance for chaining
 */
function toLowerCase();
function toLowerCaseBytes();
function toLowerCaseCodePoints();


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string is entirely lowercase
 *
 * @return bool
 */
function isLowerCase();


////////////////////////////////////////////////////////////////////////////////


/**
 * Converts this string to uppercase
 *
 * @return static this instance for chaining
 */
function toUpperCase();
function toUpperCaseBytes();
function toUpperCaseCodePoints();


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string is entirely uppercase
 *
 * @return bool
 */
function isUpperCase();


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string has its first letter written in uppercase
 *
 * @return bool
 */
function isCapitalized();


////////////////////////////////////////////////////////////////////////////////


/**
 * Truncates this string so that it has at most the specified length
 *
 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
 * @param string|null $ellipsis the string to use as the ellipsis (optional)
 * @return static a new instance of this class
 */
function truncate($maxLength, $ellipsis = null);
function truncateBytes($maxLength, $ellipsis = null);
function truncateCodePoints($maxLength, $ellipsis = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Truncates this string so that it has at most the specified length
 *
 * This method tries *not* to break any words whenever possible
 *
 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
 * @param string|null $ellipsis the string to use as the ellipsis (optional)
 * @return static a new instance of this class
 */
function truncateSafely($maxLength, $ellipsis = null);
function truncateBytesSafely($maxLength, $ellipsis = null);
function truncateCodePointsSafely($maxLength, $ellipsis = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Counts the occurrences of the specified substring in this string
 *
 * @param string $substring the substring whose occurrences to count
 * @return int the number of occurrences
 */
function count($substring = null);
function countBytes($substring = null);
function countCodePoints($substring = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the length of this string
 *
 * @return int the number of characters
 */
function length();
function lengthInBytes();
function lengthInCodePoints();


////////////////////////////////////////////////////////////////////////////////


/**
 * Removes the specified number of characters from the start of this string
 *
 * @param int $length the number of characters to remove
 * @return static a new instance of this class
 */
function cutStart($length);
function cutBytesAtStart($length);
function cutCodePointsAtStart($length);


////////////////////////////////////////////////////////////////////////////////


/**
 * Removes the specified number of characters from the end of this string
 *
 * @param int $length the number of characters to remove
 * @return static a new instance of this class
 */
function cutEnd($length);
function cutBytesAtEnd($length);
function cutCodePointsAtEnd($length);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces all occurrences of the specified search string with the given replacement
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static this instance for chaining
 */
function replace($searchFor, $replaceWith = null);
function replaceBytes($searchFor, $replaceWith = null);
function replaceCodePoints($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces all occurrences of the specified search string with the given replacement
 *
 * This operation is case-insensitive
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replaceIgnoreCase($searchFor, $replaceWith = null);
function replaceBytesIgnoreCase($searchFor, $replaceWith = null);
function replaceCodePointsIgnoreCase($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces the first occurrence of the specified search string with the given replacement
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replaceFirst($searchFor, $replaceWith = null);
function replaceFirstBytes($searchFor, $replaceWith = null);
function replaceFirstCodePoints($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces the first occurrence of the specified search string with the given replacement
 *
 * This operation is case-insensitive
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replaceFirstIgnoreCase($searchFor, $replaceWith = null);
function replaceFirstBytesIgnoreCase($searchFor, $replaceWith = null);
function replaceFirstCodePointsIgnoreCase($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces the specified part in this string only if it starts with that part
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replacePrefix($searchFor, $replaceWith = null);
function replacePrefixBytes($searchFor, $replaceWith = null);
function replacePrefixCodePoints($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces the last occurrence of the specified search string with the given replacement
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replaceLast($searchFor, $replaceWith = null);
function replaceLastBytes($searchFor, $replaceWith = null);
function replaceLastCodePoints($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces the last occurrence of the specified search string with the given replacement
 *
 * This operation is case-insensitive
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replaceLastIgnoreCase($searchFor, $replaceWith = null);
function replaceLastBytesIgnoreCase($searchFor, $replaceWith = null);
function replaceLastCodePointsIgnoreCase($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Replaces the specified part in this string only if it ends with that part
 *
 * @param string $searchFor the string to search for
 * @param string $replaceWith the string to use as the replacement (optional)
 * @return static a new instance of this class
 */
function replaceSuffix($searchFor, $replaceWith = null);
function replaceSuffixBytes($searchFor, $replaceWith = null);
function replaceSuffixCodePoints($searchFor, $replaceWith = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Splits this string into an array of substrings at the specified delimiter
 *
 * @param string $delimiter the delimiter to split the string at
 * @param int|null $limit the maximum number of substrings to return (optional)
 * @return static[] an array containing the substrings (which are instances of this class as well)
 */
function split($delimiter, $limit = null);
function splitBytes($delimiter, $limit = null);
function splitCodePoints($delimiter, $limit = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Splits this string into an array of substrings at the specified delimiter pattern
 *
 * @param string $delimiterPattern the regular expression (PCRE) to split the string at
 * @param int|null $limit the maximum number of substrings to return (optional)
 * @param int|null $flags any combination (bit-wise ORed) of PHP's `PREG_SPLIT_*` flags
 * @return static[] an array containing the substrings (which are instances of this class as well)
 */
function splitByRegex($delimiterPattern, $limit = null, $flags = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Splits this string into its single words
 *
 * @param int|null the maximum number of words to return from the start (optional)
 * @return static[] the new instances of this class
 */
function words($limit = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the part of this string *before* the *first* occurrence of the search string
 *
 * @param string $search the search string that should delimit the end
 * @return static a new instance of this class
 */
function beforeFirst($search);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the part of this string *before* the *last* occurrence of the search string
 *
 * @param string $search the search string that should delimit the end
 * @return static a new instance of this class
 */
function beforeLast($search);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the part of this string between the two specified substrings
 *
 * If there are multiple occurrences, the part with the maximum length will be returned
 *
 * @param string $start the substring whose first occurrence should delimit the start
 * @param string $end the substring whose last occurrence should delimit the end
 * @return static a new instance of this class
 */
function between($start, $end);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the part of this string *after* the *first* occurrence of the search string
 *
 * @param string $search the search string that should delimit the start
 * @return static a new instance of this class
 */
function afterFirst($search);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns the part of this string *after* the *last* occurrence of the search string
 *
 * @param string $search the search string that should delimit the start
 * @return static a new instance of this class
 */
function afterLast($search);


////////////////////////////////////////////////////////////////////////////////


/**
 * Matches this string against the specified regular expression (PCRE)
 *
 * @param string $regex the regular expression (PCRE) to match against
 * @param mixed|null $matches the array that should be filled with the matches (optional)
 * @param bool|null $returnAll whether to return all matches and not only the first one (optional)
 * @return bool whether this string matches the regular expression
 */
function matches($regex, &$matches = null, $returnAll = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string matches the other string
 *
 * @param string $other the other string to compare with
 * @return bool whether the two strings are equal
 */
function equals($other);


////////////////////////////////////////////////////////////////////////////////


/**
 * Returns whether this string matches the other string
 *
 * This operation is case-sensitive
 *
 * @param string $other the other string to compare with
 * @return bool whether the two strings are equal
 */
function equalsIgnoreCase($other);


////////////////////////////////////////////////////////////////////////////////


/**
 * Compares this string to another string lexicographically
 *
 * @param string $other the other string to compare to
 * @param bool|null $human whether to use human sorting for numbers (e.g. `2` before `10`) (optional)
 * @return int an indication whether this string is less than (< 0), equal (= 0) or greater (> 0)
 */
function compareTo($other, $human = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Compares this string to another string lexicographically
 *
 * This operation is case-sensitive
 *
 * @param string $other the other string to compare to
 * @param bool|null $human whether to use human sorting for numbers (e.g. `2` before `10`) (optional)
 * @return int an indication whether this string is less than (< 0), equal (= 0) or greater (> 0)
 */
function compareToIgnoreCase($other, $human = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Escapes this string for safe use in HTML
 *
 * @return static this instance for chaining
 */
function escapeForHtml();


////////////////////////////////////////////////////////////////////////////////


/**
 * Normalizes all line endings in this string by using a single unified newline sequence (which may be specified manually)
 *
 * @param string|null $newlineSequence the target newline sequence to use (optional)
 * @return static this instance for chaining
 */
function normalizeLineEndings($newlineSequence = null);


////////////////////////////////////////////////////////////////////////////////


/**
 * Reverses this string
 *
 * @return static a new instance of this class
 */
function reverse();


////////////////////////////////////////////////////////////////////////////////


/**
 * Turns this string into an acronym (abbreviation)
 *
 * @param bool|null $excludeLowerCase whether to exclude lowercase letters from the result (optional)
 * @return static a new instance of this class
 */
function acronym($excludeLowerCase = null);
```

### Checking the length of a string

```php
$length = count($strInstance);
// or
$length = $strInstance->length();
// or
$length = $strInstance->count();
```

### Creating instances from all entries in an array

```php
$instances = \Delight\Str\Str::fromArray($arrayOfStrings);
```

## Contributing

All contributions are welcome! If you wish to contribute, please create an issue first so that your feature, problem or question can be discussed.

## License

This project is licensed under the terms of the [MIT License](https://opensource.org/licenses/MIT).
