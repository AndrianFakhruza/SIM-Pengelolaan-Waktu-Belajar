<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import MenuKegiatan from "@/Components/MenuKegiatan.vue";

import { usePage } from "@inertiajs/vue3";
const { categories } = usePage().props;

const props = defineProps({
    idCategory: Number,
    default: 2,
});

</script>

<template>
    <AppLayout title="Dashboard" :categories="categories">
        <div class=" ">
            <!-- Title -->
            <div class="flex items-center mt-5 ml-4 mr-10">
                <h1 class="font-medium font-poppins text-4xl">
                    {{ categories.name }}
                </h1>

                <!-- profil foto kawan join -->
            </div>
            <!-- Filter logo -->
            <div class="flex mt-10 ml-4 text-gray-500">
                <div class="flex gap-5">
                    <div
                        class="px-4 shadow-sm text-sm py-1 border-2 rounded-md border-gray-300"
                    >
                        filter
                    </div>
                    <div
                        class="px-4 shadow-sm text-sm py-1 border-2 rounded-md border-gray-300"
                    >
                        today
                    </div>
                </div>
                <div class="flex ml-auto mr-10">
                    <div
                        class="px-4 shadow-sm text-sm py-1 border-2 rounded-md border-gray-300"
                    >
                        Share
                    </div>
                </div>
            </div>
            <!-- MENU Kegiatan -->
            <div class="m-4 mt-4 ml-4 grid grid-cols-3 gap-4">
                <MenuKegiatan title="To Do" :idCategory="props.idCategory"/>
                <!-- <MenuKegiatan
                    title="In Progress"
                    color="border-[#EB5B00]"
                    color-bullet="#EB5B00"
                />
                <MenuKegiatan
                    title="Done"
                    color="border-[#72BF78]"
                    color-bullet="#72BF78"
                /> -->
            </div>
        </div>
    </AppLayout>
</template>
