
<template>
    <Head title="Cursos" />

    <AuthenticatedLayout>


        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <a-table :columns="columns" :dataSource="cursos" rowKey="curso_id" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const cursos = ref([]);

// Definir las columnas para la tabla
const columns = [
    {
        title: 'ID',
        dataIndex: 'curso_id',
        key: 'curso_id',
    },
    {
        title: 'Código',
        dataIndex: 'curso_codigo',
        key: 'curso_codigo',
    },
    {
        title: 'Nombre',
        dataIndex: 'curso_nombre',
        key: 'curso_nombre',
    },
    {
        title: 'Horas Teóricas',
        dataIndex: 'curso_ht',
        key: 'curso_ht',
    },
    {
        title: 'Horas Prácticas',
        dataIndex: 'curso_hp',
        key: 'curso_hp',
    },
    {
        title: 'Total Horas',
        dataIndex: 'curso_totalh',
        key: 'curso_totalh',
    },
    {
        title: 'Créditos',
        dataIndex: 'curso_credito',
        key: 'curso_credito',
    },
    {
        title: 'Área',
        dataIndex: 'curso_areac',
        key: 'curso_areac',
    },
    {
        title: 'Ciclo',
        dataIndex: 'curso_ciclo',
        key: 'curso_ciclo',
    },
    {
        title: 'Plan',
        dataIndex: 'curso_plan',
        key: 'curso_plan',
    },
    {
        title: 'Tipo',
        dataIndex: 'curso_tipo',
        key: 'curso_tipo',
    },
    {
        title: 'Estado',
        dataIndex: 'estado',
        key: 'estado',
        render: (text) => (text ? 'Activo' : 'Inactivo'),
    }
];

// Función para obtener los cursos
const getCursos = async () => {
    try {
        const response = await axios.get('/cursos');
        cursos.value = response.data.datos;
    } catch (error) {
        console.error('Error fetching cursos:', error);
    }
};

// Obtener los cursos al montar el componente
onMounted(() => {
    getCursos();
});
</script>

<style scoped>
/* Puedes agregar tus estilos aquí */
</style>
