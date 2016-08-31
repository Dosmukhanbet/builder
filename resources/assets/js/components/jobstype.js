import VueResource from 'vue-resource';

export default {
    template : `
    <div class="form-group">
        <label class="col-md-12 control-label">Категория <i class="fa fa-angle-down" aria-hidden="true"></i>
        </label>
        <div class="col-md-12">
            <select name="category_id"
                    id="category_id"
                    class="form-control"
                    data-toggle="popover"
                    data-placement="top"
                    data-trigger="focus"
                    data-content="Выберите из списка необходимого специалиста">
                <option selected disabled>Выберите из списка необходимого специалиста
                </option>
                <option class="opt" v-for="cat in categories" value="{{cat.id}}">{{cat.name}}</option>
            </select>
        </div>
    </div>
    `,
    props :{},

    ready() { this.fetchCategories();},

    data(){
        return {
        categories: ''
        };
        },

    methods: {
        fetchCategories(){
        return this.$http.get('/api/categories', (response)=> {
        this.categories = response;
        });
        }
        }


    };