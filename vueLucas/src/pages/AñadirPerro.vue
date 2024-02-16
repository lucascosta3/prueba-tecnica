<template>
    <q-page class="fit">
        <div class="q-pa-md flex flex-center">
            <div class="q-gutter-y-md column" style="max-width: 600px">
                <div class="text-h3">Añadir Información de perro</div>
                <div v-if="missingInfo" class="text-h8 text-red">
                    Debe rellenar todos los campos.
                </div>
                <q-input color="blue-12" v-model="img" label="URL de la imagen">
                    <template v-slot:prepend>
                        <q-icon name="image" />
                    </template>
                </q-input>

                <q-input color="blue-12" v-model="raza" label="Nombre de la raza">
                    <template v-slot:prepend>
                        <q-icon name="pets" />
                    </template>
                </q-input>

                <q-input color="blue-12" v-model="pelo" label="Color del perro">
                    <template v-slot:prepend>
                        <q-icon name="palette" />
                    </template>
                </q-input>
                <q-btn @click="añadirPerro" color="deep-orange" glossy label="Añadir" />
            </div>
        </div>
    </q-page>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'IndexPrueba',
    data() {
        return {
            missingInfo: false
        }
    },
    methods: {
        añadirPerro() {
            if (this.img != "" && this.raza && this.color != "") {
                const perroFormData = new FormData();
                perroFormData.append('img', this.img);
                perroFormData.append('raza', this.raza);
                perroFormData.append('pelo', this.pelo);

                fetch('http://127.0.0.1:8000/api/store', {
                    method: 'POST',
                    body: perroFormData,
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Hubo un problema con la solicitud.');
                        }
                        console.log(response.json());
                    })
            } else {
                this.missingInfo = true;
            }
        }
    }
});
</script>

<style lang="scss" scoped></style>