<script setup>
import { ref, onMounted } from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import TreeTable from 'primevue/treetable';
import Column from 'primevue/column';
import InputText from "primevue/inputtext";
import Button from 'primevue/button';

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

const expandedKeys = ref({});
const filters = ref({});

// Initialize selectedKeys with default checked records
const selectedKeys = ref({
    '0': {
        checked: false,
        partialChecked: true
    },
    '1': {
        checked: false,
        partialChecked: true
    },
    '0-1': {
        checked: true,
        partialChecked: false
    },
    '1-0': {
        checked: true,
        partialChecked: false
    }
});

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

const logCheckedNodes = () => {
    console.log('Checked nodes:', JSON.stringify(selectedKeys.value, null, 2));
};

// New method to toggle checkbox when name is clicked
const toggleCheckbox = (node) => {
    const key = node.key;
    if (selectedKeys.value[key]) {
        if (selectedKeys.value[key].checked) {
            // If checked, uncheck it
            delete selectedKeys.value[key];
        } else {
            // If partially checked, check it fully
            selectedKeys.value[key] = { checked: true, partialChecked: false };
        }
    } else {
        // If unchecked, check it
        selectedKeys.value[key] = { checked: true, partialChecked: false };
    }

    // Force reactivity update
    selectedKeys.value = { ...selectedKeys.value };

    // Update parent nodes (simplified, might need more complex logic for deep hierarchies)
    updateParentNodes(nodes.value, key);
};

// Helper method to update parent nodes
const updateParentNodes = (nodes, childKey) => {
    for (let node of nodes) {
        if (node.children && node.children.some(child => child.key === childKey)) {
            const allChecked = node.children.every(child => selectedKeys.value[child.key]?.checked);
            const someChecked = node.children.some(child => selectedKeys.value[child.key]?.checked || selectedKeys.value[child.key]?.partialChecked);

            if (allChecked) {
                selectedKeys.value[node.key] = { checked: true, partialChecked: false };
            } else if (someChecked) {
                selectedKeys.value[node.key] = { checked: false, partialChecked: true };
            } else {
                delete selectedKeys.value[node.key];
            }

            // Continue up the tree
            updateParentNodes(nodes, node.key);
            break;
        } else if (node.children) {
            updateParentNodes(node.children, childKey);
        }
    }
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
                    <div class="flex justify-between items-center">
                        <Button @click="toggleAll" label="Show All" />
                        <Button @click="logCheckedNodes" label="Log Checked Nodes" class="ml-2" />
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global']" placeholder="Global Search" />
                        </span>
                    </div>
                </template>
                <Column field="name" header="Name" expander style="width: 34%">
                    <template #body="{ node }">
                        <span @click.stop="toggleCheckbox(node)" class="cursor-pointer">
                            {{ node.data.name }}
                        </span>
                    </template>
                    <template #filter>
                        <InputText v-model="filters['name']" type="text" class="p-column-filter" placeholder="Filter by name" />
                    </template>
                </Column>
                <Column field="size" header="Size" style="width: 33%">
                    <template #body="{ node }">
                        {{ node.data.size }}
                    </template>
                    <template #filter>
                        <InputText v-model="filters['size']" type="text" class="p-column-filter" placeholder="Filter by size" />
                    </template>
                </Column>
                <Column field="type" header="Type" style="width: 33%">
                    <template #body="{ node }">
                        {{ node.data.type }}
                    </template>
                    <template #filter>
                        <InputText v-model="filters['type']" type="text" class="p-column-filter" placeholder="Filter by type" />
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
.cursor-pointer {
    cursor: pointer;
}
</style>
