<template>
    <div class="card flex justify-center">
        <MultiSelect
            v-model="selectedCities"
            :options="cities"
            optionLabel="label"
            optionGroupLabel="label"
            optionGroupChildren="items"
            placeholder="Select Cities"
            class="w-full md:w-80"
        >
            <template #optiongroup="slotProps">
                <div class="flex items-center justify-between p-2">
                    <div class="flex items-center">
                        <Checkbox
                            :modelValue="isGroupSelected(slotProps.option)"
                            @change="(e) => onGroupCheckboxChange(e, slotProps.option)"
                        />
                        <label class="ml-2">{{ slotProps.option.label }}</label>
                    </div>
                </div>
            </template>
        </MultiSelect>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import MultiSelect from 'primevue/multiselect';
import Checkbox from 'primevue/checkbox';

interface City {
    label: string;
    value: string;
}

interface CityGroup {
    label: string;
    code: string;
    items: City[];
}

const selectedCities = ref<string[]>([]);

const cities: CityGroup[] = [
    {
        label: 'Germany',
        code: 'DE',
        items: [
            { label: 'Berlin', value: 'Berlin' },
            { label: 'Frankfurt', value: 'Frankfurt' },
            { label: 'Hamburg', value: 'Hamburg' },
            { label: 'Munich', value: 'Munich' },
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
    }
];

const isGroupSelected = (group: CityGroup): boolean => {
    return group.items.every(item => selectedCities.value.includes(item.value));
};

const onGroupCheckboxChange = (event: Event, group: CityGroup): void => {
    const checked = (event.target as HTMLInputElement).checked;
    if (checked) {
        selectedCities.value = [...new Set([...selectedCities.value, ...group.items.map(item => item.value)])];
    } else {
        selectedCities.value = selectedCities.value.filter(city => !group.items.find(item => item.value === city));
    }
};
</script>
