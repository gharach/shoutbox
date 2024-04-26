// resources/assets/js/components/ChatMessages.vue

<template>
    <div class="left clearfix" v-for="message in messages" :key="message.id">
            {{ message.user.name }}

            {{ message.message }}
            <img v-if="message.image" :src="message.image" alt="Message Image" style="width: 400px; height: 400px;">
    </div>
</template>

<script>
export default {
  props: ["messages"],
};
</script>
