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

use Datana\Zendesk\Api\Domain\Value\Upload;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework\TestCase;

final class UploadTest extends TestCase
{
    use Helper;

    /**
     * @test
     *
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::trimmed()
     */
    public function token(string $token): void
    {
        self::assertSame($token, (new Upload($token))->token);
    }

    /**
     * @test
     *
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::empty()
     */
    public function invalidToken(string $token): void
    {
        self::expectException(\InvalidArgumentException::class);

        new Upload($token);
    }
}
