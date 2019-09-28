

export const state = () => ({
  toolbar: {
    header : {
      app: 'top',

      desktop: {
        height: 80,
        betaHeight: 36,
        extHeight: 0
      },
      mobile : {
        height: 63,
        betaHeight: 58,
        extHeight: 0
      }
    },
  },
  dialog: {
    search : { value: false },
    login : { value: false, phone: '', persistent: false, backpage: '' },
    nav : { value: false },
    basket : { value: false },
    wok : { value: false },
    craft : { value: false },
    manager : { value: false },
  },
  currentNav: {
    headerMenuItem: '',
    catalogSection: '',
    catalogSectionWatch: ''
  },
  event: '',
  currentPage: {
    result : {

    }
  },
  betaInfoHidden: false
})

export const getters = {

  currentPageResult: (state) => {
    return state.currentPageResult;
  },

  currentNav: (state) => (name) => {
    return state.currentNav[name];
  }
}

export const actions = {

  updateCurrentNav (context, value) {
    context.commit('updateCurrentNav', value)
  },

}

export const mutations = {

  updateCurrentNav (state, value) {

    Object.assign(state.currentNav, value);
  },

  betaInfoHide (state) {

    state.toolbar.header.desktop.height = 80;

    state.toolbar.header.mobile.height = 65;

    state.betaInfoHidden = true;
  },
}


export default {
  namespaced: true,
  getters,
  mutations,
  actions,
  state
}
