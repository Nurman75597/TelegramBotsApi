<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types;

use Kuvardin\TelegramBotsApi\Type;

/**
 * Represents the rights of an administrator in a chat.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ChatAdministratorRights extends Type
{
    /**
     * @param bool $is_anonymous <em>True</em>, if the user's presence in the chat is hidden
     * @param bool $can_manage_chat <em>True</em>, if the administrator can access the chat event log, chat statistics,
     *     message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore
     *     slow mode. Implied by any other administrator privilege
     * @param bool $can_delete_messages <em>True</em>, if the administrator can delete messages of other users
     * @param bool $can_manage_video_chats <em>True</em>, if the administrator can manage video chats
     * @param bool $can_restrict_members <em>True</em>, if the administrator can restrict, ban or unban chat members
     * @param bool $can_promote_members <em>True</em>, if the administrator can add new administrators with a subset of
     *     their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by
     *     administrators that were appointed by the user)
     * @param bool $can_change_info <em>True</em>, if the user is allowed to change the chat title, photo and other
     *     settings
     * @param bool $can_invite_users <em>True</em>, if the user is allowed to invite new users to the chat
     * @param bool|null $can_post_messages <em>True</em>, if the administrator can post in the channel; channels only
     * @param bool|null $can_edit_messages <em>True</em>, if the administrator can edit messages of other users and can
     *     pin messages; channels only
     * @param bool|null $can_pin_messages <em>True</em>, if the user is allowed to pin messages; groups and supergroups
     *     only
     * @param bool|null $can_manage_topics <em>True</em>, if the user is allowed to create, rename, close, and reopen
     *     forum topics; supergroups only
     */
    public function __construct(
        public bool $is_anonymous,
        public bool $can_manage_chat,
        public bool $can_delete_messages,
        public bool $can_manage_video_chats,
        public bool $can_restrict_members,
        public bool $can_promote_members,
        public bool $can_change_info,
        public bool $can_invite_users,
        public ?bool $can_post_messages = null,
        public ?bool $can_edit_messages = null,
        public ?bool $can_pin_messages = null,
        public ?bool $can_manage_topics = null,
    )
    {

    }

    public static function makeByArray(array $data): self
    {
        return new self(
            is_anonymous: $data['is_anonymous'],
            can_manage_chat: $data['can_manage_chat'],
            can_delete_messages: $data['can_delete_messages'],
            can_manage_video_chats: $data['can_manage_video_chats'],
            can_restrict_members: $data['can_restrict_members'],
            can_promote_members: $data['can_promote_members'],
            can_change_info: $data['can_change_info'],
            can_invite_users: $data['can_invite_users'],
            can_post_messages: $data['can_post_messages'] ?? null,
            can_edit_messages: $data['can_edit_messages'] ?? null,
            can_pin_messages: $data['can_pin_messages'] ?? null,
            can_manage_topics: $data['can_manage_topics'] ?? null,
        );
    }

    public function getRequestData(): array
    {
        return [
            'is_anonymous' => $this->is_anonymous,
            'can_manage_chat' => $this->can_manage_chat,
            'can_delete_messages' => $this->can_delete_messages,
            'can_manage_video_chats' => $this->can_manage_video_chats,
            'can_restrict_members' => $this->can_restrict_members,
            'can_promote_members' => $this->can_promote_members,
            'can_change_info' => $this->can_change_info,
            'can_invite_users' => $this->can_invite_users,
            'can_post_messages' => $this->can_post_messages,
            'can_edit_messages' => $this->can_edit_messages,
            'can_pin_messages' => $this->can_pin_messages,
            'can_manage_topics' => $this->can_manage_topics,
        ];
    }
}
