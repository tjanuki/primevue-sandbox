<template>
    <div class="card flex justify-center">
        <Button
            type="button"
            icon="pi pi-ellipsis-v"
            class="p-button-text p-button-rounded"
            @click="toggle"
            aria-haspopup="true"
            aria-controls="popover_menu"
        />
        <Popover ref="op" id="popover_menu"
                 :pt="{
                content: { style: 'padding: 0;'},
                 }"
        >
            <Menu :model="menuItems" :pt="{
                root: { style: 'border: 0; padding: 0' },
            }"/>
        </Popover>
    </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import Button from 'primevue/button';
import Popover from 'primevue/popover';
import Menu from 'primevue/menu';
import {MenuItem} from 'primevue/menuitem';

const op = ref();
const menuItems = ref<MenuItem[]>([
    {
        label: 'Edit',
        icon: 'pi pi-pencil',
        command: () => menuAction('edit')
    },
    {
        label: 'Delete',
        icon: 'pi pi-trash',
        command: () => menuAction('delete')
    },
    {
        label: 'Share',
        icon: 'pi pi-share-alt',
        command: () => menuAction('share')
    }
]);

const toggle = (event: Event) => {
    op.value.toggle(event);
};

const menuAction = (action: string) => {
    console.log(`${action} action clicked`);
    op.value.hide();
};
</script>
