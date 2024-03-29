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

use OskarStark\Value\TrimmedNonEmptyString;

final readonly class Upload
{
    public string $token;

    public function __construct(
        string $token,
    ) {
        $this->token = TrimmedNonEmptyString::fromString($token)->toString();
    }
}
