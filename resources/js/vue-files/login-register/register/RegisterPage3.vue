<template>
    <form @submit.prevent="toFinalRegisterPage" class="w-full flex flex-col gap-4 px-8">
        <div>
            <p class="font-bold text-3xl mt-14 mb-4">We sent you a code</p>
            <p>Enter it below to verify {{ email }}.</p>
        </div>

        <div class="flex flex-col gap-2">
            <input type="number" name="code" id="code" placeholder="Verification code" class="bg-transparent border border-slate-500 py-3 rounded px-4" v-model="code">
            <small class="cursor-pointer text-blue-500">Didn't receive code?</small>
        </div>

        <input type="submit" value="Next" class="rounded-full bg-white cursor-pointer py-3 text-black my-8">
    </form>
</template>

<script setup>
    import { onMounted, ref } from "vue";

    const props = defineProps(['details'])
    const emit = defineEmits(['toRegisterPage3'])
    let email = ref('')
    let userId = ref(0)
    let code = ref(0)

    onMounted(() => {
        email.value = props.details.user.email
        userId.value = props.details.user.id
    })

    const toFinalRegisterPage = () =>
    {
        axios.put(`/api/check-email-verification/${userId.value}`, {
            code: code.value
        })
        .then(res => {
            if(! res.data.success)
            {
                console.log('wrong passcode')
            }
            else{
                emit('toRegisterPage4')
            }
        })
        .catch(err => console.error(err))
    }
</script>
