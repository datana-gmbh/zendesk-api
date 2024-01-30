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

final readonly class Attachment
{
    /**
     * @var array<mixed>
     */
    private array $values;

    public function __construct(
        public string $filePath,
        public string $mimeType,
        public string $fileName,
    ) {
        $values = [
            'file' => $filePath,
            'type' => $mimeType,
            'name' => $fileName,
        ];

        $this->values = $values;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return $this->values;
    }
}
