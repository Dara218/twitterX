<template>
    <div class="flex flex-col gap-6 bg-black h-screen px-16 py-4">
        <img src="../../../storage/images/logo-white.png" alt="logo white" class="w-7 h-auto">

        <ul class="flex flex-col gap-6">
            <li :class="liClass">
                <span class="material-symbols-outlined">home</span>
                Home
            </li>
            <li :class="liClass">
                <span class="material-symbols-outlined">search</span>
                Explore
            </li>
            <li :class="liClass">
                <span class="material-symbols-outlined">notifications</span>
                Notification
            </li>
            <li :class="liClass"><span class="material-symbols-outlined">mail</span>
                Messages
            </li>
            <li :class="liClass">
                <span class="material-symbols-outlined">list_alt</span>
                Lists
            </li>
            <li :class="liClass">
                <span class="material-symbols-outlined">groups</span>
                Communities
            </li>
            <li :class="liClass">
                <img src="../../../storage/images/logo-white.png" alt="logo white" class="w-7 h-auto">
                Verified
            </li>
            <li :class="liClass">
                <span class="material-symbols-outlined">person</span>
                Profile
            </li>
            <li :class="liClass">
                <span class="material-symbols-outlined">pending</span>
                More
            </li>
            <li>
                <button class="bg-blue-500 text-white font-semibold w-full rounded-full py-3">Post</button>
            </li>

            <div class="flex justify-between items-center">
                <div class="flex col-span-6 gap-2">
                    <img src="storage/images/logo-white.png" alt="" class="h-8 rounded-full">
                    <div class="text-sm">
                        <div class="flex gap-px items-center text-white">
                            <span>Monkey D. Luffy</span>
                            <span class="material-symbols-outlined">lock</span>
                        </div>
                        <p class="text-slate-400">@luffypogi</p>
                    </div>
                </div>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">
                    more_horiz
                </span>
            </div>
        </ul>
    </div>
</template>

<script setup>
    const liClass = 'flex gap-4 text-white text-xl'
</script>
