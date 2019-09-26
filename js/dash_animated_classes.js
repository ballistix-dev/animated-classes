jQuery.noConflict();
(function($) {
  $('*[data-animate]').each(function() {
    $(this).css('opacity', 0).addClass('animated');
  });
  $(window).scroll(function() {
    $('*[data-animate]').each(function() {
      var $this = $(this),
        animation = $this.data('animate'),
        hT = $this.offset().top,
        hH = $this.outerHeight(),
        wH = $(window).height(),
        wS = $(window).scrollTop();
      if (wS > (hT + hH - wH)) {
        $this.addClass(animation);
        $this.css('opacity', 1);
      }
    });
  });
})(jQuery);
