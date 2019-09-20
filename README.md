# WP Intelligent Tracking Prevention Cookie Hoist

[![CircleCI](https://circleci.com/gh/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist.svg?style=svg)](https://circleci.com/gh/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist)
[![Packagist Version](https://img.shields.io/packagist/v/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist.svg)](https://packagist.org/packages/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist.svg)](https://packagist.org/packages/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist)
[![Packagist Downloads](https://img.shields.io/packagist/dt/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist.svg)](https://packagist.org/packages/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist)
[![GitHub License](https://img.shields.io/github/license/itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist.svg)](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist/blob/master/LICENSE)
[![Hire Itineris](https://img.shields.io/badge/Hire-Itineris-ff69b4.svg)](https://www.itineris.co.uk/contact/)


[WP Intelligent Tracking Prevention Cookie Hoist](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist) provides a clean, simple way to configure [the WordPress-bundled PHPMailer library](https://core.trac.wordpress.org/browser/trunk/src/wp-includes/class-phpmailer.php), allowing you to quickly get started sending mail through a local or cloud based service of your choice.

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Goal](#goal)
- [Minimum Requirements](#minimum-requirements)
- [Installation](#installation)
  - [Composer (Recommended)](#composer-recommended)
  - [Build from Source](#build-from-source)
- [Usage](#usage)
- [FAQ](#faq)
  - [Where is the settings page?](#where-is-the-settings-page)
  - [Will you add a settings page?](#will-you-add-a-settings-page)
  - [Will you add support for older PHP versions?](#will-you-add-support-for-older-php-versions)
  - [It looks awesome. Where can I find some more goodies like this?](#it-looks-awesome-where-can-i-find-some-more-goodies-like-this)
  - [This isn't on wp.org. Where can I give a :star::star::star::star::star: review?](#this-isnt-on-wporg-where-can-i-give-a-starstarstarstarstar-review)
- [Testing](#testing)
- [Feedback](#feedback)
- [Change Log](#change-log)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Goal

## Minimum Requirements

- PHP v7.0
- WordPress v5.1

## Installation

### Composer (Recommended)

```sh-session
composer require itinerisltd/wp-intelligent-tracking-prevention-cookie-hoist
```

### Build from Source

```sh-session
# Make sure you use the same PHP version as remote servers.
php -v

# Checkout source code
git clone https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist.git
cd wp-intelligent-tracking-prevention-cookie-hoist
git checkout <the-tag-or-the-branch-or-the-commit>

# Build the zip file
composer release:build
```

Then, install `release/wp-intelligent-tracking-prevention-cookie-hoist.zip` [as usual](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

## Usage

## FAQ

### Where is the settings page?

There is no settings page. 

All configurations are done by [PHP constants](https://www.php.net/manual/en/language.constants.php) and [WordPress filters](#filters).

### Will you add a settings page?

No.

We have seen [countless](https://blog.sucuri.net/2019/03/0day-vulnerability-in-easy-wp-smtp-affects-thousands-of-sites.html) [vulnerabilities](https://www.pluginvulnerabilities.com/2016/04/04/when-full-disclosure-of-a-claimed-wordpress-plugin-vulnerability-leads-to-a-bigger-problem/) [related](https://www.wordfence.com/blog/2019/03/recent-social-warfare-vulnerability-allowed-remote-code-execution/) [to](https://www.wordfence.com/blog/2018/11/privilege-escalation-flaw-in-wp-gdpr-compliance-plugin-exploited-in-the-wild/) user inputs.
Mail settings don't change often and should be configured by a developer.
Therefore, [WP Intelligent Tracking Prevention Cookie Hoist](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist) decided to use PHP constants instead of storing options in WordPress database.

However, if you must, you can use [filters](#filters) to override this behavior.

### Will you add support for older PHP versions?

Never! This plugin will only work on [actively supported PHP versions](https://secure.php.net/supported-versions.php).

Don't use it on **end of life** or **security fixes only** PHP versions.

### It looks awesome. Where can I find some more goodies like this?

- Articles on [Itineris' blog](https://www.itineris.co.uk/blog/)
- More projects on [Itineris' GitHub profile](https://github.com/itinerisltd)
- More plugins on [Itineris](https://profiles.wordpress.org/itinerisltd/#content-plugins) and [TangRufus](https://profiles.wordpress.org/tangrufus/#content-plugins) wp.org profiles
- Follow [@itineris_ltd](https://twitter.com/itineris_ltd) and [@TangRufus](https://twitter.com/tangrufus) on Twitter
- Hire [Itineris](https://www.itineris.co.uk/services/) to build your next awesome site

### This isn't on wp.org. Where can I give a :star::star::star::star::star: review?

Thanks! Glad you like it. It's important to let my boss knows somebody is using this project. Please consider:

- tweet something good with mentioning [@itineris_ltd](https://twitter.com/itineris_ltd) and [@TangRufus](https://twitter.com/tangrufus)
- :star: star this [Github repo](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist)
- :eyes: watch this [Github repo](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist)
- write blog posts
- submit [pull requests](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist)
- [hire Itineris](https://www.itineris.co.uk/services/)

## Testing

```sh-session
composer test
composer phpstan:analyse
composer style:check
```

Pull requests without tests will not be accepted!

## Feedback

**Please provide feedback!** We want to make this library useful in as many projects as possible.
Please submit an [issue](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist/issues/new) and point out what you do and don't like, or fork the project and make suggestions.
**No issue is too small.**

## Change Log

Please see [CHANGELOG](./CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email [hello@itineris.co.uk](mailto:hello@itineris.co.uk) instead of using the issue tracker.

## Credits

[WP Intelligent Tracking Prevention Cookie Hoist](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist) is a [Itineris Limited](https://www.itineris.co.uk/) project created by [Tang Rufus](https://typist.tech).

Full list of contributors can be found [here](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist/graphs/contributors).

## License

[WP Intelligent Tracking Prevention Cookie Hoist](https://github.com/ItinerisLtd/wp-intelligent-tracking-prevention-cookie-hoist) is released under the [MIT License](https://opensource.org/licenses/MIT).
