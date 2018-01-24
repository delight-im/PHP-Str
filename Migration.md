# Migration

## General

Update your version of this library using Composer and its `composer update` or `composer require` commands [[?]](https://github.com/delight-im/Knowledge/blob/master/Composer%20(PHP).md#how-do-i-update-libraries-or-modules-within-my-application).

## From `v1.x.x` to `v2.x.x`

 * The license has been changed from the [Apache License 2.0](http://www.apache.org/licenses/LICENSE-2.0) to the [MIT License](https://opensource.org/licenses/MIT).
 * The method `escapeForHtml` now operates on a copy of the original data and thus does not modify its own instance anymore.
