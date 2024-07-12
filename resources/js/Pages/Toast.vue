<script setup>
import {onMounted} from "vue";
import Button from "primevue/button";
import {useToastService} from "@/Hooks/useToast.ts";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const {showSuccess, showInfo} = useToastService();

onMounted(() => {
    showSuccess('Welcome to PrimeVue');
});

const onShow = () => {
    showInfo('This is a message');
};
</script>

<template>
    <DashboardLayout title="Toast">
        <Button @click="onShow" label="Show"/>
    </DashboardLayout>
</template>
