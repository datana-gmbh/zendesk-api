# zendesk-api

| Branch    | PHP                                         | Code Coverage                                        |
|-----------|---------------------------------------------|------------------------------------------------------|
| `master`  | [![PHP][build-status-master-php]][actions]  | [![Code Coverage][coverage-status-master]][codecov]  |

## Usage

### Installation

```bash
composer require datana-gmbh/zendesk-api
```

### Setup

```php
use Datana\Zammad\Api\ZammadClient;

$baseUri = 'https://...';
$token = '...';

$client = new ZammadClient($baseUri, $token);

// you can now request any endpoint which needs authentication
$client->request('GET', '/api/something', $options);
```

## Tickets

In your code you should type-hint to `Datana\Zammad\Api\TicketsApiInterface`

### Create a ticket

```php
use Datana\Zendesk\Api\Domain\Value\Ticket;
use Datana\Zendesk\Api\TicketsApi;
use Zendesk\API\HttpClient;

$client = new HttpClient(/* ... */);

$ticketsApi = new TicketsApi($client);

$ticket = new Ticket(/* ... */);
$responseAsBool = $ticketsApi->create($ticket);
```

### Create a ticket with attachments

```php
use Datana\Zendesk\Api\Domain\Value\Ticket;
use Datana\Zendesk\Api\TicketsApi;
use Datana\Zendesk\Api\AttachmentsApi;
use Zendesk\API\HttpClient;

$client = new HttpClient(/* ... */);

$attachmentsApi = new AttachmentsApi($client);

$upload = $attachmentsApi->create(/** ... */)

$ticketsApi = new TicketsApi($client);

$ticket = new Ticket(/* ... */ );
$responseAsBool = $ticketsApi->create($ticket);
```


### Custom field definition

```php
<?php

declare(strict_types=1);

namespace App\Bridge\Zendesk\CustomFields;

use Datana\Zendesk\Api\Domain\Value\CustomFieldInterface;

final class SampleCustomField implements CustomFieldInterface
{
    public function id(): int
    {
        return 1231332332;
    }

    public function value(): mixed
    {
        return 'sample value';
    }
}
```

[build-status-master-php]: https://github.com/datana-gmbh/zammad-api/workflows/PHP/badge.svg?branch=master
[coverage-status-master]: https://codecov.io/gh/datana-gmbh/zammad-api/branch/master/graph/badge.svg

[actions]: https://github.com/datana-gmbh/zammad-api/actions
[codecov]: https://codecov.io/gh/datana-gmbh/zammad-api
