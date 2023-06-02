<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>study society</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- bootstrap -->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/uniform/css/uniform.default.min.css');?>" />

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo base_url('assets/wow/animate.css');?>" />


<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url('assets/gallery/blueimp-gallery.min.css');?>">


<!-- favicon -->
<link rel="shortcut icon" href="<?php echo base_url('assets/2.jpg'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('assets/2.jpg'); ?>" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css'); ?>">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

</head>

<body id="home">

<!-- header -->
<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('C_StudySociety/index');?>"><img src="<?php echo base_url('assets/logo.png'); ?>" style="width:50px;" alt="study society"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">        
        <li><a href="<?php echo site_url('/');?>">HOME</a></li>            
        <li><a href="<?php echo site_url('C_StudySociety/home');?>">MATERI</a></li>        
        <li><a href="<?php echo site_url('C_StudySociety/login');?>">lOGIN</a></li>        
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->
<div class="container">
  <form action="<?= site_url("C_StudySociety/addPost") ?>" method="POST" id="post_form" enctype="multipart/form-data">
  <input type="hidden" name="user_id" value="<?= $userdata->user_id?>">
  <div class="row">
    <div class="col">
      <input type="text" name="post_title" id="title" placeholder="Judul post" class="form-control"> <br>
    </div>
  </div>
    <select name="topic" id="topic" class="form-select"> <br>
      <option value="">Pilih Topik</option>
      <?php
      foreach ($topic as $t) {
      ?>
        <option value="<?= $t->topic_id ?>"><?= $t->topic_name ?></option>
      <?php
      }
      ?>
    </select>
    <select name="grade" id="grade"> <br>
      <option value="">Pilih Tingkat/Kelas</option>
      <?php
      foreach ($grade as $g) {
      ?>
        <option value="<?= $g->grade_id ?>"><?= $g->grade_name ?></option>
      <?php
      }
      ?>
    </select>
    <div class="row my-3">
      <div id="editorjs"></div>
    </div> <br>
    <label for="resource">File Materi : </label>
    <input type="file" name="resource" id="post-resource" class="form-control">
    <button type="submit" id="btn-submit" class="btn btn-primary">Post</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script><!-- Image -->
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

  var editor = new EditorJS({
    /**
     * Enable/Disable the read only mode
     */
    readOnly: false,

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
            byUrl: 'http://localhost:8008/fetchUrl', // Your endpoint that provides uploading by Url
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
    }
  });

  let submitBtn = document.querySelector('#btn-submit');
  submitBtn.addEventListener('click', function(event) {
    event.preventDefault();
    editor.save().then((savedData) => {
      let input = document.createElement('input');
      input.type = "text";
      input.name = "post_content";
      input.value = JSON.stringify(savedData);
      let parentElement = document.getElementById('post_form');
      parentElement.appendChild(input);
      parentElement.submit();
    })
  });
  $(document).ready(function() {
    $('#topic').selectize();
    $('#grade').selectize();
  });
</script>


<footer class="spacer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h4>Studen society</h4>
            </div>
                <div class="col-sm-3">
                <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li><a href="<?php echo site_url('/');?>">HOME</a></li>            
                    <li><a href="<?php echo site_url('C_StudySociety/home');?>">MATERI</a></li>        
                    <li><a href="<?php echo site_url('C_StudySociety/login');?>">lOGIN</a></li>   
                </ul>
            </div>
            </div>
        </div>
        <!--/.row--> 
    </div>
    <!--/.container-->    

<!--/.footer-bottom--> 
</footer>

<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>

<!-- wow script -->
<script src="<?php echo base_url('assets/wow/wow.min.js');?>"></script>

<!-- uniform -->
<script src="<?php echo base_url('assets/uniform/js/jquery.uniform.js');?>"></script>


<!-- boostrap -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js');?>" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="<?php echo base_url('assets/mobile/touchSwipe.min.js');?>"></script>

<!-- jquery mobile -->
<script src="<?php echo base_url('assets/respond/respond.js');?>"></script>

<!-- gallery -->
<script src="<?php echo base_url('assets/gallery/jquery.blueimp-gallery.min.js');?>"></script>


<!-- custom script -->
<script src="<?php echo base_url('assets/script.js');?>"></script>

</body>
</html>
