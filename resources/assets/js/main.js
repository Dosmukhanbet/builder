Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
import Vue from 'vue';
import Vuikit from 'vuikit';
import sendsms from './components/sendsms';
import types from './components/types.js';
import jobstype from './components/jobstype.js';
import masters from './components/masters.js';
import jobdone from './components/jobdone.js';
import recommendations from './components/recommendations.js';
import realtimeoffers from './components/realtimeoffers.js';
import newoffers from './components/newoffers.js';
import newofferalert from './components/newofferalert.js';
import jobmademasters from './components/jobmademasters.js';

Vue.transition('fade', {
    enterClass: 'fadeInUp',
    leaveClass: 'fadeOutLeft'
});
Vue.use(Vuikit);
new Vue ({
   el : '#app-layout',
    data:{
        price : ''
    },

   components : {
       sendsms,
       types,
       jobstype,
       masters,
       jobdone,
       recommendations,
       realtimeoffers,
       newoffers,
       newofferalert,
       jobmademasters
   },

   ready(){
    },

    methods:
    {
        onEnter(e){
                  e.preventDefault();
                 },
        sum(){
        alert('from parent');
    }


    }





});