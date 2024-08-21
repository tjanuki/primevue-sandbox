<script setup lang="ts">
import { ref } from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

import campaignWorkflowData from './campaign-workflow-data.json';
import DiagramChart from "@/Components/DiagramChart.vue";

const data = ref(campaignWorkflowData);
</script>

<template>
    <DashboardLayout title="Complex Marketing Campaign Workflow">
        <div class="card">
            <DiagramChart :data="data" />
        </div>
    </DashboardLayout>
</template>
