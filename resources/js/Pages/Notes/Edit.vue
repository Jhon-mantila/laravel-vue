<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from '@inertiajs/vue3';

const props = defineProps({
    note:  Array,
});

console.log(props)
const form = useForm({
    excerpt:props.note.excerpt,
    content:props.note.content
});

const submit = () =>{
    form.put(
        route('notes.update', props.note.id), 
        form
    );
};

const destroy = (id) => {
    if(confirm('¿Desea Eliminar?')){
        form.delete(
            route('notes.destroy', id), 
        form
         );
    }
}

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
                                <h3 class="text-lg text-gray-900">Editar la Nota</h3>  
                                 <p class="text-sm text-gray-600">Si editas no podras volver al estado anterior</p>
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="shadow bg-white md:rounded-m p-4">
                                <form @submit.prevent="submit">
                                    <label for="" class="block font-medium text-sm text-gray-700">Resumen</label>
                                    <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.excerpt"> 
                                    </textarea> 
                                    <label for="" class="block font-medium text-sm text-gray-700">Contenido</label>
                                    <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.content" rows="8">  
                                    </textarea> 
                                    <button 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                        Editar
                                    </button>    
                                </form>

                                <hr class="my-6">

                                <a href="#" @click.prevent="destroy(note.id)">
                                Eliminar Nota
                                </a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
