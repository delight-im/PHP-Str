<?php

/*
 * Copyright (c) delight.im <info@delight.im>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
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

		return mb_strpos($this->rawString, $suffix, 0, $this->charset) === ($this->length() - $other->length());
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

		return mb_stripos($this->rawString, $suffix, 0, $this->charset) === ($this->length() - $other->length());
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
