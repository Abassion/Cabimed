/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import vuetify from './vuetify'
window.toastr = require('toastr');
import 'toastr/build/toastr.min.css'
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('card-patient', require('./components/CardPatient.vue').default);
Vue.component('patients', require('./components/Patients.vue').default);
Vue.component('surface-text', require('./components/Surfacetext.vue').default);
Vue.component('rapport', require('./components/Rapport.vue').default);
Vue.component('ordonnance', require('./components/Ordonnance.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$token = null
const app = new Vue({
    el: '#app',
    data(){
        return {
            tabagisme :true,
            allergie: false,
            traitement: '',
            facteur: 'created_at',
            modifier: {
                traitement:false,
                antecedents_medicaux: false,
                antecedents_cherirgieaux: false,
                allergie_medicamenteuse: false
            }
        }
    },
    methods: {
        modifierValider(param) {
            this.modifier[param] = !this.modifier[param]
        },
        trier(facteur) {
            this.facteur = facteur
        }
    },
    vuetify
});
