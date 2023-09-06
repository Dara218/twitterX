<template>
    <div class="flex gap-2 border border-t-0 border-l-0 border-r-0 border-slate-700 p-4">
            <img src="storage/images/logo-white.png" alt="" class="h-8 rounded-full">
            <form @submit.prevent="storeTweet" class="flex flex-col w-full">
                <div class="flex justify-between gap-2">
                    <small class="gap-2">Everyone</small>
                    <span class="material-symbols-outlined cursor-pointer">
                        more_horiz
                    </span>
                </div>
                <div>
                    <input v-model="tweet" type="text" name="tweet" id="tweet" placeholder="What is happening?!" class="w-full bg-transparent py-2 placeholder:text-xl focus:outline-none">

                    <div v-if="previewImage">
                        <img :src="previewImage" alt="Twitter" class="h-auto w-14 md:w-5/12 my-2">
                    </div>

                    <div class="flex items-center gap-2 text-blue-500 border-b border-slate-500 pb-4">
                        <span class="material-symbols-outlined">public</span>
                        <span class="">Everyone can reply</span>
                    </div>

                    <div class="full flex items-center justify-between mt-4 text-blue-500">
                        <div class="flex gap-2">
                            <label for="media" :class="tweetOptionClass">
                                <span :class="tweetOptionClass">collections_bookmark</span>
                            </label>
                            <input name="media" id="media" type="file" class="hidden" @change="handleFileChange">
                            <span :class="tweetOptionClass">gif_box</span>
                            <span :class="tweetOptionClass">ballot</span>
                            <span :class="tweetOptionClass">sentiment_satisfied</span>
                            <span :class="tweetOptionClass">pending_actions</span>
                            <span :class="tweetOptionClass">location_on</span>
                        </div>

                        <input type="submit" value="Post" name="post" id="post" class="bg-blue-500 text-white font-semibold w-1/5 py-2 rounded-full cursor-pointer">
                    </div>
                </div>
            </form>
        </div>
</template>

<script setup>
    import { ref } from "vue"

    const tweetOptionClass = 'material-symbols-outlined cursor-pointer'
    let tweet = ref('')
    let media = ref('')
    let previewImage = ref('')

    const handleFileChange = (e) =>
    {
        const file = e.target.files[0]

        const reader = new FileReader()

        reader.onload = () =>
        {
            previewImage.value = reader.result
            media.value = file
        }

        reader.readAsDataURL(file)
    }

    const storeTweet = () =>
    {
        const formData = new FormData()
        formData.append('media', media.value)
        formData.append('tweet', tweet.value)

        axios.post('/api/tweet/store-tweet', formData)
        .then(res =>
        {
            if(! res.data.success)
            {
                console.log('Error posting your tweet')
            }
            else{
                console.log('tweet posted');
            }
        })
        .catch(err => console.error(err))
    }
</script>
