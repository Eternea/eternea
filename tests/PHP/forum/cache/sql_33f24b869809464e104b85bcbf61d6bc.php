<?php exit; ?>
1373142934
SELECT ban_ip, ban_userid, ban_email, ban_exclude, ban_give_reason, ban_end FROM forum_banlist WHERE (ban_ip = '' OR ban_exclude = 1) AND (ban_userid = 0 OR ban_exclude = 1)
6
a:0:{}