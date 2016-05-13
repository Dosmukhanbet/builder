Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
import Vue from 'vue';
import sendsms from './components/sendsms';
import types from './components/types.js';
import jobstype from './components/jobstype.js';



new Vue ({
   el : '#app-layout',
    data:{
        price : ''
    },




   components : {
       sendsms, types, jobstype
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