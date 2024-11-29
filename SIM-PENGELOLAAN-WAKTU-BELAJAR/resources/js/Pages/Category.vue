<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import MenuKegiatan from "@/Components/MenuKegiatan.vue";

import { usePage } from "@inertiajs/vue3";
const { categories } = usePage().props;
</script>

<template>
    <AppLayout title="Dashboard" :categories="categories">
        <div class=" ">
            FILE CATEGORY
        </div>
    </AppLayout>
</template>
