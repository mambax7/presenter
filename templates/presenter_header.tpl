<div class="header">
<span class="left"><b><{$smarty.const._MA_PRESENTER_TITLE}></b>&#58;&#160;</span>
<span class="left"><{$smarty.const._MA_PRESENTER_DESC}></span><br />
</div>
<div class="head">
    <{if $adv != ''}>
        <div class="center"><{$adv}></div>
    <{/if}>
</div>
<table class="outer" cellspacing="2" cellpadding="2">
    <thead>
          <tr class="center"<{if $adv == ''}> colspan="2"<{/if}>>
          <th><{$smarty.const._MA_PRESENTER_TITLE}>  -  <{$smarty.const._MA_PRESENTER_DESC}></th>
          </tr>
    </thead>
    <tbody>
        <tr class="center">
            <td class="center bold pad5"<{if $adv == ''}> colspan="2"<{/if}>>
                <ul class="menu center">
                    <li><a href="<{$presenter_url}>"><{$smarty.const._MA_PRESENTER_INDEX}></a></li>
                    <li> | </li>
                    <li><a href="<{$presenter_url}>/categories.php"><{$smarty.const._MA_PRESENTER_CATEGORIES}></a></li>

                    <li> | </li>
                    <li><a href="<{$presenter_url}>/slides.php"><{$smarty.const._MA_PRESENTER_SLIDES}></a></li>
                    </ul>
            </td>
        </tr>
        <{if $adv != ''}>
        <tr class="center"><td class="center bold pad5"><{$adv}></td></tr>
        <{/if}>
    </tbody>
</table>
