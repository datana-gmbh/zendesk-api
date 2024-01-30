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

namespace Datana\Zendesk\Api\Tests\Fixture\CustomFields;

use Datana\Zendesk\Api\Domain\Value\CustomFieldInterface;

final class SampleCustomField implements CustomFieldInterface
{
    public function id(): int
    {
        return 1231332332;
    }

    public function value(): mixed
    {
        return 'sample value';
    }
}
