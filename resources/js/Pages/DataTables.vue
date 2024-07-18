<script setup>
import { ref, onMounted } from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';

const dt = ref();
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
const exportCSV = () => {
    dt.value.exportCSV();
};
</script>

<template>
    <DashboardLayout title="Form" @submit.prevent>
        <div>
            <DataTable :value="products" ref="dt" tableStyle="min-width: 50rem">
                <template #header>
                    <div style="text-align: left">
                        <Button icon="pi pi-external-link" label="Export" @click="exportCSV($event)" />
                    </div>
                </template>
                <Column field="code" header="Code" exportHeader="Product Code"></Column>
                <Column field="name" header="Name"></Column>
                <Column field="category" header="Category"></Column>
                <Column field="quantity" header="Quantity"></Column>
            </DataTable>
        </div>

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
