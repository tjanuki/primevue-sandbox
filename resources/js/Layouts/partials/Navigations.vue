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
        <NavLink :href="route('upload')" :active="route().current('upload')">
            Upload
        </NavLink>
        <NavLink :href="route('crop')" :active="route().current('crop')">
            Crop
        </NavLink>
        <NavLink :href="route('tabs')" :active="route().current('tabs')">
            Tabs
        </NavLink>
        <NavLink :href="route('datatables')" :active="route().current('datatables')">
            DataTable
        </NavLink>
        <NavLink :href="route('reorders')" :active="route().current('reorders')">
            Reorders
        </NavLink>
        <NavLink :href="route('scroll-panels')" :active="route().current('scroll-panels')">
            Scroll Panels
        </NavLink>
        <NavLink :href="route('menus')" :active="route().current('menus')">
            Menus
        </NavLink>
        <NavLink :href="route('org-charts')" :active="route().current('org-charts')">
            OrgChart
        </NavLink>
        <NavLink :href="route('diagrams')" :active="route().current('diagrams')">
            Diagrams
        </NavLink>
        <NavLink :href="route('timelines')" :active="route().current('timelines')">
            Timelines
        </NavLink>
        <NavLink :href="route('carousel')" :active="route().current('carousel')">
            Carousel
        </NavLink>
    </div>
</template>
