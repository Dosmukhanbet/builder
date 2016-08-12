import VueResource from 'vue-resource';

export default {
    template : `
    <div class="form-group">
        <label class="col-md-4 control-label">Категория</label>
        <div class="col-md-8">
            <select name="category_id" id="category_id" class="form-control"
            data-toggle="popover"
            data-placement="top"
            data-trigger="focus"
            data-content="Выберите из списка необходимого специалиста">
                <option class="opt" v-for="cat in categories" value="{{cat.id}}">{{cat.name}}</option>
            </select>
        </div>
    </div>
    `,
    props :{},

    ready() { this.fetchCategories()},

    data(){
        return {
        categories: ''
        }
        },

    methods: {
        fetchCategories(){
        return this.$http.get('/api/categories', (response)=> {
        this.categories = response;
        });
        }
        }


    };