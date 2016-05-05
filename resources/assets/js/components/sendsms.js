import Vue from 'vue';
import VueResource from 'vue-resource';
import sweetalert from  'sweetalert';
Vue.use(VueResource);

export default Vue.extend({
    template: `<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Мобильный номер</label>

        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="77075553322" v-model="phonenumber" name="phone_number">

<p>@{{ code }}</p>
            </div>
            <div class="col-md-3" v-show="!confirmed">
                <button type="submit" @click="sendSMS" class="btn btn-primary">
                Отправить смс
                </button>
            </div>

        </div>
        <div class="form-group" v-show="confirmed">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Register
                </button>
            </div>
        </div>

`,

        props: ['code'],

        data (){
               return {
                        confirmed:false,
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
                     if (inputValue === this.code)
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
             this.$http.post('api/sendsms', datas);
         }
        }

});