# FLOC Blocker

## What it does

basically this just adds a new HTTP header that prevents FLOC from affecting your site's visitors

```
permissions-policy: interest-cohort=()
```

## Install

Install with `composer require tractorcow/silverstripe-floc-block`

## Config

### env

The module is enabled by default, but you can set this in your `.env` file to specify

This will turn the block on, disabling FLOC (the good thing, what we want).

This is the default option, so you don't normally need to set this.

```ini
SS_FLOC_BLOCK="true"
```

This will turn the block off, letting FLOC work as normal (the bad thing, what google wants)

```ini
SS_FLOC_BLOCK="false"
```

### yml

You can also set the `Enabled` property via yml.

```yaml
---
Name: my-config
After:
  - '#floc-block'
---
SilverStripe\Core\Injector\Injector:
  TractorCow\SilverStripeFLOCBlock\FLOCBlockMiddleware:
    properties:
      Enabled: true
```
