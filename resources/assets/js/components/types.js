import VueResource from 'vue-resource';

export default {
template : `
    <div class="form-group">
        <label class="col-md-8 control-label">Тип пользователя</label>
        <div class="col-md-8">
            <select name="type" v-model="type" class="form-control" required>
                <option v-for="type in types" value="{{type.value}}">{{type.name}}</option >
            </select>
        </div>
    </div>

    <div class="form-group" v-show="type==='master'">
        <label class="col-md-8 control-label">Специальность</label>
        <div class="col-md-8">
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
    ready(){
        console.log(this.type);
        },
    methods: {
        fetchCategories(){
         return this.$http.get('api/categories', (response)=> {
        this.categories = response;
        });
        }
        }


};