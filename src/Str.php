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
	 * Returns whether this string starts with the supplied other string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWith($prefix) {
		return $prefix !== '' && \strncmp($this->rawString, $prefix, \strlen($prefix)) === 0;
	}

	/**
	 * Returns whether this string starts with the supplied other string
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWithIgnoreCase($prefix) {
		return $prefix !== '' && \strncasecmp($this->rawString, $prefix, \strlen($prefix)) === 0;
	}

	/**
	 * Returns whether this string contains the supplied other string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function contains($infix) {
		return $infix !== '' && \mb_strpos($this->rawString, $infix, 0, $this->charset) !== false;
	}

	/**
	 * Returns whether this string contains the supplied other string
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function containsIgnoreCase($infix) {
		return $infix !== '' && \mb_stripos($this->rawString, $infix, 0, $this->charset) !== false;
	}

	/**
	 * Returns whether this string ends with the supplied other string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWith($suffix) {
		$other = new Str($suffix, $this->charset);

		return \mb_strrpos($this->rawString, $suffix, 0, $this->charset) === ($this->length() - $other->length());
	}

	/**
	 * Returns whether this string ends with the supplied other string
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWithIgnoreCase($suffix) {
		$other = new Str($suffix, $this->charset);

		return \mb_strripos($this->rawString, $suffix, 0, $this->charset) === ($this->length() - $other->length());
	}

	/**
	 * Removes all whitespace or the specified characters from both sides of this string
	 *
	 * @param string $charactersToRemove the characters to remove (optional)
	 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
	 * @return static a new instance of this class
	 */
	public function trim($charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		return $this->trimInternal('trim', $charactersToRemove, $alwaysRemoveWhitespace);
	}

	/**
	 * Removes all whitespace or the specified characters from the start of this string
	 *
	 * @param string $charactersToRemove the characters to remove (optional)
	 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
	 * @return static a new instance of this class
	 */
	public function trimStart($charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		return $this->trimInternal('ltrim', $charactersToRemove, $alwaysRemoveWhitespace);
	}

	/**
	 * Removes all whitespace or the specified characters from the end of this string
	 *
	 * @param string $charactersToRemove the characters to remove (optional)
	 * @param bool $alwaysRemoveWhitespace whether to remove whitespace even if a custom list of characters is provided (optional)
	 * @return static a new instance of this class
	 */
	public function trimEnd($charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		return $this->trimInternal('rtrim', $charactersToRemove, $alwaysRemoveWhitespace);
	}

	/**
	 * Returns the first character or the specified number of characters from the start of this string
	 *
	 * @param int|null $length the number of characters to return from the start (optional)
	 * @return static a new instance of this class
	 * @deprecated use `first` instead
	 */
	public function start($length = null) {
		return $this->first($length);
	}

	/**
	 * Returns the first character or the specified number of characters from the start of this string
	 *
	 * @param int|null $length the number of characters to return from the start (optional)
	 * @return static a new instance of this class
	 */
	public function first($length = null) {
		if ($length === null) {
			$length = 1;
		}

		$rawString = \mb_substr($this->rawString, 0, $length, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Returns the last character or the specified number of characters from the end of this string
	 *
	 * @param int|null $length the number of characters to return from the end (optional)
	 * @return static a new instance of this class
	 * @deprecated use `last` instead
	 */
	public function end($length = null) {
		return $this->last($length);
	}

	/**
	 * Returns the last character or the specified number of characters from the end of this string
	 *
	 * @param int|null $length the number of characters to return from the end (optional)
	 * @return static a new instance of this class
	 */
	public function last($length = null) {
		if ($length === null) {
			$length = 1;
		}

		$offset = $this->length() - $length;

		$rawString = \mb_substr($this->rawString, $offset, null, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Converts this string to lowercase
	 *
	 * @return static a new instance of this class
	 */
	public function toLowerCase() {
		$rawString = \mb_strtolower($this->rawString, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Returns whether this string is entirely lowercase
	 *
	 * @return bool
	 */
	public function isLowerCase() {
		return $this->equals($this->toLowerCase());
	}

	/**
	 * Converts this string to uppercase
	 *
	 * @return static a new instance of this class
	 */
	public function toUpperCase() {
		$rawString = \mb_strtoupper($this->rawString, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Returns whether this string is entirely uppercase
	 *
	 * @return bool
	 */
	public function isUpperCase() {
		return $this->equals($this->toUpperCase());
	}

	/**
	 * Returns whether this string has its first letter written in uppercase
	 *
	 * @return bool
	 */
	public function isCapitalized() {
		return $this->first()->isUpperCase();
	}

	/**
	 * Truncates this string so that it has at most the specified length
	 *
	 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
	 * @param string|null $ellipsis the string to use as the ellipsis (optional)
	 * @return static a new instance of this class
	 */
	public function truncate($maxLength, $ellipsis = null) {
		return $this->truncateInternal($maxLength, $ellipsis, false);
	}

	/**
	 * Truncates this string so that it has at most the specified length
	 *
	 * This method tries *not* to break any words whenever possible
	 *
	 * @param int $maxLength the maximum length that this string may have (including any ellipsis)
	 * @param string|null $ellipsis the string to use as the ellipsis (optional)
	 * @return static a new instance of this class
	 */
	public function truncateSafely($maxLength, $ellipsis = null) {
		return $this->truncateInternal($maxLength, $ellipsis, true);
	}

	/**
	 * Counts the occurrences of the specified substring in this string
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $substring the substring whose occurrences to count
	 * @return int the number of occurrences
	 */
	public function count($substring = null) {
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
	 * Returns the length of this string
	 *
	 * @return int the number of characters
	 */
	public function length() {
		return $this->count();
	}

	/**
	 * Removes the specified number of characters from the start of this string
	 *
	 * @param int $length the number of characters to remove
	 * @return static a new instance of this class
	 */
	public function cutStart($length) {
		$rawString = \mb_substr($this->rawString, $length, null, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Removes the specified number of characters from the end of this string
	 *
	 * @param int $length the number of characters to remove
	 * @return static a new instance of this class
	 */
	public function cutEnd($length) {
		$rawString = \mb_substr($this->rawString, 0, $this->length() - $length, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replace($searchFor, $replaceWith = null) {
		return $this->replaceInternal('str_replace', $searchFor, $replaceWith);
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
		return $this->replaceInternal('str_ireplace', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the first occurrence of the specified search string with the given replacement
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirst($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal('mb_strpos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the first occurrence of the specified search string with the given replacement
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirstIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal('mb_stripos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the specified part in this string only if it starts with that part
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replacePrefix($searchFor, $replaceWith = null) {
		if ($this->startsWith($searchFor)) {
			return $this->replaceFirst($searchFor, $replaceWith);
		}
		else {
			return $this;
		}
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLast($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal('mb_strrpos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement
	 *
	 * This operation is case-insensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLastIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal('mb_strripos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the specified part in this string only if it ends with that part
	 *
	 * This operation is case-sensitive
	 *
	 * The empty string is not considered to be a part of any other string
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceSuffix($searchFor, $replaceWith = null) {
		if ($this->endsWith($searchFor)) {
			return $this->replaceLast($searchFor, $replaceWith);
		}
		else {
			return $this;
		}
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

	private function trimInternal(callable $func, $charactersToRemove = null, $alwaysRemoveWhitespace = null) {
		if ($alwaysRemoveWhitespace === null) {
			$alwaysRemoveWhitespace = false;
		}

		if ($charactersToRemove === null || $alwaysRemoveWhitespace) {
			if ($charactersToRemove === null) {
				$charactersToRemove = '';
			}

			$charactersToRemove .= " \t\n\r\0\x0B";
		}

		return $func($this->rawString, $charactersToRemove);
	}

	private function truncateInternal($maxLength, $ellipsis, $safe) {
		// if the string doesn't actually need to be truncated for the desired maximum length
		if ($this->length() <= $maxLength) {
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
			$maxLength -= \mb_strlen($ellipsis, $this->charset);

			// truncate the string to the desired length
			$rawString = \mb_substr($this->rawString, 0, $maxLength, $this->charset);

			// if we don't want to break words
			if ($safe) {
				// if the truncated string *does* end *within* a word
				if (!\preg_match('/\\W/u', \mb_substr($this->rawString, $maxLength - 1, 2, $this->charset))) {
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

	private function replaceOneInternal(callable $func, $searchFor, $replaceWith) {
		if ($searchFor === '') {
			return $this;
		}

		$pos = $func($this->rawString, $searchFor, 0, $this->charset);

		if ($pos === false) {
			return $this;
		}
		else {
			if ($replaceWith === null) {
				$replaceWith = '';
			}

			$rawString = \mb_substr($this->rawString, 0, $pos, $this->charset) . $replaceWith . \mb_substr($this->rawString, $pos + \mb_strlen($searchFor, $this->charset), null, $this->charset);

			return new static($rawString, $this->charset);
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
