# Suite Settings Extension [![License](https://img.shields.io/packagist/l/friends-of-behat/suite-settings-extension.svg)](https://packagist.org/packages/friends-of-behat/suite-settings-extension) [![Version](https://img.shields.io/packagist/v/friends-of-behat/suite-settings-extension.svg)](https://packagist.org/packages/friends-of-behat/suite-settings-extension) [![Build status on Linux](https://img.shields.io/travis/FriendsOfBehat/SuiteSettingsExtension/master.svg)](http://travis-ci.org/FriendsOfBehat/SuiteSettingsExtension) [![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/FriendsOfBehat/SuiteSettingsExtension.svg)](https://scrutinizer-ci.com/g/FriendsOfBehat/SuiteSettingsExtension/)

Allows to overwrite suites' default settings.

## Usage

1. Install it:

```bash
$ composer require friends-of-behat/suite-settings-extension --dev
```

2. Enable and configure default suite settings in your Behat configuration:

```yaml
default:
    # ...
    extensions:
        FriendsOfBehat\SuiteSettingsExtension: # the default configuration:
            paths:
                - "features" # default one!
            contexts:
                - "FeatureContext" # default one!
```

3. Every suite you create will have those settings as the default ones.

## Configuration reference

 - `paths` - an array, contains locations where Behat looks for `*.feature` files
 - `contexts` - an array, if there are no custom ones in suite configured, these are used

#### Protip!

If you've changed your `paths`, that they do not contain `features` anymore, your contexts
may be not loaded properly. To ensure this, pass the same folder to built-in `autoloader` extension:

```yaml
default:
    # ...
    autoload:
        - "%paths.base%/custom_features/bootstrap" # features -> custom_features
    
    extensions:
        FriendsOfBehat\SuiteSettingsExtension:
            paths:
                - "custom_features"
```
