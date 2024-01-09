<?php

declare(strict_types=1);

/*
 * This file is part of Zammad-Api.
 *
 * (c) Datana GmbH <info@datana.rocks>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Zendesk\Api;

use Datana\Zendesk\Api\Domain\Value\Attachment;
use Datana\Zendesk\Api\Domain\Value\Upload;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Zendesk\API\HttpClient;

final class AttachmentsApi implements AttachmentsApiInterface
{
    public function __construct(
        private HttpClient $client,
        private LoggerInterface $logger,
    ) {
    }

    public function create(Attachment $attachment): Upload
    {
        try {
            $response = $this->client->attachments()->upload($attachment->toArray());

            if (null === $response) {
                throw new UploadException(sprintf('Upload of "%s" failed.', $attachment->filePath));
            }

            return new Upload($response->upload->token);
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());

            throw $e;
        }
    }
}
