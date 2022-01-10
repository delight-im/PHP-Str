<?php

/*
 * PHP-Str (https://github.com/delight-im/PHP-Str)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\Str;

/** Convenient object-oriented operations on strings */
final class Str implements \Countable {

	/** The default charset to use if no explicit charset has been provided */
	const CHARSET_DEFAULT = 'UTF-8';

	/** @var string the raw string backing this instance */
	private $rawString;
	/** @var string the charset of the raw string (one of the values listed by `mb_list_encodings`) */
	private $charset;

	/**
	 * Constructor
	 *
	 * @param string $rawString the string to create an instance from
	 * @param string|null $charset the charset to use (one of the values listed by `mb_list_encodings`) or `null`
	 */
	public function __construct($rawString, $charset = null) {
		$this->rawString = (string) $rawString;
		$this->charset = (isset($charset) ? $charset : self::CHARSET_DEFAULT);
	}

	/**
	 * Static alternative to the constructor for easier chaining
	 *
	 * @param string $rawString the string to create an instance from
	 * @param string|null $charset the charset to use (one of the values listed by `mb_list_encodings`) (optional)
	 * @return static the new instance
	 */
	public static function from($rawString, $charset = null) {
		return new static($rawString, $charset);
	}

	/**
	 * Variant of the static "constructor" that operates on arrays
	 *
	 * @param string[] $rawArray the array of strings to create instances from
	 * @param string|null $charset the charset to use (one of the values listed by `mb_list_encodings`) (optional)
	 * @return static[] the new instances of this class
	 */
	public static function fromArray($rawArray, $charset = null) {
		$output = [];

		foreach ($rawArray as $rawEntry) {
			$output[] = new static($rawEntry, $charset);
		}

		return $output;
	}

	/**
	 * Returns whether this string starts with the supplied other string based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWithBytes($prefix) {
		if (\PHP_VERSION_ID >= 80000) {
			return $prefix !== '' && \str_starts_with($this->rawString, $prefix);
		}

		return $prefix !== '' && \strncmp($this->rawString, $prefix, \strlen($prefix)) === 0;
	}

	/**
	 * Returns whether this string starts with the supplied other string based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWithCodePoints($prefix) {
		return $this->startsWithBytes($prefix);
	}

	/**
	 * Alias of `startsWithCodePoints`
	 *
	 * @param string $prefix
	 * @return bool
	 */
	public function startsWith($prefix) {
		return $this->startsWithCodePoints($prefix);
	}

	/**
	 * Returns whether this string starts with the supplied other string based on bytes
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWithBytesIgnoreCase($prefix) {
		return $prefix !== '' && \strncasecmp($this->rawString, $prefix, \strlen($prefix)) === 0;
	}

	/**
	 * Returns whether this string starts with the supplied other string based on code points
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWithCodePointsIgnoreCase($prefix) {
		return $prefix !== '' && \mb_stripos($this->rawString, $prefix, 0, $this->charset) === 0;
	}

	/**
	 * Alias of `startsWithBytesIgnoreCase`
	 *
	 * @param string $prefix
	 * @return bool
	 */
	public function startsWithIgnoreCase($prefix) {
		return $this->startsWithBytesIgnoreCase($prefix);
	}

	/**
	 * Returns whether this string contains the supplied other string based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function containsBytes($infix) {
		if (\PHP_VERSION_ID >= 80000) {
			return $infix !== '' && \str_contains($this->rawString, $infix);
		}

		return $infix !== '' && \strpos($this->rawString, $infix, 0) !== false;
	}

	/**
	 * Returns whether this string contains the supplied other string based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function containsCodePoints($infix) {
		return $this->containsBytes($infix);
	}

	/**
	 * Alias of `containsCodePoints`
	 *
	 * @param string $infix
	 * @return bool
	 */
	public function contains($infix) {
		return $this->containsCodePoints($infix);
	}

	/**
	 * Returns whether this string contains the supplied other string based on bytes
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function containsBytesIgnoreCase($infix) {
		return $infix !== '' && \stripos($this->rawString, $infix, 0) !== false;
	}

	/**
	 * Returns whether this string contains the supplied other string based on code points
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function containsCodePointsIgnoreCase($infix) {
		return $infix !== '' && \mb_stripos($this->rawString, $infix, 0, $this->charset) !== false;
	}

	/**
	 * Alias of `containsCodePointsIgnoreCase`
	 *
	 * @param string $infix
	 * @return bool
	 */
	public function containsIgnoreCase($infix) {
		return $this->containsCodePointsIgnoreCase($infix);
	}

	/**
	 * Returns whether this string ends with the supplied other string based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWithBytes($suffix) {
		if (\PHP_VERSION_ID >= 80000) {
			return $suffix !== '' && \str_ends_with($this->rawString, $suffix);
		}

		$suffixLength = \strlen($suffix);

		return $suffix !== '' && \substr_compare($this->rawString, $suffix, -$suffixLength, $suffixLength, false) === 0;
	}

	/**
	 * Returns whether this string ends with the supplied other string based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWithCodePoints($suffix) {
		return $this->endsWithBytes($suffix);
	}

	/**
	 * Alias of `endsWithCodePoints`
	 *
	 * @param string $suffix
	 * @return bool
	 */
	public function endsWith($suffix) {
		return $this->endsWithCodePoints($suffix);
	}

	/**
	 * Returns whether this string ends with the supplied other string based on bytes
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWithBytesIgnoreCase($suffix) {
		$suffixLength = \strlen($suffix);

		return $suffix !== '' && \substr_compare($this->rawString, $suffix, -$suffixLength, $suffixLength, true) === 0;
	}

	/**
	 * Returns whether this string ends with the supplied other string based on code points
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWithCodePointsIgnoreCase($suffix) {
		return $suffix !== '' && \mb_strripos($this->rawString, $suffix, \mb_strlen($this->rawString) - \mb_strlen($suffix), $this->charset) !== false;
	}

	/**
	 * Alias of `endsWithBytesIgnoreCase`
	 *
	 * @param string $suffix
	 * @return bool
	 */
	public function endsWithIgnoreCase($suffix) {
		return $this->endsWithBytesIgnoreCase($suffix);
	}

	/**
	 * Removes all whitespace or the specified characters from both sides of this string
	 *
	 * @param string $charactersToRemove the characters to remove (optional)
	 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
	 * @return static a new instance of this class
	 */
	public function trim($charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		return $this->trimInternal(true, true, $charactersToRemove, $alwaysRemoveWhitespace);
	}

	/**
	 * Removes all whitespace or the specified characters from the start of this string
	 *
	 * @param string $charactersToRemove the characters to remove (optional)
	 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
	 * @return static a new instance of this class
	 */
	public function trimStart($charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		return $this->trimInternal(true, false, $charactersToRemove, $alwaysRemoveWhitespace);
	}

	/**
	 * Removes all whitespace or the specified characters from the end of this string
	 *
	 * @param string $charactersToRemove the characters to remove (optional)
	 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
	 * @return static a new instance of this class
	 */
	public function trimEnd($charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		return $this->trimInternal(false, true, $charactersToRemove, $alwaysRemoveWhitespace);
	}

	/**
	 * Alias of `first`
	 *
	 * @param int|null $length
	 * @return static
	 * @deprecated use `first` instead
	 */
	public function start($length = null) {
		return $this->first($length);
	}

	/**
	 * Returns the first byte or the specified number of bytes from the start of this string
	 *
	 * @param int|null $length the number of bytes to return from the start (optional)
	 * @return static a new instance of this class
	 */
	public function firstBytes($length = null) {
		if ($length === null) {
			$length = 1;
		}

		$rawString = \substr($this->rawString, 0, $length);

		return new static($rawString, $this->charset);
	}

	/**
	 * Returns the first code point or the specified number of code points from the start of this string
	 *
	 * @param int|null $length the number of code points to return from the start (optional)
	 * @return static a new instance of this class
	 */
	public function firstCodePoints($length = null) {
		if ($length === null) {
			$length = 1;
		}

		$rawString = \mb_substr($this->rawString, 0, $length, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Alias of `firstCodePoints`
	 *
	 * @param int|null $length
	 * @return static
	 */
	public function first($length = null) {
		return $this->firstCodePoints($length);
	}

	/**
	 * Alias of `last`
	 *
	 * @param int|null $length
	 * @return static
	 * @deprecated use `last` instead
	 */
	public function end($length = null) {
		return $this->last($length);
	}

	/**
	 * Returns the last byte or the specified number of bytes from the end of this string
	 *
	 * @param int|null $length the number of bytes to return from the end (optional)
	 * @return static a new instance of this class
	 */
	public function lastBytes($length = null) {
		if ($length === null) {
			$length = 1;
		}

		$offset = $this->lengthInBytes() - $length;
		$rawString = \substr($this->rawString, $offset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Returns the last code point or the specified number of code points from the end of this string
	 *
	 * @param int|null $length the number of code points to return from the end (optional)
	 * @return static a new instance of this class
	 */
	public function lastCodePoints($length = null) {
		if ($length === null) {
			$length = 1;
		}

		$offset = $this->lengthInCodePoints() - $length;
		$rawString = \mb_substr($this->rawString, $offset, null, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Alias of `lastCodePoints`
	 *
	 * @param int|null $length
	 * @return static
	 */
	public function last($length = null) {
		return $this->lastCodePoints($length);
	}

	/**
	 * Returns the byte at the specified position of this string
	 *
	 * @param int $index the zero-based position of the byte to return
	 * @return string the byte at the specified position
	 */
	public function byteAt($index) {
		return isset($this->rawString[$index]) ? $this->rawString[$index] : '';
	}

	/**
	 * Returns the code point at the specified position of this string
	 *
	 * @param int $index the zero-based position of the code point to return
	 * @return string the code point at the specified position
	 */
	public function codePointAt($index) {
		return \mb_substr($this->rawString, $index, 1, $this->charset);
	}

	/**
	 * Returns whether this string is empty
	 *
	 * @return bool
	 */
	public function isEmpty() {
		return $this->rawString === '';
	}

	/**
	 * Returns whether this string consists entirely of ASCII characters
	 *
	 * @return bool
	 */
	public function isAscii() {
		return \preg_match('/[^\x00-\x7F]/', $this->rawString) === 0;
	}

	/**
	 * Returns whether this string consists entirely of printable ASCII characters
	 *
	 * @return bool
	 */
	public function isPrintableAscii() {
		return \preg_match('/[^\x20-\x7E]/', $this->rawString) === 0;
	}

	/**
	 * Converts this string to lowercase based on bytes
	 *
	 * @return static a new instance of this class
	 */
	public function toLowerCaseBytes() {
		$rawString = \strtolower($this->rawString);

		return new static($rawString, $this->charset);
	}

	/**
	 * Converts this string to lowercase based on code points
	 *
	 * @return static a new instance of this class
	 */
	public function toLowerCaseCodePoints() {
		$rawString = \mb_strtolower($this->rawString, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Alias of `toLowerCaseCodePoints`
	 *
	 * @return static
	 */
	public function toLowerCase() {
		return $this->toLowerCaseCodePoints();
	}

	/**
	 * Returns whether this string is entirely lowercase
	 *
	 * @return bool
	 * @deprecated use `equals` and `toLowerCase` instead
	 */
	public function isLowerCase() {
		return $this->equals($this->toLowerCase());
	}

	/**
	 * Converts this string to uppercase based on bytes
	 *
	 * @return static a new instance of this class
	 */
	public function toUpperCaseBytes() {
		$rawString = \strtoupper($this->rawString);

		return new static($rawString, $this->charset);
	}

	/**
	 * Converts this string to uppercase based on code points
	 *
	 * @return static a new instance of this class
	 */
	public function toUpperCaseCodePoints() {
		$rawString = \mb_strtoupper($this->rawString, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Alias of `toUpperCaseCodePoints`
	 *
	 * @return static
	 */
	public function toUpperCase() {
		return $this->toUpperCaseCodePoints();
	}

	/**
	 * Returns whether this string is entirely uppercase
	 *
	 * @return bool
	 * @deprecated use `equals` and `toUpperCase` instead
	 */
	public function isUpperCase() {
		return $this->equals($this->toUpperCase());
	}

	/**
	 * Returns whether this string has its first letter written in uppercase
	 *
	 * @return bool
	 * @deprecated use `first` and `equals` and `toUpperCase` instead
	 */
	public function isCapitalized() {
		return $this->first()->isUpperCase();
	}

	/**
	 * Truncates this string so that it has at most the specified length in bytes
	 *
	 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
	 * @param string|null $ellipsis the string to use as the ellipsis (optional)
	 * @return static a new instance of this class
	 */
	public function truncateBytes($maxLength, $ellipsis = null) {
		return $this->truncateInternal(true, false, $maxLength, $ellipsis, false);
	}

	/**
	 * Truncates this string so that it has at most the specified length in code points
	 *
	 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
	 * @param string|null $ellipsis the string to use as the ellipsis (optional)
	 * @return static a new instance of this class
	 */
	public function truncateCodePoints($maxLength, $ellipsis = null) {
		return $this->truncateInternal(false, true, $maxLength, $ellipsis, false);
	}

	/**
	 * Alias of `truncateCodePoints`
	 *
	 * @param int $maxLength
	 * @param string|null $ellipsis
	 * @return static
	 */
	public function truncate($maxLength, $ellipsis = null) {
		return $this->truncateCodePoints($maxLength, $ellipsis);
	}

	/**
	 * Truncates this string so that it has at most the specified length in bytes
	 *
	 * This method tries *not* to break any words whenever possible
	 *
	 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
	 * @param string|null $ellipsis the string to use as the ellipsis (optional)
	 * @return static a new instance of this class
	 */
	public function truncateBytesSafely($maxLength, $ellipsis = null) {
		return $this->truncateInternal(true, false, $maxLength, $ellipsis, true);
	}

	/**
	 * Truncates this string so that it has at most the specified length in code points
	 *
	 * This method tries *not* to break any words whenever possible
	 *
	 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
	 * @param string|null $ellipsis the string to use as the ellipsis (optional)
	 * @return static a new instance of this class
	 */
	public function truncateCodePointsSafely($maxLength, $ellipsis = null) {
		return $this->truncateInternal(false, true, $maxLength, $ellipsis, true);
	}

	/**
	 * Alias of `truncateCodePointsSafely`
	 *
	 * @param int $maxLength
	 * @param string|null $ellipsis
	 * @return static
	 */
	public function truncateSafely($maxLength, $ellipsis = null) {
		return $this->truncateCodePointsSafely($maxLength, $ellipsis);
	}

	/**
	 * Counts the occurrences of the specified substring in this string based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $substring the substring whose occurrences to count
	 * @return int the number of occurrences
	 */
	public function countBytes($substring = null) {
		if ($substring === null) {
			return \strlen($this->rawString);
		}
		else {
			if ($substring === '') {
				return 0;
			}

			return \substr_count($this->rawString, $substring);
		}
	}

	/**
	 * Counts the occurrences of the specified substring in this string based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $substring the substring whose occurrences to count
	 * @return int the number of occurrences
	 */
	public function countCodePoints($substring = null) {
		if ($substring === null) {
			return \mb_strlen($this->rawString, $this->charset);
		}
		else {
			if ($substring === '') {
				return 0;
			}

			return \mb_substr_count($this->rawString, $substring, $this->charset);
		}
	}

	/**
	 * Alias of `countCodePoints`
	 *
	 * @param string $substring
	 * @return int
	 */
	public function count($substring = null) {
		return $this->countCodePoints($substring);
	}

	/**
	 * Returns the length of this string in bytes
	 *
	 * @return int the number of bytes
	 */
	public function lengthInBytes() {
		return \strlen($this->rawString);
	}

	/**
	 * Returns the length of this string in code points
	 *
	 * @return int the number of code points
	 */
	public function lengthInCodePoints() {
		return $this->countCodePoints();
	}

	/**
	 * Alias of `lengthInCodePoints`
	 *
	 * @return int
	 */
	public function length() {
		return $this->lengthInCodePoints();
	}

	/**
	 * Removes the specified number of bytes from the start of this string
	 *
	 * @param int $length the number of bytes to remove
	 * @return static a new instance of this class
	 */
	public function cutBytesAtStart($length) {
		$rawString = \substr($this->rawString, $length);

		return new static($rawString, $this->charset);
	}

	/**
	 * Removes the specified number of code points from the start of this string
	 *
	 * @param int $length the number of code points to remove
	 * @return static a new instance of this class
	 */
	public function cutCodePointsAtStart($length) {
		$rawString = \mb_substr($this->rawString, $length, null, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Alias of `cutCodePointsAtStart`
	 *
	 * @param int $length
	 * @return static
	 */
	public function cutStart($length) {
		return $this->cutCodePointsAtStart($length);
	}

	/**
	 * Removes the specified number of bytes from the end of this string
	 *
	 * @param int $length the number of bytes to remove
	 * @return static a new instance of this class
	 */
	public function cutBytesAtEnd($length) {
		$rawString = \substr($this->rawString, 0, $this->lengthInBytes() - $length);

		return new static($rawString, $this->charset);
	}

	/**
	 * Removes the specified number of code points from the end of this string
	 *
	 * @param int $length the number of code points to remove
	 * @return static a new instance of this class
	 */
	public function cutCodePointsAtEnd($length) {
		$rawString = \mb_substr($this->rawString, 0, $this->lengthInCodePoints() - $length, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Alias of `cutCodePointsAtEnd`
	 *
	 * @param int $length
	 * @return static
	 */
	public function cutEnd($length) {
		return $this->cutCodePointsAtEnd($length);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceBytes($searchFor, $replaceWith = null) {
		return $this->replaceInternal('str_replace', $searchFor, $replaceWith);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceCodePoints($searchFor, $replaceWith = null) {
		return $this->replaceBytes($searchFor, $replaceWith);
	}

	/**
	 * Alias of `replaceCodePoints`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replace($searchFor, $replaceWith = null) {
		return $this->replaceCodePoints($searchFor, $replaceWith);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement based on bytes
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceBytesIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceInternal('str_ireplace', $searchFor, $replaceWith);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement based on code points
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceCodePointsIgnoreCase($searchFor, $replaceWith = null) {
		$searchFor = (string) $searchFor;

		if ($searchFor === '') {
			return $this;
		}

		$replaceWith = ($replaceWith === null) ? '' : (string) $replaceWith;
		$regexPattern = '/' . \preg_quote($searchFor, '/') . '/ui';
		$segments = \preg_split($regexPattern, $this->rawString, -1);
		$newRawString = \implode($replaceWith, $segments);

		return new static($newRawString, $this->charset);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceBytesIgnoreCase($searchFor, $replaceWith);
	}

	/**
	 * Replaces the first occurrence of the specified search string with the given replacement based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirstBytes($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(true, false, 'strpos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the first occurrence of the specified search string with the given replacement based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirstCodePoints($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(false, true, 'mb_strpos', $searchFor, $replaceWith);
	}

	/**
	 * Alias of `replaceFirstCodePoints`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replaceFirst($searchFor, $replaceWith = null) {
		return $this->replaceFirstCodePoints($searchFor, $replaceWith);
	}

	/**
	 * Replaces the first occurrence of the specified search string with the given replacement based on bytes
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirstBytesIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(true, false, 'stripos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the first occurrence of the specified search string with the given replacement based on code points
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirstCodePointsIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(false, true, 'mb_stripos', $searchFor, $replaceWith);
	}

	/**
	 * Alias of `replaceFirstCodePointsIgnoreCase`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replaceFirstIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceFirstCodePointsIgnoreCase($searchFor, $replaceWith);
	}

	/**
	 * Replaces the specified part in this string only if it starts with that part based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replacePrefixBytes($searchFor, $replaceWith = null) {
		if ($this->startsWithBytes($searchFor)) {
			return $this->replaceFirstBytes($searchFor, $replaceWith);
		}
		else {
			return $this;
		}
	}

	/**
	 * Replaces the specified part in this string only if it starts with that part based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replacePrefixCodePoints($searchFor, $replaceWith = null) {
		if ($this->startsWithCodePoints($searchFor)) {
			return $this->replaceFirstCodePoints($searchFor, $replaceWith);
		}
		else {
			return $this;
		}
	}

	/**
	 * Alias of `replacePrefixCodePoints`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replacePrefix($searchFor, $replaceWith = null) {
		return $this->replacePrefixCodePoints($searchFor, $replaceWith);
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLastBytes($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(true, false, 'strrpos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLastCodePoints($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(false, true, 'mb_strrpos', $searchFor, $replaceWith);
	}

	/**
	 * Alias of `replaceLastCodePoints`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replaceLast($searchFor, $replaceWith = null) {
		return $this->replaceLastCodePoints($searchFor, $replaceWith);
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement based on bytes
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLastBytesIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(true, false, 'strripos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement based on code points
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLastCodePointsIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal(false, true, 'mb_strripos', $searchFor, $replaceWith);
	}

	/**
	 * Alias of `replaceLastCodePointsIgnoreCase`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replaceLastIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceLastCodePointsIgnoreCase($searchFor, $replaceWith);
	}

	/**
	 * Replaces the specified part in this string only if it ends with that part based on bytes
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceSuffixBytes($searchFor, $replaceWith = null) {
		if ($this->endsWithBytes($searchFor)) {
			return $this->replaceLastBytes($searchFor, $replaceWith);
		}
		else {
			return $this;
		}
	}

	/**
	 * Replaces the specified part in this string only if it ends with that part based on code points
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceSuffixCodePoints($searchFor, $replaceWith = null) {
		if ($this->endsWithCodePoints($searchFor)) {
			return $this->replaceLastCodePoints($searchFor, $replaceWith);
		}
		else {
			return $this;
		}
	}

	/**
	 * Alias of `replaceSuffixCodePoints`
	 *
	 * @param string $searchFor
	 * @param string $replaceWith
	 * @return static
	 */
	public function replaceSuffix($searchFor, $replaceWith = null) {
		return $this->replaceSuffixCodePoints($searchFor, $replaceWith);
	}

	/**
	 * Splits this string into an array of substrings at the specified delimiter
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $delimiter the delimiter to split the string at
	 * @param int|null $limit the maximum number of substrings to return (optional)
	 * @return static[] the new instances of this class
	 */
	public function split($delimiter, $limit = null) {
		if ($delimiter === '') {
			return [ $this ];
		}

		if ($limit === null) {
			$limit = \PHP_INT_MAX;
		}

		return self::fromArray(\explode($delimiter, $this->rawString, $limit));
	}

	/**
	 * Splits this string into an array of substrings at the specified delimiter pattern
	 *
	 * @param string $delimiterPattern the regular expression (PCRE) to split the string at
	 * @param int|null $limit the maximum number of substrings to return (optional)
	 * @param int|null $flags any combination (bit-wise ORed) of PHP's `PREG_SPLIT_*` flags
	 * @return static[] the new instances of this class
	 */
	public function splitByRegex($delimiterPattern, $limit = null, $flags = null) {
		if ($limit === null) {
			$limit = -1;
		}

		if ($flags === null) {
			$flags = 0;
		}

		return self::fromArray(\preg_split($delimiterPattern, $this->rawString, $limit, $flags));
	}

	/**
	 * Splits this string into its single words
	 *
	 * @param int|null the maximum number of words to return from the start (optional)
	 * @return static[] the new instances of this class
	 */
	public function words($limit = null) {
		// if a limit has been specified
		if ($limit !== null) {
			// get one entry more than requested
			$limit += 1;
		}

		// split the string into words
		$words = $this->splitByRegex('/[^\\w\']+/u', $limit, \PREG_SPLIT_NO_EMPTY);

		// if a limit has been specified
		if ($limit !== null) {
			// discard the last entry (which contains the remainder of the string)
			\array_pop($words);
		}

		// return the words
		return $words;
	}

	/**
	 * Returns the part of this string *before* the *first* occurrence of the search string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string (as a search string) is not considered to be a part of any other string
	 *
	 * If the given search string is not found anywhere, an empty string is returned
	 *
	 * @param string $search the search string that should delimit the end
	 * @return static a new instance of this class
	 */
	public function beforeFirst($search) {
		return $this->sideInternal('mb_strpos', $search, -1);
	}

	/**
	 * Returns the part of this string *before* the *last* occurrence of the search string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string (as a search string) is not considered to be a part of any other string
	 *
	 * If the given search string is not found anywhere, an empty string is returned
	 *
	 * @param string $search the search string that should delimit the end
	 * @return static a new instance of this class
	 */
	public function beforeLast($search) {
		return $this->sideInternal('mb_strrpos', $search, -1);
	}

	/**
	 * Returns the part of this string between the two specified substrings
	 *
	 * This operation is case-sensitive
	 *
	 * If there are multiple occurrences, the part with the maximum length will be returned
	 *
	 * The empty string (as a search string) is not considered to be a part of any other string
	 *
	 * If one of the given search strings is not found anywhere, an empty string is returned
	 *
	 * @param string $start the substring whose first occurrence should delimit the start
	 * @param string $end the substring whose last occurrence should delimit the end
	 * @return static a new instance of this class
	 */
	public function between($start, $end) {
		if ($start === '' || $end === '') {
			return new static('', $this->charset);
		}

		$beforeStart = \mb_strpos($this->rawString, $start, 0, $this->charset);

		$rawString = '';

		if ($beforeStart !== false) {
			$afterStart = $beforeStart + \mb_strlen($start, $this->charset);
			$beforeEnd = \mb_strrpos($this->rawString, $end, $afterStart, $this->charset);

			if ($beforeEnd !== false) {
				$rawString = \mb_substr($this->rawString, $afterStart, $beforeEnd - $afterStart, $this->charset);
			}
		}

		return new static($rawString, $this->charset);
	}

	/**
	 * Returns the part of this string *after* the *first* occurrence of the search string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string (as a search string) is not considered to be a part of any other string
	 *
	 * If the given search string is not found anywhere, an empty string is returned
	 *
	 * @param string $search the search string that should delimit the start
	 * @return static a new instance of this class
	 */
	public function afterFirst($search) {
		return $this->sideInternal('mb_strpos', $search, 1);
	}

	/**
	 * Returns the part of this string *after* the *last* occurrence of the search string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string (as a search string) is not considered to be a part of any other string
	 *
	 * If the given search string is not found anywhere, an empty string is returned
	 *
	 * @param string $search the search string that should delimit the start
	 * @return static a new instance of this class
	 */
	public function afterLast($search) {
		return $this->sideInternal('mb_strrpos', $search, 1);
	}

	/**
	 * Matches this string against the specified regular expression (PCRE)
	 *
	 * @param string $regex the regular expression (PCRE) to match against
	 * @param mixed|null $matches the array that should be filled with the matches (optional)
	 * @param bool|null $returnAll whether to return all matches and not only the first one (optional)
	 * @return bool whether this string matches the regular expression
	 */
	public function matches($regex, &$matches = null, $returnAll = null) {
		if ($returnAll) {
			return \preg_match_all($regex, $this->rawString, $matches) > 0;
		}
		else {
			return \preg_match($regex, $this->rawString, $matches) === 1;
		}
	}

	/**
	 * Returns whether this string matches the other string
	 *
	 * This operation is case-sensitive
	 *
	 * @param string $other the other string to compare with
	 * @return bool whether the two strings are equal
	 */
	public function equals($other) {
		return $this->compareTo($other) === 0;
	}

	/**
	 * Returns whether this string matches the other string
	 *
	 * This operation is case-insensitive
	 *
	 * @param string $other the other string to compare with
	 * @return bool whether the two strings are equal
	 */
	public function equalsIgnoreCase($other) {
		return $this->compareToIgnoreCase($other) === 0;
	}

	/**
	 * Compares this string to another string lexicographically
	 *
	 * This operation is case-sensitive
	 *
	 * @param string $other the other string to compare to
	 * @param bool|null $human whether to use human sorting for numbers (e.g. `2` before `10`) (optional)
	 * @return int an indication whether this string is less than (< 0), equal (= 0) or greater (> 0)
	 */
	public function compareTo($other, $human = null) {
		if ($human) {
			return \strnatcmp($this->rawString, $other);
		}
		else {
			return \strcmp($this->rawString, $other);
		}
	}


	/**
	 * Compares this string to another string lexicographically
	 *
	 * This operation is case-insensitive
	 *
	 * @param string $other the other string to compare to
	 * @param bool|null $human whether to use human sorting for numbers (e.g. `2` before `10`) (optional)
	 * @return int an indication whether this string is less than (< 0), equal (= 0) or greater (> 0)
	 */
	public function compareToIgnoreCase($other, $human = null) {
		if ($human) {
			return \strnatcasecmp($this->rawString, $other);
		}
		else {
			return \strcasecmp($this->rawString, $other);
		}
	}

	/**
	 * Escapes this string for safe use in HTML
	 *
	 * @return static a new instance of this class
	 */
	public function escapeForHtml() {
		$rawString = \htmlspecialchars($this->rawString, \ENT_QUOTES, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Normalizes all line endings in this string by using a single unified newline sequence (which may be specified manually)
	 *
	 * @param string|null $newlineSequence the target newline sequence to use (optional)
	 * @return static a new instance of this class
	 */
	public function normalizeLineEndings($newlineSequence = null) {
		if ($newlineSequence === null) {
			$newlineSequence = "\n";
		}

		$rawString = \preg_replace('/\R/u', $newlineSequence, $this->rawString);

		return new static($rawString, $this->charset);
	}

	/**
	 * Reverses this string
	 *
	 * @return static a new instance of this class
	 */
	public function reverse() {
		if (\preg_match_all('/./us', $this->rawString, $matches)) {
			$rawString = \join('', \array_reverse($matches[0]));

			return new static($rawString, $this->charset);
		}
		else {
			return $this;
		}
	}

	/**
	 * Turns this string into an acronym (abbreviation)
	 *
	 * @param bool|null $excludeLowerCase whether to exclude lowercase letters from the result (optional)
	 * @return static a new instance of this class
	 * @deprecated
	 */
	public function acronym($excludeLowerCase = null) {
		$words = $this->words();

		$rawString = '';

		foreach ($words as $word) {
			if (!$excludeLowerCase || $word->isCapitalized()) {
				$rawString .= $word->first();
			}
		}

		return new static($rawString, $this->charset);
	}

	public function __toString() {
		return $this->rawString;
	}

	private function trimInternal($trimAtStart, $trimAtEnd, $charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		$defaultCharactersToRemove = " \t\n\r\0\x0B";

		if ($charactersToRemove === null) {
			$charactersToRemove = $defaultCharactersToRemove;
		}

		if ($alwaysRemoveWhitespace === null) {
			$alwaysRemoveWhitespace = false;
		}

		if ($alwaysRemoveWhitespace) {
			$charactersToRemove .= $defaultCharactersToRemove;
		}

		// if non-ASCII (or multi-byte UTF-8) characters are to be removed
		if (\preg_match('/[^\x00-\x7F]/', $charactersToRemove) === 1) {
			$charactersToRemoveRegexClass = '[' . \preg_quote($charactersToRemove, '/') . ']';

			if ($trimAtStart) {
				if ($trimAtEnd) {
					$charactersToRemoveRegexPattern = '/^' . $charactersToRemoveRegexClass . '+|' . $charactersToRemoveRegexClass . '+$/uD';
				}
				else {
					$charactersToRemoveRegexPattern = '/^' . $charactersToRemoveRegexClass . '+/uD';
				}
			}
			elseif ($trimAtEnd) {
				$charactersToRemoveRegexPattern = '/' . $charactersToRemoveRegexClass . '+$/uD';
			}
			else {
				throw new \Exception("Either 'trimAtStart' or 'trimAtEnd' must be 'true'");
			}

			$newRawString = \preg_replace($charactersToRemoveRegexPattern, '', $this->rawString, -1);
		}
		// if only ASCII (or single-byte UTF-8) characters are to be removed
		else {
			if ($trimAtStart) {
				if ($trimAtEnd) {
					$trimFunc = 'trim';
				}
				else {
					$trimFunc = 'ltrim';
				}
			}
			elseif ($trimAtEnd) {
				$trimFunc = 'rtrim';
			}
			else {
				throw new \Exception("Either 'trimAtStart' or 'trimAtEnd' must be 'true'");
			}

			$newRawString = $trimFunc($this->rawString, $charactersToRemove);
		}

		return new static($newRawString, $this->charset);
	}

	private function truncateInternal($operateOnBytes, $operateOnCodePoints, $maxLength, $ellipsis, $safe) {
		if ($operateOnBytes) {
			$previousLength = $this->lengthInBytes();
		}
		elseif ($operateOnCodePoints) {
			$previousLength = $this->lengthInCodePoints();
		}
		else {
			throw new \Exception("Either 'operateOnBytes' or 'operateOnCodePoints' must be 'true'");
		}

		// if the string doesn't actually need to be truncated for the desired maximum length
		if ($previousLength <= $maxLength) {
			// return it unchanged
			return $this;
		}
		// if the string does indeed need to be truncated
		else {
			// if no ellipsis string has been specified
			if ($ellipsis === null) {
				// assume three dots as the default
				$ellipsis = '...';
			}

			// calculate the actual maximum length without the ellipsis
			if ($operateOnBytes) {
				$maxLength -= \strlen($ellipsis);
			}
			elseif ($operateOnCodePoints) {
				$maxLength -= \mb_strlen($ellipsis, $this->charset);
			}
			else {
				throw new \Exception("Either 'operateOnBytes' or 'operateOnCodePoints' must be 'true'");
			}

			// if not even the ellipsis string fits into a string of the specified maximum length
			if ($maxLength < 0) {
				return '';
			}

			// truncate the string to the desired length
			if ($operateOnBytes) {
				$rawString = \substr($this->rawString, 0, $maxLength);
			}
			elseif ($operateOnCodePoints) {
				$rawString = \mb_substr($this->rawString, 0, $maxLength, $this->charset);
			}
			else {
				throw new \Exception("Either 'operateOnBytes' or 'operateOnCodePoints' must be 'true'");
			}

			// if we don't want to break words
			if ($safe) {
				if ($operateOnBytes) {
					$boundaryChars = \substr($this->rawString, $maxLength - 1, 2);
				}
				elseif ($operateOnCodePoints) {
					$boundaryChars = \mb_substr($this->rawString, $maxLength - 1, 2, $this->charset);
				}
				else {
					throw new \Exception("Either 'operateOnBytes' or 'operateOnCodePoints' must be 'true'");
				}

				// if the truncated string *does* end *within* a word
				if (!\preg_match('/\\W/u', $boundaryChars)) {
					// if there's some word boundary before
					if (\preg_match('/.*\\W/u', $rawString, $matches)) {
						// truncate there instead
						$rawString = $matches[0];
					}
				}
			}

			// return the correctly truncated string together with the ellipsis
			return new static($rawString . $ellipsis, $this->charset);
		}
	}

	private function replaceInternal(callable $func, $searchFor, $replaceWith) {
		if ($replaceWith === null) {
			$replaceWith = '';
		}

		$rawString = $func($searchFor, $replaceWith, $this->rawString);

		return new static($rawString, $this->charset);
	}

	private function replaceOneInternal($operateOnBytes, $operateOnCodePoints, callable $func, $searchFor, $replaceWith) {
		if ($searchFor === '') {
			return $this;
		}

		if ($operateOnBytes) {
			$pos = $func($this->rawString, $searchFor, 0);
		}
		elseif ($operateOnCodePoints) {
			$pos = $func($this->rawString, $searchFor, 0, $this->charset);
		}
		else {
			throw new \Exception("Either 'operateOnBytes' or 'operateOnCodePoints' must be 'true'");
		}

		if ($pos === false) {
			return $this;
		}
		else {
			if ($replaceWith === null) {
				$replaceWith = '';
			}

			if ($operateOnBytes) {
				$prefix = \substr($this->rawString, 0, $pos);
				$searchForLength = \strlen($searchFor);
				$suffix = \substr($this->rawString, $pos + $searchForLength);
			}
			elseif ($operateOnCodePoints) {
				$prefix = \mb_substr($this->rawString, 0, $pos, $this->charset);
				$searchForLength = \mb_strlen($searchFor, $this->charset);
				$suffix = \mb_substr($this->rawString, $pos + $searchForLength, null, $this->charset);
			}
			else {
				throw new \Exception("Either 'operateOnBytes' or 'operateOnCodePoints' must be 'true'");
			}

			return new static($prefix . $replaceWith . $suffix, $this->charset);
		}
	}

	private function sideInternal(callable $func, $substr, $direction) {
		if ($substr === '') {
			return new static('', $this->charset);
		}

		$startPos = $func($this->rawString, $substr, 0, $this->charset);

		if ($startPos !== false) {
			if ($direction === -1) {
				$offset = 0;
				$length = $startPos;
			}
			else {
				$offset = $startPos + \mb_strlen($substr, $this->charset);
				$length = null;
			}

			$rawString = \mb_substr($this->rawString, $offset, $length, $this->charset);
		}
		else {
			$rawString = '';
		}

		return new static($rawString, $this->charset);
	}

}
