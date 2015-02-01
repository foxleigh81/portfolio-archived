/* This file would normally be minimised but I had a feeling */
/* you might want to take a look. So I've left it uncompressed, */
/* you can thank me later - Alex*/

/* global Modernizr:true */

// Namespacing
var Core = Core || {};

Core = {
    constructor: function () {
        // set global variables.
        this.bodyTag = $('body');
        this.bodyTag.removeClass('no-js').addClass('js'); // We know js has been detected so add the 'js' class to the page.
        this.viewportHeight = this.bodyTag.outerHeight(true);
        this.viewportWidth = this.bodyTag.outerWidth(true);
    },

    init: function () {
        var o = this;
        o.constructor();
        o.responsiveLogger('wh'); // Only turn on in dev environment
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

$(document).ready( function() {
    Core.init();
});

