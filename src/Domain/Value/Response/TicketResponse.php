<?php

declare(strict_types=1);

/**
 * This file is part of Zendesk-Api.
 *
 * (c) Datana GmbH <info@datana.rocks>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Zendesk\Api\Domain\Value\Response;

use Webmozart\Assert\Assert;

final readonly class TicketResponse
{
    public int $id;

    public function __construct(
        public \stdClass $response,
    ) {
        Assert::propertyExists($response, 'ticket');
        Assert::propertyExists($response->ticket, 'id');
        Assert::integer($response->ticket->id);
        Assert::greaterThanEq($response->ticket->id, 1);
        $this->id = $response->ticket->id;
    }
}
