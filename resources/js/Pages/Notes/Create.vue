<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { reactive } from 'vue';
import {Link, useForm, router } from '@inertiajs/vue3';


const form = reactive({
    excerpt:'',
    content:''
});

function submit(){
    router.post(
        route('notes.store'),
        form
    );
};


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px0">
                                <h3 class="text-lg text-gray-900">Creae una Nota</h3>  
                                 <p class="text-sm text-gray-600">Luego de crear la podras editar</p>
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="shadow bg-white md:rounded-m p-4">
                                <form @submit.prevent="submit">
                                    <label for="" class="block font-medium text-sm text-gray-700">Resumen</label>
                                    <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.excerpt" name="excerpt" @change="form.validate('excerpt')"> 
                                    </textarea>
                                    <label for="" class="block font-medium text-sm text-gray-700">Contenido</label>
                                    <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.content" rows="8">  
                                    </textarea> 
                                    <button 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                        Crear
                                    </button>    
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
