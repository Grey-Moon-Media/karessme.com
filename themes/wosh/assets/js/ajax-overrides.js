(function ($, window, Drupal, drupalSettings) {
  /**
   * Creates a new Snowman progress indicator, which really is full screen.
   */
  Drupal.Ajax.prototype.setProgressIndicatorSnowman = function () {
    this.progress.element = $('<div class="ajax-progress ajax-progress-fullscreen ajax-progress-snowman">&nbsp;</div>');
    // My theme has a wrapping element that will match #main.
    $('#main').append(this.progress.element);
  };
})(jQuery, window, Drupal, drupalSettings); 
