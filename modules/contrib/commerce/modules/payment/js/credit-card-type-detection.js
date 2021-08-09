/**
 * @file
 * Detects the credit card number by checking the first digits of the number.
 */
(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Attaches the creditCardTypeDetection behavior.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches the creditCardTypeDetection behavior.
   */
  Drupal.behaviors.creditCardTypeDetection = {
    attach: function (context) {
      if ($('.commerce-payment-credit-card-number').length > 0) {
        creditCardTypeFromNumber($('.commerce-payment-credit-card-number').val());
      }

      $('.commerce-payment-credit-card-number').on('keyup', function() {
        if($(this).val().length >= 3) {
          creditCardTypeFromNumber($(this).val());
        }
      });
    }
  };

  /**
   * Provides the credit card type from the number.
   *
   * @param num
   *   The credit card number.
   */
  function creditCardTypeFromNumber(num) {
    // Sanitise number.
    num = num.replace(/[^\d]/g,'');

    // The credit/debit card number is referred to as a PAN, or Primary Account
    // Number. The first six digits of the PAN are taken from the IIN, or Issuer
    // Identification Number, belonging to the issuing bank (IINs were
    // previously known as BIN ” Bank Identification Numbers ” so you may see
    // references to that terminology in some documents). These six digits
    // are subject to an international standard, ISO/IEC 7812, and can be used
    // to determine the type of card from the number. For detecting the card
    // type we use the below regular expressions.
    var regexps = {
      'visa': /^4/,
      'mastercard': /^5[1-5]/,
      'amex': /^3[47]/,
      'dinersclub': /(^30[0-5]|38[0-5]|36)/,
      'discover': /^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)/,
      'jcb': /^35(2[89]|[3-8][0-9])/,
      'maestro': /^(5018|5020|5038|6304|6759|676[1-3])/,
      'unionpay': /^(62[0-9]{14,17})/
    };

    for (var card in regexps) {
      if (num.match(regexps[card])) {
        $('.payment-method-icon').removeClass('active');
        $('.payment-method-icon').addClass('inactive');
        $('.payment-method-icon--' + card).addClass('active');
        $('.payment-method-icon--' + card).removeClass('inactive');
        return;
      }
      $('.payment-method-icon').removeClass('active');
      $('.payment-method-icon').addClass('inactive');
    }
  }

})(jQuery, Drupal, drupalSettings);
