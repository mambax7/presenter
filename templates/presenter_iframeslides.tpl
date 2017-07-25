<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=1024">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description"
          content="impress.js is a presentation tool based on the power of CSS3 transforms and transitions in modern browsers and inspired by the idea behind prezi.com.">
    <meta name="author" content="Bartek Szopka">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic"
          rel="stylesheet">


    <link href="assets/css/impress-demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

</head>

<body class="impress-not-supported">

<!--
    For example this fallback message is only visible when there is `impress-not-supported` class on body.
-->
<div class="fallback-message">
    <p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified
        version of this presentation.</p>
    <p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
</div>


<div class="outer">

    <table class="presenter" cellpadding="0" cellspacing="0" width="100%">
        <tr class="head">
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_ID}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_CID}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_UID}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_TITLE}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_CONTENT}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_TRANSITION_X}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_TRANSITION_Y}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_TRANSITION_Z}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_ROTATION_X}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_ROTATION_Y}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_ROTATION_Z}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_SCALE_X}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_SCALE_Y}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_SCALE_Z}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_CREATED}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_PUBLISHED}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_POSITION}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_ONLINE}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_TYPE}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_NOTES}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_MP3}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_TIME}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_STATUS}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_WAITING}></th>
            <th class="fields"><{$smarty.const._MA_PRESENTER_SLIDES_ONLINE}></th>
        </tr>
    </table>

</div>


<img id="background-img" class="bg" src="assets/images/beige.jpg" alt="">

/*---------------------------------*/


<div id="impress">

    <{foreach item=slides from=$slides}>
        <div
                <{if $slides.css_id eq ''}> <{else}> id="<{$slides.css_id}>" <{/if}>
                <{if $slides.css_class eq ''}> <{else}> class="<{$slides.css_class}>" <{/if}>


                <{if $slides.slides_transition_x eq ''}> <{else}> data-x="<{$slides.slides_transition_x}>" <{/if}>
                <{if $slides.slides_transition_y eq ''}> <{else}> data-y="<{$slides.slides_transition_y}>" <{/if}>
                <{if $slides.slides_transition_z eq ''}> <{else}> data-z="<{$slides.slides_transition_z}>" <{/if}>
                <{if $slides.slides_rotation_x eq ''}> <{else}> data-rotate-x="<{$slides.slides_rotation_x}>" <{/if}>
                <{if $slides.slides_rotation_y eq ''}> <{else}> data-rotate-y="<{$slides.slides_rotation_y}>" <{/if}>
                <{if $slides.slides_rotation_z eq ''}> <{else}> data-rotate-z="<{$slides.slides_rotation_z}>" <{/if}>
                <{if $slides.slides_scale_x eq ''}> <{else}> data-scale="<{$slides.slides_scale_x}>" <{/if}>
                <{if $slides.slides_scale_y eq ''}> <{else}> data-scale-y="<{$slides.slides_scale_y}>" <{/if}>
                <{if $slides.slides_scale_z eq ''}> <{else}> data-scale-z="<{$slides.slides_scale_z}>"> <{/if}>

            <{$slides.slides_content}>

        </div>
    <{/foreach}>

</div>


/*----------------------------------------------*/
<div class="hint">
    <p>Use a spacebar or arrow keys to navigate</p>

</div>
<script>
    if ("ontouchstart" in document.documentElement) {
        document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
    }

</script>
<script src="assets/js/impress.js"></script>
<script>impress().init();</script>
