<!doctype html>
<html class="no-js" lang="en">
  <head>
  	<base href="<?php echo $SCHEME.'://'.$HOST.':'.$PORT.$BASE.'/'; ?>" />
    <!-- <base href="{{ @BASE }}/"/> -->
    <meta charset="<?php echo $ENCODING; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $html_title; ?></title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/sef_title.js"></script>
    <link href="css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery.ui.datepicker-sr-SR.js"></script>
    <!-- WYSIWYG -->
    <script src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      tinymce.init({
        selector: "#tinymce_textarea",
        plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
        ]
      });
    </script>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker({
          inline: true
        });
      });
    </script>
    <script type="text/javascript"> function openwindow(){window.open("administration/image_manager", "Image manager","location=1,status=1,scrollbars=1,width=960,height=700");}</script>
  </head>
  <body>
  	<?php echo $this->render(Base::instance()->get('content')); ?>
  </body>
  <script>
    $(document).foundation();
  </script>
</html>
