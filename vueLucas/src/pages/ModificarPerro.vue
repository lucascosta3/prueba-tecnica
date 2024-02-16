<template>
    <div class="text-h3 flex flex-center">Perros</div>
    <q-page v-if="perros.length>0" class="flex flex-center">
        <div v-for="perro in perros" :key="perro.id" class="q-pa-md" style="max-width: 500px;">
            <q-card class="my-card q-gutter-y-md bg-brown-4 chip-border" flat bordered>
                <div class="text-h6 flex flex-center">{{ perro.raza }}</div>
                <div class="text-h7 flex flex-center">{{ perro.pelo }}</div>
                <q-card-section vertical>
                    <q-avatar square class="rounded-borders" size="300px">
                        <img :src="perro.img">
                    </q-avatar>
                    <q-card-actions horizontal class="justify-around q-px-md">
                        <q-btn @click="borrarPerro(perro.id)" flat round color="warning" icon="delete" />
                    </q-card-actions>
                </q-card-section>
            </q-card>
        </div>
    </q-page>
    <q-page v-else class="flex flex-center">
        <div class="text text-h3">
            No hay perros añadidos, añade alguno.
        </div>
    </q-page>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'ModificarInfo',
    data() {
        return {
            perros: []
        }
    },
    mounted() {
        fetch('http://127.0.0.1:8000/api/getPerros', {
            method: 'GET',
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Hubo un problema con la solicitud.');
                }
                return response.json();
            })
            .then(data => {
                this.perros = data.perros;
            })
    },
    methods: {
        borrarPerro(id) {
            const perroFormData = new FormData();
            perroFormData.append('id', id);

            fetch('http://127.0.0.1:8000/api/deletePerro', {
                method: 'POST',
                body: perroFormData,
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Hubo un problema al eliminar el perro.');
                    }
                    this.actualizarListaPerros();
                })
                .then(data => {
                    console.log('perro eliminado');
                })
        },
        actualizarListaPerros() {
            fetch('http://127.0.0.1:8000/api/getPerros', {
            method: 'GET',
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Hubo un problema con la solicitud.');
                }
                return response.json();
            })
            .then(data => {
                this.perros = data.perros;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
});
</script>

<style lang="scss" scoped></style>