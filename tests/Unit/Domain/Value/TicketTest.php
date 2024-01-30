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

namespace Datana\Zendesk\Api\Tests\Unit\Domain\Value;

use Datana\Zendesk\Api\Domain\Value\Requester;
use Datana\Zendesk\Api\Domain\Value\Ticket;
use Datana\Zendesk\Api\Domain\Value\Upload;
use Datana\Zendesk\Api\Tests\Fixture\CustomFields\SampleCustomField;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework\TestCase;

final class TicketTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function toArray(): void
    {
        $faker = self::faker();

        $ticket = new Ticket(
            new Requester(
                $name = $faker->name(),
                $email = $faker->email(),
            ),
            $subject = $faker->sentence(),
            $description = $faker->text(),
        );

        self::assertSame([
            'subject' => $subject,
            'requester' => [
                'name' => $name,
                'email' => $email,
            ],
            'comment' => [
                'body' => $description,
            ],
        ], $ticket->toArray());
    }

    /**
     * @test
     */
    public function toArrayWithCustomFields(): void
    {
        $faker = self::faker();

        $ticket = new Ticket(
            new Requester(
                $name = $faker->name(),
                $email = $faker->email(),
            ),
            $subject = $faker->sentence(),
            $description = $faker->text(),
            [$customField = new SampleCustomField()],
        );

        self::assertSame([
            'subject' => $subject,
            'requester' => [
                'name' => $name,
                'email' => $email,
            ],
            'comment' => [
                'body' => $description,
            ],
            'custom_fields' => [
                [
                    'id' => $customField->id(),
                    'value' => $customField->value(),
                ],
            ],
        ], $ticket->toArray());
    }

    /**
     * @test
     */
    public function toArrayWithUploads(): void
    {
        $faker = self::faker();

        $ticket = new Ticket(
            new Requester(
                $name = $faker->name(),
                $email = $faker->email(),
            ),
            $subject = $faker->sentence(),
            $description = $faker->text(),
            [],
            [$upload = new Upload($faker->md5())],
        );

        self::assertSame([
            'subject' => $subject,
            'requester' => [
                'name' => $name,
                'email' => $email,
            ],
            'comment' => [
                'body' => $description,
                'uploads' => [
                    $upload->token,
                ],
            ],
        ], $ticket->toArray());
    }
}
