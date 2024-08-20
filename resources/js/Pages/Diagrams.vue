<script setup lang="ts">
import { ref } from 'vue';
import OrganizationChart from 'primevue/organizationchart';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

interface Node {
    key: string;
    type: 'start' | 'action' | 'wait' | 'condition' | 'end' | 'connector';
    label?: string;
    children?: Node[];
}

const data = ref<Node>({
    key: '0',
    type: 'start',
    label: 'Start Marketing Campaign',
    children: [
        {
            key: 'c1',
            type: 'connector',
            children: [
                {
                    key: '1',
                    type: 'action',
                    label: 'Create Email List',
                    children: [
                        {
                            key: 'c2',
                            type: 'connector',
                            children: [
                                {
                                    key: '2',
                                    type: 'action',
                                    label: 'Design Email Template',
                                    children: [
                                        {
                                            key: 'c3',
                                            type: 'connector',
                                            children: [
                                                {
                                                    key: '3',
                                                    type: 'action',
                                                    label: 'Send Welcome Email',
                                                    children: [
                                                        {
                                                            key: 'c4',
                                                            type: 'connector',
                                                            children: [
                                                                {
                                                                    key: '4',
                                                                    type: 'condition',
                                                                    label: 'Email Opened?',
                                                                    children: [
                                                                        {
                                                                            key: 'c5',
                                                                            type: 'connector',
                                                                            children: [
                                                                                {
                                                                                    key: '5',
                                                                                    type: 'action',
                                                                                    label: 'Send Follow-up Email',
                                                                                    children: [
                                                                                        {
                                                                                            key: 'c6',
                                                                                            type: 'connector',
                                                                                            children: [
                                                                                                {
                                                                                                    key: '6',
                                                                                                    type: 'condition',
                                                                                                    label: 'Clicked Link?',
                                                                                                    children: [
                                                                                                        {
                                                                                                            key: 'c7',
                                                                                                            type: 'connector',
                                                                                                            children: [
                                                                                                                {
                                                                                                                    key: '7',
                                                                                                                    type: 'action',
                                                                                                                    label: 'Add to Interested List',
                                                                                                                    children: [
                                                                                                                        {
                                                                                                                            key: 'c8',
                                                                                                                            type: 'connector',
                                                                                                                            children: [
                                                                                                                                {
                                                                                                                                    key: '8',
                                                                                                                                    type: 'action',
                                                                                                                                    label: 'Schedule Call',
                                                                                                                                    children: [
                                                                                                                                        {
                                                                                                                                            key: 'c9',
                                                                                                                                            type: 'connector',
                                                                                                                                            children: [
                                                                                                                                                {
                                                                                                                                                    key: '9',
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
                                                                                                        },
                                                                                                        {
                                                                                                            key: 'c10',
                                                                                                            type: 'connector',
                                                                                                            children: [
                                                                                                                {
                                                                                                                    key: '10',
                                                                                                                    type: 'wait',
                                                                                                                    label: 'Wait 5 Days',
                                                                                                                    children: [
                                                                                                                        {
                                                                                                                            key: 'c11',
                                                                                                                            type: 'connector',
                                                                                                                            children: [
                                                                                                                                {
                                                                                                                                    key: '11',
                                                                                                                                    type: 'action',
                                                                                                                                    label: 'Send Promotional Offer',
                                                                                                                                    children: [
                                                                                                                                        {
                                                                                                                                            key: 'c12',
                                                                                                                                            type: 'connector',
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
                                                                        },
                                                                        {
                                                                            key: 'c13',
                                                                            type: 'connector',
                                                                            children: [
                                                                                {
                                                                                    key: '13',
                                                                                    type: 'wait',
                                                                                    label: 'Wait 3 Days',
                                                                                    children: [
                                                                                        {
                                                                                            key: 'c14',
                                                                                            type: 'connector',
                                                                                            children: [
                                                                                                {
                                                                                                    key: '14',
                                                                                                    type: 'action',
                                                                                                    label: 'Send Reminder Email',
                                                                                                    children: [
                                                                                                        {
                                                                                                            key: 'c15',
                                                                                                            type: 'connector',
                                                                                                            children: [
                                                                                                                {
                                                                                                                    key: '15',
                                                                                                                    type: 'condition',
                                                                                                                    label: 'Opened Reminder?',
                                                                                                                    children: [
                                                                                                                        {
                                                                                                                            key: 'c16',
                                                                                                                            type: 'connector',
                                                                                                                            children: [
                                                                                                                                {
                                                                                                                                    key: '16',
                                                                                                                                    type: 'action',
                                                                                                                                    label: 'Send Survey',
                                                                                                                                    children: [
                                                                                                                                        {
                                                                                                                                            key: 'c17',
                                                                                                                                            type: 'connector',
                                                                                                                                            children: [
                                                                                                                                                {
                                                                                                                                                    key: '17',
                                                                                                                                                    type: 'end',
                                                                                                                                                    label: 'End Campaign'
                                                                                                                                                }
                                                                                                                                            ]
                                                                                                                                        }
                                                                                                                                    ]
                                                                                                                                }
                                                                                                                            ]
                                                                                                                        },
                                                                                                                        {
                                                                                                                            key: 'c18',
                                                                                                                            type: 'connector',
                                                                                                                            children: [
                                                                                                                                {
                                                                                                                                    key: '18',
                                                                                                                                    type: 'action',
                                                                                                                                    label: 'Move to Inactive List',
                                                                                                                                    children: [
                                                                                                                                        {
                                                                                                                                            key: 'c19',
                                                                                                                                            type: 'connector',
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

const getNodeStyle = (type: Node['type']): string => {
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
        case 'connector':
            return `
                background-color: #E5E7EB;
                width: 10px;
                height: 10px;
                cursor: pointer;
                padding: 5px;
            `;
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
                        <div v-if="slotProps.node.type !== 'connector'" :style="slotProps.node.type === 'condition' ? 'transform: rotate(-45deg);' : ''">
                            <div class="text-sm font-bold">{{ slotProps.node.label }}</div>
                        </div>
                    </div>
                </template>
            </OrganizationChart>
        </div>
    </DashboardLayout>
</template>
