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
  </head>
  <body>
  	<?php echo $this->render(Base::instance()->get('content')); ?>
  </body>
  <script>
    $(document).foundation();
  </script>
</html>
