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

interface CustomFieldInterface
{
    public function id(): int;

    public function value(): mixed;
}
