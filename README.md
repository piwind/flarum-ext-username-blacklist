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

This repository is a fork of [clarkwinkelmann/flarum-ext-username-blacklist](https://github.com/clarkwinkelmann/flarum-ext-username-blacklist), add support to blacklist nicknames if available.

## Installation & Updating

Install with composer:

```sh
composer require piwind/flarum-ext-username-blacklist
```

Updating:

```sh
composer update piwind/flarum-ext-username-blacklist
```

## Feature

- PHP的 preg_match() 函数，默认按Byte处理字符串，1个中文字符在UTF-8编码下通常占3个字节，因此如下的正则表达式有差异：

  ```
  string = 你好
  /^.{1,5}$/		不匹配
  /^.{1,5}$/u		匹配
  ```

- flarum默认行为：

  - 用户名至少3个字符

  - 更改昵称填写为空的话，会去掉昵称采纳跟username一样的名称

  - 用户名只能由字母、数字及连字符 (-) 组成
    The username may only contain letters, numbers, and dashes.
    翻译键为：core.api.invalid_username_message

    但实际上是只可以用 字母、数字、连字符、下划线

- 参考的实践方案加效果：（再加上flarum的默认行为）

  ```
  黑名单：
  /^admin/i
  /^.{1,5}$/
  /^[^\p{L}\p{N}]/u
  /[^\p{L}\p{N}]$/u
  ```

  username（限制比昵称多）：

  至少 6个英文字符或 2个中文字符，首位和末位不能是符号，不能含限制词；只可以用 字母、数字、连字符、下划线

  nickname：

  至少 6个英文字符或 2个中文字符，首位和末位不能是符号，不能含限制词

参考链接：

- [PHP: preg_match - Manual](https://www.php.net/manual/en/function.preg-match.php)
- [javascript - Regex to allow any language characters in the form of full name and starting with letter - Stack Overflow](https://stackoverflow.com/questions/31534321/regex-to-allow-any-language-characters-in-the-form-of-full-name-and-starting-wit)

## TODO

- 【BUG】开启该插件会让Nicknames插件中设置的最小昵称长度失效

  具体行为：用户注册的时候，填写的昵称只需要满足至少 3 个字符就可以，在不满 3 个字符的时候，会报错 `validation.min.string`，须至少 6 个字符，但实际可以不满足这一条，只需满 3 个字符。

  但是在用户页的"更改昵称"按钮中，最小昵称长度设置又可以起效果。

  临时解决方案：

  ```
  黑名单中添加如下以匹配1~5位字符数的字符串：
  /^.{1,5}$/
  ```

  如上设置，就是至少 6 个英文字符，或者 2 个中文字符

- 【功能缺陷】username和nickname的黑白名单限制，没有分离开来，无法单独限制其一的规则。

- 【BUG】当用户设置昵称为全空格字符串的时候，会无视这个插件的规则，并设置成功

  在 src/WhitelistRule.php 中添加 error_log，实测没有数值传入到该插件

## Links

- [GitHub](https://github.com/piwind/flarum-ext-username-blacklist)
- [Packagist](https://packagist.org/packages/piwind/flarum-ext-username-blacklist)

