<script setup>
import cardKegiatan from "./cardKegiatan.vue";
const props = defineProps({
    title: String,
    color: {
        type: String,
        default: "border-gray-400", 
    },
    colorBullet: {
        type: String,
        default: "#A6AEBF ", 
    },
});
</script>

<template>
    <div
        :class="[
            'bg-gray-200 m-0 rounded-md p-2 shadow-md max-h-[510px] overflow-y-auto scroll-small scroll-mt-10',
        ]"
    >
        <div class="flex text-sm text-gray-700">
            <ul
                :class="['list-disc ml-5']"
                :style="{ '--color-bullet': props.colorBullet }"
            >
                <li class="">{{ props.title }}</li>
            </ul>
        </div>

        <hr :class="[`my-4 border-2`, props.color]" />

        <!-- Card -->
        <div class="flex flex-col gap-4">
            <cardKegiatan />
            <cardKegiatan />
            <cardKegiatan />
        </div>
    </div>
</template>

<style scoped>

ul.list-disc li::marker {
    color: var(
        --color-bullet
    ); 
}
</style>
