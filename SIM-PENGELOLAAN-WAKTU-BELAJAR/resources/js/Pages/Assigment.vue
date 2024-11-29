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
            <!-- Title -->
            <div class="flex items-center mt-5 ml-4 mr-10">
                <h1 class="font-medium font-poppins text-4xl">
                    Daftar Assigment
                </h1>
                <!-- <h1>List of Categories</h1>
                <ul>
                    <li v-for="category in $pages.categories" :key="category.id">
                        {{ category.name }}
                    </li>
                </ul> -->
                <!-- profil foto kawan join -->
            </div>
            <!-- Filter logo -->
        </div>
    </AppLayout>
</template>
