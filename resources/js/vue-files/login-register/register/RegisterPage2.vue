<template>
    <form @submit.prevent="toConfirmEmail" class="w-full flex flex-col gap-4 px-8">
        <p class="font-bold text-3xl mt-14 mb-4">Create your account</p>
        <div class="flex justify-between items-center border border-white rounded p-2">
            <div class="flex flex-col">
                <small>Name</small>
                <p>{{ props.details.name }}</p>
            </div>
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div class="flex justify-between items-center border border-white rounded p-2">
            <div class="flex flex-col">
                <small>Email</small>
                <p>{{ props.details.email }}</p>
            </div>
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div class="flex justify-between items-center border border-white rounded p-2">
            <div class="flex flex-col">
                <small>Date of birth</small>
                <p>{{ dateOfBirth }}</p>
            </div>
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <input type="submit" value="Next" class="rounded-full bg-white cursor-pointer py-3 text-black my-8">
    </form>
</template>

<script setup>
    const props = defineProps(['details'])
    const emit = defineEmits(['toRegisterPage3', 'userDetails'])
    const dateOfBirth = `${props.details.month} ${props.details.day}, ${props.details.year}`

    const toConfirmEmail = () =>
    {
        axios.post('/api/register-user', {
            name: props.details.name ,
            email: props.details.email
        })
        .then(res => {
            emit('userDetails', res.data)
            emit('toRegisterPage3')
        })
        .catch(err => console.error(err))
    }
</script>
