import Vue from 'vue';
import sweetalert from  'sweetalert';
import VueResource from 'vue-resource';
Vue.use(VueResource);
export default Vue.extend({
    template: `
            <label class="col-md-4 control-label">Мобильный номер</label>
            <div class="col-md-6">
                 <input type="text" class="form-control" placeholder="Например: 77075553322" v-model="phonenumber" name="phone_number">
            </div>
            <div class="col-md-6 col-md-offset-4 Register--button"  v-show="!confirmed">
                <button type="submit" @click="sendSMS" class="btn btn-warning">Запросить Код подтверждения</button>
            </div>

            <div class="col-md-6 col-md-offset-4 Register--button" v-show="confirmed">
                <button type="submit" class="btn btn-primary">
                   Зарегистроваться
                </button>
            </div>
`,

        props: ['code'],

        data (){
               return {
                   confirmed : false,
                        phonenumber : ''
                        }

                },

        methods: {

        sendSMS(e){

        e.preventDefault();
        this.send();
        swal({

                title: "Подтверждение номера",
                text: "Введите код высланный на указанный вами номер:",
                type: "input",
                showCancelButton: false,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "3342" },


                 (inputValue) =>
                 {
                  var int = parseInt(inputValue)
                     // 1111 заменить на this.code
                     if ( int === 1111 )
                        {
                            swal("ОК", "Ваш номер подтвержден!", "success");
                            this.confirmed = true;
                         }
                     else {

                            swal.showInputError("Неправильный номер");     return false
                           }
                    });

        },

            send() {
                        let datas = {
                                    code : this.code,
                                    number : this.phonenumber
                                };

                        this.$http.post('api/sendsms', datas).then(function(response){
                                                    this.code = parseInt(response);
                                                    });
                    }
        }

});