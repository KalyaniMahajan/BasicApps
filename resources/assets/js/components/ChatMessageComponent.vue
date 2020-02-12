<template>
    <div class="container">
         <h4>{{message.message}}</h4>
         <h6>{{message.user.name}}</h6>
    </div>
</template>

<script scoped>
    export default {
        props : ['message'],
    }
</script>
