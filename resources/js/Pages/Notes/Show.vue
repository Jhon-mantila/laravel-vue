<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';

defineProps({
    note: Array,
});
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
                                <h3 class="text-lg text-gray-900">Detalla de la Nota</h3>  
                                 <p class="text-sm text-gray-600">{{ note.excerpt }}</p>
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="shadow bg-white md:rounded-m p-4">
                                <p>{{ note.content }}</p>
                                <hr class="my-6">
                                <Link :href="route('notes.index')">
                                    Volver
                                </Link>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
