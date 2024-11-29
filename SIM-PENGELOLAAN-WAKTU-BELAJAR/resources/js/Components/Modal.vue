<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from "vue";

// Props untuk menerima konfigurasi
const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    classes: {
        type: String,
        default: "w-full",
    },
    maxWidth: {
        type: String,
        default: "2xl",
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(["close"]);
const dialog = ref();
const showSlot = ref(props.show);

// Watch untuk mengontrol show prop
watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = "hidden"; // Disable scroll saat modal tampil
            showSlot.value = true;
            dialog.value?.showModal();
        } else {
            document.body.style.overflow = null; // Enable scroll saat modal ditutup
            setTimeout(() => {
                dialog.value?.close();
                showSlot.value = false;
            }, 200); // Delay untuk animasi modal
        }
    }
);

// Fungsi untuk menutup modal
const close = () => {
    if (props.closeable) {
        emit("close"); // Emit event untuk memberitahukan komponen luar
    }
};

// Fungsi untuk menutup modal dengan tombol Escape
const closeOnEscape = (e) => {
    if (e.key === "Escape") {
        e.preventDefault();
        if (props.show) {
            close();
        }
    }
};

// Menambahkan event listener saat mounted
onMounted(() => document.addEventListener("keydown", closeOnEscape));

// Menghapus event listener saat unmounted
onUnmounted(() => {
    document.removeEventListener("keydown", closeOnEscape);
    document.body.style.overflow = null;
});

// Menghitung kelas berdasarkan prop maxWidth
const maxWidthClass = computed(() => {
    return {
        sm: "sm:max-w-sm",
        md: "sm:max-w-md",
        lg: "sm:max-w-lg",
        xl: "sm:max-w-xl",
        "2xl": "sm:max-w-2xl",
    }[props.maxWidth] || "sm:max-w-2xl"; // Default ke max-w-2xl jika tidak ada kecocokan
});
</script>

<template>
    <dialog
        class="z-50 m-0 min-h-full min-w-full overflow-y-auto bg-transparent backdrop:bg-transparent"
        ref="dialog"
    >
        <div
            class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
            scroll-region
        >
            <!-- Overlay background -->
            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    v-if="show"
                    class="fixed inset-0 transform transition-all"
                    @click="close"
                >
                    <div class="absolute inset-0 bg-gray-500 opacity-75" />
                </div>
            </transition>

            <!-- Modal content -->
            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div
                    v-if="show"
                    class="mb-6 mt-3 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
                    :class="[maxWidthClass, classes]"
                >
                    <!-- Slot untuk konten modal -->
                    <slot v-if="showSlot" />
                </div>
            </transition>
        </div>
    </dialog>
</template>

<style scoped>
/* Tampilkan overlay dengan transparansi */
.dialog-overlay {
    background: rgba(0, 0, 0, 0.5);
}
</style>
