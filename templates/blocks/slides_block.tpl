
<table class="outer">
    <tr class="head">
        <th><{$smarty.const._MB_PRESENTER_SLIDES_ID}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_CID}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_UID}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_TITLE}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_CONTENT}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_TRANSITION_X}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_TRANSITION_Y}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_TRANSITION_Z}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_ROTATION_X}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_ROTATION_Y}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_ROTATION_Z}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_SCALE_X}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_SCALE_Y}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_SCALE_Z}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_CREATED}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_PUBLISHED}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_POSITION}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_ONLINE}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_TYPE}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_NOTES}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_MP3}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_TIME}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_STATUS}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_WAITING}></th><th><{$smarty.const._MB_PRESENTER_SLIDES_ONLINE}></th>
    </tr>
    <{foreachq item=slides from=$block}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td><{$slides.slides_id}>
                <{$slides.slides_cid}>
                <{$slides.slides_uid}>
                <{$slides.slides_title}>
                <{$slides.slides_content}>

                <{$slides.css_id}>
                <{$slides.css_class}>

                <{$slides.slides_transition_x}>
                <{$slides.slides_transition_y}>
                <{$slides.slides_transition_z}>
                <{$slides.slides_rotation_x}>
                <{$slides.slides_rotation_y}>
                <{$slides.slides_rotation_z}>
                <{$slides.slides_scale_x}>
                <{$slides.slides_scale_y}>
                <{$slides.slides_scale_z}>
                <{$slides.slides_created}>
                <{$slides.slides_published}>
                <{$slides.slides_position}>
                <{$slides.slides_online}>
                <{$slides.slides_type}>
                <{$slides.slides_notes}>
                <{$slides.slides_mp3}>
                <{$slides.slides_time}>
                <{$slides.slides_status}>
                <{$slides.slides_waiting}>
                <{$slides.slides_online}>
                    </td>
        </tr>
    <{/foreach}>
</table>
