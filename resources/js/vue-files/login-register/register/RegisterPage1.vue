<template>
    <form @submit.prevent="toRegisterPage2" class="w-full flex flex-col gap-4 px-8">
        <p class="font-bold text-xl md:text-3xl mt-14 mb-4">Create your account</p>
        <input type="text" name="name" id="name" placeholder="Name" :class="inputClass" v-model="name">
        <input type="email" name="email" id="email" placeholder="Email" :class="inputClass" v-model="email">

        <div class="flex flex-col gap-4 mt-4">
            <p class="font-bold text-xl">Date of birth</p>
            <p class="text-slate-500">This will not be shown publicly. Confirm your own age, even if this account is for a business, a pet, or something else.</p>

            <div class="text-black grid grid-cols-5 gap-3">
                <select name="month" id="month" class="col-span-3 text-white px-2" :class="inputClass" v-model="selectedMonth" >
                    <option v-for="month in months" :key="{name: month}" class="text-black">
                        {{ month }}
                    </option>
                </select>
                <select name="days" id="days" class="col-span-1 text-white" :class="inputClass" v-model="selectedDay">
                    <option v-for="day in days" :key="{name: day}" :value="day" class="text-black">
                        {{ day }}
                    </option>
                </select>
                <select name="years" id="years" class="col-span-1 text-white" :class="inputClass" v-model="selectedYear">
                    <option v-for="year in years" :key="{name: year}" :value="year" class="text-black">
                        {{ year }}
                    </option>
                </select>
            </div>
        </div>

        <input type="submit" value="Next" class="rounded-full bg-white cursor-pointer md:py-3 py-px text-black my-8" :disabled="emptyFields" :class="emptyFields ? 'cursor-not-allowed bg-slate-300' : ''">
    </form>
</template>

<script setup>
    import { onMounted, ref, watchEffect} from "vue"

    const inputClass = 'bg-transparent border border-slate-500 py-3 rounded placeholder:px-2'
    let name = ref('')
    let email = ref('')
    let months = ref([])
    let days = ref([])
    let years = ref([])
    let emptyFields = ref(true)

    const date = new Date()

    let selectedMonth = ref(undefined)
    let selectedDay = ref(undefined)
    let selectedYear = ref(undefined)

    const props = defineProps(['currentRegisterPageNumber', 'registerPageNumber'])
    const emit = defineEmits(['toRegisterPage2', 'details'])

    onMounted(() =>
    {
        axios.get('/api/getMonths')
        .then(res => months.value = res.data)
        .catch(err => console.error(err))

        for(let i = 0; i <= 31; i++)
        {
            days.value.push(i)
        }

        for(let i = 1930; i <= date.getFullYear(); i++)
        {
            years.value.push(i)
        }
    })

    watchEffect(() =>
    {
        if(name.value !== '' && email.value !== '' && months.value.length > 0 && days.value.length > 0 && years.value.length > 0)
        {
            emptyFields.value = false
        }
    })

    const toRegisterPage2 = () =>
    {
        const details = ({
            name : name.value,
            email: email.value,
            month: selectedMonth.value,
            day : selectedDay.value,
            year: selectedYear.value,
        })

        emit('toRegisterPage2')
        emit('details', details)
    }
</script>
