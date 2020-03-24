import { ADD_TO_CART, DELETE_FROM_CART, CLEAR_CART } from '../mutation-types';
import { CART_STORAGE } from '../../config/const';

const cart = {
  state: () => {
    const cartStorage = localStorage.getItem(CART_STORAGE);
    let items = [];
    if (cartStorage) {
      items = JSON.parse(cartStorage);
    }
    return {
      items,
    };
  },

  mutations: {
    [ADD_TO_CART](state, menu) {
      let exist = false;
      state.items = state.items.map((m) => {
        if (m.id === menu.id) {
          m.quantity += 1;
          exist = true;
        }
        return m;
      });

      if (!exist) {
        menu.quantity = 1;
        state.items.push(menu);
      }

      // Save cart to localStorage
      localStorage.setItem(CART_STORAGE, JSON.stringify(state.items));
    },

    [DELETE_FROM_CART](state, menu) {
      state.items = state.items.filter(m => m.id !== menu.id);
      localStorage.setItem(CART_STORAGE, JSON.stringify(state.items));
    },

    [CLEAR_CART](state) {
      state.items = [];
      localStorage.removeItem(CART_STORAGE);
    },
  },

  actions: {
    addToCart: ({ commit }, menu) => {
      commit(ADD_TO_CART, menu);
    },
    deleteFromCart: ({ commit }, menu) => {
      commit(DELETE_FROM_CART, menu);
    },
    clearCart: ({ commit }) => {
      commit(CLEAR_CART);
    },
  },
};

export default cart;
