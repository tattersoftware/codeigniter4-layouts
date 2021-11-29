# Tatter\Layouts
Layout management service for CodeIgniter 4

[![](https://github.com/tattersoftware/codeigniter4-layouts/workflows/PHPUnit/badge.svg)](https://github.com/tattersoftware/codeigniter4-layouts/actions/workflows/test.yml)
[![](https://github.com/tattersoftware/codeigniter4-layouts/workflows/PHPStan/badge.svg)](https://github.com/tattersoftware/codeigniter4-layouts/actions/workflows/analyze.yml)
[![](https://github.com/tattersoftware/codeigniter4-layouts/workflows/Deptrac/badge.svg)](https://github.com/tattersoftware/codeigniter4-layouts/actions/workflows/inspect.yml)
[![Coverage Status](https://coveralls.io/repos/github/tattersoftware/codeigniter4-layouts/badge.svg?branch=develop)](https://coveralls.io/github/tattersoftware/codeigniter4-layouts?branch=develop)

## Description

This library provides a commons means of managing [View Layouts](https://codeigniter.com/user_guide/outgoing/view_layouts.html)
across package modules and applications.

## Installation

Install easily via Composer to take advantage of CodeIgniter 4's autoloading capabilities
and always be up-to-date:
* `> composer require tatter/layouts`

Or, install manually by downloading the source files and adding the directory to
`app/Config/Autoload.php`.

## Configuration

The code of `Layouts` amounts to a single config file: `Tatter\Layouts\Config\Layouts`. This
file provides the path for each layout as a property. Initially the config file only
includes a single property: "default". By supplying your own path via an `App` config file
you can direct any package or module using `Layouts` to use your layout instead. For example,
**app/Config/Layouts.php**:
```php
<?php

namespace \Config;

class Layouts extends \Tatter\Layouts\Config\Layouts
{
	public $default = 'App\Views\project_layout';
}
```

## Usage

To use the configured layout, simply provide the config property to your view file:
```php
<?= $this->extend(config('Layouts')->default) ?>
<?= $this->section('main') ?>

	<p>Hellow world!</p>

<?= $this->endSection() ?>
```

You can use any layout name you have configured, and any name that does not match will fall
back on the path supplied for "default".

> See the CodeIgniter User Guide to read more on [View Layouts](https://codeigniter.com/user_guide/outgoing/view_layouts.html)

## Layout Expectations

For consistency this library assumes that the "default" template will have the following sections:
* **headerAssets**: The last section prior to the closing `</head>` tag, available for adding CSS tags and the like.
* **navbar**: A navigation menu, typically to be displayed along the top of the page.
* **main**: The main content for the page (can include nested views, etc).
* **footerASsets**: The last section prior to the closing `</body>` tag, available for adding JS tags and footer content.

## Default Layout

While it is highly recommended that you supply your own "default" layout, this library includes
a generic one as a fallback. This layout is based on the [Bootstrap Starter Template](https://getbootstrap.com/docs/5.1/examples/starter-template)
and includes CDN tags for Bootstrap CSS and JS. In addition to fulfilling the expectations above,
the layout also accepts the following variables to configure the HTML `<head>` data:
* **$headerDescription**
* **$headerAuthor**
* **$headerTitle**
