const quillOptions = {
    theme: 'snow'
};
const Quill = require('quill');
require('bootstrap');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#run-quill')) {
        const editor = new Quill('#run-quill', quillOptions);
        document.querySelector('.submit').addEventListener('click', () => {
            document.querySelector('textarea').value = document.querySelector('#run-quill p').innerHTML;
            document.querySelector('form').submit();

        })
    }
});