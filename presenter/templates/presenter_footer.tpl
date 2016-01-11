<{if $social_bookmarks != 0}>
<{include file="db:system_social_bookmarks.tpl"}>
<{/if}>
<{if $fbcomments != 0}>
<{include file="db:system_fbcomments.html"}>
<{/if}>
<div class="left"><{$copyright}></div>
<{if $xoops_isadmin}>
   <div class="center bold"><a href="<{$admin}>"><{$smarty.const._MA_PRESENTER_ADMIN}></a></div>
<{/if}>
