<script setup lang="ts">
import { ref, onMounted, watch } from 'vue'
import ToggleSwitch from "primevue/toggleswitch";

const darkMode = ref(false)

const toggleDarkMode = () => {
    const element = document.querySelector('html');
    if (darkMode.value) {
        element.classList.add('dark-mode')
    } else {
        element.classList.remove('dark-mode')
    }
}

onMounted(() => {
    const isDarkMode = localStorage.getItem('darkMode') === 'true'
    darkMode.value = isDarkMode
    toggleDarkMode()
})

watch(darkMode, (newValue) => {
    localStorage.setItem('darkMode', newValue.toString())
})
</script>

<template>
    <div class="flex justify-center items-center">
        <ToggleSwitch v-model="darkMode" @change="toggleDarkMode" />
        <span class="text-gray-500 text-sm ml-2">{{ darkMode ? 'Dark Mode' : 'Light Mode' }}</span>
    </div>
</template>

<style scoped>
/* You can add any component-specific styles here */
</style>
