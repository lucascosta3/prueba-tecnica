
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'indexPrueba', component: () => import('pages/IndexLucas.vue') },
      { path: 'AñadirPerro', name: 'añadirPerro', component: () => import('pages/AñadirPerro.vue') },
      { path: 'ModificarPerro', name: 'modificarPerro', component: () => import('pages/ModificarPerro.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
