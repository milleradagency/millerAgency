$(".maa-services-accordion").on('click', '.maa-services-accordion-item', function() {
  var $content    = $(this).find('.maa-services-accordion-content');
  // var $inner      = $(this).find('.maa-services-accordion-content-inner').children();
  var $inner      = $(this).find('.maa-services-accordion-content-inner');
  var $header     = $(this).find('i');
  let fadeIn      = "transition.fadeIn";
  let fadeOut     = "transition.fadeOut";

  if ($content.is(':hidden')) {
    $content.velocity('slideDown', { duration: 600 });
    $inner.velocity('fadeIn', { stagger: 1000, duration: 2000 });
    $header.toggleClass("fa-plus-circle fa-minus-circle");
  }
  else {
    $content.velocity('slideUp', { duration: 200 });
    $inner.css('opacity', '0');
    $header.toggleClass("fa-plus-circle fa-minus-circle");
  }
});
