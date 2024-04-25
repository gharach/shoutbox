<template>
    <div class="input-group">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Please enter your message..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
        />

      <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
        Send
      </button>
    </div>
</template>

<script>
export default {
    props: ["user"],

    data() {
        return {
            newMessage: "",
            file: null
        };
    },
    methods: {
        sendMessage() {
            this.$emit("messagesent", {
                user: this.user,
                message: this.newMessage,
            });

            this.newMessage = "";
        },
    }
};
</script>

