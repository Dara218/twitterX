<template>
    <div class="bg-black text-white w-1/2 rounded-2xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 py-3 px-8">

        <div class="absolute left-5 top-5 flex items-center gap-8">
            <div v-if="currentRegisterPageNumber > 1">
                <i class="fa-solid fa-arrow-left cursor-pointer" @click="previousregisterPage"></i>
            </div>
            <div v-else>
                <i @click="closeRegisterModal" class="fa-solid fa-x cursor-pointer"></i>
            </div>
            <p class="text-xl font-bold">Step {{ currentRegisterPageNumber  }} of {{ registerPageNumber  }}</p>
        </div>

        <div v-if="currentRegisterPageNumber == 1">
            <RegisterPage1 :currentRegisterPageNumber="currentRegisterPageNumber" :registerPageNumber="registerPageNumber" @toRegisterPage2="registerNextpage"/>
        </div>
        <div v-if="currentRegisterPageNumber == 2">
            <RegisterPage2 :currentRegisterPageNumber="currentRegisterPageNumber" :registerPageNumber="registerPageNumber" />
        </div>
    </div>
</template>

<script setup>

    import { ref } from 'vue'
    import RegisterPage1 from '../login-register/register/RegisterPage1.vue'
    import RegisterPage2 from '../login-register/register/RegisterPage2.vue'

    let registerPageNumber = ref(4)
    let currentRegisterPageNumber = ref(1)

    const props = defineProps(['openRegistrationModal'])

    const emit = defineEmits(['closeRegister'])
    const closeRegisterModal = () => emit('closeRegister')

    const registerNextpage = () =>
    {
        currentRegisterPageNumber.value++
        console.log(currentRegisterPageNumber.value);
    }

    const previousregisterPage= () => currentRegisterPageNumber.value--

</script>
