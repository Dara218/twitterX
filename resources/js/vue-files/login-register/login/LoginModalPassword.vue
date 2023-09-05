<template>
    <p class="text-3xl font-bold">Enter your password</p>
    <form @submit.prevent="loginUser" class="w-full flex flex-col gap-6">
        <input v-model="userInput" disabled type="text" name="login" id="login" class="w-full bg-gray-800 border-none text-slate-400 p-3 border border-slate-400">

        <div class="relative">
            <span @click="togglePassword" class="material-symbols-outlined cursor-pointer absolute right-2 top-1/2 transform -translate-y-1/2 text-slate-400">visibility</span>

            <input v-model="password" :type="inputType" name="password" id="password" placeholder="Password" class="w-full bg-transparent text-white p-3 border border-slate-400">
        </div>

        <input type="submit" value="Login" name="login" class="bg-white rounded-full text-black w-full cursor-pointer py-2 hover:bg-opacity-90">

        <button class="bg-transparent rounded-full text-white w-full cursor-pointer py-2 hover:bg-opacity-90 border border-white">Forgot password</button>
    </form>
</template>

<script setup>
    import { onMounted, ref } from "vue"
    import router from "../../../router/Index"

    const props = defineProps(['userCredential'])
    const emit = defineEmits(['openLoginPasswordModal'])

    const userInput = ref('')
    const password = ref('')
    let inputType = ref('password')

    onMounted(() => userInput.value = props.userCredential)

    const togglePassword = () =>
    {
        if(inputType.value == 'password')
        {
            inputType.value = 'text'
        }
        else{
            inputType.value = 'password'
        }
    }

    const loginUser = () => axios.post('api/login-user',{
        login: userInput.value,
        password: password.value
    })
    .then(res => {
        if(! res.data.success)
        {
            console.log('login failed');
        }
        else{
            router.push({ name: 'Home' })
        }
    })
    .catch(err => console.error(err))

</script>
