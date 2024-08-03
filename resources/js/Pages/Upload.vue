<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {useForm} from "@inertiajs/vue3";
import {ref} from 'vue';
import FileUpload from 'primevue/fileupload';
import Button from "primevue/button";
import {useToast} from "primevue/usetoast";

const fileUploadRef = ref(null);
const imageUrl = ref(null);

const onUpload = (event) => {
    const file = event.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imageUrl.value = e.target?.result;
        };
        reader.readAsDataURL(file);
    }
};

const onClear = () => {
    imageUrl.value = null;
};

const form = useForm({
    date: '',
    pizza: []
})

const submit = () => {
    console.log('finish')
}
const onRemove = () => {
    imageUrl.value = null;
    if (fileUploadRef.value) {
        fileUploadRef.value.clear();
    }
};

const toast = useToast();

const onAdvancedUpload = () => {
    toast.add({severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000});
};
</script>

<template>
    <DashboardLayout title="Form" @submit.prevent="submit">
        <form class="flex flex-col gap-10 w-full items-center">
            <FileUpload
                name="demo[]"
                url="/api/upload"
                @upload="onAdvancedUpload($event)"
                :multiple="true"
                accept="image/*"
                :maxFileSize="1000000"
                :auto="true"
                :showUploadButton="false"
            >
                <template #empty class="bg-black">
                    <span>Drag and drop files to here to upload.</span>
                </template>
            </FileUpload>
        </form>

    </DashboardLayout>
</template>

