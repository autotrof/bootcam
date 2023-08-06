import '../assets/plugins/jquery/jquery.min';
import '../assets/plugins/bootstrap/js/bootstrap.bundle.min';
import '../assets/dist/js/adminlte.min';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
