import { createApp, ref } from 'vue';
import axios from 'axios';
import ChatMessages from './components/ChatMessages.vue';

const app = createApp({
    data() {
        return {
            messages: []
        };
    },
    created() {
        this.fetchMessages();

    },
    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },
    }
});

app.component('chat-messages', ChatMessages);

app.mount('#app');
