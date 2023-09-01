<template>
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-2 bg-gray-800 p-4 rounded-md">
            <p class="text-lg font-bold">Subscribe to premium</p>
            <p class="text-sm font-semibold">Subscribe to unlock new features and if eligible, receive a share of ads revenue.</p>
            <button class="bg-blue-500 text-white font-semibold w-1/2 rounded-full py-px">Subscribe</button>
        </div>

        <ul class="flex flex-col gap-2 bg-gray-800 p-4 rounded-md">
            <p class="text-lg font-bold">Trends for you</p>
            <li class="flex justify-between items-center">
                <div>
                    <small>Trending in Philippines</small>
                    <p>#OnePieceNetflix</p>
                </div>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">
                    more_horiz
                </span>
            </li>
            <li class="flex justify-between items-center">
                <div>
                    <small>Trending in Philippines</small>
                    <p>#IloveSydney</p>
                </div>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">
                    more_horiz
                </span>
            </li>
        </ul>

        <ul class="flex flex-col gap-2 bg-gray-800 p-4 rounded-md">
            <p class="text-lg font-bold">Who to follow</p>
            <li class="grid grid-cols-8">
                <div class="flex col-span-6 gap-2">
                    <img src="storage/images/logo-white.png" alt="" class="h-8 rounded-full">
                    <div class="text-sm">
                        <p>Monkey D. Luffy</p>
                        <p class="text-slate-400">@luffypogi</p>
                    </div>
                </div>
                <div class="col-span-2">
                    <button class="bg-white text-sm text-black font-semibold w-full rounded-full py-px">Follow</button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
    const liClass = 'flex gap-4 text-white text-xl'
</script>
