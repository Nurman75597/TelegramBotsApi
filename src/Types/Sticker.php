<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types;

use Kuvardin\TelegramBotsApi\Enums\StickerType;
use Kuvardin\TelegramBotsApi\Type;

/**
 * This object represents a sticker.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Sticker extends Type
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and
     *     for different bots. Can't be used to download or reuse the file.
     * @param string $type_value Type of the sticker, currently one of Enums\StickerType. The type of the sticker
     *     is independent from its format, which is determined by the fields is_animated and is_video.
     * @param int $width Sticker width
     * @param int $height Sticker height
     * @param bool $is_animated <em>True</em>, if the sticker is <a
     *     href="https://telegram.org/blog/animated-stickers">animated</a>
     * @param bool $is_video <em>True</em>, if the sticker is a <a
     *     href="https://telegram.org/blog/video-stickers-better-reactions">video sticker</a>
     * @param PhotoSize|null $thumb Sticker thumbnail in the .WEBP or .JPG format
     * @param string|null $emoji Emoji associated with the sticker
     * @param string|null $set_name Name of the sticker set to which the sticker belongs
     * @param File|null $premium_animation For premium regular stickers, premium animation for the sticker
     * @param MaskPosition|null $mask_position For mask stickers, the position where the mask should be placed
     * @param string|null $custom_emoji_id For custom emoji stickers, unique identifier of the custom emoji
     * @param int|null $file_size File size in bytes
     */
    public function __construct(
        public string $file_id,
        public string $file_unique_id,
        public string $type_value,
        public int $width,
        public int $height,
        public bool $is_animated,
        public bool $is_video,
        public ?PhotoSize $thumb = null,
        public ?string $emoji = null,
        public ?string $set_name = null,
        public ?File $premium_animation = null,
        public ?MaskPosition $mask_position = null,
        public ?string $custom_emoji_id = null,
        public ?int $file_size = null,
    )
    {

    }

    public static function makeByArray(array $data): self
    {
        return new self(
            file_id: $data['file_id'],
            file_unique_id: $data['file_unique_id'],
            type_value: $data['type'],
            width: $data['width'],
            height: $data['height'],
            is_animated: $data['is_animated'],
            is_video: $data['is_video'],
            thumb: isset($data['thumb'])
                ? PhotoSize::makeByArray($data['thumb'])
                : null,
            emoji: $data['emoji'] ?? null,
            set_name: $data['set_name'] ?? null,
            premium_animation: isset($data['premium_animation'])
                ? File::makeByArray($data['premium_animation'])
                : null,
            mask_position: isset($data['mask_position'])
                ? MaskPosition::makeByArray($data['mask_position'])
                : null,
            custom_emoji_id: $data['custom_emoji_id'] ?? null,
            file_size: $data['file_size'] ?? null,
        );
    }

    public function getRequestData(): array
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'type' => $this->type_value,
            'width' => $this->width,
            'height' => $this->height,
            'is_animated' => $this->is_animated,
            'is_video' => $this->is_video,
            'thumb' => $this->thumb,
            'emoji' => $this->emoji,
            'set_name' => $this->set_name,
            'premium_animation' => $this->premium_animation,
            'mask_position' => $this->mask_position,
            'custom_emoji_id' => $this->custom_emoji_id,
            'file_size' => $this->file_size,
        ];
    }

    /**
     * @return StickerType|null Returns <em>Null</em> if the sticker type is unknown.
     */
    public function getType(): ?StickerType
    {
        return StickerType::tryFrom($this->type_value);
    }
}
