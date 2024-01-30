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

namespace Datana\Zendesk\Api\Domain\Value;

/**
 * @phpstan-type AttachmentValues array{
 *      file: string,
 *      type: string,
 *      name: string,
 * }
 */
final readonly class Attachment
{
    /**
     * @var AttachmentValues
     */
    private array $values;

    public function __construct(
        public string $filePath,
        public string $mimeType,
        public string $fileName,
    ) {
        $this->values = [
            'file' => $filePath,
            'type' => $mimeType,
            'name' => $fileName,
        ];
    }

    /**
     * @return AttachmentValues
     */
    public function toArray(): array
    {
        return $this->values;
    }
}
