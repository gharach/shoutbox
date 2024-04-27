// resources/assets/js/components/ChatMessages.vue

<template>
    <div class="left clearfix" v-for="message in messages" :key="message.id">
        <div class="chat-message">
            <div
                :class="{'flex items-end': message.user.id !== user.id, 'flex items-end justify-end': message.user.id == user.id}">
                <div :class="{
                        'flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end': message.user.id === user.id,
                        'flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start': message.user.id !== user.id
                        }">
                    <div>
                        <span :class="{
                        'px-4 py-2 rounded-lg inline-block bg-blue-600 text-white': message.user.id === user.id,
                        'px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600': message.user.id !== user.id
                    }"> {{ message.message }}
                        </span>
                    </div>
                </div>
                <div :class="{'flex flex-col space-y-2 order-2':  message.user.id === user.id,
                 'flex flex-col space-y-2 order-1':  message.user.id === user.id }">
                    <div>
                        <!--                                <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">-->
                    </div>
                    <span>{{ message.user.name }}</span>
                </div>
            </div>
        </div>
        <div>
            <img v-if="message.image" :src="message.image" alt="Message Image" class="max-h-400 w-1/2">
        </div>
    </div>
</template>
<style>
.scrollbar-w-2::-webkit-scrollbar {
    width: 0.25rem;
    height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
    --bg-opacity: 1;
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
    --bg-opacity: 1;
    background-color: #edf2f7;
    background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
    border-radius: 0.25rem;
}
</style>


<script>

export default {
    props: ["messages", "user"],
};
</script>
