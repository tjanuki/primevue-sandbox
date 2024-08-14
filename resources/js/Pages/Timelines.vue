<script setup lang="ts">
import {ref} from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Timeline from 'primevue/timeline';
import Message from 'primevue/message';

const events = ref([
    {status: 'Ordered', date: '15/10/2020 10:30', icon: 'pi pi-shopping-cart', color: '#9C27B0'},
    {status: 'Processing', date: '15/10/2020 14:00', icon: 'pi pi-cog', color: '#673AB7'},
    {status: 'Shipped', date: '15/10/2020 16:15', icon: 'pi pi-shopping-cart', color: '#FF9800'},
    {status: 'Delivered', date: '16/10/2020 10:00', icon: 'pi pi-check', color: '#607D8B'}
]);
</script>

<template>
    <DashboardLayout>
        <div class="card">
            <Timeline :value="events">
                <template #marker="slotProps">
                    <span class="flex w-8 h-8 items-center justify-center text-white rounded-full z-10 shadow-sm"
                          :style="{ backgroundColor: slotProps.item.color }">
                        <i :class="slotProps.item.icon"></i>
                    </span>
                </template>
                <template #opposite="slotProps">
                    <small class="text-surface-500 dark:text-surface-400">{{ slotProps.item.date }}</small>
                </template>
                <template #content="slotProps">
                    {{ slotProps.item.status }}
                </template>
            </Timeline>
        </div>
    </DashboardLayout>
</template>
