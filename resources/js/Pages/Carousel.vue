<script setup>
import {onMounted, ref} from "vue";
import Button from "primevue/button";
import Carousel from 'primevue/carousel';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const ProductService =
    [
        {
            id: '1000',
            code: 'f230fh0g3',
            name: 'Bamboo Watch',
            description: 'Product Description',
            image: 'bamboo-watch.jpg',
            price: 65,
            category: 'Accessories',
            quantity: 24,
            inventoryStatus: 'INSTOCK',
            rating: 5
        },
        {
            id: '1001',
            code: 'nvklal433',
            name: 'Black Watch',
            description: 'Product Description',
            image: 'black-watch.jpg',
            price: 72,
            category: 'Accessories',
            quantity: 61,
            inventoryStatus: 'INSTOCK',
            rating: 4
        },
        {
            id: '1002',
            code: 'zz21cz3c1',
            name: 'Blue Band',
            description: 'Product Description',
            image: 'blue-band.jpg',
            price: 79,
            category: 'Fitness',
            quantity: 2,
            inventoryStatus: 'LOWSTOCK',
            rating: 3
        },
        {
            id: '1003',
            code: '244wgerg2',
            name: 'Blue T-Shirt',
            description: 'Product Description',
            image: 'blue-t-shirt.jpg',
            price: 29,
            category: 'Clothing',
            quantity: 25,
            inventoryStatus: 'INSTOCK',
            rating: 5
        },
        {
            id: '1004',
            code: 'h456wer53',
            name: 'Bracelet',
            description: 'Product Description',
            image: 'bracelet.jpg',
            price: 15,
            category: 'Accessories',
            quantity: 73,
            inventoryStatus: 'INSTOCK',
            rating: 4
        },
        {
            id: '1005',
            code: 'av2231fwg',
            name: 'Brown Purse',
            description: 'Product Description',
            image: 'brown-purse.jpg',
            price: 120,
            category: 'Accessories',
            quantity: 0,
            inventoryStatus: 'OUTOFSTOCK',
            rating: 4
        },
        {
            id: '1006',
            code: 'bib36pfvm',
            name: 'Chakra Bracelet',
            description: 'Product Description',
            image: 'chakra-bracelet.jpg',
            price: 32,
            category: 'Accessories',
            quantity: 5,
            inventoryStatus: 'LOWSTOCK',
            rating: 3
        },
        {
            id: '1007',
            code: 'mbvjkgip5',
            name: 'Galaxy Earrings',
            description: 'Product Description',
            image: 'galaxy-earrings.jpg',
            price: 34,
            category: 'Accessories',
            quantity: 23,
            inventoryStatus: 'INSTOCK',
            rating: 5
        }
    ];
onMounted(() => {
    products.value = ProductService;
})

const products = ref([]);

onMounted(() => {
    products.value = ProductService;
});

</script>

<template>
    <DashboardLayout title="Product Carousel">
        <div class="card">
            <Carousel :value="products" :numVisible="1" :numScroll="1"
                      class="custom-carousel"
                      :show-navigators="true"
                      :show-indicators="false"
                      :circular="true"
                      :pt="{
                            root: {
                                style: 'width: 400px;'
                            }
                      }"
            >
                <template #item="slotProps">
                    <div class="px-5">
                        <img :src="'https://primefaces.org/cdn/primevue/images/product/' + slotProps.data.image"
                             :alt="slotProps.data.name" class="product-image"/>
                        <div class="flex flex-col">
                            <h3 class="product-title">{{ slotProps.data.name }}</h3>
                            <p class="product-description">{{ slotProps.data.description }}</p>
                            <div class="flex justify-between">
                                <span class="product-price">${{ slotProps.data.price }}</span>
                                <Button label="action" class="p-button-rounded"/>
                            </div>
                        </div>
                    </div>
                </template>
            </Carousel>
        </div>
    </DashboardLayout>
</template>

<style >
.p-items-hidden .p-carousel-item {
    visibility: visible !important;
}
</style>
