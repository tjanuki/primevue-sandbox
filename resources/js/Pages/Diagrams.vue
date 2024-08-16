<script setup>
import { ref } from 'vue';
import OrganizationChart from 'primevue/organizationchart';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const data = ref({
    key: '0',
    type: 'start',
    label: 'Start Marketing Campaign',
    children: [
        {
            key: '1',
            type: 'action',
            label: 'Create Email List',
            children: [
                {
                    key: '2',
                    type: 'action',
                    label: 'Design Email Template',
                    children: [
                        {
                            key: '3',
                            type: 'action',
                            label: 'Send Welcome Email',
                            children: [
                                {
                                    key: '4',
                                    type: 'condition',
                                    label: 'Email Opened?',
                                    children: [
                                        {
                                            key: '5',
                                            type: 'action',
                                            label: 'Send Follow-up Email',
                                            children: [
                                                {
                                                    key: '6',
                                                    type: 'condition',
                                                    label: 'Clicked Link?',
                                                    children: [
                                                        {
                                                            key: '7',
                                                            type: 'action',
                                                            label: 'Add to Interested List',
                                                            children: [
                                                                {
                                                                    key: '8',
                                                                    type: 'action',
                                                                    label: 'Schedule Call',
                                                                    children: [
                                                                        {
                                                                            key: '9',
                                                                            type: 'end',
                                                                            label: 'End Campaign'
                                                                        }
                                                                    ]
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            key: '10',
                                                            type: 'wait',
                                                            label: 'Wait 5 Days',
                                                            children: [
                                                                {
                                                                    key: '11',
                                                                    type: 'action',
                                                                    label: 'Send Promotional Offer',
                                                                    children: [
                                                                        {
                                                                            key: '12',
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
                                        },
                                        {
                                            key: '13',
                                            type: 'wait',
                                            label: 'Wait 3 Days',
                                            children: [
                                                {
                                                    key: '14',
                                                    type: 'action',
                                                    label: 'Send Reminder Email',
                                                    children: [
                                                        {
                                                            key: '15',
                                                            type: 'condition',
                                                            label: 'Opened Reminder?',
                                                            children: [
                                                                {
                                                                    key: '16',
                                                                    type: 'action',
                                                                    label: 'Send Survey',
                                                                    children: [
                                                                        {
                                                                            key: '17',
                                                                            type: 'end',
                                                                            label: 'End Campaign'
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    key: '18',
                                                                    type: 'action',
                                                                    label: 'Move to Inactive List',
                                                                    children: [
                                                                        {
                                                                            key: '19',
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
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
});

const ptOptions = {
    root: {
        style: 'overflow-x: auto; padding: 1rem;'
    },
    node: {
        style: 'border: none; background-color: transparent; padding: 0;'
    },
    nodeContent: {
        style: 'padding: 0.5rem; min-width: 100px; text-align: center; border: none; border-radius: 0.5rem;'
    },
    connectorLines: {
        style: 'pointer-events: none;'
    },
    // connectorDown: {
    //     style: 'width: 2px'
    // },
    lineDown: {
        style: 'background-color: #9CA3AF; width: 3px;'
    },
    lineLeft: {
        style: 'border-color: #9CA3AF; border-width: 0 0 3px 3px;'
    },
    lineTop: {
        style: 'border-top: 3px solid #9CA3AF;'
    }
};

const getNodeStyle = (type) => {
    switch (type) {
        case 'start':
            return 'background-color: #10B981; color: white;';
        case 'action':
            return 'background-color: #3B82F6; color: white;';
        case 'wait':
            return 'background-color: #9CA3AF; color: white;';
        case 'condition':
            return `
                background-color: #FBBF24;
                color: black;
                width: 100px;
                height: 100px;
                transform: rotate(45deg);
                display: flex;
                align-items: center;
                justify-content: center;
            `;
        case 'end':
            return 'background-color: #EF4444; color: white;';
        default:
            return 'background-color: #6B7280; color: white;';
    }
};
</script>

<template>
    <DashboardLayout title="Complex Marketing Campaign Workflow">
        <div class="card">
            <OrganizationChart :value="data" :pt="ptOptions">
                <template #default="slotProps">
                    <div class="p-4 rounded" :style="getNodeStyle(slotProps.node.type)">
                        <div :style="slotProps.node.type === 'condition' ? 'transform: rotate(-45deg);' : ''">
                            <div class="text-sm font-bold">{{ slotProps.node.label }}</div>
                        </div>
                    </div>
                </template>
            </OrganizationChart>
        </div>
    </DashboardLayout>
</template>

<style scoped>
/* Any additional scoped styles can go here if needed */
</style>
