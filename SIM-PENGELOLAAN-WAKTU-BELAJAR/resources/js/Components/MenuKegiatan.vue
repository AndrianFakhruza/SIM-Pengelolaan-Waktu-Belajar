<script setup>
import { ref, onMounted } from "vue";
import cardKegiatan from "./cardKegiatan.vue";
import Modal from "./Modal.vue";
import InputLabel from "./InputLabel.vue";
import Dropdown from "./Dropdown.vue";
import PrimaryButton from "./PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

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
const currentTime = ref("");
const updateTime = () => {
    const now = new Date();
    currentTime.value = now.toLocaleTimeString([], {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
        hour12: false,
    });
};
onMounted(() => {
    updateTime(); // Set initial time
    setInterval(updateTime, 1000); // Update time every second
});

const openToDo = ref(false);
const CreateProject = () => {
    openToDo.value = !openToDo.value;
};

const isProgress = ref(false);
const toggleProgress = () => {
    isProgress.value = !isProgress.value;
};

const isPrioritas = ref(false);
const togglePrioritas = () => {
    isPrioritas.value = !isPrioritas.value;
};

const kegiatans = useForm({
    judul_tugas: "",
    deskripsi: "",
    deadline: "",
    prioritas: "",
    status: "",
});
const submitCreate = () => {
    kegiatans.post(route("assigment.store"), {
        onFinish: () => {
            kegiatans.reset();
            openToDo.value = !openToDo.value;
            kegiatans.value.push({ ...kegiatan });
        },
    });
};
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
            <div
                class="ml-auto hover:shadow-lg transition-all cursor-pointer shadow-black rounded-full hover:bg-gray-400"
                @click="CreateProject"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4.5v15m7.5-7.5h-15"
                    />
                </svg>
            </div>
            <!-- Modal Create Project  -->
            <Modal
                :show="openToDo"
                @close="CreateProject"
                :classes="'h-[600px]'"
            >
                <div class="px-6 py-4 h-96">
                    <h1
                        class="p-2 rounded-md text-2xl font-semibold font-sans uppercase text-center"
                    >
                        BUAT KEGIATAN
                    </h1>
                    <div class="flex mt-3 items-center">
                        <div class="text-sm p-3 bg-slate-200 rounded-md w-28">
                            Progress
                        </div>
                        <div class="text-lg ml-5">:</div>
                        <div class="relative w-36 ml-5 mb-2">
                            <!-- Dropdown select dengan v-show -->
                            <select
                                @click="toggleProgress"
                                name=""
                                id=""
                                class="mt-2 w-32 rounded-md bg-gray-100 border-gray-300 p-2 transition-all duration-700 ease-in-out hover:bg-gray-200"
                            >
                                <option value="ToDo">To Do</option>
                                <option value="Progress">Progress</option>
                                <option value="Done">Done</option>
                            </select>
                            <!-- Icon dropdown toggle -->
                            <div
                                :class="{
                                    'absolute top-7 right-5 cursor-pointer transition-all duration-400 ease-in-out transform -translate-y-1/2 bg-orange-500 p-2 rounded-md text-lg': true,
                                    'hover:bg-orange-400': !isProgress,
                                    'transform rotate-90': isProgress,
                                }"
                                @click="toggleProgress"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="white"
                                    class="size-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Input fields -->
                    <div class="mt-6 flex items-center">
                        <div class="text-sm p-3 bg-slate-200 rounded-md w-28">
                            Tugas
                        </div>
                        <div class="text-lg ml-5">:</div>
                        <input
                            type="text"
                            required
                            autofocus
                            placeholder="Masukkan tugas baru"
                            class="border-gray-300 rounded-md p-2 placeholder:text-sm w-96 ml-4"
                        />
                    </div>

                    <div class="flex mt-6 items-center">
                        <div class="text-sm p-3 bg-slate-200 rounded-md w-28">
                            Prioritas
                        </div>
                        <div class="text-lg ml-5">:</div>
                        <div class="relative w-36 ml-5 mb-2">
                            <select
                                @click="togglePrioritas"
                                name=""
                                id=""
                                class="mt-2 w-32 rounded-md bg-gray-100 border-gray-300 p-2 transition-all duration-700 ease-in-out hover:bg-gray-200"
                            >
                                <option value="">low</option>
                                <option value="">medium</option>
                                <option value="">high</option>
                            </select>
                            <div
                                :class="{
                                    'absolute top-7 right-5 cursor-pointer transition-all duration-400 ease-in-out transform -translate-y-1/2 bg-orange-500 p-2 rounded-md text-lg': true,
                                    'hover:bg-orange-400': !isPrioritas,
                                    'transform rotate-90': isPrioritas,
                                }"
                                @click="togglePrioritas"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="white"
                                    class="size-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center">
                        <div class="text-sm p-3 w-28 bg-slate-200 rounded-md">
                            Estimasi
                        </div>
                        <div class="text-lg ml-5">:</div>
                        <input
                            type="time"
                            required
                            autofocus
                            placeholder="Tambahkan deskripsi"
                            class="border-gray-300 rounded-md p-2 placeholder:text-sm w-32 ml-4"
                        />
                    </div>
                    <div class="mt-6 flex items-center">
                        <div class="text-sm p-3 w-28 bg-slate-200 rounded-md">
                            Deadline
                        </div>
                        <div class="text-lg ml-5">:</div>
                        <input
                            type="date"
                            required
                            autofocus
                            placeholder="Tambahkan deskripsi"
                            class="border-gray-300 rounded-md p-2 placeholder:text-sm w-32 ml-4"
                        />
                    </div>
                    <div class="mt-6 flex">
                        <div
                            class="text-sm p-3 w-28 bg-slate-200 rounded-md h-12"
                        >
                            Deskripsi
                        </div>
                        <div class="text-lg ml-5">:</div>
                        <textarea
                            type="text"
                            required
                            autofocus
                            placeholder="Tambahkan deskripsi"
                            class="border-gray-300 rounded-md p-2 placeholder:text-sm w-96 ml-4"
                        />
                    </div>
                    <PrimaryButton @click="submitCreate" class="mt-4">
                        <span>buat</span>
                    </PrimaryButton>
                </div>
            </Modal>
        </div>

        <hr :class="[`my-4 border-2`, props.color]" />

        <!-- Card -->
        <div class="flex flex-col gap-4">
            <cardKegiatan />
            <cardKegiatan />
        </div>
    </div>
</template>

<style scoped>
ul.list-disc li::marker {
    color: var(--color-bullet);
}
</style>
