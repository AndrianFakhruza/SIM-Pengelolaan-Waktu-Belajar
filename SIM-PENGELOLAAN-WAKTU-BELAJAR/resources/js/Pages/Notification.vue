<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { usePage } from "@inertiajs/inertia-vue3";
const { categories } = usePage().props;
</script>

<template>
    <AppLayout title="notification" :categories="categories">
        <div class="">Notification</div>
    </AppLayout>
</template>
