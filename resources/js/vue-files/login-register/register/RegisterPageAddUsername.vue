<template>
    <form @submit.prevent="toFinalRegisterPage" class="w-full flex flex-col gap-4 px-8">
        <div>
            <p class="font-bold text-3xl mt-14 mb-4">What should we call you?</p>
            <p>Your @username is unique. You can always change it later.</p>
        </div>

        <div class="flex flex-col gap-2">
            <input v-model="username" type="text" name="username" id="username" placeholder="Enter your username" class="bg-transparent border border-slate-500 py-3 rounded px-4">
            <div v-if="errorMessage" class="font-semibold text-red-400">{{ errorMessage }}</div>
        </div>

        <input type="submit" value="Next" class="rounded-full bg-white cursor-pointer py-3 text-black my-8">
    </form>
</template>

<script setup>
    import { onMounted, ref } from "vue"
    import router from '../../../router/Index.js'

    const props = defineProps(['details', 'password'])
    const emit = defineEmits(['toAddProfilePic'])

    let userId = ref(0)
    let username = ref('')
    let errorMessage = ref('')

    onMounted(() => userId.value =  props.details.user.id)

    const toFinalRegisterPage = () =>
    {
        console.log(props.details.user);
        axios.put(`/api/store-username/${userId.value}`, {
            username: username.value
        })
        .then(res => {
            if(! res.data.success)
            {
                errorMessage.value = res.data.message
            }
            else{
                errorMessage.value = ''
                axios.post('/api/login-user',
                {
                    login: username.value,
                    password: props.password
                })
                .then(res => {
                    if(! res.data.success)
                    {
                        console.log('error ocurred');
                    }
                    else{
                        router.push({ name: 'Home' })
                    }
                })
                .catch(err => console.error(err))
            }
        })
        .catch(err => console.error(err))
    }
</script>
