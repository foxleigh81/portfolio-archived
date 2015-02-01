/* This file would normally be minimised but I had a feeling */
/* you might want to take a look. So I've left it uncompressed, */
/* you can thank me later - Alex*/

/* global Modernizr:true */

// Namespacing
var Core = Core || {};
var Forms = Forms || {};

// 3rd party functions - ignored by JShint, use with caution and always cite sources
/* jshint ignore:start */

// Read a page's GET URL variables and return them as an associative array. (thanks to http://jquery-howto.blogspot.co.uk/2009/09/get-url-parameters-values-with-jquery.html)
function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
/* jshint ignore:end */

Core = {
    constructor: function () {
        // set global variables.
        this.bodyTag = $('body');
        this.viewportHeight = this.bodyTag.outerHeight(true);
        this.viewportWidth = this.bodyTag.outerWidth(true);
    },

    init: function () {
        var o = this;
        o.constructor();
        //o.responsiveLogger('wh'); // Only turn on in dev environment
    },

    responsiveLogger: function(type) {
        // Function to output the screen width and/or height
        var viewportWidth = null,
            viewportHeight = null,
            outputString = '',
            screenLogger = $('<div style="position:fixed;left:5px;top:5px;padding:10px;font-size:20px;background:rgba(0,0,0,0.8);color:#fff;z-index:10000;box-shadow:2px 2px 5px #000;"></div>').appendTo('body');
        setInterval(
            function() {
                viewportWidth = $('body').outerWidth(true);
                viewportHeight = $('body').outerHeight(true);
            switch (type) {
                case 'w' :
                    outputString = 'W: '+viewportWidth+'px';
                break;
                case 'h' :
                    outputString = 'H: '+viewportHeight+'px';
                break;
                default :
                case 'wh' :
                    outputString = 'W: '+viewportWidth+'px';
                    outputString += '&nbsp;&nbsp;|&nbsp;&nbsp;';
                    outputString += 'H: '+viewportHeight+'px';
                break;
            }
                screenLogger.html(outputString);
            }, 500
        );
        console.warn('The "startLogging()" function is currently active. It should not be allowed to run in a production environment');
    },
};

Forms = {
    constructor : function () {
        this.formContainer = Core.bodyTag.find('form');
    },

    init : function () {
        var f = this;
        f.constructor();
        if (f.formContainer.length) {
            f.enableForms();
            f.validation();
            f.checkPosted();
        }
    },

    enableForms : function () {
        var f = this;
        // Disable forms on the site if javascript is not enabled/supported.
        f.formContainer.parent().find('.warning').remove();
        f.formContainer.find('input, textarea, button').prop('disabled', false);
        $('<input type="hidden" name="js" id="jsform" value="js" />').insertBefore(f.formContainer.find('button')); // We don't want the form to be submitted without js.
        // note submit button will not be enabled until validation has passed
    },

    checkPosted: function () {
        if (getUrlVars().posted === 'true') {
            var message = $('<div class="posted-message">Thank you, your request has been sent <span class="close">Dismiss</span></div>').prependTo(Core.bodyTag.find('form'));

            $('.close').click( function () {
                message.fadeOut('slow', function () {
                    $(this).remove();
                });
            });
        }
    },

    validation : function() {
        // client side validation
        // Any form inside a .form container will be subject to the validation rules set below.
        var f = this,
            passed = false; // Assume the form has failed until validation has completed

        // getLimitType finds the 'maxLength' attribute of the input to determine the length of the input
        // this attribute can be safely used as nothing can ever exceed the max length anyway.
        var getLimitType = function (element) {
            var ml = element.find('input').attr('maxlength');
            if (element.hasClass('exact-chars')) {
                return 'exact_'+ml;
            } else if (element.hasClass('min-chars')) {
                return 'min_'+ml;
            } else if (element.hasClass('max-chars')) {
                return 'max_'+ml;
            } else {
                return 0;
            }
        };

       var runValidator = function(element, mandatory, charlimit, friendlyname, regex) {
            // runValiator has three mandatory paramaters and one optional.
            // element = the container that the targeted input it in (eg .input.validate-as-number) only one input should be in this container
            // mandatory = is this a mandatory field? Options are true or false.
            // Charlimit = is there a max number of charactters? Set to '0' for no.  (Also set to zero if the charlimit is being set elsewhere eg in a custom validator)
            // Charlimit has a few options. It defaults to the maximum number of characters, however you can change it to minimum by calling 'Min_X' or set
            // an exact limit (eg exactly 10 chars) by calling "Exact_X"
            // friendlyname = the element name in a format which can be shown to the end user.
            // Regex = this is the regex pattern required to validate a field. It can be left blank if this is not required.
            // note: runValidator CAN be used on custom validation operations but it will only work on text-based inputs.

            regex = regex || null;

            var passCheck = null;

            //check if the item is mandatory and then optionally perform a test based on the regex required and will return either true or false.
            if (mandatory === true) {
                // test to ensure the input has been completed. If not return 'empty' and stop processing
                if (element.is(':checkbox')) {
                    passCheck = (element.prop('checked')) ? true : false;
                } else {
                    passCheck = (element.val().length) ? true : false;
                }
                if (!passCheck) {
                    passed = false;
                    return {
                        valid: false,
                        errorType: 'empty'
                    };
                }
            }


            if (charlimit !== 0 && charlimit.indexOf("max") >= 0) {
                var max = parseInt(charlimit.split("_").pop());
                if (element.val().length > max) {
                    passed = false;
                    return {
                        valid: false,
                        errorType: 'max-chars',
                        errorVar: max
                    };
                }
            }

            if (charlimit !== 0 && charlimit.indexOf("min") >= 0) {

                var min = parseInt(charlimit.split("_").pop());
                if (element.val().length < min) {
                    passed = false;
                    return {
                        valid: false,
                        errorType: 'min-chars',
                        errorVar: min
                    };
                }
            }

            if (charlimit !== 0 && charlimit.indexOf("exact") >= 0) {
                // If a specific limit is set (eg must be exactly 10 chars)
                var limitTo = parseInt(charlimit.split("_").pop());
                if (element.val().length !== limitTo) {
                    passed = false;
                    return {
                        valid: false,
                        errorType: 'limit-chars',
                        errorVar: limitTo
                    };
                }
            }

            if (regex) {
                if (element.val().length) {
                    // If the field has been filled in test against a regex.
                    var isValid = (!regex.test(element.val())) ? false : true;
                    if(!isValid) {
                        passed = false;
                        var classList = element.attr('class').split(" ");
                        var classIndex = classList.filter(function(word){
                            if(word.match(/v-/g)) return true;
                        }).toString();
                        var regexType = classIndex.replace('v-', '');
                        return {
                            valid: false,
                            errorType: 'regex-'+regexType
                        };
                    }
                }
            }

            if (passed) return true; // No errors were found, validation passed.
        };

        var showErrors = function(results, el, friendlyName) {
            if (results.valid === false) {
                el = $(el);
                el.addClass('error-flag');
                el.parents('.input-container').find('.inline-error').remove(); // Remove errors each time the user tries again
                $('<div class="inline-error"></div>').clone().appendTo(el.parents('.input-container')).html(friendlyName);
            }
        };

        var removeErrors = function (el) {
            $(el).removeClass('error-flag');
            $(el).parents('.input-container').find('.inline-error').fadeOut('fast', function () { $(this).remove(); }); // Remove errors each time the user tries again
        };

        var executeValidation = function(el) {
            var form = $(el),
                errors = 0;

            form.find('input, textarea').each( function() {
                var el = $(this),
                    mandatory = false,
                    theregex = null,
                    results = null,
                    friendlyName = el.data('validation');

                /**** Validation presets ****/

                // Input can only contain numbers
                if (el.hasClass('v-num')) theregex = new RegExp("^([0-9])+$");
                // Input can only contain letters (Inlcudes foreign characters)
                if (el.hasClass('v-text')) theregex = new RegExp("^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð .'-]+$");
                // Input cannot contain symbols (letters and numbers only)
                if (el.hasClass('v-alpha')) theregex = new RegExp("[A-Za-z0-9' -]$");
                // Input must validate as a UK postcode
                if (el.hasClass('v-postcode')) theregex = new RegExp("^([A-PR-UWYZa-pr-uwyz]([0-9]{1,2}|([A-HK-Ya-hk-y][0-9]|[A-HK-Ya-hk-y][0-9]([0-9]|[ABEHMNPRV-Yabehmnprvwx-y]))|[0-9][A-HJKPS-UWa-hjkps-uw]) {0,1}[0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2})$");
                // Input must validate as email
                if (el.hasClass('v-email')) theregex = new RegExp("^([a-zA-Z0-9\'_\\-\\+\\.]+)@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.)|(([a-zA-Z0-9\\-]+\\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\\]?)$");
                // Input must validate as password
                if (el.hasClass('v-password')) theregex = new RegExp("^[a-zA-Z0-9#~@]{7,14}$");
                // Input must validate as telephone number
                if (el.hasClass('v-phone')) theregex = new RegExp("^([0-9 ]{7,13})$");
                // Input must validate as telephone number
                if (el.hasClass('v-url')) theregex = new RegExp("^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?");

                // Determine if there are any limitations on character numbers and return the correct parameter
                var charLimit = getLimitType(el);
                // Input is mandatory
                if (el.hasClass('required')) mandatory = true;

                results = runValidator(el, mandatory, charLimit, friendlyName, theregex);
                if (typeof results !== "undefined") {
                    errors++;
                    showErrors(results, el, friendlyName);
                }
            }).on('focus', function () {
                removeErrors($(this));
            }).on('change', function () {
                removeErrors($(this));
            });
            return errors;
        };


        f.formContainer.find('button').on('click', function(e) {
            e.preventDefault();
            var errors = executeValidation($(this).parents('form'));
            if (errors === 0) {
                f.formContainer.submit();
            }
        });
    }
};

$(document).ready( function() {
    Core.init();
    Forms.init();
});



