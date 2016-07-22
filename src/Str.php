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
	 * @param string|null $charset the charset to use (one of the values listed by `mb_list_encodings`) or `null`
	 * @return static the new instance
	 */
	public static function from($rawString, $charset = null) {
		return new static($rawString, $charset);
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
