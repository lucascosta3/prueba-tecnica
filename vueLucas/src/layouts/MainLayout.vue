<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated class="bg-brown">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />
        
        <q-toolbar-title>
          Perros App
        </q-toolbar-title>

      </q-toolbar>

    </q-header>
    
    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <q-list>
        <q-item-label
          header
        >
          Links
        </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'

const linksList = [
  {
    title: 'Inicio',
    caption: '',
    icon: 'home',
    link: 'indexPrueba'
  },
  {
    title: 'Añadir',
    caption: 'Añadir perros',
    icon: 'add',
    link: 'añadirPerro'
  },
  {
    title: 'Modificar',
    caption: 'Modificar información',
    icon: 'build',
    link: 'modificarPerro'
  }
]

export default defineComponent({
  name: 'MainLayout',

  components: {
    EssentialLink
  },

  setup () {
    const leftDrawerOpen = ref(false)

    return {
      essentialLinks: linksList,
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
