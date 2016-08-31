import VueResource from 'vue-resource';
import leavefeedback from './leavefeedback.js';

export default {
    template: `

    <div class="jobdone" v-show="!done && jobstatus == 0">
        <p>Данная заявка выполнена?
            <label for="one">Да
                 <input type="radio" @click="makeJobDone" id="one" value="1" v-model="done"  data-toggle="modal" data-target="#feedbackModal" >
            </label>
            <label for="two">Нет
                <input type="radio" @click="makeJobDone" id="two" value="0" v-model="done">
            </label>
            </p>
    </div>
            <p style="color:#51AC20" v-show="jobstatus == 1"><i class="fa fa-check-square" aria-hidden="true"></i> Выполнена</p>

    `,
    props: ['jobid', 'jobstatus'],

    ready() {

    },

    data() {
        return {
            done: false
        };
    },

    components: {
        leavefeedback
    },

    methods: {

        makeJobDone() {
            if (this.jobstatus === 0) {
                this.$http.post('/api/makejobdone/' + this.jobid);

            }
            this.jobstatus = 1;
        }


    }


};