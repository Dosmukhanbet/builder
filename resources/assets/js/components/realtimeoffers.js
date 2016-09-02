import VueResource from 'vue-resource';
var socket = io('104.236.12.84:3000');
export default {
    template: `
                <div v-show="alert"
                     transition="fade"
                     class="alert--offer animated">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Новое предложение
                </div>
                <div class="Offer__block" v-for="offer in offers">
                    <a data-lity href="{{ makephotopath(offer.user.photo_path) }}">
                        <img class="Offer__image img-thumbnail" v-bind:src="makethumbpath(offer.user.thumbnail_path)"></a>
                    <ul class="Offer__list">
                        <li>Мастер: {{offer.user.name}} </li>
                        <li>Сотовый номер: +{{offer.user.phone_number}} </li>
                        <li>Предложенная цена: {{offer.offer.price}}</li>
                        <li>Комментария: {{makecomment(offer.offer.comment)}}</li>
                        <li> Поступило: {{ offer.offer.created_at}}</li>
                    </ul>
                    <a href="{{ makeurl(offer.offer.id,offer.user.id )}}" class="accept__offer__link">
                        <span class="label label-primary accept__offer">Принять предложение</span>
                    </a>
                </div>
        `,
    props: ['jobid'],

    data() {
        return {
            offers: [],
            alert: false
        };
    },

    ready() {

        socket.on('offers-channel-' + this.jobid, function(data) {
            this.offers.push(data);
            this.alert = true;
            setTimeout(() => this.alert = false, 3000);
        }.bind(this));



    },



    methods: {
        makethumbpath(path) {
            if (path) {
                return '/' + path;
            } else {
                return "/profile/sitephotos/thumb-no-photo.jpg";
            }

        },
        makephotopath(path) {
            if (path) {
                return '/' + path;
            } else {
                return "/profile/sitephotos/no-photo.jpg";
            }

        },
        makeurl(offerid, userid) {

            return "/job/accept/offer/" + offerid + "/" + userid;

        },

        makecomment(comment) {
            if (comment) {
                return comment;
            } else {
                return "нет комментарии";
            }
        }



    }


};