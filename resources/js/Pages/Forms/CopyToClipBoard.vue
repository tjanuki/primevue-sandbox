<script setup lang="ts">
import {ref} from 'vue';
import {useToast} from 'primevue/usetoast';
import InputText from "primevue/inputtext";
import Button from "primevue/button";

const url = ref('');
const toast = useToast();
const urlInput = ref<InstanceType<typeof InputText> | null>(null);

const copyToClipboard = () => {
    navigator.clipboard.writeText(url.value);
    toast.add({severity: 'success', summary: 'Success', detail: 'URL Copied to Clipboard', life: 3000});
};

</script>
<template>
    <div class="flex items-center space-x-2">
        <InputText
            ref="urlInput"
            v-model="url"
            placeholder="Enter URL"
            class="flex-grow"
            autofocus="no"
        />
        <Button
            icon="pi pi-copy"
            @click="copyToClipboard"
            class="p-button-rounded p-button-secondary"
        />
    </div>
</template>

