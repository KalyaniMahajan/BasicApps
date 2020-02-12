<template>
    <div class="modal fade" id="viewModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">View Single Records - {{ viewrec.id }}</h4>
	        </div>
	        <div class="modal-body">
	          	<p  id="name">{{ viewrec.name }}</p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
  </div>
</template>

<script>
    export default {
       props:['viewrec'], 
    }
</script>

<style scoped>
    h2{
        color: #FFF;
    }
</style>