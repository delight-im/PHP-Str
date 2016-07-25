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
	 * @return static[] the new instances
	 */
	public static function fromArray($rawArray, $charset = null) {
		$output = array();

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
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWith($prefix) {
		return mb_strpos($this->rawString, $prefix, 0, $this->charset) === 0;
	}

	/**
	 * Returns whether this string starts with the supplied other string
	 *
	 * This operation is case-insensitive
	 *
	 * @param string $prefix the other string to search for
	 * @return bool whether the supplied other string can be found at the beginning of this string
	 */
	public function startsWithIgnoreCase($prefix) {
		return mb_stripos($this->rawString, $prefix, 0, $this->charset) === 0;
	}

	/**
	 * Returns whether this string contains the supplied other string
	 *
	 * This operation is case-sensitive
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function contains($infix) {
		return mb_strpos($this->rawString, $infix, 0, $this->charset) !== false;
	}

	/**
	 * Returns whether this string contains the supplied other string
	 *
	 * This operation is case-insensitive
	 *
	 * @param string $infix the other string to search for
	 * @return bool whether the supplied other string is contained in this string
	 */
	public function containsIgnoreCase($infix) {
		return mb_stripos($this->rawString, $infix, 0, $this->charset) !== false;
	}

	/**
	 * Returns whether this string ends with the supplied other string
	 *
	 * This operation is case-sensitive
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWith($suffix) {
		$other = new Str($suffix, $this->charset);

		return mb_strrpos($this->rawString, $suffix, 0, $this->charset) === ($this->length() - $other->length());
	}

	/**
	 * Returns whether this string ends with the supplied other string
	 *
	 * This operation is case-insensitive
	 *
	 * @param string $suffix the other string to search for
	 * @return bool whether the supplied other string can be found at the end of this string
	 */
	public function endsWithIgnoreCase($suffix) {
		$other = new Str($suffix, $this->charset);

		return mb_strripos($this->rawString, $suffix, 0, $this->charset) === ($this->length() - $other->length());
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
	 * Converts this string to lowercase
	 *
	 * @return static a new instance of this class
	 */
	public function toLowerCase() {
		$rawString = mb_strtolower($this->rawString, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Converts this string to uppercase
	 *
	 * @return static a new instance of this class
	 */
	public function toUpperCase() {
		$rawString = mb_strtoupper($this->rawString, $this->charset);

		return new static($rawString, $this->charset);
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement
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
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceFirstIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal('mb_stripos', $searchFor, $replaceWith);
	}

	/**
	 * Replaces the last occurrence of the specified search string with the given replacement
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
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static a new instance of this class
	 */
	public function replaceLastIgnoreCase($searchFor, $replaceWith = null) {
		return $this->replaceOneInternal('mb_strripos', $searchFor, $replaceWith);
	}

	/**
	 * Splits this string into an array of substrings at the specified delimiter
	 *
	 * @param string $delimiter the delimiter to split the string at
	 * @param int|null $limit the maximum number of substrings to return (optional)
	 * @return static[] an array containing the substrings (which are instances of this class as well)
	 */
	public function split($delimiter, $limit = null) {
		if ($limit === null) {
			$limit = PHP_INT_MAX;
		}

		return self::fromArray(explode($delimiter, $this->rawString, $limit));
	}

	/**
	 * Splits this string into an array of substrings at the specified delimiter pattern
	 *
	 * @param string $delimiterPattern the regular expression (PCRE) to split the string at
	 * @param int|null $limit the maximum number of substrings to return (optional)
	 * @param int|null $flags any combination (bit-wise ORed) of PHP's `PREG_SPLIT_*` flags
	 * @return static[] an array containing the substrings (which are instances of this class as well)
	 */
	public function splitByRegex($delimiterPattern, $limit = null, $flags = null) {
		if ($limit === null) {
			$limit = -1;
		}

		if ($flags === null) {
			$flags = 0;
		}

		return self::fromArray(preg_split($delimiterPattern, $this->rawString, $limit, $flags));
	}

	/**
	 * Returns the part of this string between the two specified substrings
	 *
	 * If there are multiple occurrences, the part with the maximum length will be returned
	 *
	 * @param string $start the substring whose first occurrence should delimit the start
	 * @param string $end the substring whose last occurrence should delimit the end
	 * @return static a new instance of this class
	 */
	public function between($start, $end) {
		$beforeStart = mb_strpos($this->rawString, $start, 0, $this->charset);

		$rawString = '';

		if ($beforeStart !== false) {
			$afterStart = $beforeStart + mb_strlen($start, $this->charset);
			$beforeEnd = mb_strrpos($this->rawString, $end, $afterStart, $this->charset);

			if ($beforeEnd !== false) {
				$rawString = mb_substr($this->rawString, $afterStart, $beforeEnd - $afterStart, $this->charset);
			}
		}

		return new static($rawString, $this->charset);
	}

	/**
	 * Escapes this string for safe use in HTML
	 *
	 * @return static a new instance of this class
	 */
	public function escapeForHtml() {
		$rawString = htmlspecialchars($this->rawString, ENT_QUOTES, $this->charset);

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

		$rawString = preg_replace('/\R/u', $newlineSequence, $this->rawString);

		return new static($rawString, $this->charset);
	}

	public function count() {
		return mb_strlen($this->rawString, $this->charset);
	}

	/**
	 * Alias of `count`
	 *
	 * @return int
	 */
	public function length() {
		return $this->count();
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

	private function replaceInternal(callable $func, $searchFor, $replaceWith = null) {
		if ($replaceWith === null) {
			$replaceWith = '';
		}

		$rawString = $func($searchFor, $replaceWith, $this->rawString);

		return new static($rawString, $this->charset);
	}

	private function replaceOneInternal(callable $func, $searchFor, $replaceWith = null) {
		$pos = $func($this->rawString, $searchFor, 0, $this->charset);

		if ($pos === false) {
			return $this;
		}
		else {
			if ($replaceWith === null) {
				$replaceWith = '';
			}

			$rawString = substr_replace($this->rawString, $replaceWith, $pos, mb_strlen($searchFor, $this->charset));

			return new static($rawString, $this->charset);
		}
	}

}
