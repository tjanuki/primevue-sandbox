<script setup>
import {onMounted} from "vue";
import Button from "primevue/button";
import {useToastService} from "@/Hooks/useToast.ts";

const { showSuccess, showInfo } = useToastService();

onMounted(() => {
    showSuccess('Welcome to PrimeVue');
});

const onShow = () => {
    showInfo('This is a message');
};
</script>

<template>
    <div class="w-100 h-[300px] flex justify-center items-center">
        <Button @click="onShow" label="Show" />
    </div>
</template>
