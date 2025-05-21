# Username Blacklist

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/piwind/flarum-ext-username-blacklist.svg)](https://packagist.org/packages/piwind/flarum-ext-username-blacklist) [![Total Downloads](https://img.shields.io/packagist/dt/piwind/flarum-ext-username-blacklist.svg)](https://packagist.org/packages/piwind/flarum-ext-username-blacklist)

This extension allows blacklisting or whitelisting username/nickname.

In default mode, a case-insensitive check is done with the provided username against the list.

In regular expression mode, the full username is checked against the regular expression (using PHP `preg_match` function).
The regular expression must include delimiters and can include modifiers.

If no blacklist is defined, everything not whitelisted will be rejected.
If a blacklist is defined, every whitelisted value as well as values not matched by the blacklist will be accepted.

The validation error message can be customized in the settings.

中文解释：

- 未定义黑名单的时候，仅白名单生效，只允许白名单中的值

- 定义黑名单后，黑名单中的拒绝，白名单中的无论黑名单中是否有都允许，两者都不在的也允许

- 建议正则表达式：开（不开的话，只有完全匹配的才排除掉）

- 示例黑名单：（以admin开头的，无论大小写的）

  ```
  /^admin/i
  ```

## About This Fork

This repository is a fork of [clarkwinkelmann/flarum-ext-username-blacklist](clarkwinkelmann/flarum-ext-username-blacklist), add support to blacklist nicknames if available.

## Installation & Updating

Install with composer:

```sh
composer require piwind/flarum-ext-username-blacklist
```

Updating:

```sh
composer update piwind/flarum-ext-username-blacklist
```

## Links

- [GitHub](https://github.com/piwind/flarum-ext-username-blacklist)
- [Packagist](https://packagist.org/packages/piwind/flarum-ext-username-blacklist)

