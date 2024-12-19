<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";

import { ref } from "vue";

const userProfile = ref({
    name: "Dimas Kurniawan",
    email: "dimas.kurniawan@example.com",
    avatar: "https://via.placeholder.com/150", // Ganti dengan URL gambar profil asli
    bio: "Mahasiswa Teknik Informatika, Politeknik Negeri Lhoseumawe."
});
</script>

<template>
    <AppLayout title="Profile">
        <div class="p-6 bg-gray-100 min-h-screen">
            <!-- Profile Header -->
            <div class="profile-header">
            <div>
              <h2>
                Profile
                <i class="bi bi-pencil edit-icon"></i>
              </h2>
            </div>
          </div>

          <div class="profile-info bg-white shadow-lg rounded-lg p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="profile-details">
                        <h3 class="text-2xl font-semibold text-gray-800">Alfitrah</h3>
                        <p class="text-gray-600">UI/UX Desainer</p>
                    </div>
                    <div class="profile-image-container">
                        <img src="fitrah.jpg" alt="Profile Picture" class="profile-circle-large">
                    </div>
                </div>

                <div class="social-icons mt-4">
                    <a href="https://www.instagram.com" target="_blank" class="social-icon">
                        <i class="bi bi-instagram"></i>
                        <span>Dimas_kurniawan20114</span>
                    </a>
                    <a href="https://github.com" target="_blank" class="social-icon">
                        <i class="bi bi-github"></i>
                        <span>Dimas_kurniawan20114</span>
                    </a>
                    <a href="https://www.linkedin.com" target="_blank" class="social-icon">
                        <i class="bi bi-linkedin"></i>
                        <span>Dimas_kurniawan20114</span>
                    </a>
                </div>
            </div>

            <div class="profile-info1 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800">Tentang Saya</h3>
                <textarea class="about-me-textarea" placeholder="Masukkan Bio Anda..."></textarea>
            </div>

            <!-- Settings and Actions -->
         
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