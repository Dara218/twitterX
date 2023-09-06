<template>
    <div class="px-40 md:px-0">
        <div class="grid grid-cols-8">
            <Sidebar class="col-span-2 sticky top-0"/>
            <div class="grid grid-cols-5 col-span-6 text-white">
                <div class="relative col-span-3 bg-black">
                    <div class="sticky top-0 w-full bg-black bg-opacity-50 backdrop-blur-md border border-slate-700">
                        <div class="cursor-pointer text-xl py-4 ml-4">Home</div>
                        <div class="grid grid-cols-2">
                            <div :class="middleButtonClass">
                                <div class="border-b-2 border-blue-500">For you</div>
                            </div>
                            <div :class="middleButtonClass">Following</div>
                        </div>
                    </div>
                    <div class="bg-black text-white min-h-screen border border-slate-700">
                        <button @click="logoutUser">logout</button> <br/>
                        <UserWriteTweetForm/>
                        <HomeTweetsVue :userDetails="userDetails"/>
                    </div>
                </div>
                <div class="flex flex-col col-span-2 gap-6 bg-black px-8 py-4">
                    <div class="bg-black sticky top-0 pb-2">
                        <input type="search" name="search" id="search" class="bg-gray-800 text-white rounded-full py-2 px-2 w-full" placeholder="Search">
                    </div>
                    <RightBar class="col-span-2"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue'
    import router from '../../router/Index.js'
    import Sidebar from '../../components/Sidebar.vue'
    import RightBar from '../../components/RightBar.vue'
    import HomeTweetsVue from '../../components/HomeTweets.vue'
    import UserWriteTweetForm from '../../components/UserWriteTweetForm.vue'

    const middleButtonClass = 'col-span-1 cursor-pointer flex hover:bg-slate-800 justify-center py-4 text-center'
    const userDetails = ref({})

    onMounted(() => {
        axios.get('/api/user')
        .then(res => {
            console.log(res.data)
            userDetails.value = res.data
        })
        .catch(err => console.error(err))
    })

    const logoutUser = () =>
    {
        axios.post('/api/logout-user')
        .then(() => router.push({ name: 'Index' }))
        .then(err => console.error(err))
    }
</script>
