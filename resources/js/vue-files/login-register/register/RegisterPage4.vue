<template>
    <form @submit.prevent="toFinalRegisterPage" class="w-full flex flex-col gap-4 px-8">
        <div>
            <p class="font-bold text-3xl mt-14 mb-4">You'll need a password</p>
            <p>Make sure it's 8 characters or more.</p>
        </div>

        <div class="flex flex-col gap-2">
            <input type="text" name="password" id="password" placeholder="Enter your password" class="bg-transparent border border-slate-500 py-3 rounded px-4" v-model="password">
        </div>

        <input type="submit" value="Next" class="rounded-full bg-white cursor-pointer py-3 text-black my-8">
    </form>
</template>

<script setup>
    import { onMounted, ref } from "vue";

    const props = defineProps(['details'])
    const emit = defineEmits(['toAddProfilePic'])

    let userId = ref(0)
    let password = ref(0)

    onMounted(() => userId.value =  props.details.user.id)

    const toFinalRegisterPage = () =>
    {
        axios.put(`/api/store-user-password/${userId.value}`, {
            password: password.value
        })
        .then((res) => {
            if(res.data.success)
            {
                emit('toAddProfilePic')
            }
            console.log('need 8 characters long');
        })
        .catch(err => console.error(err))
    }
</script>
