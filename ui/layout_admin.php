<!doctype html>
<html class="no-js" lang="en">
  <head>
  	<base href="<?php echo $SCHEME.'://'.$HOST.':'.$PORT.$BASE.'/';?>" />
    <meta charset="<?php echo $ENCODING;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $html_title; ?></title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.clearing.js"></script>
    <script src="js/sef_title.js"></script>
    <script src="js/foundation-datepicker.js"></script>
    <link href="css/foundation-datepicker.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- WYSIWYG -->
    <script src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      tinymce.init({
        selector: "#tinymce_textarea",
        relative_urls : false,
        plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
        ]
      });
    </script>
    <script>
      $(function () {
        window.prettyPrint && prettyPrint();
        $('#datepicker').fdatepicker({format: 'mm-dd-yyyy'});
       });
    </script>
    <script type="text/javascript"> function openwindow(){window.open("administration/image_manager", "Image manager","location=1,status=1,scrollbars=1,width=960,height=700");}</script>
  </head>
  <body>
  	<?php echo $this->render(Base::instance()->get('content')); ?>
  </body>
  <script>
    $(document).foundation({
      clearing : {open_selectors : '.th'}
    });
  </script>
</html>
