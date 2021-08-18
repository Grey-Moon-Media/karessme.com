(function ($, Drupal) {
  "use strict";

  /**
   * @file
   * Provides methods for integrating Imce into text fields.
   */

  /**
   * Drupal behavior to handle url input integration.
   */
  Drupal.behaviors.imceUrlInput = {
    attach: function (context, settings) {
      $('.imce-url-input', context).not('.imce-url-processed').addClass('imce-url-processed').each(imceInput.processUrlInput);
    }
  };
  
  /**
   * Global container for integration helpers.
   */
  var imceInput = window.imceInput = window.imceInput || {

    /**
     * Processes an url input.
     */
    processUrlInput: function(i, el) {
      var button = imceInput.createUrlButton(el.id, el.getAttribute('data-imce-type'));
      el.parentNode.insertBefore(button, el);
    },

    /**
     * Creates an url input button.
     */
    createUrlButton: function(inputId, inputType) {
      var button = document.createElement('a');
      button.href = '#';
      button.className = 'imce-url-button';
      button.innerHTML = '<span>' + Drupal.t('Open File Browser') + '</span>';
      button.onclick = imceInput.urlButtonClick;
      button.InputId = inputId || 'imce-url-input-' + (Math.random() + '').substr(2);
      button.InputType = inputType || 'link';
      return button;
    },

    /**
     * Click event of an url button.
     */
    urlButtonClick: function(e) {
      var url = Drupal.url('imce');
      url += (url.indexOf('?') === -1 ? '?' : '&') + 'sendto=imceInput.urlSendto&inputId=' + this.InputId + '&type=' + this.InputType;
      // Focus on input before opening the window
      $('#' + this.InputId).focus();
      window.open(url, '', 'width=' + Math.min(1000, parseInt(screen.availWidth * 0.8, 10)) + ',height=' + Math.min(800, parseInt(screen.availHeight * 0.8, 10)) + ',resizable=1');
      return false;
    },

    /**
     * Sendto handler for an url input.
     */
    urlSendto: function(File, win) {
      var url = File.getUrl();
      var el = $('#' + win.imce.getQuery('inputId'))[0];
      win.close();
      if (el) {
        $(el).val(url).change().focus();
      }
    }
  
  };

})(jQuery, Drupal);
;
/**
 * @file
 * JavaScript behaviors for IMCE.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Override processUrlInput to place the 'Open File Browser' links after the target element.
   *
   * @param {int} i
   *   Element's index.
   * @param {element} el
   *   A element.
   */
  window.imceInput.processUrlInput = function (i, el) {
    var button = imceInput.createUrlButton(el.id, el.getAttribute('data-imce-type'));
    $(button).insertAfter($(el));
  };

})(jQuery, Drupal);
;
/**
 * @file
 * JavaScript behaviors for options (admin) elements.
 */

(function ($, Drupal) {

  'use strict';


  /**
   * Attach handlers to options (admin) element.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformOptionsAdmin = {
    attach: function (context) {
      $(context).find('.js-webform-options-sync').once('webform-options-sync').each(function () {
        // Target input name and not id because the id will be changing via
        // Ajax callbacks.
        var name = this.name;

        var $value = $(this);
        var $text = $('input[name="' + name.replace(/\[value\]$/, '[text]') + '"]');

        // On focus, determine if option value and option text are in-sync.
        $value.on('focus', function () {
          var sync = $value.val() === $text.val();
          $value.data('webform_options_sync', sync);
          if (sync) {
            $text.prop('readonly', true).closest('.js-form-item, .js-form-wrapper').addClass('webform-readonly');
          }
        });

        // On blur, if option value and option text are in-sync remove readonly.
        $value.on('blur', function () {
          if ($value.data('webform_options_sync')) {
            $text.prop('readonly', false).closest('.js-form-item, .js-form-wrapper').removeClass('webform-readonly');
          }
        });

        // On keyup, if option value and option text are in-sync then set
        // option text to option value.
        $value.on('keyup', function () {
          if ($value.data('webform_options_sync')) {
            $text.val($value.val());
          }
        });

      });
    }
  };


})(jQuery, Drupal);
;
/**
 * @file
 * JavaScript behaviors for multiple element.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Move show weight to after the table.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformMultipleTableDrag = {
    attach: function (context, settings) {
      for (var base in settings.tableDrag) {
        if (settings.tableDrag.hasOwnProperty(base)) {
          $(context).find('.js-form-type-webform-multiple #' + base).once('webform-multiple-table-drag').each(function () {
            var $tableDrag = $(this);
            var $toggleWeight = $tableDrag.prev().prev('.tabledrag-toggle-weight-wrapper');
            if ($toggleWeight.length) {
              $toggleWeight.addClass('webform-multiple-tabledrag-toggle-weight');
              $tableDrag.after($toggleWeight);
            }
          });
        }
      }
    }
  };

  /**
   * Submit multiple add number input value when enter is pressed.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformMultipleAdd = {
    attach: function (context, settings) {
      $(context).find('.js-webform-multiple-add').once('webform-multiple-add').each(function () {
        var $submit = $(this).find('input[type="submit"], button');
        var $number = $(this).find('input[type="number"]');
        $number.keyup(function (event) {
          if (event.which === 13) {
            // Note: Mousedown is the default trigger for Ajax events.
            // @see Drupal.Ajax.
            $submit.trigger('mousedown');
          }
        });
      });
    }
  };

})(jQuery, Drupal);
;
