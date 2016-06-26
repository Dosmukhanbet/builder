var socket = io('104.236.12.84:3000');

export default  {
    template : `
    <span class="btn btn-info">
    {{ offers.length }} новых предложении
    </span>
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
    }


    };