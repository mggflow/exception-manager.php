# ExceptionManager

## About
This package is using to create universal exceptions with codes based on exception sense.

## Usage
To install:
```
composer require mggflow/exception-manager
```

Example:
```
try {
    throw ManageException::build()
        ->log()->warning()->b()
        ->desc()->internal()->tooMany(null, 'Requests')
        ->context(uniqid(), 'importantID')->b()
        ->fill();
} catch (UniException $uniException) {
    echo '<pre>';
    var_dump($uniException->getCode());
    var_dump($uniException->getMessage());
    var_dump($uniException->getInternalMessage());
    var_dump($uniException->getLogLvl());
    var_dump($uniException->getContext());
    var_dump($uniException->getMessageParts());
    echo '</pre>';
}
```

Expected output:
```
int(13)
string(14) "Internal Error"
string(17) "Too many Requests"
int(32)
array(1) {
  ["importantID"]=>
  string(13) "64050ff0be4fa"
}
array(1) {
  [0]=>
  array(2) {
    [0]=>
    int(13)
    [1]=>
    array(2) {
      [0]=>
      string(8) "too many"
      [1]=>
      string(8) "Requests"
    }
  }
}
```