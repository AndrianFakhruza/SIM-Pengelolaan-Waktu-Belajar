<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import MenuKegiatan from "@/Components/MenuKegiatan.vue";
import { usePage } from "@inertiajs/vue3";
const { categories } = usePage().props;
</script>

<template>
    <!-- Menggunakan AppLayout sebagai wrapper -->
    <AppLayout title="FAQ" :categories="categories">
        <div class="p-6">
            <!-- Title FAQ -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold text-gray-800">FAQ</h1>
                <p class="text-gray-600">Butuh Bantuan? Ada Pertanyaan?</p>
            </div>

            <!-- Search Bar -->
            <div class="flex justify-center mb-10">
                <input
                    type="text"
                    placeholder="Search here"
                    class="border rounded-lg px-4 py-2 w-1/2"
                />
            </div>

            <!-- FAQ Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mx-10">
                <!-- FAQ Item 1 -->
                <div class="text-center">
                    <!-- Menggunakan gambar dengan v-bind src -->
                    <img 
                        :src="`/storage/Images/FAQ/blok.png`" 
                        alt="Progres Icon"
                        class="block text-4xl mb-2 mx-auto" />
                    <h3 class="font-bold text-lg mb-2">
                        Bagaimana Cara Mengganti Password
                    </h3>
                    <p class="text-gray-600">
                        Kamu bisa masuk ke halaman setting, lalu pilih account, dan klik
                        "forgot password" untuk mengganti password akun kamu.
                    </p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="text-center">
                    <img 
                        :src="`/storage/Images/FAQ/progres.png`" 
                        alt="Progres Icon"
                        class="block text-4xl mb-2 mx-auto" />
                    <h3 class="font-bold text-lg mb-2">
                        Bagaimana Cara Mengetahui Progres
                    </h3>
                    <p class="text-gray-600">
                        Kamu bisa mengecek progres di halaman account pada bagian bawah.
                    </p>
                </div>

                 <!-- FAQ Item 2 -->
                 <div class="text-center">
                    <img 
                        :src="`/storage/Images/FAQ/mail.png`" 
                        alt="Progres Icon"
                        class="block text-4xl mb-2 mx-auto" />
                    <h3 class="font-bold text-lg mb-2">
                        Bagaimana Cara Mengetahui Progres
                    </h3>
                    <p class="text-gray-600">
                        Kamu bisa masuk ke halaman setting, lalu pilih account, dan klik
                        "forgot password" untuk mengganti password akun kamu.
                    </p>
                </div>

                 <!-- FAQ Item 2 -->
                 <div class="text-center">
                    <img 
                        :src="`/storage/Images/FAQ/blok.png`" 
                        alt="Progres Icon"
                        class="block text-4xl mb-2 mx-auto" />
                    <h3 class="font-bold text-lg mb-2">
                        Bagaimana Cara Mengetahui Progres
                    </h3>
                    <p class="text-gray-600">
                        Kamu bisa mengecek progres di halaman account pada bagian bawah.
                    </p>
                </div>

                 <!-- FAQ Item 2 -->
                 <div class="text-center">
                    <img 
                        :src="`/storage/Images/FAQ/progres.png`" 
                        alt="Progres Icon"
                        class="block text-4xl mb-2 mx-auto" />
                    <h3 class="font-bold text-lg mb-2">
                        Bagaimana Cara Mengetahui Progres
                    </h3>
                    <p class="text-gray-600">
                        Kamu bisa mengecek progres di halaman account pada bagian bawah.
                    </p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="text-center">
                    <img 
                        src="/storage/Images/FAQ/mail.png" 
                        alt="Progres Icon"
                        class="block text-4xl mb-2 mx-auto" />
                    <h3 class="font-bold text-lg mb-2">Membuat Jadwal Baru</h3>
                    <p class="text-gray-600">
                        Kamu bisa masuk ke halaman setting, lalu pilih account, dan klik
                        "forgot password" untuk mengganti password akun kamu.
                    </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
