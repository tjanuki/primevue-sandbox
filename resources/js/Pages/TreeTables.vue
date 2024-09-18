<script setup>
import {ref, onMounted} from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TreeTable from 'primevue/treetable';
import Column from 'primevue/column';
import InputText from "primevue/inputtext";
import Button from 'primevue/button';

const nodes = ref([
    {
        key: '0',
        data: {name: 'Fruits', size: '3 items', type: 'Category'},
        children: [
            {
                key: '0-0',
                data: {name: 'Apple', size: '5', type: 'Fruit'}
            },
            {
                key: '0-1',
                data: {name: 'Banana', size: '10', type: 'Fruit'}
            },
            {
                key: '0-2',
                data: {name: 'Orange', size: '5', type: 'Fruit'}
            }
        ]
    },
    {
        key: '1',
        data: {name: 'Vegetables', size: '2 items', type: 'Category'},
        children: [
            {
                key: '1-0',
                data: {name: 'Carrot', size: '20', type: 'Vegetable'}
            },
            {
                key: '1-1',
                data: {name: 'Tomato', size: '10', type: 'Vegetable'}
            }
        ]
    }
]);

const expandedKeys = ref({});
const filters = ref({});
const selectedKeys = ref({});

const toggleAll = () => {
    const allKeys = getAllKeys(nodes.value);
    if (Object.keys(expandedKeys.value).length === allKeys.length) {
        // If all are expanded, collapse all
        expandedKeys.value = {};
    } else {
        // Otherwise, expand all
        const newExpandedKeys = {};
        allKeys.forEach(key => {
            newExpandedKeys[key] = true;
        });
        expandedKeys.value = newExpandedKeys;
    }
};

const getAllKeys = (nodes) => {
    let keys = [];
    nodes.forEach(node => {
        keys.push(node.key);
        if (node.children) {
            keys = keys.concat(getAllKeys(node.children));
        }
    });
    return keys;
};
</script>

<template>
    <DashboardLayout title="Tree Table" @submit.prevent>
        <div class="card">
            <TreeTable
                v-model:expandedKeys="expandedKeys"
                v-model:selectionKeys="selectedKeys"
                :value="nodes"
                :filters="filters"
                filterMode="lenient"
                selectionMode="checkbox"
                tableStyle="min-width: 50rem"
            >
                <template #header>
                    <div class="flex justify-end items-center">
                        <Button @click="toggleAll" label="Show All"/>
                    </div>
                </template>
                <Column field="name" header="Name" expander>
                    <template #body="{ node }">
                        {{ node.data.name }}
                    </template>
                    <template #filter>
                        <InputText v-model="filters['name']" type="text" class="p-column-filter"
                                   placeholder="Filter by name"/>
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
