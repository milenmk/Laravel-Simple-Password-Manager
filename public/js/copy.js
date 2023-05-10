/* jshint esversion: 6 */

function copyToClipboard(val) {

    'use strict';

    let inp = document.createElement('input');
    document.body.appendChild(inp);
    inp.value = val;
    inp.select();
    document.execCommand('copy', false);
    inp.remove();
    //alert('copied');
}

jQuery(document).ready(function () {

    $('.fa-clipboard').click(function () {
        $(this).removeClass('fa-clipboard').addClass('fa-check');
        setTimeout(function () {
            $('.fa-check').removeClass('fa-check').addClass('fa-clipboard');
        }, 2000);
    });
});
