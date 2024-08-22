<template>
    <DashboardLayout title="Complex Marketing Campaign Workflow">
    <div class="card w-full">
        <div v-for="(node, index) in nodes" :key="index" class="node-wrapper" :style="{ marginLeft: `${node.indent * 1.5}rem` }">
            <div v-if="node.type === 'waiting'" class="mb-2">
                <Message :severity="node.severity">{{ node.header }}</Message>
            </div>
            <Panel v-else class="mb-2 custom-panel">
                <template #icons>
                    <i :class="node.icon" class="mr-2"></i>
                </template>
                <template #header>
                    <span>{{ node.header }}</span>
                </template>
                <template #content>
                    <p v-if="node.content" class="m-0">{{ node.content }}</p>
                </template>
                <template #actions>
                    <Button icon="pi pi-pencil" class="p-button-text p-button-sm" @click="editNode(index)" />
                    <Button icon="pi pi-trash" class="p-button-text p-button-sm p-button-danger" @click="removeNode(index)" />
                </template>
            </Panel>
        </div>
    </div>
    </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue';
import Panel from 'primevue/panel';
import Message from 'primevue/message';
import Button from 'primevue/button';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

const nodes = ref([
    { type: 'normal', header: '開始条件: 発送完了', icon: 'pi pi-play', indent: 0 },
    { type: 'waiting', header: '1日後', severity: 'info', indent: 1 },
    { type: 'normal', header: 'メッセージ配信', icon: 'pi pi-envelope', content: 'メッセージ\n10:00 - 20:00', indent: 1 },
    { type: 'waiting', header: '1日後', severity: 'info', indent: 1 },
    { type: 'normal', header: '条件1', icon: 'pi pi-filter', indent: 1 },
    { type: 'normal', header: 'メッセージ配信', icon: 'pi pi-envelope', content: 'メッセージ\n10:00 - 20:00', indent: 2 },
    { type: 'normal', header: '完了', icon: 'pi pi-check', indent: 2 },
    { type: 'normal', header: '条件1 - その他', icon: 'pi pi-filter', indent: 1 },
    { type: 'normal', header: 'メッセージ配信', icon: 'pi pi-envelope', content: 'メッセージ\n10:00 - 20:00', indent: 2 },
    { type: 'normal', header: '完了', icon: 'pi pi-check', indent: 2 },
]);

const editNode = (index) => {
    console.log('Edit node:', index);
    // Implement edit functionality
};

const removeNode = (index) => {
    console.log('Remove node:', index);
    // Implement remove functionality
};
</script>

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
</style>
