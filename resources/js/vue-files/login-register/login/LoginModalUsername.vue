<template>
    <p class="text-3xl font-bold">Sign in to X</p>
    <div class="w-full flex flex-col gap-6">
        <button class="bg-white rounded-full w-full cursor-pointer text-slate-600 py-2 hover:bg-opacity-90">Sign up with Google</button>
        <button class="bg-white rounded-full text-black w-full cursor-pointer py-2 hover:bg-opacity-90">Sign up with Apple</button>
    </div>

    <div class="flex items-center gap-6 w-full">
        <div class="bg-slate-400 flex-grow h-px"></div>
        <p>or</p>
        <div class="bg-slate-400 flex-grow h-px"></div>
    </div>

    <form @submit.prevent="openLoginPasswordModal" class="w-full flex flex-col gap-6">
        <input v-model="inputValue" type="text" name="login" id="login" placeholder="Phone, email, or username" class="w-full bg-transparent text-white p-3 border border-slate-400">
        <input type="submit" value="Next" name="next" class="bg-white rounded-full text-black w-full cursor-pointer py-2 hover:bg-opacity-90">
        <button class="bg-transparent rounded-full text-white w-full cursor-pointer py-2 hover:bg-opacity-90 border border-white">Forgot password</button>
    </form>
</template>

<script setup>
    import { ref } from "vue"

    let inputValue = ref('')

    const emit = defineEmits(['openLoginPasswordModal', 'inputValue'])
    const openLoginPasswordModal = () =>
    {
        emit('openLoginPasswordModal')
        emit('inputValue', inputValue.value)
    }
</script>
