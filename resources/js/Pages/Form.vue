<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import DatePicker from 'primevue/datepicker';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import {useForm} from "@inertiajs/vue3";
import InputText from 'primevue/inputtext';

const form = useForm({
    date: ''
})

const submit = () => {
    console.log('finish')
}
</script>

<template>
    <DashboardLayout title="Form" @submit.prevent="submit">
        <form>
            <div class="my-4">
                <label class="text-gray-500">Date picker</label>
                <DatePicker v-model="form.date" dateFormat="yy/mm/dd" showIcon fluid/>
            </div>

            <div class="my-2">
                <label class="text-gray-500">Input with prefix</label>
                <InputGroup>
                    <InputGroupAddon>https://</InputGroupAddon>
                    <InputText placeholder="Website"/>
                </InputGroup>
            </div>
        </form>

    </DashboardLayout>
</template>
