window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

require('bootstrap');
import 'select2'

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./components/Delete')

//  For Declare adding css and js properties you must declare on wabpack.mix.js too


