<template>
    <div class="modal fade" id="addModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" @click="clearModal" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Add New Record</h4>
	        </div>
	        <div class="modal-body">
              <p class="alert alert-success" v-if="success.lenght > 0">{{ success }}</p>
	          	<label for="name">Add Name</label>
	          	<textarea name="name" id="name" class="form-control" placeholder="Enter Name" v-model="record"></textarea>

              <ul v-if="error.name" class="list-unstyle">
                  <li v-for="err of error.name" class="alert alert-danger">{{ err }}</li>
              </ul>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" @click="clearModal" data-dismiss="modal">Close</button>
	          <button type="button" class="btn btn-success" @click="addRecord">Save</button>
	        </div>
	      </div>
	      
	    </div>
  </div>
</template>

<script>
    export default {
       data(){
       		return {
            success :'',
            error : [],
       			record :'',
       		}
       },
       methods:{
       		addRecord(){
       			axios.post('tasks',{
       				'name' : this.record,
       			})
       			.then(data => {
               this.$emit('recordadded', data);
               this.success = "Record added successfuly!";
               this.record ='';
            })
       			.catch(error => this.error = error.response.data.errors)
       		},
          clearModal(){
            this.error = [];
            this.success = '';
            this.reocrd = '';
          }
       }
    }
</script>

<style scoped>
    h2{
        color: #FFF;
    }
</style>
