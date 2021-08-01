# Username Blacklist

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/clarkwinkelmann/flarum-ext-username-blacklist.svg)](https://packagist.org/packages/clarkwinkelmann/flarum-ext-username-blacklist) [![Total Downloads](https://img.shields.io/packagist/dt/clarkwinkelmann/flarum-ext-username-blacklist.svg)](https://packagist.org/packages/clarkwinkelmann/flarum-ext-username-blacklist) [![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://www.paypal.me/clarkwinkelmann)

This extension allows blacklisting or whitelisting usernames.

In default mode, a case-insensitive check is done with the provided username against the list.

In regular expression mode, the full username is checked against the regular expression (using PHP `preg_match` function).
The regular expression must include delimiters and can include modifiers.

If no blacklist is defined, everything not whitelisted will be rejected.
If a blacklist is defined, every whitelisted value as well as values not matched by the blacklist will be accepted.

The validation error message can be customized in the settings.

## Installation

    composer require clarkwinkelmann/flarum-ext-username-blacklist

## Support

This extension is under **minimal maintenance**.

It was developed for a client and released as open-source for the benefit of the community.
I might publish simple bugfixes or compatibility updates for free.

You can [contact me](https://clarkwinkelmann.com/flarum) to sponsor additional features or updates.

Support is offered on a "best effort" basis through the Flarum community thread.

## Links

- [GitHub](https://github.com/clarkwinkelmann/flarum-ext-username-blacklist)
- [Packagist](https://packagist.org/packages/clarkwinkelmann/flarum-ext-username-blacklist)
- [Discuss](https://discuss.flarum.org/d/28378)
