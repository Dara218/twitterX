<template>
    <div class="bg-black text-white w-11/12 md:w-1/2 rounded-2xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 py-3 px-28">
        <i @click="closeLoginModal" class="fa-solid fa-x cursor-pointer absolute top-4 left-4"></i>

        <div class="absolute top-2 left-1/2 transform -translate-x-1/2">
            <img src="storage/images/logo-white.png" alt="" class="h-8 rounded-full">
        </div>

        <div class="flex flex-col gap-6 items-start w-full my-16">
            <LoginModalUsername v-if="! isOpenLoginPasswordModal" @openLoginPasswordModal="openLoginPasswordModal" @inputValue="setInputValue"/>
            <LoginModalPassword v-if="isOpenLoginPasswordModal" :userCredential="userCredential"/>

            <div class="w-full">
                <span class="text-slate-400">Don't have an account?</span>
                <span @click="redirectToRegister" class="text-blue-400 cursor-pointer"> Sign up</span>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import LoginModalUsername from './LoginModalUsername.vue'
    import LoginModalPassword from './LoginModalPassword.vue'
    let isOpenLoginPasswordModal = ref(false)
    let userCredential = ref('')

    const emit = defineEmits(['closeLoginModal', 'redirectToRegister'])

    const closeLoginModal = () => emit('closeLoginModal')
    const redirectToRegister = () => emit('redirectToRegister')
    const openLoginPasswordModal = () => isOpenLoginPasswordModal.value = true
    const setInputValue = userInput => userCredential.value = userInput
</script>
