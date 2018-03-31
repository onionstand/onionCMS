<script type="text/javascript">
function elFinderBrowser (callback, value, meta) {
  tinymce.activeEditor.windowManager.open({
    file: '/elfinder_file',// use an absolute path!
    title: 'Image manager',
    width: 900,  
    height: 600,
    resizable: 'yes'
  }, {
    oninsert: function (file, elf) {
      var url, reg, info;

      // URL normalization
      url = file.url;
      reg = /\/[^/]+?\/\.\.\//;
      while(url.match(reg)) {
        url = url.replace(reg, '/');
      }
      
      // Make file info
      //info = file.name + ' (' + elf.formatSize(file.size) + ')';
      info = file.name;

      // Provide file and text for the link dialog
      if (meta.filetype == 'file') {
        callback(url, {text: info, title: info});
      }

      // Provide image and alt text for the image dialog
      if (meta.filetype == 'image') {
        callback(url, {alt: info});
      }

      // Provide alternative source and posted for the media dialog
      if (meta.filetype == 'media') {
        callback(url);
      }
    }
  });
  return false;
}


// TinyMCE init
tinymce.init({
	selector: ".tinymce_textarea",
	plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor"
	],
	relative_urls: false,
	remove_script_host: false,
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | forecolor backcolor emoticons ",
	file_picker_callback : elFinderBrowser,
  image_dimensions: false
});
</script>