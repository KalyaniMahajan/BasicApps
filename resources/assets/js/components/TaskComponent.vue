<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>All ToDo List 
                        <span class="pull-right"> 
                            <a href="#addModal" class="btn btn-warning" data-toggle="modal">Add</a>
                        </span>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <input placeholder="Search..." v-model="search" type="search" @keyup="searchRecord" class="form-control"><hr>
                        <ul class="list-group">
                            <li style="width: 100%;" class="list-group-item" v-for="t in task.data">{{ t.id }} - {{ t.name }}
                            <span class="pull-right"><a href="#editModal" data-toggle="modal" @click="getRecord(t.id)" class="btn btn-primary">Edit</a> | <button @click="delRecord(t.id)" class="btn btn-danger">Delete</button> | <a href="#viewModal" @click="getRecord(t.id)" data-toggle="modal" class="btn btn-success">Preview</a></span></li>
                        </ul>
                        <pagination :data="task" v-on:pagination-change-page="getResults"></pagination>
                    </div>

                    <div class="panel-footer text-right" style="color:#000;"><h4>Copyrights </h4></div>
                </div>
            </div>
        </div>
        <div id="modal">
            <addtask @recordadded="refreshRecord"></addtask>
            <edittask :rec="editRec" @recordUpdated="refreshRecord"></edittask>
            <viewtask :viewrec="editRec"></viewtask>
        </div>
    </div>
</template>

<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./AddModelComponent.vue'));
Vue.component('edittask', require('./editModalComponent.vue'));
Vue.component('viewtask', require('./viewModalComponent.vue'));

    export default {
        data(){
            return{
                task:{},
                record:{},
                editRec:{},
                errors:[],
                search:'',
            }
        },
        methods:{
            getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            // Using vue-resource as an example
            axios.get('tasks?page=' + page)
            .then((response)=>this.task = response.data)
            .catch((error)=>console.log(error))
            },
            refreshRecord(record){
                this.task = record.data
            },
            getRecord(id){
                axios.get('tasks/'+id+'/edit')
                .then(response=>this.editRec = response.data)
                .catch(error=>this.errors = error.response.data.errors)
            },
            delRecord(id){
                const reply = confirm("Are You Sure...?");
                if(reply){
                    axios.post('tasks/'+id,{
                     id: id,
                    _method: 'DELETE'
                    })
                    .then(response=>this.task = response.data)
                    .catch(error=>console.log(error.response.data.errors))
                }else{
                    return
                }  
            },
            searchRecord(){
                if(this.search.length >= 3){
                     axios.get('tasks/search/'+this.search)
                    .then(response=>this.task = response.data)
                    .catch(err=>console.log(err))
                }else{
                    this.getResult()
                }
            }
        },
        created() {
            axios.get('tasks')
            .then((response)=>this.task = response.data)
            .catch((error)=>console.log(error))
            console.log('Task Component Mounted.')
        }
    }
</script>

<style scoped>
    h2{
        color: #FFF;
    }
</style>
