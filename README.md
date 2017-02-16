## BackoffV2 [![Build Status](https://travis-ci.org/patinthehat/BackoffV2.svg?branch=master)](https://travis-ci.org/patinthehat/BackoffV2)
---
BackoffV2 is a PHP 5.5+ library implementing various backoff algorithms, such as [exponential backoff](http://en.wikipedia.org/wiki/Exponential_backoff).

This library only returns a backoff delay amount based on the selected algorithms; implementation of the actual delay mechanism (such as [sleep()](http://php.net/manual/en/function.sleep.php)) is left to the user.


---
#### Installation

Install BackoffV2 with [Composer](https://getcomposer.org/):

`composer require patinthehat/backoffv2`

---
#### Implementation

"Jitter" is implemented, if you choose to use it.  Jitter is a small, variable amount of time that is added to the backoff amount.

---
Available Jitter algorithms (roughly based on [this post](https://www.awsarchitectureblog.com/2015/03/backoff.html))  include:

 - NoJitter - No jitter
 - FullJitter - Standard jitter amount
 - EqualJitter - More consistent jitter amounts
 - DecorrelatedJitter - Higher jitter amounts

---
 Backoff algorithms include:
 
  - ExponentialBackoff - exponentially increase the backoff amount
  - ConstantBackoff - use the same backoff amount, regardless of the attempt count.
  - LinearBackoff - linear increase of the backoff amount, i.e. 1, 2, 3, 4, ...


---
#### Usage

---
##### Using the Backoff class

BackoffV2 implements a main class, `Backoff`, that acts as a container and manager for the backoff and jitter algorithms you choose.
The constructor signature for `Backoff` is: 
```php
public function __construct($maxBackoff, BackoffStrategyInterface $backoff, JitterStrategyInterface $jitter)
```

Usage is simple:

```php
include 'vendor/autoload.php';
use BackoffV2\Backoff;
use BackoffV2\Backoff\ExponentialBackoff;
use BackoffV2\Jitter\FullJitter;

$b = new Backoff(15, new ExponentialBackoff, new FullJitter);

echo 'backoff = '.$b->getBackoff() . PHP_EOL;
echo 'backoff = '.$b->getBackoff() . PHP_EOL;
echo 'backoff = '.$b->getBackoff() . PHP_EOL;
echo 'backoff = '.$b->getBackoff() . PHP_EOL;
echo 'backoff = '.$b->getBackoff() . ' (attempt ' . $b->getAttempt().')' . PHP_EOL;
$b->reset();
```

---
#### License

BackoffV2 is available under the [MIT License](LICENSE).
  