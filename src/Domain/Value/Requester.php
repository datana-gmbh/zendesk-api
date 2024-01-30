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
 * @phpstan-type Values array{
 *       name: string,
 *       email: string,
 *       phone?: string
 *  }
 */
final readonly class Requester
{
    /**
     * @var Values
     */
    private array $values;

    public function __construct(
        public string $name,
        public string $email,
        public ?string $phone = null,
    ) {
        $values = [
            'name' => $name,
            'email' => $email,
        ];

        if (null !== $phone) {
            $values['phone'] = $phone;
        }

        $this->values = $values;
    }

    /**
     * @return Values
     */
    public function toArray(): array
    {
        return $this->values;
    }
}
