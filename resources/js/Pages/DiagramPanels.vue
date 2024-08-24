<script setup>
import { ref, onMounted } from 'vue';
import Panel from 'primevue/panel';
import Message from 'primevue/message';
import Button from 'primevue/button';
import jsonData from "@/Pages/diagram-panel-data.json";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const nodes = ref([]);

onMounted(async () => {
    // try {
    //     const response = await fetch('/diagram-panel-data.json');
    //     nodes.value = await response.json();
    // } catch (error) {
    //     console.error('Error loading diagram data:', error);
    // }
    nodes.value = jsonData;
});

const getIconClass = (type) => {
    switch (type) {
        case 'start': return 'pi pi-play';
        case 'end': return 'pi pi-stop';
        case 'action': return 'pi pi-cog';
        case 'condition': return 'pi pi-question';
        default: return 'pi pi-circle';
    }
};

const getPanelClass = (node) => {
    if (node.type === 'start') return 'start-node';
    if (node.type === 'end') return 'end-node';
    if (node.type === 'condition') return node.label === 'その他' ? 'else-node' : 'condition-node';
    return '';
};

const editNode = (key) => {
    console.log('ノードを編集:', key);
    // 編集機能を実装する
};

const removeNode = (key) => {
    console.log('ノードを削除:', key);
    // 削除機能を実装する
};
</script>

<template>
    <DashboardLayout title="Complex Marketing Campaign Workflow">
        <div class="card">
            <div v-for="node in nodes" :key="node.key" class="node-wrapper" :style="{ marginLeft: `${node.indent * 1.5}rem` }">
                <div v-if="node.type === 'wait'" class="mb-2">
                    <Message :severity="'info'">{{ node.label }}</Message>
                </div>
                <Panel v-else class="mb-2 custom-panel" :class="getPanelClass(node)">
                    <template #icons>
                        <i :class="getIconClass(node.type)" class="mr-2"></i>
                    </template>
                    <template #header>
                        <span>{{ node.label }}</span>
                    </template>
                    <template #actions v-if="node.type !== 'start' && node.type !== 'end'">
                        <Button icon="pi pi-pencil" class="p-button-text p-button-sm" @click="editNode(node.key)" />
                        <Button icon="pi pi-trash" class="p-button-text p-button-sm p-button-danger" @click="removeNode(node.key)" />
                    </template>
                </Panel>
            </div>
        </div>
    </DashboardLayout>
</template>

<style scoped>
.card {
    max-width: 800px;
    margin: auto;
}
.node-wrapper {
    position: relative;
}
.mb-2 {
    margin-bottom: 0.5rem;
}
.mr-2 {
    margin-right: 0.5rem;
}
.custom-panel :deep(.p-panel-header) {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.5rem 1rem;
}
.custom-panel :deep(.p-panel-icons) {
    order: -1;
    margin-right: 0.5rem;
}
.custom-panel :deep(.p-panel-content) {
    padding: 0.5rem 1rem;
}
.start-node :deep(.p-panel-header) {
    background-color: #e3f2fd;
}
.end-node :deep(.p-panel-header) {
    background-color: #ffebee;
}
.condition-node :deep(.p-panel-header) {
    background-color: #fff3e0;
}
.else-node :deep(.p-panel-header) {
    background-color: #f3e5f5;
}
</style>
