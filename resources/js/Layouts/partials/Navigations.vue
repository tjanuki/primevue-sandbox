<template>
    <MegaMenu :model="items" :pt="{
        root: {
            style: 'border: none; margin-left: 1rem;'
        },
            itemLink: {
                class: 'p-menuitem-link',
                tabindex: 0,
                'aria-hidden': null  // Remove aria-hidden
            },
        }" />
</template>

<script setup>
import { ref } from "vue";
import NavLink from '@/Components/NavLink.vue';
import MegaMenu from 'primevue/megamenu';

const items = ref([
    {
        label: 'Dashboard',
        icon: 'pi pi-fw pi-home',
        command: () => { window.location.href = route('dashboard'); }
    },
    {
        label: 'Components',
        icon: 'pi pi-fw pi-star',
        items: [
            [
                {
                    label: 'UI Components',
                    items: [
                        {
                            label: 'Toast',
                            command: () => { window.location.href = route('toast'); }
                        },
                        {
                            label: 'Modal',
                            command: () => { window.location.href = route('modal'); }
                        },
                        {
                            label: 'Form',
                            command: () => { window.location.href = route('form'); }
                        },
                        {
                            label: 'Upload',
                            command: () => { window.location.href = route('upload'); }
                        },
                        {
                            label: 'Crop',
                            command: () => { window.location.href = route('crop'); }
                        }
                    ]
                }
            ],
            [
                {
                    label: 'Data Components',
                    items: [
                        {
                            label: 'Tabs',
                            command: () => { window.location.href = route('tabs'); }
                        },
                        {
                            label: 'DataTable',
                            command: () => { window.location.href = route('datatables'); }
                        },
                        {
                            label: 'Reorders',
                            command: () => { window.location.href = route('reorders'); }
                        },
                        {
                            label: 'Scroll Panels',
                            command: () => { window.location.href = route('scroll-panels'); }
                        }
                    ]
                }
            ],
            [
                {
                    label: 'Advanced Components',
                    items: [
                        {
                            label: 'Menus',
                            command: () => { window.location.href = route('menus'); }
                        },
                        {
                            label: 'OrgChart',
                            command: () => { window.location.href = route('org-charts'); }
                        },
                        {
                            label: 'Diagrams',
                            command: () => { window.location.href = route('diagrams'); }
                        },
                        {
                            label: 'Diagram Panels',
                            command: () => { window.location.href = route('diagram-panels'); }
                        }
                    ]
                }
            ],
            [
                {
                    label: 'Misc Components',
                    items: [
                        {
                            label: 'Timelines',
                            command: () => { window.location.href = route('timelines'); }
                        },
                        {
                            label: 'Carousel',
                            command: () => { window.location.href = route('carousel'); }
                        }
                    ]
                }
            ]
        ]
    }
]);
</script>
