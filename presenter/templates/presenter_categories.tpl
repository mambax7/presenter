<{include file="db:presenter_header.tpl"}>
<div class="outer">
    <table class="presenter" cellpadding="0" cellspacing="0" width="100%">
        <tr class="head">
            <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_ID}></th>
        <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_PID}></th>
        <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_TITLE}></th>
        <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_DESC}></th>
        <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_IMAGE}></th>
        <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_WEIGHT}></th>
        <th class="fields"><{$smarty.const._MA_PRESENTER_CAT_COLOR}></th>
    </tr>
        <{foreach item=cat from=$categories}>
            <tr class="<{cycle values='odd, even'}>">
    <td class="fields"><{$cat.cat_id}></td>
        <td class="fields"><{$cat.cat_pid}></td>
        <td class="fields"><{$cat.cat_title}></td>
        <td class="fields"><{$cat.cat_desc}></td>
        <td class="fields"><{$cat.cat_image}></td>
        <td class="fields"><{$cat.cat_weight}></td>
        <td class="fields"><{$cat.cat_color}></td>
        </tr>
        <{/foreach}>
    </table>
</div>
<{*<{include file="db:presenter_footer.tpl"}>*}>
