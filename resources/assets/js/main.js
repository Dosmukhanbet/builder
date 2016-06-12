Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
import Vue from 'vue';
import sendsms from './components/sendsms';
import types from './components/types.js';
import jobstype from './components/jobstype.js';
import masters from './components/masters.js';
import jobdone from './components/jobdone.js';


//Vue.filter('pluck', function(value, id){
//    return value.filter(function(item){
//        if(item.id == id){
//            console.log(item.name);
//            return item.name;
//
//        };
//    });
//});
new Vue ({
   el : '#app-layout',
    data:{
        price : ''
    },

   components : {
       sendsms, types, jobstype, masters, jobdone
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