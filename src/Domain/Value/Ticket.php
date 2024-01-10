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

final readonly class Ticket
{
    /**
     * @var array<mixed>
     */
    private array $values;

    /**
     * @param CustomFieldInterface[] $customFields
     * @param Upload[]               $uploads
     */
    public function __construct(
        public Requester $requester,
        public string $subject,
        public string $description,
        public array $customFields = [],
        public array $uploads = [],
    ) {
        $values = [
            'subject' => $subject,
            'requester' => $requester->toArray(),
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
