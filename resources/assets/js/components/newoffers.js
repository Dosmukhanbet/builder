import VueResource from 'vue-resource';
var socket = io('104.236.12.84:3000');

export default {
    template : `
    {{ offers.length }}
    `,
    props :['jobid'],

    data(){
        return {  offers : [] , users : []}
        },

    ready() {

        socket.on('offers-channel-'+ this.jobid, function(data){
            this.offers.push(data);
        }.bind(this));




        },



    methods: {



        }


    };