![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue)
![License](https://img.shields.io/badge/License-MIT-green)

# Serializer Package

A simple, powerful JSON serializer library for PHP inspired by Symfony components. Transform JSON data into PHP objects with ease.

## Installation

```bash
composer require vigihdev/serializer
```

## Quick Start

```php
use Serializer\Factory\JsonTransformerFactory;

// Transform JSON file to objects
$transformer = JsonTransformerFactory::create(YourDTO::class);
$objects = $transformer->transformWithFile('data.json');

// Or transform JSON string
$json = '{"name": "John", "age": 30}';
$object = $transformer->transformJson($json);
```

## Features

- ✅ Transform JSON to PHP objects
- ✅ Handle both single objects and arrays
- ✅ File-based and string-based transformation
- ✅ Symfony Serializer integration
- ✅ Proper error handling with custom exceptions
- ✅ Type safety with PHP 8.1+ features

## Usage Examples

### Basic DTO

```php
class UserDto
{
    public function __construct(
        public readonly string $name,
        public readonly int $age,
        public readonly string $email
    ) {}
}
```

### Transform from File

```php
$transformer = JsonTransformerFactory::create(UserDto::class);
$users = $transformer->transformWithFile('users.json');

foreach ($users as $user) {
    echo $user->name . ': ' . $user->email;
}
```

### Transform from JSON String

```php
$json = '{"name": "Alice", "age": 25, "email": "alice@example.com"}';
$user = $transformer->transformJson($json);

echo $user->name; // "Alice"
```

## Error Handling

```php
use Serializer\Exception\TransformerException;

try {
    $transformer->transformWithFile('invalid.json');
} catch (TransformerException $e) {
    echo "Error: " . $e->getMessage();
}
```

## Requirements

- PHP 8.1 or higher
- Symfony Serializer Component

## License

MIT License - feel free to use in your projects!

---

**Simple · Fast · Reliable**
