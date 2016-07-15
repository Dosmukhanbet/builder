var socket = io('104.236.12.84:3000');

export default  {
    template : `
    <div v-show="alert"
    transition="fade"
    class="alert--offer animated">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> Новое приглашение
    </div>
    `,
    props : ['userid'],

    data(){
        return {  alert: false }
    },

    ready()
    {
        socket.on('invites-channel-' + this.userid, function (data) {
            this.alert = true;
            setTimeout(() => this.alert = false , 3000);
        }.bind(this));

        console.log(this.userid);
    },

    methods : {



    }


    };