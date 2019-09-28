import serialize from 'locutus/php/var/serialize';
import axios from 'axios'

let requestToken;

let getItemHash = function(productId, properties) {

  let result = {};

  result.productId = parseInt(productId);

  if (properties && Object.keys(properties).length) {
    result.properties = properties;
  }

  return serialize(result);
}

export const state = () => ({
  dialog: {
    basket : { value: false, t:1 },
  },

  items: localStorage['basket'] ? JSON.parse(localStorage['basket']) : [],

  price : 0,
  price_display : 0,
  count : 0,
  quantity : 0,
  call : null,
  disable : false,
  disable_title : '',
  disable_text : '',
})

export const getters = {


  items: (state) => {
    return state.items;
  },

  price: (state) => {
    return state.price
  },

  priceDisplay: (state) => {
    return state.items.reduce((total, item)=> total + item.price * item.quantity , 0)
  },

  totalWeight: (state) => {
    return state.items.reduce((total, item)=> total + (item.weight ? item.weight * item.quantity : 0), 0)
  },

  totalQuantity: (state) => {
    return state.items.length
  },

  totalCount: (state) => {
    return state.items.reduce((total, item)=> total + item.quantity, 0)
  },

  itemsByProductId: (state) => {
    return state.items.reduce((map, obj) => (map[obj.product_id] = obj, map), {});
  },
}

export const actions = {

  update (context, event) {

    if (event.PAYLOAD) {

      if (!event.payload.items) event.payload.items = [];

      context.commit('setState', event.PAYLOAD );

    }
  },

  serverApi ({ state, commit }, { method, op, data }) {

    return new Promise(async (resolve, reject) => {

      method = method || 'POST';

      if (requestToken) requestToken.cancel();

      requestToken = axios.CancelToken.source();

      localStorage['basket'] = JSON.stringify(state.items)

      resolve();

      return;

      /*
      this.$api.post('common/user/basket/' + op, data, { cancelToken : requestToken.token }).then((response) => {

        resolve(response);

      }).catch((e)=>{

        reject(e);

      });
      */

    });

  },

  checkout ({ state, commit }, products) {

  },


  productQuantity ({ state, commit, dispatch }, [product, quantity]) {

    if (!quantity || quantity <= 0) quantity = 1;

    const item = state.items.find(с => с.product_id === product.id)


    if (item) {

      if (quantity > 1) {

        commit('itemQuantity', { item: item, quantity: quantity})

        dispatch('serverApi', { op: 'quantity', data: {
            productId : item.product_id,
            itemId : item.id,
            quantity: quantity
          }});

      } else {

        commit('itemRemove', { item } )

        dispatch('serverApi', { op: 'remove', data: {
            productId : item.product_id,
            itemId : item.id,
          }});
      }

    }
  },

  productRemove ({ state, commit, dispatch, getters }, item) {

    const basketItem = state.items.find(с => с.product_id === item.id)

    if (basketItem) {

      commit('itemRemove', basketItem )

      dispatch('serverApi', { op: 'remove', data: {
          productId : basketItem.product_id,
          itemId : basketItem.id,
        }});
    }

  },

  itemAdd ({ state, commit, dispatch }, [product, quantity, subitems, customPrice]) {

    return new Promise(async (resolve, reject) => {

      quantity = quantity || 1

      let properties = {

      };

      let hashProperties = {

      };

      if (subitems) {

        for (let propCode in subitems) {

          let propItems = subitems[propCode];

          properties[propCode] = propItems;
          hashProperties[propCode] = propItems;
        }
      }

      let hash = getItemHash(product.id, hashProperties)

      const basketItem = state.items.find(с => с.hash === hash)

      if (!basketItem) {

        commit('itemAdd', {
          hash,
          product,
          quantity,
          properties,
          customPrice
        })

        dispatch('serverApi', { op: 'add', data: {
            productId : product.ID,
            quantity: quantity,
            properties: properties
          }}).then(()=>{

          resolve();

        }).catch(()=>{

          reject();
        });

      } else {

        quantity = basketItem.quantity + quantity;

        commit('itemQuantity', { item: basketItem, quantity: quantity})

        dispatch('serverApi', { op: 'quantity', data: {
            productId : basketItem.product_id,
            itemId : basketItem.id,
            quantity: quantity
          }}).then(()=>{

          resolve();

        }).catch(()=>{

          reject();
        });
      }
    });

  },


  itemQuantity ({ state, commit, dispatch }, [item, quantity]) {

    if (!quantity || quantity <= 0) quantity = 1;

    const basketItem = state.items.find(с => item.id ? с.id === item.id : с.product_id === item.product_id)

    if (basketItem) {

      commit('itemQuantity', { item: item, quantity: quantity})

      dispatch('serverApi', { op: 'quantity', data: {
          productId : item.product_id,
          itemId : item.id,
          quantity: quantity
        }});

    }
  },

  itemRemove ({ state, commit, dispatch, getters }, item) {

    commit('itemRemove', { item })

    dispatch('serverApi', { op: 'remove', data: {
        productId : item.product_id,
        itemId : item.id,
      }});

  }
}

export const mutations = {


  itemAdd (state, { hash, product, quantity, properties, customPrice }) {

    state.items.push({
      hash : hash,
      product_id : product.id,
      title : product.title,
      price : customPrice || product.price,
      quantity : quantity,
      image : product.basket_image,
      properties : properties,
    });

    //this.$eventHub.$emit('basket/update');
  },

  itemQuantity (state, { item, quantity }) {
    if (quantity>0) item.quantity = quantity;

   // this.$eventHub.$emit('basket/update');
  },

  itemRemove (state, { item }) {


    state.items = state.items.filter(c => item.id ? c.id !== item.id : c.product_id !== item.product_id)

    //this.$eventHub.$emit('basket/update');
  },

  setState (state, newState) {
    Object.assign(state, newState);

    //state.PRICE_DISPLAY = newState.PRICE
  },
}



export default {
  namespaced: true,
  getters,
  mutations,
  actions,
  state
}
