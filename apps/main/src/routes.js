const routes = [
    {
        path: '/',
        component: () => import('./components/index.vue')
    },


    {
        path: '/client/start',
        component: () => import('./components/client/layouts/clean.vue'),
        children: [
            {path: '/client/start/welcome', component: () => import('./components/client/pages/start-welcome.vue'),},
            {path: '/client/start/choose-train', component: () => import('./components/client/pages/start-choose-train.vue'),},
            {path: '/client/start/choose-stantion', component: () => import('./components/client/pages/start-choose-stantion.vue'),},
        ]
    },

    {
        path: '/client/catalog',
        component: () => import('./components/client/layouts/catalog.vue'),
        children: [
            {path: '/client/catalog/list', component: () => import('./components/client/pages/catalog-list.vue'),},
            {path: '/client/catalog/rest/:id', component: () => import('./components/client/pages/catalog-rest.vue'),},
            {path: '/client/catalog/local/:id', component: () => import('./components/client/pages/local-page.vue'),},
            {path: '/client/catalog/local/', component: () => import('./components/client/pages/local-page.vue'),},
        ]
    },

    {
        path: '/rest/cabinet',
        component: () => import('./components/rest/layouts/dashboard.vue'),
        children: [
            {path: '', component: () => import('./components/rest/pages/cabinet/start.vue')},
            {path: '/rest/cabinet/profile', component: () => import('./components/rest/pages/cabinet/profile.vue'),},

            {
                path: '/rest/cabinet/rest/list',
                component: () => import('./components/rest/pages/cabinet/rest-list.vue'),
            },
            {
                path: '/rest/cabinet/rest/:id/edit',
                component: () => import('./components/rest/pages/cabinet/rest-edit.vue'),
            },
            {
                path: '/rest/cabinet/menu/list',
                component: () => import('./components/rest/pages/cabinet/menu-list.vue'),
            },
            {
                path: '/rest/cabinet/menu/:id/edit',
                component: () => import('./components/rest/pages/cabinet/menu-edit.vue'),
            },

            {
                path: '/rest/cabinet/order/list/queue',
                component: () => import('./components/rest/pages/cabinet/order-list-queue.vue'),
            },
            {
                path: '/rest/cabinet/order/list/all',
                component: () => import('./components/rest/pages/cabinet/order-list-all.vue'),
            },
            {
                path: '/rest/cabinet/order/:id/view',
                component: () => import('./components/rest/pages/cabinet/order-view.vue'),
            },

            {
                path: '/rest/cabinet/report/orders',
                component: () => import('./components/rest/pages/cabinet/report-orders.vue'),
            },

            {
                path: '/rest/cabinet/legal/list',
                component: () => import('./components/rest/pages/cabinet/legal-list.vue'),
            },
            {
                path: '/rest/cabinet/legal/:id/edit',
                component: () => import('./components/rest/pages/cabinet/legal-edit.vue'),
            },

            {
                path: '/rest/cabinet/contract/list',
                component: () => import('./components/rest/pages/cabinet/contract-list.vue'),
            },
            {
                path: '/rest/cabinet/contract/:id/edit',
                component: () => import('./components/rest/pages/cabinet/contract-edit.vue'),
            },
            {
                path: '/rest/cabinet/contract/:id/view',
                component: () => import('./components/rest/pages/cabinet/contract-view.vue'),
            },

        ]
    },

    {
        path: '/manage/cabinet',
        component: () => import('./components/manage/layouts/dashboard.vue'),
        children: [
            {path: '', component: () => import('./components/manage/pages/cabinet/start.vue')},
            {
                path: '/manage/cabinet/profile',
                component: () => import('./components/manage/pages/cabinet/profile.vue'),
            },

            {
                path: '/manage/cabinet/rest/list',
                component: () => import('./components/manage/pages/cabinet/rest-list.vue'),
            },
            {
                path: '/manage/cabinet/rest/:id/edit',
                component: () => import('./components/manage/pages/cabinet/rest-edit.vue'),
            },
            {
                path: '/manage/cabinet/menu/list',
                component: () => import('./components/manage/pages/cabinet/menu-list.vue'),
            },
            {
                path: '/manage/cabinet/menu/:id/edit',
                component: () => import('./components/manage/pages/cabinet/menu-edit.vue'),
            },

            {
                path: '/manage/cabinet/client/list',
                component: () => import('./components/manage/pages/cabinet/client-list.vue'),
            },
            {
                path: '/manage/cabinet/client/:id/view',
                component: () => import('./components/manage/pages/cabinet/client-view.vue'),
            },

        ]
    },

]


export default routes
