<template>
    <form @submit.prevent="toFinalRegisterPage" class="w-full flex flex-col gap-4 px-8">
        <div>
            <p class="font-bold text-3xl mt-14 mb-4">Pick a profile picture</p>
            <p>Have a favorite selfie? Upload it now.</p>
        </div>

        <div class="flex flex-col items-center gap-2">
            <input type="file" name="image" id="image" placeholder="Choose a file." @change="showImage">
            <img v-if="previewImage" :src="previewImage" alt="profile picture" class="rounded-full w-1/2 h-1/2">
        </div>

        <p @click="goToAddUsername" class="text-blue-500 underline cursor-pointer">Skip for now.</p>

        <input type="submit" value="Next" class="rounded-full bg-white cursor-pointer py-3 text-black my-8">
    </form>
</template>

<script setup>
    import { onMounted, ref } from "vue";

    const props = defineProps(['details'])
    const emit = defineEmits(['toAddProfilePic', 'toAddUsername'])
    const previewImage = ref('')
    const fileName = ref('')

    let userId = ref(0)

    onMounted(() => userId.value = props.details.user.id)

    const showImage = (e) =>
    {
        const file = e.target.files[0]

        const reader = new FileReader()
        reader.onload = () => {
            previewImage.value = reader.result
            fileName.value = file
        }
        reader.readAsDataURL(file)
    }

    const toFinalRegisterPage = () =>
    {
        const formData = new FormData();
        formData.append('image', fileName.value)
        formData.append('_method', 'put')

        console.log(formData.get('image'))

        axios.post(`/api/update-user-photo/${userId.value}`, formData)
        .then(res => {
            if(! res.data.success)
            {
                console.log('error uploading photo')
            }
            else{
                goToAddUsername()
            }
        })
        .catch(err => console.error(err))
    }

    const goToAddUsername = () => emit('toAddUsername')
</script>
