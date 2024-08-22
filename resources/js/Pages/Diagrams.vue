<script setup lang="ts">
import { ref } from 'vue';
import DashboardLayout from "@/Layouts/DashboardLayout.vue";

import campaignWorkflowData from './campaign-workflow-data.json';
import campaignWorkflowDataMin from './campaign-workflow-data-min.json';
import DiagramChart from "@/Components/DiagramChart.vue";

const data = ref(campaignWorkflowData);
// const data = ref(campaignWorkflowDataMin);
</script>

<template>
    <DashboardLayout title="Complex Marketing Campaign Workflow">
        <div class="card">
            <DiagramChart :data="data" />
        </div>
    </DashboardLayout>
</template>
