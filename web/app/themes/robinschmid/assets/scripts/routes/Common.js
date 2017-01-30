export default {
  init() {
    function toggleNavigation() {
      $(this).toggleClass('collapsed-js');
      $(document.body).toggleClass('no-scroll-js');
      $($(this).attr('data-target')).toggleClass('hide-overlay-js');
    }
    $('#navigation-toggle').on('click', toggleNavigation);
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
