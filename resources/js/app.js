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

Vue.component('card-patient', require('./components/CardPatient.vue').default);
Vue.component('patients', require('./components/Patients.vue').default);
Vue.component('surface-text', require('./components/Surfacetext.vue').default);
Vue.component('rapport', require('./components/Rapport.vue').default);
Vue.component('ordonnance', require('./components/Ordonnance.vue').default);
Vue.component('rdv-create', require('./components/RdvCreate.vue').default);
Vue.component('rdvs', require('./components/Rdvs.vue').default);
Vue.component('button-email', require('./components/buttonEmail.vue').default);


Vue.prototype.$base_URL = 'http://cabinet.test/'

new Vue({
    el: '#app',
    data(){
        return {
            facteur: 'created_at',
            recherche: false,
            dialog: false,
        }
    },
    methods: {
        trier(facteur) {
            this.facteur = facteur
        },
        showRecherche(){
            this.recherche = !this.recherche;
        }
    },
    vuetify
});
