# FLOC Blocker

## What it does

basically this just adds a new HTTP header that prevents FLOC from affecting your site's visitors

```
permissions-policy: interest-cohort=()
```

## Install

Install with `composer require tractorcow/silverstripe-floc-block`

## Config

The module is enabled by default, but you can set this in your `.env` file to specify

The default, FLOC is disabled (the good thing, what we want)

```ini
SS_FLOC_BLOCK=true
```

FLOC enabled (the bad thing, what google wants)

```ini
SS_BLOCK_BLOCK=false
```
