// resources/assets/js/components/ChatMessages.vue

<template>
    <div class="left clearfix" v-for="message in messages" :key="message.id">
            {{ message.user.name }}

            {{ message.message }}
    </div>
</template>

<script>
export default {
  props: ["messages"],
};
</script>
