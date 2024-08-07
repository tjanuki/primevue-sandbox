<script setup>
import {ref} from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import {useToast} from "primevue/usetoast";

const products = ref([
    {
        code: 'A1',
        name: 'Apple',
        category: 'Fruit',
        quantity: 5
    },
    {
        code: 'B1',
        name: 'Banana',
        category: 'Fruit',
        quantity: 10
    },
    {
        code: 'C1',
        name: 'Carrot',
        category: 'Vegetable',
        quantity: 20
    },
    {
        code: 'O1',
        name: 'Orange',
        category: 'Fruit',
        quantity: 5
    },
    {
        code: 'T1',
        name: 'Tomato',
        category: 'Vegetable',
        quantity: 10

    }
]);
const toast = useToast();
const columns = ref([
    {field: 'code', header: 'Code'},
    {field: 'name', header: 'Name'},
    {field: 'category', header: 'Category'},
    {field: 'quantity', header: 'Quantity'}
]);

const onColReorder = () => {
    toast.add({severity: 'success', summary: 'Column Reordered', life: 3000});
};
const onRowReorder = (event) => {
    products.value = event.value;
    toast.add({severity: 'success', summary: 'Rows Reordered', life: 3000});
};
</script>

<template>
    <DashboardLayout title="Form" @submit.prevent>
        <div>
            <DataTable :value="products" :reorderableColumns="true" @columnReorder="onColReorder"
                       @rowReorder="onRowReorder" tableStyle="min-width: 50rem">
                <Column rowReorder headerStyle="width: 3rem" :reorderableColumn="false"/>
                <Column v-for="col of columns" :field="col.field" :header="col.header" :key="col.field"></Column>
            </DataTable>
            <Toast/>
        </div>
    </DashboardLayout>
</template>
