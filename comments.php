<div class="post-comments">
    <h3 class="post-sub-heading">
        <?php
        $neha_cmt = get_comments_number();
        if($neha_cmt <= 1){
            echo $neha_cmt.' comment';
        }else{
            echo $neha_cmt.' comments';
        }
        ?>
    </h3>
    <ul class="media-list comments-list m-bot-50 clearlist">
        <!-- Comment Item start-->
        <?php wp_list_comments(); ?>
    </ul>
</div>
<div class="post-comments-form">
    <h3 class="post-sub-heading">Leave You Comments</h3>
    <?php comment_form(); ?>
</div>