<template>
    <q-page>
        <h2 class="flex flex-center">Hecho por Lucas Costa</h2>
        <div class="flex flex-center">
            <router-link to="/AñadirPerro">
                <q-btn color="deep-orange" glossy label="Empezar" />
            </router-link>
        </div>
    </q-page>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'IndexPrueba'
});
</script>

<style lang="scss" scoped></style>