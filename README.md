# Domain-Driven Design generics

![PHP requirement](https://img.shields.io/packagist/php-v/andrzejkupczyk/ddd-generic-subdomain?logo=php&style=for-the-badge)

This package provides interfaces that can be used to support coherent implementation of DDD components within your core 
domain. It is intended to be used as an off-the-shelf solution that helps to avoid clogging up a domain model and to 
force members of your team or yourself on thinking in terms of immutable objects and their interaction. 
 
All implementations are inspired by literature, ValueObject library created by [Nicolò Pignatelli](https://github.com/nicolopignatelli), 
[SeedStack](http://seedstack.org) Java development stack, [ValueObjects toolkit](https://github.com/barryosull/valueobjects)
 and some other, more direct sources, but mainly by my experiences and needs.

## Components

Documentation is for the weak, but there is some useful information in the code.

### [Value Object](src/ValueObject/ValueObject.php)'s Immutability

The `ValueObject` interface represents an immutable object that have no identity, 
however immutability is not guaranteed in PHP. Currently, the only way of achieving immutability is through encapsulation, 
therefore you can use `ImmutableValueObject` proxy class. 

```php
$year = new ImmutableValueObject(new Year(2020));
// or, using a helper function
$year = immutable(new Year(2020));
```

A proxied value object acts as a substitute for a real one, but at the same time it gives more confidence regarding its immutability.
    
Finally, you can also use [Psalm](https://psalm.dev/articles/immutability-and-beyond).

## Installation

Using Composer:

```
composer require andrzejkupczyk/ddd-generic-subdomain
```

## Example usages

https://github.com/andrzejkupczyk/ddd-building-blocks
