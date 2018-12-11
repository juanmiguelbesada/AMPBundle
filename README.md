## JuanMiguelBesada/AMPBundle

Installation
============

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require juanmiguelbesada/amp-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require juanmiguelbesada/amp-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new JuanMiguelBesada\AMPBundle\AMPBundle(),
        );

        // ...
    }

    // ...
}
```

How to use
============

Use this bundle is so simple, you only have to extends the base template.

Out of the box you will get a AMP validated template with a min modifier version of [basscss](http://basscss.com) and [normalize.css](https://necolas.github.io/normalize.css/)

```twig
{# base.html.twig #}
{% extends "@AMP/base.html.twig" %}

{% block title %}Welcome to AMP{% endblock %}

{% block body %}
    This is a valid AMP
{% endblock %}
```

Custom styles
===============

AmpBundle includes a twig filter to help minify your custom css. It uses the [Minify](https://github.com/matthiasmullie/minify) library by Matthias Mullie.

The minifyCSS filter, strip comments, remove whitespaces, and remove any !important declaration from your css.

```twig
{# base.html.twig #}
{% extends "@AMP/base.html.twig" %}

{% block title %}Welcome to AMP{% endblock %}

{% block amp_custom_styles %}
    {{ parent() }}
    {{ include('my_custom_twig_css.css.twig')|minifyCSS }}
{% endblock amp_custom_styles %}

{% block body %}
    This is a valid AMP
{% endblock %}
```
