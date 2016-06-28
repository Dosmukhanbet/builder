var socket = io('104.236.12.84:3000');

export default  {
    template : `
    <div v-show="alert"
    transition="fade"
    class="alert--offer animated">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> Новое предложение
    </div>
    <a v-show="offers.length"  href="{{makeurl()}}" class="btn btn-info newoffer">
    {{ offers.length }}{{text}}
    </a>
    `,
    props : ['jobid', 'text'],

    data(){
        return {  offers : [], alert: false }
    },

    ready()
    {

        socket.on('offers-channel-' + this.jobid, function (data) {
            this.offers.push(data);
            this.alert = true;
            setTimeout(() => this.alert = false , 3000);
        }.bind(this));
    },

    methods : {
        makeurl(){
            return "/job/showoffers/" + this.jobid;
        }

    }


    };