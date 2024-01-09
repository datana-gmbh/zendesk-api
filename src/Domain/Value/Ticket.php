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

namespace Datana\Zendesk\Api\Domain\Value;

use Safe\DateTimeImmutable;

final readonly class Ticket
{
    /**
     * @var array<mixed>
     */
    private array $values;

    public function __construct(
        public string $requesterName,
        public string $requesterEmail,
        public string $subject,
        public string $description,
        /**
         * @var CustomFieldInterface[]
         */
        public array $customFields = [],
        /**
         * @var Upload[]
         */
        public array $uploads = [],
    ) {
        $values = [
            'subject' => $subject,
            'requester' => [
                'name' => $requesterName,
                'email' => $requesterEmail,
            ],
            'comment' => [
                'body' => $description,
            ],
        ];

        foreach ($customFields as $customField) {
            $values['custom_fields'][] = [
                'id' => $customField->id(),
                'value' => $customField->value(),
            ];
        }

        foreach ($uploads as $upload) {
            $values['comment']['uploads'][] = $upload->token;
        }

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
