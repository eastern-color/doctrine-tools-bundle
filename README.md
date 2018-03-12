EasternColorDoctrineToolsBundle
=========================
This Symfony bundle provide a set of doctrine tools

Installation
------------
1. `composer require eastern-color/doctrine-tools-bundle`
2. Enable bundle in symfony's __/app/AppKernel.php__
    - `new EasternColor\JsonTransBundle\EasternColorDoctrineToolsBundle()`,

Prerequisites
-------------

TODO
----
- Extends this README

Command
-------
- `php bin\console ec:doctrine-tools:dump-type-enum`
```yml
# app/config/config.yml
imports:
    - { resource: generated/config_doctrine_dbal_enum_types.yml }
```

Basic Usage (route option)
--------------------------

Advanced Usage
-----


License
-------
This bundle is under the MIT license.
