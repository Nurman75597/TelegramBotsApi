<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Kuvardin\TelegramBotsApi\Exceptions\TelegramBotsApiException;
use Kuvardin\TelegramBotsApi\Request;
use Kuvardin\TelegramBotsApi\Types\Sticker;

/**
 * In response to this request, array of Sticker object will be received.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class RequestStickers extends Request
{
    /**
     * @return Sticker[]
     * @throws GuzzleException
     * @throws TelegramBotsApiException
     */
    public function sendRequest(int $attempts = 1): array
    {
        $response = $this->request($attempts);

        $result = [];
        foreach ($response as $message_data) {
            $result[] = Sticker::makeByArray($message_data);
        }

        return $result;
    }
}