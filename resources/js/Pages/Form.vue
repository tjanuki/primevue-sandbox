<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import DatePicker from 'primevue/datepicker';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import {useForm} from "@inertiajs/vue3";
import InputText from 'primevue/inputtext';
import Checkbox from "primevue/checkbox";
import MultiSelect from 'primevue/multiselect';
import FloatLabel from 'primevue/floatlabel';
import {ref} from "vue";
import CopyToClipBoard from "@/Pages/Forms/CopyToClipBoard.vue";

const form = useForm({
    date: '',
    pizza: []
})

const submit = () => {
    console.log('finish')
}
const selectedCities = ref();
const groupedCities = ref([
    {
        label: 'Germany',
        code: 'DE',
        items: [
            { label: 'Berlin', value: 'Berlin' },
            { label: 'Frankfurt', value: 'Frankfurt' },
            { label: 'Hamburg', value: 'Hamburg' },
            { label: 'Munich', value: 'Munich' }
        ]
    },
    {
        label: 'USA',
        code: 'US',
        items: [
            { label: 'Chicago', value: 'Chicago' },
            { label: 'Los Angeles', value: 'Los Angeles' },
            { label: 'New York', value: 'New York' },
            { label: 'San Francisco', value: 'San Francisco' }
        ]
    },
    {
        label: 'Japan',
        code: 'JP',
        items: [
            { label: 'Kyoto', value: 'Kyoto' },
            { label: 'Osaka', value: 'Osaka' },
            { label: 'Tokyo', value: 'Tokyo' },
            { label: 'Yokohama', value: 'Yokohama' }
        ]
    }
]);

const selectedCitiesFloated = ref();
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);

</script>

<template>
    <DashboardLayout title="Form" @submit.prevent="submit">
        <form class="flex flex-col gap-10">
            <div>
                <label class="text-gray-500">Date picker</label>
                <DatePicker v-model="form.date" dateFormat="yy/mm/dd" showIcon fluid/>
            </div>

            <div>
                <label class="text-gray-500">Input with prefix</label>
                <InputGroup>
                    <InputGroupAddon>https://</InputGroupAddon>
                    <InputText placeholder="Website"/>
                </InputGroup>
            </div>

            <div>
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

            <div>
                <MultiSelect
                    v-model="selectedCities"
                    :options="groupedCities"
                    optionLabel="label"
                    filter
                    optionGroupLabel="label"
                    optionGroupChildren="items"
                    display="chip"
                    placeholder="Select Cities"
                    :max-selected-labels="3"
                    class="w-full md:w-80">
                    <template #optiongroup="slotProps">
                        <div class="flex items-center">
                            <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`flag flag-${slotProps.option.code.toLowerCase()} mr-2`" style="width: 18px" />
                            <div>{{ slotProps.option.label }}</div>
                        </div>
                    </template>
                </MultiSelect>
            </div>

            <div>
                <FloatLabel class="w-full md:w-80">
                    <MultiSelect id="ms-cities" v-model="selectedCitiesFloated" :options="cities" optionLabel="name" filter :maxSelectedLabels="3" class="w-full" />
                    <label for="ms-cities">MultiSelect</label>
                </FloatLabel>
            </div>

            <div>
                <MultiSelect
                    v-model="selectedCities"
                    :options="groupedCities"
                    :maxSelectedLabels="3"
                    optionLabel="label"
                    filter
                    optionGroupLabel="label"
                    optionGroupChildren="items"
                    placeholder="Select Cities"
                    :max-selected-labels="0"
                    class="w-full md:w-80">
                    <template #optiongroup="slotProps">
                        <div class="flex items-center">
                            <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`flag flag-${slotProps.option.code.toLowerCase()} mr-2`" style="width: 18px" />
                            <div>{{ slotProps.option.label }}</div>
                        </div>
                    </template>
                </MultiSelect>
            </div>

            <div>
                <CopyToClipBoard/>
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
