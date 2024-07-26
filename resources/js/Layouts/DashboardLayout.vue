<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {ref} from "vue";
import Panel from "primevue/panel";

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
                <Panel>
                    <div class="w-100 h-[500px] flex justify-center items-center">
                        <slot></slot>
                    </div>
                </Panel>
            </div>
        </div>
    </AppLayout>
</template>
