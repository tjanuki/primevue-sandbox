<script setup>
import { ref, onMounted } from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TreeTable from 'primevue/treetable';
import Column from 'primevue/column';
import InputText from "primevue/inputtext";
import SelectButton from 'primevue/selectbutton';

const nodes = ref([
    {
        key: '0',
        data: { name: 'Fruits', size: '3 items', type: 'Category' },
        children: [
            {
                key: '0-0',
                data: { name: 'Apple', size: '5', type: 'Fruit' }
            },
            {
                key: '0-1',
                data: { name: 'Banana', size: '10', type: 'Fruit' }
            },
            {
                key: '0-2',
                data: { name: 'Orange', size: '5', type: 'Fruit' }
            }
        ]
    },
    {
        key: '1',
        data: { name: 'Vegetables', size: '2 items', type: 'Category' },
        children: [
            {
                key: '1-0',
                data: { name: 'Carrot', size: '20', type: 'Vegetable' }
            },
            {
                key: '1-1',
                data: { name: 'Tomato', size: '10', type: 'Vegetable' }
            }
        ]
    }
]);

const filters = ref({
});
const filterMode = ref({ label: 'Lenient', value: 'lenient' });
const selectedKeys = ref({});
</script>

<template>
    <DashboardLayout title="Form" @submit.prevent>
        <div class="card">
            <TreeTable
                v-model:selectionKeys="selectedKeys"
                :value="nodes"
                :filters="filters"
                :filterMode="filterMode.value"
                selectionMode="checkbox"
                tableStyle="min-width: 50rem"
            >
                <Column field="data.name" header="Name" expander style="width: 34%">
                    <template #body="{ node }">
                        {{ node.data.name }}
                    </template>
                    <template #filter="{filterModel}">
                        <InputText v-model="filters['name']" type="text" class="p-column-filter" placeholder="Filter by name" />
                    </template>
                </Column>
            </TreeTable>
        </div>
    </DashboardLayout>
</template>

<style lang="scss" scoped>
.p-column-filter {
    width: 100%;
}
</style>
