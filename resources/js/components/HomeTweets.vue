<template>
    <div v-if="userTweets" class="flex flex-col">
        <div v-for="userTweet of userTweets" :key="userTweet.id" class="flex gap-2 border border-t-0 border-l-0 border-r-0 border-slate-700 p-4">
            <img src="storage/images/logo-white.png" alt="" class="h-8 rounded-full">
            <div class="flex flex-col w-full">
                <div class="flex justify-between gap-2">
                    <div class="flex gap-2 text-slate-400">
                        <p>{{ props.userDetails.username }}</p>
                        <p>@ralph218</p>
                        <p>15h</p>
                    </div>
                    <span class="material-symbols-outlined cursor-pointer">
                        more_horiz
                    </span>
                </div>
                <div>
                    <div>
                        {{ userTweet.text_content }}
                    </div>
                    <img :src="'storage/' + userTweet.media" :alt="props.userDetails.username + 'tweet'" class="h-auto w-14 md:w-5/12 my-2">
                    <div class="full flex justify-around mt-4 text-slate-400">
                        <span :class="tweetOptionClass">
                            chat_bubble
                        </span>
                        <span :class="tweetOptionClass">
                            quick_phrases
                        </span>
                        <span :class="tweetOptionClass">
                            favorite
                        </span>
                        <span :class="tweetOptionClass">
                            bar_chart
                        </span>
                        <span :class="tweetOptionClass">
                            ios_share
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { onMounted, ref, watch } from "vue"

    const tweetOptionClass = 'material-symbols-outlined cursor-pointer'
    const props = defineProps(['userDetails'])
    const userTweets = ref({})

    // todo: when new tweet comes, append on top // add web socket

    onMounted(() => userTweets.value = props.userDetails.tweet)

    watch(() => props.userDetails, (val) => {
        userTweets.value = val.tweet
    })
</script>
