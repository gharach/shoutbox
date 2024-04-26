import {createApp, ref} from 'vue';
import axios from 'axios';
import ChatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue';
import './bootstrap'

const app = createApp({
    data() {
        return {
            messages: []
        };
    },
    created() {
        this.fetchMessages();

        window.Echo.private('chatroom')
            .listen('MessageDelivered', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });

    },
    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
           this.messages.push(message);
            var formData = new FormData();
            formData.append("image", message.file);
            formData.append("message", message.message);
            formData.append("user", message.user);
            axios.post('/messages', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {

            });
        }
    }
});
app.component('chat-messages', ChatMessages);
app.component('chat-form', ChatForm);
app.mount('#app');
