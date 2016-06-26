import VueResource from 'vue-resource';
var socket = io('192.168.10.10:3000');
export default {
    template : `
                <div class="Offer__block" v-for="offer in offers">
                    <a data-lity href="{{ makephotopath(offer.user.photo_path) }}">
                        <img class="Offer__image img-thumbnail" src="{{ makethumbpath(offer.user.thumbnail_path) }}"></a>
                    <ul class="Offer__list">
                        <li>Мастер: {{offer.user.name}} </li>
                        <li>Сотовый номер: +{{offer.user.phone_number}} </li>
                        <li>Предложенная цена: {{offer.offer.price}}</li>
                        <li>Комментария: {{offer.offer.comment}}</li>
                        <li> Поступило: {{ offer.offer.created_at}}</li>
                    </ul>
                    <a href="{{ makeurl(offer.offer.id,offer.user.id )}}" class="btn btn-warning __button" >
                        Принять предложение
                    </a>
                </div>
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
                    makethumbpath(path){
                    if(path) { return '/' + path;}
                    else
                    {   return "/profile/sitephotos/thumb-no-photo.jpg";}

                    },
                    makephotopath(path){
                    if(path) { return '/' + path;}
                    else
                    {   return "/profile/sitephotos/no-photo.jpg";}

                    },
                    makeurl(offerid, userid){

                    return "/job/accept/offer/" + offerid + "/" + userid;

                    }



            }


        };