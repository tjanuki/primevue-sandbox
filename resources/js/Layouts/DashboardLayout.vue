<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref} from "vue";

defineProps({
    title: String
})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="w-100 h-[500px] flex justify-center items-center">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
