/*
 * Bootstrap popovers and tooltips
 */


var $ = require('jquery')


module.exports = function () {

    // initialise all popovers
    $('body').popover({
        selector: '[data-toggle="popover"]',
        container: 'body',
        viewport: { selector: 'body', padding: 20 }
    })
    
    // Initialise Bootstrap tooltips
    //http://getbootstrap.com/javascript/#tooltips
    //attempt to remove existing tooltip
    $('[data-toggle="tooltip"]').tooltip('destroy')
    $('[data-toggle="tooltip"]').tooltip()
}