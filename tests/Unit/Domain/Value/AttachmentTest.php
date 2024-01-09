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

use Datana\Zendesk\Api\Domain\Value\Attachment;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework\TestCase;

final class AttachmentTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function toArray(): void
    {
        $faker = self::faker();

        $attachment = new Attachment(
            $filePath = $faker->filePath(),
            $mimeType = $faker->mimeType(),
            $fileName = sprintf('%s.%s', $faker->word(), $faker->fileExtension()),
        );

        self::assertSame([
            'file' => $filePath,
            'type' => $mimeType,
            'name' => $fileName,
        ], $attachment->toArray());
    }
}
