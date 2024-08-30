<script setup>
import {onMounted, ref} from "vue";
import DataView from 'primevue/dataview';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import SelectButton from 'primevue/selectbutton';
import Tag from 'primevue/tag';
import Button from 'primevue/button';


onMounted(() => {
    products.value = [
        {
            id: 1000,
            name: 'Apple iPhone 12 Pro 128GB',
            category: 'Electronics',
            price: 999,
            inventoryStatus: 'INSTOCK',
            rating: 4.5,
            image: 'blue-band.jpg'
        },
        {
            id: 1001,
            name: 'Nike Air Max 2090',
            category: 'Shoes',
            price: 129,
            inventoryStatus: 'INSTOCK',
            rating: 4.2,
            image: 'blue-band.jpg'
        },
        {
            id: 1002,
            name: 'Adidas Superstar',
            category: 'Shoes',
            price: 89,
            inventoryStatus: 'LOWSTOCK',
            rating: 4.8,
            image: 'blue-band.jpg'
        },
        {
            id: 1003,
            name: 'Sony Playstation 5',
            category: 'Electronics',
            price: 399,
            inventoryStatus: 'OUTOFSTOCK',
            rating: 4.9,
            image: 'blue-band.jpg'
        },
        {
            id: 1004,
            name: 'Apple MacBook Pro 13-inch',
            category: 'Electronics',
            price: 1299,
            inventoryStatus: 'INSTOCK',
            rating: 4.2,
            image: 'blue-band.jpg'
        },
        {
            id: 1005,
            name: 'Dell XPS 13',
            category: 'Electronics',
            price: 1199,
            inventoryStatus: 'INSTOCK',
            rating: 4.7,
            image: 'blue-band.jpg'
        },
        {
            id: 1006,
            name: 'Canon EOS R5',
            category: 'Electronics',
            price: 3799,
            inventoryStatus: 'INSTOCK',
            rating: 4.5,
            image: 'blue-band.jpg'
        },
        {
            id: 1007,
            name: 'Sony WH-1000XM4',
            category: 'Electronics',
            price: 349,
            inventoryStatus: 'INSTOCK',
            rating: 4.8,
            image: 'blue-band.jpg'
        },
        {
            id: 1008,
            name: 'Apple Watch',
            category: 'Electronics',
            price: 349,
            inventoryStatus: 'INSTOCK',
            rating: 4.2,
            image: 'blue-band.jpg'
        },
        {
            id: 1009,
            name: 'Samsung Galaxy S21 Ultra',
            category: 'Electronics',
            price: 1199,
            inventoryStatus: 'INSTOCK',
            rating: 4.7,
            image: 'blue-band.jpg'
        }
    ];
});

const products = ref();
const layout = ref('grid');
const options = ref(['list', 'grid']);

const getSeverity = (product) => {
    switch (product.inventoryStatus) {
        case 'INSTOCK':
            return 'success';

        case 'LOWSTOCK':
            return 'warn';

        case 'OUTOFSTOCK':
            return 'danger';

        default:
            return null;
    }
}
</script>

<template>
    <DashboardLayout>

        <div class="card w-full">
            <DataView :value="products" :layout="layout">
                <template #header>
                    <div class="flex justify-end">
                        <SelectButton v-model="layout" :options="options" :allowEmpty="false">
                            <template #option="{ option }">
                                <i :class="[option === 'list' ? 'pi pi-bars' : 'pi pi-table']"/>
                            </template>
                        </SelectButton>
                    </div>
                </template>

                <template #list="slotProps">
                    <div class="flex flex-col">
                        <div v-for="(item, index) in slotProps.items" :key="index">
                            <div class="flex flex-col sm:flex-row sm:items-center p-6 gap-4"
                                 :class="{ 'border-t border-surface-200 dark:border-surface-700': index !== 0 }">
                                <div class="md:w-40 relative">
                                    <img class="block xl:block mx-auto rounded w-full"
                                         :src="`https://primefaces.org/cdn/primevue/images/product/${item.image}`"
                                         :alt="item.name"/>
                                    <Tag :value="item.inventoryStatus" :severity="getSeverity(item)"
                                         class="absolute dark:!bg-surface-900" style="left: 4px; top: 4px"></Tag>
                                </div>
                                <div class="flex flex-col md:flex-row justify-between md:items-center flex-1 gap-6">
                                    <div class="flex flex-row md:flex-col justify-between items-start gap-2">
                                        <div>
                                        <span class="font-medium text-surface-500 dark:text-surface-400 text-sm">{{
                                                item.category
                                            }}</span>
                                            <div class="text-lg font-medium mt-2">{{ item.name }}</div>
                                        </div>
                                        <div class="bg-surface-100 p-1" style="border-radius: 30px">
                                            <div class="bg-surface-0 flex items-center gap-2 justify-center py-1 px-2"
                                                 style="border-radius: 30px; box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.04), 0px 1px 2px 0px rgba(0, 0, 0, 0.06)">
                                                <span class="text-surface-900 font-medium text-sm">{{
                                                        item.rating
                                                    }}</span>
                                                <i class="pi pi-star-fill text-yellow-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:items-end gap-8">
                                        <span class="text-xl font-semibold">${{ item.price }}</span>
                                        <div class="flex flex-row-reverse md:flex-row gap-2">
                                            <Button icon="pi pi-heart" outlined></Button>
                                            <Button icon="pi pi-shopping-cart" label="Buy Now"
                                                    :disabled="item.inventoryStatus === 'OUTOFSTOCK'"
                                                    class="flex-auto md:flex-initial whitespace-nowrap"></Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <template #grid="slotProps">
                    <div class="grid grid-cols-12 gap-4">
                        <div v-for="(item, index) in slotProps.items" :key="index"
                             class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-6 p-2">
                            <div
                                class="p-6 border border-surface-200 dark:border-surface-700 bg-surface-0 dark:bg-surface-900 rounded flex flex-col">
                                <div class="bg-surface-50 flex justify-center rounded p-4">
                                    <div class="relative mx-auto">
                                        <img class="rounded w-full"
                                             :src="`https://primefaces.org/cdn/primevue/images/product/${item.image}`"
                                             :alt="item.name" style="max-width: 300px"/>
                                        <Tag :value="item.inventoryStatus" :severity="getSeverity(item)"
                                             class="absolute dark:!bg-surface-900" style="left: 4px; top: 4px"></Tag>
                                    </div>
                                </div>
                                <div class="pt-6">
                                    <div class="flex flex-row justify-between items-start gap-2">
                                        <div>
                                        <span class="font-medium text-surface-500 dark:text-surface-400 text-sm">{{
                                                item.category
                                            }}</span>
                                            <div class="text-lg font-medium mt-1">{{ item.name }}</div>
                                        </div>
                                        <div class="bg-surface-100 p-1" style="border-radius: 30px">
                                            <div class="bg-surface-0 flex items-center gap-2 justify-center py-1 px-2"
                                                 style="border-radius: 30px; box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.04), 0px 1px 2px 0px rgba(0, 0, 0, 0.06)">
                                                <span class="text-surface-900 font-medium text-sm">{{
                                                        item.rating
                                                    }}</span>
                                                <i class="pi pi-star-fill text-yellow-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-6 mt-6">
                                        <span class="text-2xl font-semibold">${{ item.price }}</span>
                                        <div class="flex gap-2">
                                            <Button icon="pi pi-shopping-cart" label="Buy Now"
                                                    :disabled="item.inventoryStatus === 'OUTOFSTOCK'"
                                                    class="flex-auto whitespace-nowrap"></Button>
                                            <Button icon="pi pi-heart" outlined></Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </DataView>
        </div>
    </DashboardLayout>
</template>
