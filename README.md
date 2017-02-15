## BackoffV2 ##
---
BackoffV2 is a PHP 5+ library implementing various backoff algorithms, such as exponential backoff.  Supported versions of PHP include 5.5, 5.6, 7.0+.

---
#### Installation

Install BackoffV2 with composer: 
`composer require patinthehat/backoffv2`

---
#### Usage

BackoffV2 implements a main class, `Backoff`, that acts as a container and manager for the backoff and jitter algorithms you choose.

"Jitter" is implemented, if you choose to use it.  Jitter is a small, variable amount of time that is added to the backoff amount.
Available Jitter algorithms include:

 - NoJitter
 - FullJitter
 - EqualJitter
 - DecorrelatedJitter


 Backoff algorithms include:
 
  - ExponentialBackoff
  - ConstantBackoff
  
Usage is simple:

```php
include 'vendor/autoload.php';
use BackoffV2\Backoff;
use BackoffV2\Backoff\ExponentialBackoff;
use BackoffV2\Jitter\FullJitter;

$b = new Backoff(15 /*max backoff amount */, new ExponentialBackoff, new FullJitter);

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
  