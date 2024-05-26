<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white">
        <img
            id="background"
            class="absolute top-0 left-0 w-full h-full bg-cover bg-center"
            src="https://img.freepik.com/free-photo/cute-kitten-sitting-outdoors-looking-camera-surrounded-by-snow-generated-by-artificial-intelligence_188544-84910.jpg?w=1060&t=st=1716565969~exp=1716566569~hmac=124e7a2c13df2e5710c92da8cf69731d4732c68405b7f4b64b6eeafce78e8978"
            style="filter: brightness(10%);"
        />
        <div
            class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-start lg:col-start-1 h-20 fill-current" >
                        <img src="../Components/Cat.png">
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end lg:col-start-3">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-20">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold pink">WELCOME!</h1>
                        <p>Please Log-in or create an Account</p>
                        
                        <Link 
                            :href="route('login')"
                            class="mt-6 inline-block rounded-md btn-pink px-6 py-3 text-white ring-1 ring-transparent bg-[#292929] transition hover:bg-[#444444] focus:outline-none focus-visible:ring-white"
                        >
                            Log In
                        </Link>

                        <div class="flex text-center justify-center text-[12px] mt-2">
                            <p class="mr-2">or </p>
                            <Link 
                                :href="route('register')"
                                class="mr-2 underline transition hover:text-[#ffffff]">
                                Register
                            </Link>
                            <p> if you haven't created an account.</p>
                        </div>
 
                    </div>
                </main>

                <footer class="pt-[40vh] text-center text-sm text-black dark:text-white/70">
                    Copyright &copy; 2024. This is my Final Project in Inertia.
                </footer>
            </div>
        </div>
    </div>
</template>
