
import Vue from 'vue';
import sweetalert from 'sweetalert';
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
                 placeholder="Например: +77075553322" 
                 v-model="phonenumber" 
                 name="phone_number" 
                 data-toggle="popover"
                 data-placement="top"
                 data-trigger="focus"
                 data-content="Для подтверждения номера мы вышлем на Ваш мобильный телефон бесплатное сообщение с кодом"
                 required>
            </div>

            <div class="col-md-12 checkbox">
            <label>
                 <input v-model="checked" type="checkbox"> Я соглашаюсь с <a data-lity href="/agreement2.pdf">c пользовательским соглашением<a/>
            </div>


            <div class="col-md-12 Register--button"  v-show="!confirmed">
                 <button type="submit" @click="sendSMS" class="form-control btn btn-warning __button">Получить код</button>
            </div>


            <div class="col-md-12 Register--button" v-show="confirmed && checked">
                <button type="submit" class="form-control btn btn-primary __button">
                   Закончить регистрацию
                </button>
            </div>    
`,

    props: ['code'],

    data() {
        return {
            confirmed: false,
            phonenumber: '',
            checked: true
        };

    },


    methods: {

        sendSMS(e) {

            e.preventDefault();
            if(this.phonenumber.length < 11 ) 
            {
                swal(" ", "Некорректный мобильный номер. Необходимо корректно ввести номер в международном формате. Например: +77071234455");
            }
            else
            {
                this.send();
                swal({

                        title: "Мы отправили вам SMS с кодом",
                        text: "На Ваш телефон в течении нескольки минут придет 4-значный код. Введите этот код в поле ниже и нажмите 'OK' ",
                        type: "input",
                        showCancelButton: false,
                        cancelButtonText: 'Не пришло СМС? Повторить',
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        inputPlaceholder: "Пример кода: 4432"
                        

                    },

                    (inputValue) => {
                        var int = parseInt(inputValue);
                        // 1111 заменить на this.code
                        if (int === this.code) {
                            swal("ОК", "Ваш номер подтвержден! Нажмите кнопку 'Закончить регистрацию'", "success");
                            this.confirmed = true;
                        } else {

                            swal.showInputError("Неправильный номер");
                            return false;
                        }
                    });
                }
        },

        send() {
            let datas = {
                number: this.phonenumber
            };

            this.$http.post('/api/sendsms', datas).then(function(response) {
                this.code = parseInt(response.data);

            });
        }
    }

});