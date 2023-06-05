<?php include "templates/V_header.php" ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="title-text"><?= $post_data->post_title ?></h3>
            <h5 class="post-author">Ditulis oleh : <?= $user_data->user_fullname ?>(@<?= $user_data->username ?>)</h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4 class="topic">Topik : <?= $post_data->topic_name ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4 class="grade">Tingkat : <?= $post_data->grade_name ?></h4>
        </div>
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
            <button onclick="postLiked()" <?php if($this->session->is_logged_in == 0) echo 'disabled' ?>>Like</button>
            <p style="display:inline" id="like-count"></p>
            <button onclick="postDisliked()" <?php if($this->session->is_logged_in == 0) echo 'disabled' ?>>Dislike</button>
            <p style="display:inline" id="dislike-count"></p>
        </div>
    </div>
    <div class="row my-3">
        <div id="editorjs"></div>
    </div> <br>

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
        let likeCount = <?= $post_data->post_like_count?>;
        let dislikeCount = <?= $post_data->post_dislike_count?>;
        document.querySelector('#like-count').innerHTML = likeCount;
        document.querySelector('#dislike-count').innerHTML = dislikeCount;
        
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

    let postId = <?= $post_data->post_id?>;
    <?php if($this->session->is_logged_in == 0) $this->session->set_userdata('user_id',0) ?>
    let userId = <?= $this->session->user_id?>;

    function postLiked() {
        $.ajax({
            url: '<?= site_url('C_StudySociety/ratePost') ?>',
            method: 'POST',
            data: {
                rating: 1,
                post_id : postId,
                user_id : userId
            },
            success: (response) => {
                // Handle the success response if needed
                if(response.success){
                    likeCount += response.like_data_add;
                    dislikeCount += response.dislike_data_add;
                    document.querySelector('#like-count').innerHTML = likeCount;
                    document.querySelector('#dislike-count').innerHTML = dislikeCount;
                }
            },
            error: (error) => {
                // Handle the error if needed
            }
        });
    }
    function postDisliked(){
        console.log("disliked");
        $.ajax({
            url: '<?= site_url('C_StudySociety/ratePost') ?>',
            method: 'POST',
            data: {
                rating: 2,
                post_id : postId,
                user_id : userId
            },
            success: (response) => {
                // Handle the success response if needed
                console.log()
                likeCount += response.like_data_add;
                    dislikeCount += response.dislike_data_add;
                    document.querySelector('#like-count').innerHTML = likeCount;
                    document.querySelector('#dislike-count').innerHTML = dislikeCount;
            },
            error: (error) => {
                // Handle the error if needed
            }
        });
    }
</script>
<?php include "templates/V_footer.php" ?>