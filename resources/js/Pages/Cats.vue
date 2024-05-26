<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head  } from '@inertiajs/vue3';
import { Link, useForm } from "@inertiajs/vue3";

defineOptions({
        layout: MyLayout
    });

const props = defineProps({
    cats: Array
});

const form = useForm({
  name: props.cats.name,
  description: props.cats.breed,
  image: props.cats.image,
});

const deleteCat = (cat) => {
  const del = confirm("Are you sure you want to delete?");
  if (del) {
    form.delete(`/cat/${cat.id}`, {
      preserveScroll: true
    }).then(() => {
      // Handle success or other actions after deletion
    });
  }
};
</script>

<template>
   <Head>
      <title>My Cats</title>
      
   </Head>

   <div class="fadeIn mx-[5rem] my-[2rem] relative">
      <div class="fixed top-[4rem] left-[4rem] right-[4rem] z-50 flex items-center bg-white p-5 justify-between">
         <p class="text-2xl font-bold mx-2">Cats</p>

         <Link href='/cat/create' class="bg-gray-600 text-white rounded font-bold p-2 hover:bg-gray-700">
            Add Cats
         </Link>
      </div>
      
      <div class="mt-[9rem] grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
         <div v-for="(cat, index) in cats" :key="cat.id" class="border p-4 bg-white rounded shadow cardSlide" :style="`animation-delay: ${index * 0.1}s;`">
            <img :src="cat.image" alt="Cat Image" class="w-full h-48 object-cover rounded-md mb-4"> 
            <p class="text-lg font-semibold">Name: {{ cat.name }}</p>
            <div class="flex items-center justify-between">
               <p class="text-md">Breed: {{ cat.breed }}</p>
               <div>
                  <button @click="deleteCat(cat)" class=" bg-red-500 hover:bg-red-700 text-white rounded py-2 px-3 mr-2 text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="inline-block w-4 h-4 " fill="white">
                        <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                     </svg>
                  </button>
                  <Link :href="`/cat/${cat.id}/edit`" class=" bg-green-500 hover:bg-green-700 text-white rounded py-2.5 px-3 text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="inline-block w-4 h-5 " fill="white">
                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                     </svg>
                  </Link>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</template>