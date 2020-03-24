<template>
  <v-app>
    <v-navigation-drawer
      fixed
      v-model="drawer"
      right
      app
    >
      <cart :items='cart.items'></cart> 
    </v-navigation-drawer>

    <v-toolbar color="red" dark fixed app>
      <v-toolbar-title>Simple Resto</v-toolbar-title>
      <div class="d-flex align-center no-mr" style="margin-left: auto">
        <v-btn @click.stop="drawer = !drawer" class="blue">
          <span class="cart-price">{{cartCountPrice}}€</span>
          <v-badge right color="red" class="ml-2">
            <span slot="badge">{{cartCount}}</span>
            <v-icon color="white">shopping_cart</v-icon>
          </v-badge>
        </v-btn>
      </div>
    </v-toolbar>

    <v-content fluid class="content">
      <router-view></router-view>
    </v-content>

    <v-card>
      <v-bottom-nav :value="true" :active.sync="e1" color="white">
        <v-btn flat color="red" value="Nearby">
          <span>Nearby</span>
          <v-icon>place</v-icon>
        </v-btn>
        <v-btn flat color="red" value="recent">
          <span>Recent</span>
          <v-icon>history</v-icon>
        </v-btn>
        <v-btn flat color="red" value="favorites">
          <span>Favorites</span>
          <v-icon>favorite</v-icon>
        </v-btn>
      </v-bottom-nav>
    </v-card>
  </v-app>
</template>

<script>
import { mapGetters } from 'vuex';
import Cart from './components/Cart';

export default {
  data: () => ({
    drawer: null,
    e1: 'Nearby',
  }),

  components: {
    Cart,
  },

  computed: {
    ...mapGetters([
      'cart',
    ]),

    cartCountPrice() {
      if (this.cart && this.cart.items) {
        let price = 0;
        this.cart.items.map((m) => {
          price += m.price * m.quantity;
          return m;
        });
        return price;
      }
      return 0;
    },

    cartCount() {
      if (this.cart && this.cart.items) {
        let count = 0;
        this.cart.items.map((m) => {
          count += m.quantity;
          return m;
        });
        return count;
      }
      return 0;
    },
  },
};
</script>

<style lang="scss">
  @import '../node_modules/vuetify/dist/vuetify.min.css';
	@import './styles/common';
</style>
