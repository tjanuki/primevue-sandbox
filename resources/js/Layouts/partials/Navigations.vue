<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
            Dashboard
        </NavLink>
        <NavLink :href="route('toast')" :active="route().current('toast')">
            Toast
        </NavLink>
        <NavLink :href="route('modal')" :active="route().current('modal')">
            Modal
        </NavLink>
        <NavLink :href="route('form')" :active="route().current('form')">
            Form
        </NavLink>
    </div>
</template>
