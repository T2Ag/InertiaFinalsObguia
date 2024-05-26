<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: MyLayout,
});

const props = defineProps({
    cats: Object
});

const form = useForm({
    name: props.cats.name,
    breed: props.cats.breed,
    image: props.cats.image,
});

const submit = () => {
   form.put(`/cat/${props.cats.id}`);
};
</script>

<template>
    <Head>
        <title>Edit Cat</title>
    </Head>

    <div class="flex justify-center p-8 overflow-hidden ">
        <div class="w-full max-w-md">
            <h1 class="text-4xl my-10 text-center">Edit Cat</h1>

            <div class="border p-10 rounded item flex flex-col items-center slideBottomToTop">
                <form @submit.prevent="submit" class="w-full">
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Name:</label>
                        <input class="w-3/4 rounded-md py-2 px-3" v-model="form.name" type="text">
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Breed:</label>
                        <input class="w-3/4 rounded-md py-2 px-3" v-model="form.breed" type="text">
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Image:</label>
                        <input class="w-3/4 rounded-md py-2 px-3" v-model="form.image" type="text">
                    </div>

                    <div class="w-full flex justify-center">
                        <Link href="/cat" class="btn m-2 px-3 py-2 rounded text-white bold bg-gray-400">Back</Link>
                        <button type="submit" class="btn m-2 px-3 py-2 rounded text-white bg-green-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
