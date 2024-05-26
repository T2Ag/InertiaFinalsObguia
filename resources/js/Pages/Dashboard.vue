<script setup>
import { ref } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, usePage  } from '@inertiajs/vue3';

defineOptions({
        layout: MyLayout
    });

const { props } = usePage();
const userName = ref(props.userName || 'Anonymous User');

</script>

<template>
    <Head>
        <title>Homepage</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    </Head>

    <div class="overflow-hidden ">
        <div class="py-10 fadeIn">
            <div class="relative">
                <div class="absolute inset-0 flex flex-col items-center justify-center text-black z-10" style="font-family: 'Poetsen One', cursive;" >
                    <p class="text-[70px]">WELCOME TO CATITO</p>
                    <p class="text-[70px]">{{ userName }}</p>
                </div>
                <div class="flex items-center opacity-50 justify-center ">
                    <div class="flex">
                        <img src="../Components/kitty1.png" alt="me" class="w-[70vh] slideRight">
                        <img src="../Components/kitty3.jpg" alt="me" class="w-[70vh] slideLeft">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>