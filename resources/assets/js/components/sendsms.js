import Vue from 'vue';
import sweetalert from  'sweetalert';
import VueResource from 'vue-resource';
Vue.use(VueResource);

export default Vue.extend({
    template: `
            <label class="col-md-12 control-label">Мобильный номер</label>
            <div class="col-md-12">
                 <input 
                 type="text" 
                 id="form-control.tel"   
                 class="form-control" 
                 placeholder="Например: 77075553322" 
                 v-model="phonenumber" 
                 name="phone_number" 
                 required>
            </div>

            <div class="col-md-12 checkbox">
            <label>
                 <input v-model="checked" type="checkbox"> Я соглашаюсь с <a data-lity href="/agreement.pdf">c пользовательским соглашением<a/>
            </div>


            <div class="col-md-12 Register--button"  v-show="!confirmed">
                 <button type="submit" @click="sendSMS" class="form-control btn btn-warning __button">Зарегистроваться</button>
            </div>


            <div class="col-md-12 Register--button" v-show="confirmed && checked">
                <button type="submit" class="form-control btn btn-primary __button">
                   Закончить регистрацию
                </button>
            </div>``
`,

        props: ['code'],

        data (){
               return {
                   confirmed : false,
                        phonenumber : '',
                        checked: true
                        };

                },

        computed : {

        },

        methods: {

        sendSMS(e){

        e.preventDefault();

        this.send();
        swal({

                title: "Мы отправили вам SMS с кодом",
                text: "Введите этот код в поле ниже, нажмите 'OK' ",
                type: "input",
                showCancelButton: true,
                cancelButtonText: 'Не пришло СМС? Повторить',
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Например: 4432" },


                 (inputValue) =>
                 {
                  var int = parseInt(inputValue);
                     // 1111 заменить на this.code
                     if ( int === this.code )
                        {
                            swal("ОК", "Ваш номер подтвержден!", "success");
                            this.confirmed = true;
                         }
                     else {

                            swal.showInputError("Неправильный номер");     return false;
                           }
                    });

        },

            send() {
                        let datas = {
                                    number : this.phonenumber
                                };

                        this.$http.post('/api/sendsms', datas).then(function(response){
                            this.code = parseInt(response.data);
                 
                 });
                    }
        }

});