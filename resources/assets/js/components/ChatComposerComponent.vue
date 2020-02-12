<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel Heading</div>
                    <div class="panel-body">
                        <div class="chat-composer">
                            <input type="text" placeholder="Start typing your message...." v-model="messageText" @keyup.enter="sendMessage">
                            <button class="btn btn-success" @click="sendMessage">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script scoped>
    export default {
        data() {
            return {
                messageText: ''
            }
        },            
        methods: {
            sendMessage() {
                 this.$emit('messagesend', {
                    message: this.messageText,
                    user: {
                        name: $('.navbar-right .dropdown-toggle').text()
                    }
                 });
                 this.messageText= '';
            }
        }
    }
</script>

<style lang="css">
    .chat-composer {
        display : flex;
    }
    .chat-composer input {
        flex : 1 auto ;
    }
</style>
