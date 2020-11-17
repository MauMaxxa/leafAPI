# Changelog - Leaf API v2.0

Version 2 of Leaf API contains a bunch of new features, some inclusions and even some breaking changes which are geared to easy integration with other libraries, as well as bettering some internal features used by Leaf API and Leaf MVC.

All of these changes are listed here, just so you have a reference and won't need to refer to the docs or open an issue on github.

This guide is divided into sections according to features. Those features are also divided into sections pertaining to:

- Added Features
- Breaking Changes
- Bug Fixes
- Removed Features

## Leaf Console

### New Features

Leaf console tool got some new features which enable faster development, better debuging and better support for console app integration.

#### Database Install Command

Before, databases would be created manually before linking them to the Leaf application, however now, from the comfort of your console, you can create the database defined in your `.env` file if it doesn't already exist.

```sh
php leaf db:install
```

#### Rollback particular migration

This is a little feature added to allow you rollback particular files instead of rolling back all migrations just to change 1 file. This can be achieved by adding the `-f` flag, then the migration to rollback.

**Note that only the part of the filename after TIMESTAMP_create_ is required.**

```sh
php leaf db:rollback -f users
```

#### Migrate single file

Since you can rollback a single file, it only makes sense to be able to migrate a single file as well. Just like with with rollback, this can be achieved with the `-f` flag followed by the migration.

```sh
php leaf db:migrate -f users
```

### Breaking Changes

A few changes which might need you to tweak you app a little bit. Don't worry, these aren't sharp, disastrous changes, just tweaking one or two lines of code.

#### Registering console commands

Before, in order to add a new console command, you would just need to head over to the `leaf` file in the root directory of your app and add your command, just like the example command.

```php
/*
|--------------------------------------------------------------------------
| Add custom command
|--------------------------------------------------------------------------
|
| If you have a new command to add to Leaf
|
*/
$console->registerCustom(new \App\Console\ExampleCommand());
```

However, now, Leaf Console supports multiple commands in the form of arrays, so you can now pass an array into `registerCustom`, however, the `new` keyword is no longer needed, instead, the class instance is passed into `registerCustom`.

So the example above will now look like this:

```php
/*
|--------------------------------------------------------------------------
| Add custom command
|--------------------------------------------------------------------------
|
| If you have a new command to add to Leaf
|
*/
$console->registerCustom(\App\Console\ExampleCommand::class);

// multiple commands
$console->registerCustom([
    \App\Console\CommandOne::class,
    \App\Console\CommandOTwo::class
]);
```