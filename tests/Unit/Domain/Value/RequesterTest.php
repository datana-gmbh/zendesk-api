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

namespace Datana\Zendesk\Api\Tests\Unit\Domain\Value;

use Datana\Zendesk\Api\Domain\Value\Requester;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework\TestCase;

final class RequesterTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function toArray(): void
    {
        $faker = self::faker();

        $requester = new Requester(
            $name = $faker->name(),
            $email = $faker->email(),
        );

        self::assertSame([
            'name' => $name,
            'email' => $email,
        ], $requester->toArray());
    }

    /**
     * @test
     */
    public function toArrayWithPhone(): void
    {
        $faker = self::faker();

        $requester = new Requester(
            $name = $faker->name(),
            $email = $faker->email(),
            $phone = $faker->phoneNumber(),
        );

        self::assertSame([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ], $requester->toArray());
    }
}
