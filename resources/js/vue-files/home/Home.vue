<template>
    <div class="flex">
        <Sidebar/>
        <div class="flex flex-1 text-white">
            <div class="fixed top-0 w-1/2 bg-black">
                <div class="cursor-pointer text-xl py-4">Home</div>
                <div class="grid grid-cols-2">
                    <div :class="middleButtonClass">
                        <div class="border-b-2 border-blue-500">For you</div>
                    </div>
                    <div :class="middleButtonClass">Following</div>
                </div>
            </div>
            <div class="mt-32 mx-4 flex-1 text-black">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolores aliquid ab? Natus quisquam ut maxime tempore velit commodi consequuntur rerum dicta atque? Nam quod odio rerum minima provident optio!
            </div>
        </div>
        <Sidebar/>
    </div>
</template>

<script setup>
    import Sidebar from '../../components/Sidebar.vue';
    const middleButtonClass = 'col-span-1 cursor-pointer flex hover:bg-slate-800 justify-center py-4 text-center'
</script>
