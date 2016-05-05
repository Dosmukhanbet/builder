Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
import Vue from 'vue';
import sendsms from './components/sendsms';

new Vue ({
   el : '#app-layout',
    data:{
    },


   components : {
       sendsms
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