<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import DatePicker from 'primevue/datepicker';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import {useForm} from "@inertiajs/vue3";
import InputText from 'primevue/inputtext';
import Checkbox from "primevue/checkbox";

const form = useForm({
    date: '',
    pizza: []
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

            <div class="my-6">
                <div class="card flex flex-wrap justify-center gap-4">
                    <div class="flex items-center">
                        <Checkbox v-model="form.pizza" inputId="ingredient1" name="pizza" value="Cheese"
                        />
                        <label for="ingredient1" class="ml-2"> Cheese </label>
                    </div>
                    <div class="flex items-center">
                        <Checkbox v-model="form.pizza" inputId="ingredient2" name="pizza" value="Mushroom"
                        />
                        <label for="ingredient2" class="ml-2"> Mushroom </label>
                    </div>
                    <div class="flex items-center">
                        <Checkbox v-model="form.pizza" inputId="ingredient3" name="pizza" value="Pepper"
                        />
                        <label for="ingredient3" class="ml-2"> Pepper </label>
                    </div>
                    <div class="flex items-center">
                        <Checkbox v-model="form.pizza" inputId="ingredient4" name="pizza" value="Onion"
                        />
                        <label for="ingredient4" class="ml-2"> Onion </label>
                    </div>
                </div>
            </div>
        </form>

    </DashboardLayout>
</template>

<style lang="scss">
.p-checkbox {
    .p-checkbox-box {
        background: #999;
        border: 2px solid #999;
        border-radius: 4px;

        &.p-highlight {
            background: #007ad9;
            border-color: #005bb5;
        }

        .p-checkbox-icon {
            color: #ffffff;
        }
    }
}
</style>
