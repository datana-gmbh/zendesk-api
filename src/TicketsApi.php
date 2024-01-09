<?php

declare(strict_types=1);

/*
 * This file is part of Zendesk-Api.
 *
 * (c) Datana GmbH <info@datana.rocks>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Zendesk\Api;

use Datana\Zendesk\Api\Domain\Value\Ticket;
use Psr\Log\LoggerInterface;
use Zendesk\API\HttpClient;

final class TicketsApi implements TicketsApiInterface
{
    public function __construct(
        private HttpClient $client,
        private LoggerInterface $logger,
    ) {
    }

    public function create(Ticket $ticket): bool
    {
        try {
            $this->client->tickets()->create($ticket->toArray());

            return true;
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());

            throw $e;
        }
    }
}
