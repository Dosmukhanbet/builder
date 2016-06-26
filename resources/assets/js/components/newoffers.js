var socket = io('104.236.12.84:3000');

export default  {
    template : `
    <a href="{{makeurl()}}" class="btn btn-info">
    {{ offers.length }} новых предложении
    </a>
    `,
    props : ['jobid'],

    data(){
        return {  offers : [] }
    },

    ready()
    {

        socket.on('offers-channel-' + this.jobid, function (data) {
            this.offers.push(data);

        }.bind(this));
    },

    methods : {
        makeurl(){
            return "/job/showoffers/" + this.jobid;
        }

    }


    };