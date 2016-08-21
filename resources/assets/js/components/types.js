import VueResource from 'vue-resource';

export default {
template : `
    <div class="form-group">
        <label class="col-md-12 control-label">Вы мастер или заказчик?
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </label>
        <div class="col-md-12">
            <select name="type"
                    autofocus
                    v-model="type"
                    class="form-control"
                    data-toggle="popover"
                    data-placement="top"
                    data-trigger="focus"
                    data-content="Выберите тип пользователя"
                    required>
                <option v-for="type in types" value="{{type.value}}">{{type.name}}</option >
            </select>
        </div>
    </div>

    <div class="form-group" v-show="type==='master'">
        <label class="col-md-12 control-label">Специальность <i class="fa fa-angle-down" aria-hidden="true"></i>
        </label>
        <div class="col-md-12">
            <select
            name="category_id"
            id="category_id"
            class="form-control"
            data-toggle="popover"
            data-placement="top"
            data-trigger="focus"
            data-content="Выберите Вашу специализацию"
            >
                <option selected disabled>Выберите Вашу специализацию
                </option>
                <option v-for="cat in categories" value="{{cat.id}}">{{cat.name}}</option>
            </select>
        </div>
    </div>
    `,
    props :[],

    ready() { this.fetchCategories()},

    data(){
            return {
                types: [
                        { value : 'client', name: 'Заказчик'},
                        { value: 'master', name: 'Мастер'}
                        ],
                type: '',
                categories: ''
    }
    },
    methods: {
        fetchCategories(){
         return this.$http.get('api/categories', (response)=> {

        this.categories = response;
        console.log(response);
        });
        }
        }


};