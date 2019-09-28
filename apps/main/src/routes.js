


const routes = [
  {
    path: '/',
    component: () => import('./components/index.vue')
  },

  {
    path: '/client/cabinet',
    component: () => import('./components/client/layouts/dashboard.vue'),
    children: [
      { path: '', component: () => import('./components/client/pages/cabinet/start.vue') },
      { path: '/client/cabinet/profile', component: () => import('./components/client/pages/cabinet/profile.vue'), },

    ]
  },

  {
    path: '/rest/cabinet',
    component: () => import('./components/rest/layouts/dashboard.vue'),
    children: [
      { path: '', component: () => import('./components/rest/pages/cabinet/start.vue') },
      { path: '/rest/cabinet/profile', component: () => import('./components/rest/pages/cabinet/profile.vue'), },

      { path: '/rest/cabinet/rest/list', component: () => import('./components/rest/pages/cabinet/rest-list.vue'), },
      { path: '/rest/cabinet/rest/:id/edit', component: () => import('./components/rest/pages/cabinet/rest-edit.vue'), },
      { path: '/rest/cabinet/menu/list', component: () => import('./components/rest/pages/cabinet/menu-list.vue'), },
      { path: '/rest/cabinet/menu/:id/edit', component: () => import('./components/rest/pages/cabinet/menu-edit.vue'), },

      { path: '/rest/cabinet/order/list', component: () => import('./components/rest/pages/cabinet/order-list.vue'), },
      { path: '/rest/cabinet/order/:id/view', component: () => import('./components/rest/pages/cabinet/order-view.vue'), },
    ]
  },

  {
    path: '/manage/cabinet',
    component: () => import('./components/manage/layouts/dashboard.vue'),
    children: [
      { path: '', component: () => import('./components/manage/pages/cabinet/start.vue') },
      { path: '/manage/cabinet/profile', component: () => import('./components/manage/pages/cabinet/profile.vue'), },

      { path: '/manage/cabinet/rest/list', component: () => import('./components/manage/pages/cabinet/rest-list.vue'), },
      { path: '/manage/cabinet/rest/:id/edit', component: () => import('./components/manage/pages/cabinet/rest-edit.vue'), },
      { path: '/manage/cabinet/menu/list', component: () => import('./components/manage/pages/cabinet/menu-list.vue'), },
      { path: '/manage/cabinet/menu/:id/edit', component: () => import('./components/manage/pages/cabinet/menu-edit.vue'), },

      { path: '/manage/cabinet/client/list', component: () => import('./components/manage/pages/cabinet/client-list.vue'), },
      { path: '/manage/cabinet/client/:id/view', component: () => import('./components/manage/pages/cabinet/client-view.vue'), },

    ]
  },

]



export default routes
