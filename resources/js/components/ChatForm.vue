<template>
    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
        <div class="relative flex">
             <span class="absolute inset-y-0 flex items-center">
                <button type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                   </svg>
                </button>
             </span>
                <input
                    id="btn-input"
                    type="text"
                    name="message"
                    class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3"
                    placeholder="Write your message!"
                    v-model="newMessage"
                    @keyup.enter="sendMessage"
                />
                <input
                    type="file"
                    accept="image/*"
                    id="file"
                    class="hidden"
                    @change="onFileChange"
                    ref="fileInput"
                />
            <div class="absolute right-0 items-center inset-y-0  sm:flex">
                <button
                    type="button"
                    id="uploadButton"
                    class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none relative"
                    @click="openFileUploadDialog"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                    </svg>
                    <!-- Add the number 1 to indicate image uploaded -->
                    <span v-if="file" class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white rounded-full h-4 w-4 flex items-center justify-center text-xs">1</span>
                </button>
                <button type="button"  id="btn-chat" @click="sendMessage" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                    <span class="font-bold">Send</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                    </svg>
                </button>
            </div>
        </div>
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
                file: this.file
            });

            this.newMessage = "";
            this.file = null;
        },
        onFileChange(event) {
            this.file = event.target.files[0];
        },
        openFileUploadDialog() {
            this.$refs.fileInput.click(); // Trigger a click event on the file input
        }
    }
};
</script>

