<script setup lang="ts">
import { ref } from 'vue';
import OrganizationChart from 'primevue/organizationchart';

interface Node {
    key: string;
    type: 'start' | 'action' | 'wait' | 'condition' | 'end' | 'connector';
    label?: string;
    children?: Node[];
}

const props = defineProps<{
    data: Node;
}>();

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
    <OrganizationChart :value="props.data" :pt="ptOptions">
        <template #default="slotProps">
            <div class="p-4 rounded" :style="getNodeStyle(slotProps.node.type)">
                <div v-if="slotProps.node.type !== 'connector'" :style="slotProps.node.type === 'condition' ? 'transform: rotate(-45deg);' : ''">
                    <div class="text-sm font-bold">{{ slotProps.node.label }}</div>
                </div>
            </div>
        </template>
    </OrganizationChart>
</template>
