const quillOptions = {
    theme: 'snow'
};
const Quill = require('quill');
window.$ = window.jQuery = require('jquery');
require('bootstrap');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#run-quill')) {
        new Quill('#run-quill', quillOptions);
        document.querySelector('.submit').addEventListener('click', () => {
            document.querySelector('textarea').value = document.querySelector('#run-quill .ql-editor').innerHTML;
            document.querySelector('form.data').submit();
        })
    }
});

// HTML ToolTip
window.addEventListener('DOMContentLoaded', () => {
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
});