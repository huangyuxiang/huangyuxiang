<template>
    <div class="row  justify-content-center">
        <div class="col-4" v-if="taskSuccess.length">
            <div class="card">
                <div class="card-header">待完成步骤：  <button class="btn btn-sm btn-success pull-right" @click="carryOut()">完成</button></div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="step in taskSuccess">
                            <span @dblclick="edit(step)">{{ step.name}}</span>
                            <i class="fa fa-check pull-right"  @click="complete(step)"></i>
                            <i class="fa fa-close pull-right"  @click="remove(step)"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4" v-show='taskError.length'>
            <div class="card">
                <div class="card-header">已完成： <button class="btn btn-sm btn-danger pull-right" @click="undone()">清除</button></div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="step in taskError">
                            {{ step.name}}
                            <i class="fa fa-check pull-right"  @click="complete(step)"></i>
                            <i class="fa fa-close pull-right"  @click="remove(step)"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <label>添加任务</label>
                <input type="text" v-model='newStep' ref="newStep" @keyup.enter="addStep"  class="form-control" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
           'route'
        ],
        data(){
            return{
                steps:[
                ],
                newStep:''
            }},
        created() {
           this.getSteps();
        },methods:{
            getSteps:function(){
                axios.get(this.route).then((res) => {
                    this.steps = res.data.steps;
                }).catch((err)=>{
                });
            },
            addStep:function () {
                axios.post(this.route,{name:this.newStep}).then((res) => {
                    console.log(111111);
                    this.steps.push(res.data.step);
                    this.newStep = ''  ;
                }).catch((err)=>{
                });
            },
            complete:function (step) {
                step.completion =  !step.completion;
            },
            remove:function(step){
                let i = this.steps.indexOf(step);
                this.steps.splice(i,1);
            },
            edit:function(step){
                this.remove(step);
                this.newStep=step.name;
                this.$refs.newStep.focus();
            },
            undone:function () {
                this.steps = this.taskSuccess;
            },
            carryOut:function () {
                this.taskSuccess.forEach(function (step) {
                    step.completion=true;
                })
            }
        },computed:{
            taskSuccess:function() {
                return this.steps.filter(function (step) {
                    return !step.completion;
                })
            },taskError:function() {
                return this.steps.filter(function (step) {
                    return step.completion;
                })
            }
        }
    }
</script>

<style>

</style>