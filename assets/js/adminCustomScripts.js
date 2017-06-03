jQuery(document).ready(function($) {

  // Initialize Highlight.js
  $(document).ready(function() {
    $('code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
  });

});
