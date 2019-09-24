<?php

namespace GeekyAnts\TrelloService\Utils;


class Utils
{

    function trelloNomenclatureOf($data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = $this->trelloNomenclatureOf($value);
            }
            $result[$this->getTrelloVariableName($key)] = $value;
        }
        return $result;
    }

    public function getTrelloVariableName($dbName)
    {
        switch ($dbName) {
            case 'id':
                return 'id';
            case 'name':
                return 'name';
            case 'desc':
                return 'desc';
            case 'desc_data':
                return 'descData';
            case 'closed':
                return 'closed';
            case 'organization_id':
                return 'idOrganization';
            case 'pinned':
                return 'pinned';
            case 'url':
                return 'url';
            case 'short_url':
                return 'shortUrl';
            case 'starred':
                return 'starred';
            case 'date_last_activity':
                return 'dateLastActivity';
            case 'due':
                return 'due';
            case 'due_complete':
                return 'dueComplete';
            case 'attachment_cover_id':
                return 'idAttachmentCover';
            case 'board_id':
                return 'idBoard';
            case 'list_id':
                return 'idList';
            case 'manual_cover_attachments':
                return 'manualCoverAttachment';
            case 'pos':
                return 'pos';
            case 'short_link':
                return 'shortLink';
            case 'subscribed':
                return 'subscribed';
            case 'address':
                return 'address';
            case 'location_name':
                return 'locationName';
            case 'soft_limit':
                return 'softLimit';
            case 'pref':
                return 'prefs';
            case 'background':
                return 'background';
            case 'background_bottom_color':
                return 'backgroundBottomColor';
            case 'background_brightness':
                return 'backgroundBrightness';
            case 'background_color':
                return 'backgroundColor';
            case 'background_image':
                return 'backgroundImage';
            case 'background_image_scaled':
                return 'backgroundImageScaled';
            case 'background_tile':
                return 'backgroundTile';
            case 'background_top_color':
                return 'backgroundTopColor';
            case 'calendar_feed_enabled':
                return 'calendarFeedEnabled';
            case 'can_be_enterprise':
                return 'canBeEnterprise';
            case 'can_be_org':
                return 'canBeOrg';
            case 'can_be_private':
                return 'canBePrivate';
            case 'can_be_public':
                return 'canBePublic';
            case 'can_invite':
                return 'canInvite';
            case 'card_aging':
                return 'cardAging';
            case 'card_covers':
                return 'cardCovers';
            case 'comments':
                return 'comments';
            case 'hide_votes':
                return 'hideVotes';
            case 'invitations':
                return 'invitations';
            case 'is_template':
                return 'isTemplate';
            case 'permission_level':
                return 'permissionLevel';
            case 'self_join':
                return 'selfJoin';
            case 'voting':
                return 'voting';
            case 'label_name':
                return 'labelNames';
            case 'black':
                return 'black';
            case 'blue':
                return 'blue';
            case 'green':
                return 'green';
            case 'lime':
                return 'lime';
            case 'orange':
                return 'orange';
            case 'pink':
                return 'pink';
            case 'purple':
                return 'purple';
            case 'red':
                return 'red';
            case 'sky':
                return 'sky';
            case 'yellow':
                return 'yellow';
            case "votes":
                return "votes";
            case "subscribed":
                return "subscribed";
            case "fogbugz":
                return "fogbugz";
            case "comments":
                return "comments";
            case "attachments":
                return "attachments";
            case "description":
                return "description";
            case "due":
                return "due";
            case "badges":
                return "badges";
            case 'check_items':
                return 'checkItems';
            case 'check_items_checked':
                return 'checkItemsChecked';
            case 'viewing_members_voted':
                return 'viewingMemberVoted';
            case 'data':
                return 'data';

            default:
                return $dbName;
        }
    }


    function isNotEmpty($id)
    {
        if ($id == null || trim($id) == "") {
            return false;
        }
        return true;
    }

    function fieldValidator($value, $validValues)
    {
        if (in_array($value, $validValues)) {
            return true;
        } else {
            return false;
        }
    }
}
