<?php include "templates/V_header.php" ?>
<style>
    .wrap {
        width: 800px;
        color: black;
        margin: 20px auto;
        padding: 15px;
    }
</style>
<br>
<div class="container">
    <div class="row">
        <table style="padding: 5%;">
            <tr>
                <td rowspan="10" width="100px">
            <tr>
                <td>
                    <h3 class="title-text"><?= $post_data->post_title ?></h3>
                </td>
            </tr>
            <tr>
                <td><b>Ditulis oleh </b></td>
                <td>:</td>
                <td> <?= $user_data->user_fullname ?>(@<?= $user_data->username ?>)</td>
            </tr>
            <tr>
                <td><b>Topik </b></td>
                <td>:</td>
                <td> <?= $post_data->topic_name ?></td>
            </tr>
            <tr>
                <td><b>Tingkat </b></td>
                <td>:</td>
                <td> <?= $post_data->grade_name ?></td>
            </tr>
        </table>
        <br>
        <br>
    </div>
    <div class="row">
        <div class="col">
            <h4 class="tags">Tag : <?php
                                    $count = count($post_tags);
                                    $index = 0;
                                    foreach ($post_tags as $tag) {
                                        $index++;
                                        if ($index === $count) {
                                            echo $tag->tag_name;
                                        } else {
                                            echo $tag->tag_name . ', ';
                                        }
                                    }
                                    ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button onclick="postLiked()" id="like-button"
            <?php 
            if ($this->session->is_logged_in == 0) echo 'disabled';
            if(!empty($viewer_like_data)){
                if($viewer_like_data[0]->user_has_liked){
                    echo 'style="background-color:blue"';
                }
            }
            ?>
            >Like</button>
            <p style="display:inline" id="like-count"></p>
            <button onclick="postDisliked()" id="dislike-button"
            <?php 
            if ($this->session->is_logged_in == 0) echo 'disabled';
            if(!empty($viewer_like_data)){
                if($viewer_like_data[0]->user_has_disliked){
                    echo 'style="background-color:red"';
                }
            }
            ?>
            >Dislike</button>
            <p style="display:inline" id="dislike-count"></p>
        </div>
    </div>
    <div class="row my-3">
        <div id="editorjs"></div>
    </div> <br>
    <div class="row">
        <hr style="border:5px solid">
        <h2>Komentar</h2>
    </div>
    <?php if($this->session->is_logged_in){ ?>
    <div class="row" style="margin-bottom:25px">
        <form action="<?= site_url('C_StudySociety/addComment')?>" method="POST">
            <input type="hidden" name="post_id" value="<?=$post_data->post_id?>">
            <input type="hidden" name="user_id" value="<?=$this->session->user_id?>">
            <textarea name="comment_content" id="" cols="80" rows="5" placeholder="Berkomentar sebagai <?= $this->session->username?>" required></textarea> <br> <br>
            <button type="submit">Kirim</button>
        </form>
    </div>
    <?php } ?>
    <div class="row">
        <?php
            if(empty($post_comments)){
                echo "<h4> Belum ada komentar </h4>";
            }
            else{
                foreach($post_comments as $comment){
        ?>
        <div class="comment" style="margin-top:10px;margin-bottom:10px;">
            <a href="<?= site_url('C_StudySociety/V_userProfile/?username='.$comment->username)?>" style="text-decoration:none"><?= $comment->user_fullname?></a>
            <?php if($this->session->username == $comment->username){ ?>
            <a href="<?= site_url('C_StudySociety/deleteComment/?comment_id='.$comment->comment_id.'&post_id='.$post_data->post_id)?>" style="margin-left:10px;">Hapus</a>
            <?php } ?>
            <br>
            <p><?= $comment->comment_content?></p>
        </div>
        <?php 
                }
            } 
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script><!-- Image -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->

<script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->

<!-- Load Editor.js's Core -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
<script>
    class CustomImageTool extends ImageTool {
        removed() {
            const {
                file
            } = this._data;
            let imageUrl = file.url;
            console.log(imageUrl);
            $.ajax({
                url: '<?= site_url('C_StudySociety/delete_image_from_post') ?>',
                method: 'POST',
                data: {
                    imageUrl: imageUrl
                },
                success: (response) => {
                    // Handle the success response if needed
                    console.log()
                },
                error: (error) => {
                    // Handle the error if needed
                }
            });
        }
    }
    $(document).ready(function() {
        var editor = new EditorJS({
            /**
             * Enable/Disable the read only mode
             */
            readOnly: true,

            /**
             * Wrapper of Editor
             */
            holder: 'editorjs',

            /**
             * Common Inline Toolbar settings
             * - if true (or not specified), the order from 'tool' property will be used
             * - if an array of tool names, this order will be used
             */
            // inlineToolbar: ['link', 'marker', 'bold', 'italic'],
            // inlineToolbar: true,

            /**
             * Tools list
             */
            tools: {
                /**
                 * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
                 */
                header: {
                    class: Header,
                    inlineToolbar: ['marker', 'link'],
                    config: {
                        placeholder: 'Header'
                    },
                    shortcut: 'CMD+SHIFT+H'
                },

                /**
                 * Or pass class directly without any configuration
                 */
                image: {
                    class: CustomImageTool,
                    config: {
                        endpoints: {
                            byFile: '<?= site_url('C_StudySociety/upload_image_to_post') ?>', // Your backend file uploader endpoint
                            byUrl: '<?= site_url('C_StudySociety/upload_image_by_url') ?>', // Your endpoint that provides uploading by Url
                        }
                    }
                },

                list: {
                    class: List,
                    inlineToolbar: true,
                    shortcut: 'CMD+SHIFT+L'
                },

                checklist: {
                    class: Checklist,
                    inlineToolbar: true,
                },


                quote: {
                    class: Quote,
                    inlineToolbar: true,
                    config: {
                        quotePlaceholder: 'Enter a quote',
                        captionPlaceholder: 'Quote\'s author',
                    },
                    shortcut: 'CMD+SHIFT+O'
                },

                warning: Warning,

                marker: {
                    class: Marker,
                    shortcut: 'CMD+SHIFT+M'
                },

                code: {
                    class: CodeTool,
                    shortcut: 'CMD+SHIFT+C'
                },

                delimiter: Delimiter,

                inlineCode: {
                    class: InlineCode,
                    shortcut: 'CMD+SHIFT+C'
                },

                linkTool: LinkTool,

                embed: Embed,

                table: {
                    class: Table,
                    inlineToolbar: true,
                    shortcut: 'CMD+ALT+T'
                },

            },
            placeholder: "Tulis disini",
            onReady: function() {
                saveButton.click();
            },
            onChange: function(api, event) {
                console.log('something changed', event.detail);
            },
            data: {
                "blocks": <?= json_encode($post_blocks) ?>
            }
        });

    });

    let postId = <?= $post_data->post_id ?>;
    <?php if ($this->session->is_logged_in == 0) $this->session->set_userdata('user_id', 0) ?>
    let userId = <?= $this->session->user_id ?>;

    let likeCount = <?= $post_data->post_like_count ?>;
    let dislikeCount = <?= $post_data->post_dislike_count ?>;
    let likeButton = document.querySelector('#like-button'); 
    let likeText = document.querySelector('#like-count');
    let dislikeButton = document.querySelector('#dislike-button'); 
    let dislikeText = document.querySelector('#dislike-count');

    likeText.innerHTML = likeCount;
    dislikeText.innerHTML = dislikeCount;

    function postLiked() {
        $.ajax({
            url: '<?= site_url('C_StudySociety/ratePost') ?>',
            method: 'POST',
            data: {
                rating: 1,
                post_id: postId,
                user_id: userId
            },
            success: (response) => {
                // Handle the success response if needed
                if (response.success) {
                    likeCount += response.liked;
                    dislikeCount += response.disliked;
                    likeText.innerHTML = likeCount;
                    dislikeText.innerHTML = dislikeCount;
                    if(response.liked < 0){
                        likeButton.removeAttribute('style');
                    }
                    else if(response.liked > 0){
                        likeButton.style = "background-color:blue";
                    }
                    if(response.disliked < 0){
                        dislikeButton.removeAttribute('style');
                    }
                    else if(response.disliked > 0){
                        dislikeButton.style = "background-color:red";
                    }
                }
            },
            error: (error) => {
                // Handle the error if needed
            }
        });
    }

    function postDisliked() {
        $.ajax({
            url: '<?= site_url('C_StudySociety/ratePost') ?>',
            method: 'POST',
            data: {
                rating: -1,
                post_id: postId,
                user_id: userId
            },
            success: (response) => {
                // Handle the success response if needed
                console.log()
                if (response.success) {
                    likeCount += response.liked;
                    dislikeCount += response.disliked;
                    likeText.innerHTML = likeCount;
                    dislikeText.innerHTML = dislikeCount;
                    if(response.liked < 0){
                        likeButton.removeAttribute('style');
                    }
                    else if(response.liked > 0){
                        likeButton.style = "background-color:blue";
                    }
                    if(response.disliked < 0){
                        dislikeButton.removeAttribute('style');
                    }
                    else if(response.disliked > 0){
                        dislikeButton.style = "background-color:red";
                    }
                }
            },
            error: (error) => {
                // Handle the error if needed
            }
        });
    }
</script>
<?php include "templates/V_footer.php" ?>