<script setup lang="ts">
import { ref, onMounted } from 'vue';
import Card from 'primevue/card';
import Message from 'primevue/message';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

interface NodeProps {
    id: string;
    label: string;
    x: number;
    y: number;
    type?: 'default' | 'message' | 'delay';
    severity?: 'info' | 'warn' | 'error' | 'success';
}

const diagramRef = ref<HTMLDivElement | null>(null);

const nodes: NodeProps[] = [
    { id: '1', label: '開始条件', x: 100, y: 50, type: 'default' },
    { id: '2', label: '友だち追加\nすべて', x: 100, y: 150, type: 'default' },
    { id: '3', label: '1日後', x: 100, y: 250, type: 'delay' },
    { id: '4', label: 'メッセージ配信', x: 100, y: 350, type: 'default' },
    { id: '5', label: 'メッセージ\n10:00 - 20:00', x: 100, y: 450, type: 'message', severity: 'info' },
    { id: '6', label: '1日後', x: 100, y: 550, type: 'delay' },
    { id: '7', label: '条件1', x: 100, y: 650, type: 'default' },
    { id: '8', label: 'メッセージ配信', x: 100, y: 750, type: 'default' },
    { id: '9', label: 'メッセージ\n10:00 - 20:00', x: 100, y: 850, type: 'message', severity: 'warn' },
    { id: '10', label: '完了', x: 100, y: 950, type: 'default' },
    { id: '11', label: '完了', x: 300, y: 650, type: 'default' },
];

const connections = [
    { from: '1', to: '2' },
    { from: '2', to: '3' },
    { from: '3', to: '4' },
    { from: '4', to: '5' },
    { from: '5', to: '6' },
    { from: '6', to: '7' },
    { from: '7', to: '8' },
    { from: '8', to: '9' },
    { from: '9', to: '10' },
    { from: '7', to: '11' },
];

const getNodePosition = (node: NodeProps) => {
    return {
        position: 'absolute',
        left: `${node.x}px`,
        top: `${node.y}px`,
    };
};

const drawConnections = () => {
    if (!diagramRef.value) return;

    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.setAttribute('width', '100%');
    svg.setAttribute('height', '100%');
    svg.style.position = 'absolute';
    svg.style.top = '0';
    svg.style.left = '0';
    svg.style.pointerEvents = 'none';

    connections.forEach(connection => {
        const fromNode = nodes.find(node => node.id === connection.from);
        const toNode = nodes.find(node => node.id === connection.to);

        if (fromNode && toNode) {
            const line = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            const startX = fromNode.x + 75;
            const startY = fromNode.y + 25;
            const endX = toNode.x + 75;
            const endY = toNode.y;

            // Create a curved path
            const midY = (startY + endY) / 2;
            const path = `M ${startX} ${startY} C ${startX} ${midY}, ${endX} ${midY}, ${endX} ${endY}`;

            line.setAttribute('d', path);
            line.setAttribute('fill', 'none');
            line.setAttribute('stroke', 'black');
            line.setAttribute('stroke-width', '2');
            svg.appendChild(line);
        }
    });

    diagramRef.value.appendChild(svg);
};

onMounted(() => {
    drawConnections();
});
</script>

<template>
    <DashboardLayout>
        <div ref="diagramRef" class="diagram" style="position: relative; width: 100%; height: 1000px;">
            <template v-for="node in nodes" :key="node.id">
                <Card v-if="node.type === 'default'" :style="getNodePosition(node)" class="diagram-node">
                    <template #title>{{ node.label }}</template>
                </Card>
                <Message v-else-if="node.type === 'message'" :severity="node.severity" :style="getNodePosition(node)"
                         class="diagram-node">
                    {{ node.label }}
                </Message>
                <div v-else-if="node.type === 'delay'" :style="getNodePosition(node)" class="diagram-node delay-node">
                    {{ node.label }}
                </div>
            </template>
        </div>
    </DashboardLayout>
</template>

<style scoped>
.diagram-node {
    width: 150px;
    text-align: center;
}

.delay-node {
    width: 150px;
    height: 40px;
    border: 2px solid #ccc;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0;
}
</style>
