<script setup>
import { onMounted, watch } from 'vue';
import { useToast } from 'primevue/usetoast';
import { usePage } from '@inertiajs/vue3';
import Toast from "primevue/toast";

const toast = useToast();
const page = usePage();

const showNotification = (notification) => {
    if (notification) {
        toast.add({
            severity: notification.type,
            summary: notification.type.charAt(0).toUpperCase() + notification.type.slice(1),
            detail: notification.message,
            life: 3000
        });
    }
};

onMounted(() => {
    showNotification(page.props.notification);
});

watch(() => page.props.notification, (newNotification) => {
    showNotification(newNotification);
});
</script>
<template>
    <Toast position="top-right" />
</template>

