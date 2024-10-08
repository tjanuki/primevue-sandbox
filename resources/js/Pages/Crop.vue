<script setup>
import { ref } from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { useForm } from "@inertiajs/vue3";
import FileUpload from 'primevue/fileupload';
import Button from "primevue/button";
import Dialog from 'primevue/dialog';
import { useToast } from "primevue/usetoast";
import { Cropper } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css';

const fileUploadRef = ref(null);
const imageUrl = ref(null);
const showCropperDialog = ref(false);
const cropperRef = ref(null);
const croppedImageUrl = ref(null);

const onUpload = (event) => {
    const file = event.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imageUrl.value = e.target?.result;
            showCropperDialog.value = true;
        };
        reader.readAsDataURL(file);
    }
};

const onClear = () => {
    imageUrl.value = null;
    croppedImageUrl.value = null;
    showCropperDialog.value = false;
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
    croppedImageUrl.value = null;
    showCropperDialog.value = false;
    if (fileUploadRef.value) {
        fileUploadRef.value.clear();
    }
};

const toast = useToast();

const onAdvancedUpload = () => {
    toast.add({severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000});
};

const cropImage = () => {
    const { canvas } = cropperRef.value.getResult();
    croppedImageUrl.value = canvas.toDataURL();
    showCropperDialog.value = false;
    toast.add({severity: 'success', summary: 'Success', detail: 'Image cropped', life: 3000});
};

const cropperOptions = {
    stencilProps: {
        handlers: {},
        movable: false,
        resizable: false,
    },
    stencilSize: {
        width: 280,
        height: 280
    },
    imageRestriction: 'stencil'
};
</script>

<template>
    <DashboardLayout title="Form" @submit.prevent="submit">
        <form class="flex flex-col gap-10 w-full items-center">
            <FileUpload
                ref="fileUploadRef"
                name="demo[]"
                url="/api/upload"
                @upload="onAdvancedUpload($event)"
                :multiple="false"
                accept="image/*"
                :maxFileSize="1000000"
                :auto="true"
                :showUploadButton="false"
                @select="onUpload"
            >
                <template #empty>
                    <span>Drag and drop files to here to upload.</span>
                </template>
            </FileUpload>

            <img v-if="croppedImageUrl" :src="croppedImageUrl" alt="Cropped image" class="max-w-full h-auto" />
        </form>

        <Dialog v-model:visible="showCropperDialog" modal header="Crop Image" :style="{ width: '90vw', maxWidth: '640px' }">
            <div class="w-full">
                <Cropper
                    ref="cropperRef"
                    :src="imageUrl"
                    :stencil-props="cropperOptions.stencilProps"
                    :stencil-size="cropperOptions.stencilSize"
                    :image-restriction="cropperOptions.imageRestriction"
                    class="h-96"
                />
            </div>
            <template #footer>
                <div class="flex justify-end gap-2">
                    <Button label="Cancel" severity="secondary" @click="onClear" />
                    <Button label="Crop" @click="cropImage" />
                </div>
            </template>
        </Dialog>
    </DashboardLayout>
</template>
