
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

const example = require('./components/ExampleComponent.vue');
const sample = require('./components/SampleComponent.vue');
const task = require('./components/TaskComponent.vue');
Vue.component('chat-log', require('./components/ChatLogComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessageComponent.vue'));
Vue.component('chat-composer', require('./components/ChatComposerComponent.vue'));

const routes = [
			{
				path : '/example',
				component : example
			},
			{
				path : '/sample',
				component : sample
			},
			{
				path : '/',
				component : task
			}
		];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
	routes
})
//Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('tasks', require('./components/TaskComponent.vue'));

const app = new Vue({
    el: '#app',
    router,
    data: {
        messages : []
    },
    methods: {
    	addMessage(message) {
    		this.messages.push(message);

            axios.post('messages', message).then(response)
    	}
    },
    created() {
    	axios.get('messages').then(response => {
    		this.messages = response.data;
    	});
    }
});
