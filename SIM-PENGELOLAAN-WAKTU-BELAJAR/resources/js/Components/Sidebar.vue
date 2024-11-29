<script setup>
import { Link, Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import ApplicationLogo from "./ApplicationLogo.vue";
import Modal from "./Modal.vue";
import PrimaryButton from "./PrimaryButton.vue";
import InputError from "./InputError.vue";
import { defineProps } from "vue";
import KategoriModal from "./Modal/KategoriModal.vue";

const LogoHome = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7 10.75H5C2.58 10.75 1.25 9.42 1.25 7V5C1.25 2.58 2.58 1.25 5 1.25H7C9.42 1.25 10.75 2.58 10.75 5V7C10.75 9.42 9.42 10.75 7 10.75ZM5 2.75C3.42 2.75 2.75 3.42 2.75 5V7C2.75 8.58 3.42 9.25 5 9.25H7C8.58 9.25 9.25 8.58 9.25 7V5C9.25 3.42 8.58 2.75 7 2.75H5Z" fill="#787486"/>
<path d="M19 10.75H17C14.58 10.75 13.25 9.42 13.25 7V5C13.25 2.58 14.58 1.25 17 1.25H19C21.42 1.25 22.75 2.58 22.75 5V7C22.75 9.42 21.42 10.75 19 10.75ZM17 2.75C15.42 2.75 14.75 3.42 14.75 5V7C14.75 8.58 15.42 9.25 17 9.25H19C20.58 9.25 21.25 8.58 21.25 7V5C21.25 3.42 20.58 2.75 19 2.75H17Z" fill="#787486"/>
<path d="M19 22.75H17C14.58 22.75 13.25 21.42 13.25 19V17C13.25 14.58 14.58 13.25 17 13.25H19C21.42 13.25 22.75 14.58 22.75 17V19C22.75 21.42 21.42 22.75 19 22.75ZM17 14.75C15.42 14.75 14.75 15.42 14.75 17V19C14.75 20.58 15.42 21.25 17 21.25H19C20.58 21.25 21.25 20.58 21.25 19V17C21.25 15.42 20.58 14.75 19 14.75H17Z" fill="#787486"/>
<path d="M7 22.75H5C2.58 22.75 1.25 21.42 1.25 19V17C1.25 14.58 2.58 13.25 5 13.25H7C9.42 13.25 10.75 14.58 10.75 17V19C10.75 21.42 9.42 22.75 7 22.75ZM5 14.75C3.42 14.75 2.75 15.42 2.75 17V19C2.75 20.58 3.42 21.25 5 21.25H7C8.58 21.25 9.25 20.58 9.25 19V17C9.25 15.42 8.58 14.75 7 14.75H5Z" fill="#787486"/>
</svg>
`;

const ProfilLogo = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M18.34 20C19.06 19.85 19.74 19.56 20.3 19.13C21.86 17.96 21.86 16.03 20.3 14.86C19.75 14.44 19.08 14.16 18.37 14" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;

const settingsLogo = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#787486" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M2 12.88V11.12C2 10.08 2.85 9.22 3.9 9.22C5.71 9.22 6.45 7.94 5.54 6.37C5.02 5.47 5.33 4.3 6.24 3.78L7.97 2.79C8.76 2.32 9.78 2.6 10.25 3.39L10.36 3.58C11.26 5.15 12.74 5.15 13.65 3.58L13.76 3.39C14.23 2.6 15.25 2.32 16.04 2.79L17.77 3.78C18.68 4.3 18.99 5.47 18.47 6.37C17.56 7.94 18.3 9.22 20.11 9.22C21.15 9.22 22.01 10.07 22.01 11.12V12.88C22.01 13.92 21.16 14.78 20.11 14.78C18.3 14.78 17.56 16.06 18.47 17.63C18.99 18.54 18.68 19.7 17.77 20.22L16.04 21.21C15.25 21.68 14.23 21.4 13.76 20.61L13.65 20.42C12.75 18.85 11.27 18.85 10.36 20.42L10.25 20.61C9.78 21.4 8.76 21.68 7.97 21.21L6.24 20.22C5.33 19.7 5.02 18.53 5.54 17.63C6.45 16.06 5.71 14.78 3.9 14.78C2.85 14.78 2 13.92 2 12.88Z" stroke="#787486" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
const taskLogo = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.37 8.88H17.62" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6.38 8.88L7.13 9.63L9.38 7.38" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.37 15.88H17.62" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6.38 15.88L7.13 16.63L9.38 14.38" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#787486" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
const messageLogo = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 19H8C4 19 2 18 2 13V8C2 4 4 2 8 2H16C20 2 22 4 22 8V13C22 17 20 19 16 19H15.5C15.19 19 14.89 19.15 14.7 19.4L13.2 21.4C12.54 22.28 11.46 22.28 10.8 21.4L9.3 19.4C9.14 19.18 8.77 19 8.5 19Z" stroke="#787486" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.9965 11H16.0054" stroke="#787486" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11.9955 11H12.0045" stroke="#787486" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7.99451 11H8.00349" stroke="#787486" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;

const addLogo = `<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.33337 11.5H14.6667" stroke="#787486" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 15.3333V7.66666" stroke="#787486" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8.25004 21.0833H13.75C18.3334 21.0833 20.1667 19.1667 20.1667 14.375V8.62499C20.1667 3.83332 18.3334 1.91666 13.75 1.91666H8.25004C3.66671 1.91666 1.83337 3.83332 1.83337 8.62499V14.375C1.83337 19.1667 3.66671 21.0833 8.25004 21.0833Z" stroke="#787486" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;

const lampuLogo = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.21 6.36001C18.17 4.26001 16.16 2.71001 13.83 2.20001C11.39 1.66001 8.88997 2.24001 6.97997 3.78001C5.05997 5.31001 3.96997 7.60001 3.96997 10.05C3.96997 12.64 5.51997 15.35 7.85997 16.92V17.75C7.84997 18.03 7.83997 18.46 8.17997 18.81C8.52997 19.17 9.04997 19.21 9.45997 19.21H14.59C15.13 19.21 15.54 19.06 15.82 18.78C16.2 18.39 16.19 17.89 16.18 17.62V16.92C19.28 14.83 21.23 10.42 19.21 6.36001Z" fill="#FBCB18"/>
<path d="M15.26 22C15.2 22 15.13 21.99 15.07 21.97C13.06 21.4 10.95 21.4 8.94003 21.97C8.57003 22.07 8.18003 21.86 8.08003 21.49C7.97003 21.12 8.19003 20.73 8.56003 20.63C10.82 19.99 13.2 19.99 15.46 20.63C15.83 20.74 16.05 21.12 15.94 21.49C15.84 21.8 15.56 22 15.26 22Z" fill="#FBCB18"/>
</svg>
`;

const showModal = ref(false);
const toggleModal = () => {
    showModal.value = !showModal.value;
};

const category = useForm({
    name: "",
    description: "",
});

const submit = () => {
    category.post(route("category.store"), {
        onFinish: () => {
            category.reset();
            showModal.value = false;
            categories.value.push({ ...category });
        },
    });
};

const modalkagetori = ref(false);
const selectKategori = ref([]);

const ModalCategory = (category) => {
    selectKategori.value = category;
    modalkagetori.value = !modalkagetori.value;
};

const truncateText = (Text) => {
    if (Text.length > 20) {
        return Text.substring(0, 18) + "...";
    } else {
        return Text;
    }
};

const props = defineProps({
    categories: Array,
    default: [],
});
const categories = ref(props.categories || []);
</script>

<template>
    <div class="w-96 flex flex-col border-r-2">
        <!-- Logo -->
        <div class="flex gap-4 ml-4 mt-4">
            <ApplicationLogo />
            <h3 class="text-lg font-semibold text-black-900">Pak Kahfi</h3>
        </div>

        <!-- Border -->
        <hr class="my-6 border-1 border-gray-300" />

        <!-- Menu sidebar -->
        <div>
            <ul class="flex flex-col gap-5 ml-4">
                <li class="flex items-center gap-4 text-gray-500">
                    <span v-html="LogoHome"></span>Home
                </li>
                <li class="flex items-center gap-4 text-gray-500">
                    <span v-html="messageLogo"></span>Messages
                </li>
                <li class="flex items-center gap-4 text-gray-500">
                    <span v-html="taskLogo"></span>Task
                </li>
                <li class="flex items-center gap-4 text-gray-500">
                    <span v-html="ProfilLogo"></span>Members
                </li>
                <li class="flex items-center gap-4 text-gray-500">
                    <span v-html="settingsLogo"></span>Settings
                </li>
            </ul>
        </div>
        <hr class="mt-5 border-1 border-gray-300" />

        <!-- add project -->
        <div class="flex items-center gap-4 ml-4 mt-2 text-gray-500">
            <h4>MY PROJECT</h4>
            <span
                v-html="addLogo"
                @click="toggleModal"
                class="ml-14 cursor-pointer rounded-md transition-transform hover:translate-y-0.5"
            ></span>

            <!-- Modal -->
            <Modal :show="showModal" @close="toggleModal">
                <div class="p-5">
                    <h4>Daftar Project :</h4>
                    <div class="mt-5 flex flex-col gap-4">
                        <input
                            required
                            autofocus
                            type="text"
                            v-model="category.name"
                            placeholder="masukan nama project"
                            class="border-gray-300 rounded-md p-2 placeholder:text-sm w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="category.errors.name"
                        />

                        <input
                            required
                            autofocus
                            type="text"
                            v-model="category.description"
                            placeholder="masukan deskripsi"
                            class="border-gray-300 rounded-md p-2 placeholder:text-sm w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="category.errors.description"
                        />

                        <PrimaryButton @click="submit">
                            <span>buat</span>
                        </PrimaryButton>
                    </div>
                </div>
            </Modal>
        </div>
        <!-- Data Project -->
        <div class="min-h-40 mt-1 mx-4 overflow-y-auto scroll-small">
            <ul class="flex flex-col mx-4 list-disc">
                <li
                    class="items-center hover:transition-all whitespace-nowrap hover:shadow-md text-gray-700 text-sm mt-1 hover:bg-orange-100 px-2 py-1 hover:rounded-md cursor-pointer"
                    v-for="category in categories"
                    :key="category.id"
                    @click="ModalCategory(category)"
                >
                    {{ truncateText(category.name) }}
                </li>
            </ul>
        </div>
        <!-- Modal kategori -->
        <Modal :show="modalkagetori" @close="ModalCategory">
            <div class="p-5">
                <h4 class="text-center text-2xl font-semibold">
                    Daftar Project
                </h4>
                <div class="mt-5 flex flex-col gap-4" v-if="selectKategori">
                    <span>Nama project :</span>
                    <input
                        required
                        autofocus
                        type="text"
                        v-model="selectKategori.name"
                        placeholder="masukan nama project"
                        class="border-gray-300 rounded-md p-2 placeholder:text-sm w-full"
                    />
                    <InputError class="mt-2" :message="category.errors.name" />
                    <span>Deskripsi :</span>

                    <input
                        required
                        autofocus
                        type="text"
                        v-model="selectKategori.description"
                        placeholder="masukan deskripsi"
                        class="border-gray-300 rounded-md p-2 placeholder:text-sm w-full"
                    />
                    <InputError
                        class="mt-2"
                        :message="category.errors.description"
                    />

                    <PrimaryButton @click="submit">
                        <span class="text-md font-sans">Simpan perubahan</span>
                    </PrimaryButton>
                </div>
            </div>
        </Modal>

        <div class="flex flex-col items-center justify-center mt-7 relative">
            <span
                v-html="lampuLogo"
                class="p-4 rounded-full bg-yellow-50 absolute top-[-50px]"
            ></span>

            <div
                class="container text-center overflow-hidden w-52 rounded-md bg-gray-100 py-2 px-2"
            >
                <h3 class="text-md font-semibold mb-2">Thoughts Time</h3>

                <p class="mb-4 text-sm text-gray-500">
                    We don’t have any notice for you, till then you can share
                    your thoughts with your peers.
                </p>
                <input
                    type="text"
                    placeholder="Write a message"
                    class="border-gray-300 rounded-md w-36 p-2"
                />
            </div>
        </div>
    </div>
</template>

<style>
ul.list-disc li::marker {
    color: #e38e49;
}
</style>
