<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, onMounted } from "vue";
import { usePage, useForm } from "@inertiajs/vue3";

// Create a form for profile updates
const profileForm = useForm({
    name: '',
    email: '',
    bio: '',
    profile_photo: null
});

// Reactive reference to store user data
const user = ref({
    name: '',
    email: '',
    profile_photo_path: '',
    bio: ''
});

// Control modal state
const isModalOpen = ref(false);

// Fetch user data when component mounts
onMounted(() => {
    const pageProps = usePage().props;
    
    if (pageProps.auth && pageProps.auth.user) {
        user.value = {
            name: pageProps.auth.user.name,
            email: pageProps.auth.user.email,
            profile_photo_path: pageProps.auth.user.profile_photo_path || 'https://via.placeholder.com/150',
            bio: pageProps.auth.user.bio || 'Belum ada bio'
        };

        // Populate form with current user data
        profileForm.name = user.value.name;
        profileForm.email = user.value.email;
        profileForm.bio = user.value.bio;
    }
});

// Open modal for editing
const openEditModal = () => {
    isModalOpen.value = true;
};

// Close modal
const closeModal = () => {
    isModalOpen.value = false;
};

// Handle profile photo selection
const handlePhotoUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        profileForm.profile_photo = file;
        
        // Create a preview of the uploaded image
        const reader = new FileReader();
        reader.onload = (e) => {
            user.value.profile_photo_path = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// Submit profile update
const updateProfile = () => {
    profileForm.post(route('profile.update'), {
        preserveScroll: true,
        onSuccess: () => {
            // Update user ref with new data
            user.value.name = profileForm.name;
            user.value.email = profileForm.email;
            user.value.bio = profileForm.bio;
            
            // Close modal
            closeModal();
        },
        onError: (errors) => {
            console.error('Update failed', errors);
        }
    });
};
</script>

<template>
    <AppLayout title="Profile">
        <div class="p-6 bg-gray-100 min-h-screen">
            <!-- Profile Header -->
            <div class="profile-header">
                <div>
                    <h2>
                        Profile
                        <i 
                            class="bi bi-pencil edit-icon" 
                            @click="openEditModal"
                        ></i>
                    </h2>
                </div>
            </div>

            <div class="profile-info bg-white shadow-lg rounded-lg p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="profile-details">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ user.name }}</h3>
                        <p class="text-gray-600">{{ user.email }}</p>
                    </div>
                    
                    <div class="profile-image-container">
                        <img 
                            :src="user.profile_photo_path" 
                            alt="Profile Picture" 
                            class="profile-circle-large"
                        >
                    </div>
                </div>

                <div class="social-icons mt-4">
                    <a href="https://www.instagram.com" target="_blank" class="social-icon">
                        <i class="bi bi-instagram"></i>
                        <span>{{ user.name }}</span>
                    </a>
                    <a href="https://github.com" target="_blank" class="social-icon">
                        <i class="bi bi-github"></i>
                        <span>{{ user.name }}</span>
                    </a>
                    <a href="https://www.linkedin.com" target="_blank" class="social-icon">
                        <i class="bi bi-linkedin"></i>
                        <span>{{ user.name }}</span>
                    </a>
                </div>
            </div>

            <div class="profile-info1 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800">Tentang Saya</h3>
                <p class="text-gray-600">{{ user.bio }}</p>
            </div>

            <!-- Custom Modal -->
            <div 
                v-if="isModalOpen" 
                class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none"
            >
                <div 
                    class="fixed inset-0 bg-black opacity-50"
                    @click="closeModal"
                ></div>
                
                <div class="relative w-full max-w-lg mx-auto my-6">
                    <div class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                        <!-- Modal Header -->
                        <div class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                            <h3 class="text-2xl font-semibold">Edit Profil</h3>
                            <button 
                                class="float-right p-1 ml-auto text-3xl font-semibold leading-none text-black bg-transparent border-0 outline-none opacity-5 focus:outline-none"
                                @click="closeModal"
                            >
                                <span class="block w-6 h-6 text-2xl text-black bg-transparent opacity-5 focus:outline-none">
                                    ×
                                </span>
                            </button>
                        </div>
                        
                        <!-- Modal Body -->
                        <div class="relative flex-auto p-6 space-y-4">
                            <div>
                                <label class="block mb-2 text-sm font-bold text-gray-700">Nama</label>
                                <input 
                                    type="text" 
                                    v-model="profileForm.name"
                                    class="w-full px-3 py-2 border rounded shadow appearance-none"
                                    placeholder="Nama Anda"
                                >
                            </div>
                            
                            <div>
                                <label class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                                <input 
                                    type="email" 
                                    v-model="profileForm.email"
                                    class="w-full px-3 py-2 border rounded shadow appearance-none"
                                    placeholder="Email Anda"
                                >
                            </div>
                            
                            <div>
                                <label class="block mb-2 text-sm font-bold text-gray-700">Bio</label>
                                <textarea 
                                    v-model="profileForm.bio"
                                    class="w-full px-3 py-2 border rounded shadow appearance-none min-h-[100px]"
                                    placeholder="Masukkan bio Anda..."
                                ></textarea>
                            </div>
                            
                            <div>
                                <label class="block mb-2 text-sm font-bold text-gray-700">Foto Profil</label>
                                <input 
                                    type="file"
                                    @change="handlePhotoUpload"
                                    accept="image/*"
                                    class="w-full px-3 py-2 border rounded shadow appearance-none"
                                >
                            </div>
                        </div>
                        
                        <!-- Modal Footer -->
                        <div class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                            <button
                                class="px-6 py-2 mb-1 mr-3 text-sm font-bold text-gray-600 uppercase transition-all duration-150 ease-linear bg-gray-200 rounded shadow outline-none hover:bg-gray-300 focus:outline-none"
                                type="button"
                                @click="closeModal"
                            >
                                Batal
                            </button>
                            <button
                                class="px-6 py-2 mb-1 text-sm font-bold text-white uppercase transition-all duration-150 ease-linear rounded shadow outline-none bg-[#D2691E] hover:bg-[#8B4513] focus:outline-none"
                                type="button"
                                @click="updateProfile"
                                :disabled="profileForm.processing"
                            >
                                {{ profileForm.processing ? 'Menyimpan...' : 'Simpan' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
  .profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }

  .profile-header h2 {
    font-size: 24px;
    margin-top: 22px;
    color: #333;
  }

  .profile-info {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .profile-details h3 {
    color: #D2691E;
    margin-bottom: 5px;
  }

  .profile-details p {
    color: #666;
  }

  .profile-image-container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    margin-top: 20px;
  }

  .profile-circle-large {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .social-icons {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 20px;
  }

  .social-icon {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: #333;
  }

  .social-icon i {
    font-size: 20px;
    color: #D2691E;
  }

  .social-icon span {
    font-size: 14px;
    color: #666;
  }

  .edit-icon {
    cursor: pointer;
    font-size: 18px;
    color: #D2691E;
    margin-left: 10px;
  }

  .edit-icon:hover {
    color: #8B4513;
  }

  .profile-info1 {
    margin-top: 20px;
  }

  .profile-info1 h3 {
    margin-bottom: 10px;
    color: #D2691E;
  }

  .about-me-textarea {
    width: 100%;
    height: 150px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    resize: none;
    font-size: 14px;
    color: #333;
    box-sizing: border-box;
  }

  .about-me-textarea:focus {
    border-color: #D2691E;
    outline: none;
  }


</style>