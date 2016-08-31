import VueResource from 'vue-resource';
import _ from 'underscore';
export default {
    template: `
            <div v-for="master in masters" class="masters_list" @click="masterSelected(master.name)">
                <a data-lity href="{{ makephotopath(master.photo_path) }}">
                    <img class="img-circle" v-bind:src="makethumbpath(master.thumbnail_path)">
                </a>
                 {{master.name}}
                <form class="" style="float:right">
                    <div class="form-group">
                        <label class="control-label">Написать отзыв</label>
                        <textarea class="form-control" rows="2" name="feedback" required></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-default">Отправить</button>
                    </div>
                </form>
            </div>
        `,


    props: ['masters'],


    ready() {
        this.findmaster();
    },



    methods: {

        findmaster() {
            this.$http.get('/api/masterslist/').then(function(response) {

                console.log(response.data);
                this.masters = response.data;

            });
        },
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

        findCat(id) {
            return _.findWhere(this.cats, {
                id: id
            }).name;
        },

        findCity(id) {
            return _.findWhere(this.cities, {
                id: id
            }).name;
        },

        masterSelected(name) {
            alert(name);
        }



    }



};