<template>
    <div class="bg-black text-white w-11/12 md:w-1/2 rounded-2xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 py-3 px-28">
        <i @click="closeLoginModal" class="fa-solid fa-x cursor-pointer absolute top-4 left-4"></i>

        <div class="absolute top-2 left-1/2 transform -translate-x-1/2">
            <img src="storage/images/logo-white.png" alt="" class="h-8 rounded-full">
        </div>

        <div class="flex flex-col gap-6 items-start w-full my-16">
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

            <div class="w-full flex flex-col gap-6">
                <input type="text" name="login" id="login" placeholder="Phone, email, or username" class="w-full bg-transparent text-white p-3 border border-slate-400">
                <button class="bg-white rounded-full text-black w-full cursor-pointer py-2 hover:bg-opacity-90">Next</button>
                <button class="bg-transparent rounded-full text-white w-full cursor-pointer py-2 hover:bg-opacity-90 border border-white">Forgot password</button>
            </div>

            <div class="w-full">
                <span class="text-slate-400">Don't have an account?</span>
                <span @click="redirectToRegister" class="text-blue-400 cursor-pointer"> Sign up</span>
            </div>
        </div>
    </div>
</template>

<script setup>
    const emit = defineEmits(['closeLoginModal', 'redirectToRegister'])
    const closeLoginModal = () => emit('closeLoginModal')
    const redirectToRegister = () => emit('redirectToRegister')
</script>
