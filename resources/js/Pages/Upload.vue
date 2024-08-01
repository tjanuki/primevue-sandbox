<script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {useForm} from "@inertiajs/vue3";
import { ref } from 'vue';
import FileUpload from 'primevue/fileupload';
import Button    from "primevue/button";

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

</script>

<template>
    <DashboardLayout title="Form" @submit.prevent="submit">
        <form class="flex flex-col gap-10">
            <h3>Image Uploader</h3>
            <FileUpload
                ref="fileUploadRef"
                mode="advanced"
                :customUpload="true"
                @uploader="onUpload"
                :auto="true"
                chooseLabel="Select Image"
                :maxFileSize="1000000"
                accept="image/*"
                :multiple="false"
                @clear="onClear"
                @remove="onRemove"
            >
                <template #empty>
                    <p v-if="!imageUrl">Drag and drop an image here to upload.</p>
                </template>
                <template #header="{ chooseCallback }">
                    <Button @click="chooseCallback" class="p-button-primary" label="Select Image" icon="pi pi-plus" />
                </template>
                <template #content="{ files, removeFileCallback }">
                    <div v-if="imageUrl" class="flex items-center mt-4">
                        <img :src="imageUrl" alt="Uploaded image preview" class="w-24 h-24 object-fit mr-4" />
                        <Button @click="() => removeFileCallback(0)" class="p-button-danger" icon="pi pi-times" />
                    </div>
                </template>
            </FileUpload>
        </form>

    </DashboardLayout>
</template>

