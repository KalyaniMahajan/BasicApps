<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel Heading</div>
                    <div class="panel-body">
                        <div class="chat-log">
                            <chat-message v-for="message in messages" :message="message"></chat-message>
                            <div class="empty" v-show="messages.lenght === 0">
                                Nothing here yet!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script scoped>
    export default {
        props: ['messages']
    }
</script>

<style lang="css">
   .chat-log chat-message:nth-child(even){
    background-color : #000;
   }

   .empty{
        padding : 1rem;
        text-align : center;
   }
</style>