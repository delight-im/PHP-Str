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
	 * Converts this string to lowercase
	 *
	 * @return static this instance for chaining
	 */
	public function toLowerCase() {
		$this->rawString = mb_strtolower($this->rawString, $this->charset);

		return $this;
	}

	/**
	 * Converts this string to uppercase
	 *
	 * @return static this instance for chaining
	 */
	public function toUpperCase() {
		$this->rawString = mb_strtoupper($this->rawString, $this->charset);

		return $this;
	}

	/**
	 * Replaces all occurrences of the specified search string with the given replacement
	 *
	 * @param string $searchFor the string to search for
	 * @param string $replaceWith the string to use as the replacement (optional)
	 * @return static this instance for chaining
	 */
	public function replace($searchFor, $replaceWith = null) {
		if ($replaceWith === null) {
			$replaceWith = '';
		}

		$this->rawString = str_replace($searchFor, $replaceWith, $this->rawString);

		return $this;
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
	 * Escapes this string for safe use in HTML
	 *
	 * @return static this instance for chaining
	 */
	public function escapeForHtml() {
		$this->rawString = htmlspecialchars($this->rawString, ENT_QUOTES, $this->charset);

		return $this;
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

}
