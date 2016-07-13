import VueResource from 'vue-resource';
import leavefeedback from './leavefeedback.js';

export default {
    template : `

    <div class="jobdone" v-show="!done && jobstatus == 0">
        <p>Данная завяка выполнена?
            <label for="one">Да
                 <input type="radio" @click="makeJobDone" id="one" value="1" v-model="done"  data-toggle="modal" data-target="#feedbackModal" >
            </label>
            <label for="two">Нет
                <input type="radio" @click="makeJobDone" id="two" value="0" v-model="done">
            </label>
            </p>
        </div>

    `,
    props :['jobid', 'jobstatus'],

    ready() { },

    data(){
        return {  done: false }
        },

            components:{ leavefeedback },

    methods: {

        makeJobDone(){
            if(this.jobstatus == 0){
            this.$http.post('/api/makejobdone/' + this.jobid);
            }
            }


        }


    };