<template>
    <div class="bg-black text-white w-11/12 md:w-1/2 rounded-2xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 py-3 px-8">

        <div class="absolute left-5 top-5 flex items-center gap-8">
            <div v-if="currentRegisterPageNumber == 1 ">
                <i class="fa-solid fa-x cursor-pointer" @click="closeRegisterModal" ></i>
            </div>
            <div v-if="currentRegisterPageNumber >= 2 ">
                <i @click="previousRegisterPage" class="fa-solid fa-arrow-left  cursor-pointer"></i>
            </div>
            <p v-if="currentRegisterPageNumber < 5" class="text-xl font-bold">Step {{ currentRegisterPageNumber  }} of {{ registerPageNumber  }}</p>
        </div>

        <div v-show="currentRegisterPageNumber == 1">
            <RegisterPage1
                :currentRegisterPageNumber="currentRegisterPageNumber"
                :registerPageNumber="registerPageNumber"
                @toRegisterPage2="registerNextPage"
                @details="getUserDetails"/>
        </div>
        <div v-if="showRegisterModal(2)" v-show="currentRegisterPageNumber == 2">
            <RegisterPage2
                :currentRegisterPageNumber="currentRegisterPageNumber"
                :registerPageNumber="registerPageNumber"
                :details="userDetails"
                @userDetails="getUserDetails"
                @toRegisterPage3="registerNextPage"/>
        </div>
        <div v-if="showRegisterModal(3)" v-show="currentRegisterPageNumber == 3">
            <RegisterPage3
                :currentRegisterPageNumber="currentRegisterPageNumber"
                :registerPageNumber="registerPageNumber"
                :details="userDetails"
                @toRegisterPage4="registerNextPage"/>
        </div>
        <div v-if="showRegisterModal(4)" v-show="currentRegisterPageNumber == 4">
            <RegisterPage4
                :currentRegisterPageNumber="currentRegisterPageNumber"
                :registerPageNumber="registerPageNumber"
                :details="userDetails"
                @toAddProfilePic="registerNextPage" @password="storePassword"/>
        </div>
        <div v-if="showRegisterModal(5)" v-show="currentRegisterPageNumber == 5">
            <RegisterPageProfilePicture
                :currentRegisterPageNumber="currentRegisterPageNumber"
                :registerPageNumber="registerPageNumber"
                :details="userDetails"
                @toAddUsername="registerNextPage"/>
        </div>
        <div v-if="showRegisterModal(6)" v-show="currentRegisterPageNumber == 6">
            <RegisterPageAddUsername
                :currentRegisterPageNumber="currentRegisterPageNumber"
                :registerPageNumber="registerPageNumber" :password="password"
                :details="userDetails" />
        </div>
    </div>
</template>

<script setup>

    import { ref } from 'vue'
    import RegisterPage1 from '../login-register/register/RegisterPage1.vue'
    import RegisterPage2 from '../login-register/register/RegisterPage2.vue'
    import RegisterPage3 from '../login-register/register/RegisterPage3.vue'
    import RegisterPage4 from '../login-register/register/RegisterPage4.vue'
    import RegisterPageProfilePicture from '../login-register/register/RegisterPageProfilePicture.vue'
    import RegisterPageAddUsername from '../login-register/register/RegisterPageAddUsername.vue'

    let registerPageNumber = ref(4)
    let currentRegisterPageNumber = ref(1)
    let userDetails = ref(null)
    let password = ref('')

    const props = defineProps(['openRegistrationModal'])

    const emit = defineEmits(['closeRegister'])
    const closeRegisterModal = () => emit('closeRegister')
    const registerNextPage = () => currentRegisterPageNumber.value++
    const getUserDetails = (details) => userDetails.value = details
    const previousRegisterPage = () => currentRegisterPageNumber.value--

    const showRegisterModal = number =>
    {
        if(userDetails.value != null && currentRegisterPageNumber.value == number)
        {
            return true
        }
        return false
    }

    const storePassword = pass => password.value = pass
</script>
