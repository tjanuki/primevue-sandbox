<script setup>
import {ref} from 'vue';
import OrganizationChart from 'primevue/organizationchart';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const data = ref({
    key: '0',
    type: 'start',
    label: 'Start Email Campaign',
    children: [
        {
            key: '1',
            type: 'action',
            label: 'Send Welcome Email',
            children: [
                {
                    key: '2',
                    type: 'condition',
                    label: 'Email Opened?',
                    children: [
                        {
                            key: '3',
                            type: 'action',
                            label: 'Send Follow-up',
                            children: [
                                {
                                    key: '4',
                                    type: 'end',
                                    label: 'End Campaign'
                                }
                            ]
                        },
                        {
                            key: '5',
                            type: 'action',
                            label: 'Wait 3 Days',
                            children: [
                                {
                                    key: '6',
                                    type: 'action',
                                    label: 'Send Reminder',
                                    children: [
                                        {
                                            key: '7',
                                            type: 'end',
                                            label: 'End Campaign'
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
});

const getNodeClass = (type) => {
    switch (type) {
        case 'start':
            return 'bg-green-500 text-white rounded-lg';
        case 'action':
            return 'bg-blue-500 text-white rounded-lg';
        case 'condition':
            return 'bg-yellow-500 text-black diamond';
        case 'end':
            return 'bg-red-500 text-white rounded-lg';
        default:
            return 'bg-gray-500 text-white rounded-lg';
    }
};
</script>

<template>
    <DashboardLayout title="Diagram">
        <div class="card overflow-x-auto">
            <OrganizationChart :value="data">
                <template #default="slotProps">
                    <div :class="['shadow-md node-content', getNodeClass(slotProps.node.type)]">
                        <div class="text-sm font-bold">{{ slotProps.node.label }}</div>
                    </div>
                </template>
            </OrganizationChart>
        </div>
    </DashboardLayout>
</template>

<style scoped>
:deep(.p-organizationchart) {
    overflow-x: auto;
    padding: 1rem;
}

:deep(.p-organizationchart .p-organizationchart-node-content) {
    border: 0;
    padding: 0;
}

:deep(.p-organizationchart .p-organizationchart-node) {
    padding: 0;
}

:deep(.p-organizationchart .p-organizationchart-line-down) {
    background-color: #9CA3AF;
}

:deep(.p-organizationchart .p-organizationchart-line-left),
:deep(.p-organizationchart .p-organizationchart-line-top) {
    border-color: #9CA3AF;
}

.node-content {
    padding: 0.5rem;
    min-width: 100px;
    text-align: center;
}

.diamond {
    width: 100px;
    height: 100px;
    transform: rotate(45deg);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.diamond > div {
    transform: rotate(-45deg);
}
</style>
