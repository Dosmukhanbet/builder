var socket = io('104.236.12.84:3000');

export default {
    template : `
    {{ offers.length() }}
    `,
    props :['jobid'],

    data(){
        return {  offers : []}
        },

    ready() {

        socket.on('offers-channel-'+ this.jobid, function(data){
            this.offers.push(data);
            alert('ure');
        }.bind(this));




        },



    methods: {



        }


    };