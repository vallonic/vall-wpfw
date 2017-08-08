<?php
function vall_wpfw_loadCodeMirror() {
  global $plugin_path;
  global $plugin_url;
  ?>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.28.0/codemirror.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/codemirror.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/xml/xml.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/javascript/javascript.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/css/css.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/htmlmixed/htmlmixed.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/clike/clike.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/mode/php/php.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/show-hint.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/css-hint.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/xml-hint.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.20.2/addon/hint/html-hint.js"></script>

  <script>
    var templateEditor;
    jQuery(document).ready(function () {
        jQuery("textarea.customcode").each(function () {
            var cmOptions = {
                lineNumbers: true,
                mode: "php",
                extraKeys: {"Ctrl-Space": "autocomplete"}
            }
            CodeMirror.fromTextArea(this, cmOptions);
        });
    });
</script>

<?php }
// CodeMirror kan nu voortaan worden ingeladen met:
add_action('admin_head', 'vall_wpfw_loadCodeMirror');

?>
