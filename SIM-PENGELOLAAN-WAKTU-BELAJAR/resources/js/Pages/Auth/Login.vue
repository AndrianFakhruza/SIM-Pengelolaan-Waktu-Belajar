<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const googleIcons = `<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48"><path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.9 11.9 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/><path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/></svg>`;

const faceboockIcons = `  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="25"
                                    viewBox="0 0 256 256"
                                >
                                    <path
                                        fill="#1877f2"
                                        d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"
                                    />
                                    <path
                                        fill="#fff"
                                        d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z"
                                    />
                                    a
                                </svg>`;

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />
    <main class="">
        <img
            class="absolute left-0 bottom-7"
            src="/storage/Images/Login/matahari.png"
            alt=""
        />
        <div class="flex">
            <div
                class="w-2/3 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
            >
                <div class="text-center">
                    <h1 class="font-sans text-gray-900 text-8xl font-extrabold">
                        Welcome
                    </h1>
                    <p>We are glad to see you back with us</p>
                </div>
                <div
                    v-if="status"
                    class="mb-4 font-medium text-sm text-green-600"
                >
                    {{ status }}
                </div>
                <div
                    class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden sm:rounded-lg"
                >
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="username"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />
                            <TextInput
                                id="password"
                                v-model="form.password"
                                type="password"
                                class="mt-1 block w-full"
                                required
                                autocomplete="current-password"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.password"
                            />
                        </div>

                        <div class="mt-4 flex">
                            <label class="flex items-center">
                                <Checkbox
                                    v-model:checked="form.remember"
                                    name="remember"
                                />
                                <span class="ms-2 text-sm text-gray-600"
                                    >Remember me</span
                                >
                            </label>
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline ml-auto text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Lupa password ?
                            </Link>
                        </div>
                        <br />
                        <div class="text-center">
                            <p>
                                belum memiliki akun ?
                                <a class="font-extrabold" href="/register"
                                    >buat akun</a
                                >
                            </p>
                        </div>

                        <div class="mt-4">
                            <PrimaryButton
                                class=""
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Log in
                            </PrimaryButton>
                        </div>
                        <div class="flex items-center mt-4">
                            <hr class="border-gray-300 flex-grow" />
                            <h4 class="mx-4 text-gray-400">
                                Log in with other
                            </h4>
                            <hr class="border-gray-300 flex-grow" />
                        </div>
                        <div class="text-center flex flex-col">
                            <a
                                href="#"
                                class="p-3 my-2 border rounded-lg flex items-center justify-center gap-2"
                            >
                                <span v-html="googleIcons"></span>
                                Login with google
                            </a>
                            <a
                                href="#"
                                class="p-3 border rounded-lg flex items-center justify-center gap-2"
                            >
                                <span v-html="faceboockIcons"></span>
                                Login with facebook
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <section class="w-1/2 bg-gray-100 h-screen p-6">
                <img
                    src="/storage/Images/Login/bg-login.png"
                    alt="bg-Login"
                    class="w-full h-full"
                />
            </section>
        </div>
    </main>
</template>
