
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

if(document.getElementById('register')){
    const app = new Vue({
        el: '#register',
        data: {
            user_type: document.getElementById('current-type') ? document.getElementById('current-type').value : null,
            location: document.getElementById('current-location') ? document.getElementById('current-location').value : null
        }
    });
}
