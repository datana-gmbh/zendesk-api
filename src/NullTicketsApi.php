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

namespace Datana\Zendesk\Api;

use Datana\Zendesk\Api\Domain\Value\Response\TicketResponse;
use Datana\Zendesk\Api\Domain\Value\Ticket;

final class NullTicketsApi implements TicketsApiInterface
{
    public function create(Ticket $ticket): TicketResponse
    {
        $response = new \stdClass();
        $response->tickets = new \stdClass();
        $response->tickets->id = 1234;

        return new TicketResponse($response);
    }
}
