<template>
    <div class="flex justify-center items-center min-h-screen bg-black">
        <div v-if="openRegistrationModal">
            <div class="bg-slate-500 bg-opacity-50 w-full h-full top-0 absolute"></div>
            <RegisterModal @closeRegister="closeRegistrationModal" :openRegistrationModal="openRegistrationModal"/>
        </div>
        <div class="flex flex-col items-center md:grid grid-cols-2">
            <div class="col-span-1 md:flex justify-center items-center w-8/12 md:w-full mb-8">
                <img src="storage/images/logo-white.png" alt="Twitter" class="h-auto w-14 md:w-5/12">
            </div>
            <div class="col-span-1 text-white flex gap-8 flex-col w-8/12">
                <p class="text-3xl md:text-6xl font-bold">Happening now</p>

                <div class="flex flex-col gap-2 items-start w-full">
                    <p class="text-2xl md:text-3xl font-bold mb-4">Join today.</p>
                    <button class="bg-white rounded-full w-full cursor-pointer text-slate-600 py-2 hover:bg-opacity-90">Sign up with Google</button>
                    <button class="bg-white rounded-full text-black w-full cursor-pointer py-2 hover:bg-opacity-90">Sign up with Apple</button>

                    <div class="flex items-center gap-2 w-full">
                        <div class="bg-slate-400 flex-grow h-px"></div>
                        <p>or</p>
                        <div class="bg-slate-400 flex-grow h-px"></div>
                    </div>

                    <button @click="createAccount" class="bg-blue-500 text-white w-full rounded-full py-2 hover:bg-opacity-90">Create account</button>
                    <small>By signing up, you agree to the Terms of Service and Privacy Policy, including Cookie Use.</small>
                </div>

                <div class="w-8/12">
                    <p class="text-xl font-bold mb-4">Already have an account?</p>
                    <button class="cursor-pointer text-blue-500 border border-white rounded-full w-full font-bold py-2 hover:bg-slate-600 hover:bg-opacity-30">Sign in</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from "vue";
    import RegisterModal from '../vue-files/login-register/Register.vue'
    let openRegistrationModal = ref(false)

    const createAccount = () => openRegistrationModal.value = true
    const closeRegistrationModal = () => openRegistrationModal.value = false
</script>
