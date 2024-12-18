<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const { categories } = usePage().props;

// Data notifikasi
const notifications = ref([
    { id: 1, title: "Waktu Belajar Dimulai", message: "Sudah waktunya untuk belajar! Siapkan alat tulis dan fokus pada tujuanmu.", timestamp: "2024-12-18 08:00" },
    { id: 2, title: "Istirahat Sejenak", message: "Luangkan waktu 10 menit untuk beristirahat agar tetap fokus.", timestamp: "2024-12-18 10:00" },
    { id: 3, title: "Waktunya Kembali Belajar", message: "Istirahat sudah selesai. Mari kembali belajar dengan semangat!", timestamp: "2024-12-18 10:15" },
    { id: 4, title: "Capaian Harianmu", message: "Selamat! Kamu sudah menyelesaikan 50% dari target belajar hari ini.", timestamp: "2024-12-18 12:00" },
    { id: 5, title: "Pengingat Waktu Belajar", message: "Ayo, jangan lupa untuk memulai sesi belajar kedua hari ini!", timestamp: "2024-12-18 14:00" },
    { id: 6, title: "Tantangan Baru", message: "Cobalah soal latihan baru untuk meningkatkan pemahamanmu.", timestamp: "2024-12-18 15:30" },
    { id: 7, title: "Waktu Belajar Selesai", message: "Bagus! Kamu sudah menyelesaikan waktu belajar hari ini. Jangan lupa review materi sebelum tidur.", timestamp: "2024-12-18 17:00" },
    { id: 8, title: "Pengingat Jadwal Belajar Besok", message: "Jangan lupa untuk mempersiapkan materi belajar untuk esok hari.", timestamp: "2024-12-18 20:00" },
]);
</script>

<template>
    <AppLayout title="Notification" :categories="categories">
        <div class="p-4 h-[700px] overflow-auto w-full  ">
            <h1 class="text-xl font-bold mb-4">Notification</h1>
            <div v-if="notifications.length > 0" class="space-y-4">
                <div
                    v-for="notification in notifications"
                    :key="notification.id"
                    class="p-4 border rounded shadow hover:bg-gray-100 transition"
                >
                    <h2 class="font-semibold text-lg">{{ notification.title }}</h2>
                    <p class="text-gray-700">{{ notification.message }}</p>
                    <small class="text-gray-500">{{ notification.timestamp }}</small>
                </div>
            </div>
            <div v-else>
                <p class="text-gray-500">Tidak ada notifikasi.</p>
            </div>
        </div>
    </AppLayout>
</template>
