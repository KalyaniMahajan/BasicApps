<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h2>Sample Heading</h2></div>

                    <div class="panel-body">
                        Hello, {{ name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Sample Component mounted.')
        },
        data(){
            return{
                name : "Harry Potter"
            }
        }
    }
</script>

<style scoped>
    h2{
        color: #FFF;
    }
</style>
