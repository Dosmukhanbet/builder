import VueResource from 'vue-resource';

export default {
template : `
    <div class="form-group">
        <label class="col-md-4 control-label">Я</label>
        <div class="col-md-6">
            <select name="type" v-model="type" id="type" class="form-control" v-model="type">
                <option v-for="type in types" value="{{type.value}}">{{type.name}}</option >
            </select>
        </div>
    </div>

    <div class="form-group" v-show="type === 'master'">
    <label class="col-md-4 control-label">Специалист по</label>
    <div class="col-md-6">
    <select name="category_id" id="category_id" class="form-control">
        <option v-for="cat in categories" value="{{cat.id}}">{{cat.name}}</option>
    </select>
    </div>
    </div>
    `,
    props :{},

    ready() { this.fetchCategories()},

    data(){
            return {
                types: [
                        { value : 'client', name: 'Клиент'},
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
        });
        }
        }


};