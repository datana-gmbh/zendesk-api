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

namespace Datana\Zendesk\Api\Tests\Unit\Domain\Value\Response;

use Datana\Zendesk\Api\Domain\Value\Response\TicketResponse;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework\TestCase;

final class TicketResponseTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function canBeConstructed(): void
    {
        $faker = self::faker();

        $id = $faker->numberBetween(1);

        $ticket = new \stdClass();
        $ticket->id = $id;

        $response = new \stdClass();
        $response->ticket = $ticket;

        $ticketResponse = new TicketResponse($response);

        self::assertSame($id, $ticketResponse->id);
    }

    /**
     * @test
     */
    public function constructObjectThrowsExceptionOnEmptyStdClass(): void
    {
        self::expectException(\InvalidArgumentException::class);

        new TicketResponse(new \stdClass());
    }

    /**
     * @test
     */
    public function constructObjectThrowsExceptionOnEmptyTicketStdClass(): void
    {
        self::expectException(\InvalidArgumentException::class);

        $response = new \stdClass();
        $response->ticket = new \stdClass();

        new TicketResponse($response);
    }
}
