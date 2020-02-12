<template>
    <div class="modal fade" id="editModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" @click="clearModal" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Edit Record</h4>
	        </div>
	        <div class="modal-body">
              <p class="alert alert-success" v-if="success.lenght > 0">{{ success }}</p>
	          	<label for="name">Edit Name</label>
	          	<textarea name="name" id="name" class="form-control" placeholder="Enter Name" v-model="rec.name"></textarea>

              <ul v-if="error.name" class="list-unstyle">
                  <li v-for="err of error.name" class="alert alert-danger">{{ err }}</li>
              </ul>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" @click="clearModal" data-dismiss="modal">Close</button>
	          <button type="button" class="btn btn-success" @click="updateRecord">Update Record</button>
	        </div>
	      </div>
	      
	    </div>
  </div>
</template>

<script>
    export default {
       	props:['rec'], 
       	data(){
       		return {
           		success :'',
            	error : [],
       		}
       	},
       	methods:{
       	     updateRecord(){
                	axios.post("tasks/"+this.rec.id,{
                    'name' : this.rec.name,
                    '_method' : 'PUT'
                })
                	.then(data=>{
               		this.$emit('recordUpdated', data);
               		this.success = "Record update successfuly!";
            	})
       			.catch(error => this.error = error.response.data.errors)
            },
          	clearModal(){
	            this.error = [];
	            this.success = '';
         	}
       	}
    }
</script>

<style scoped>
    h2{
        color: #FFF;
    }
</style>