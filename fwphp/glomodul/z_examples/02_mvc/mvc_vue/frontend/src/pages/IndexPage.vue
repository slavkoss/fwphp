<template>
  <v-layout row>
    <v-flex xs12 sm6 offset-sm3>
      <v-card>
        <v-list two-line>
          <template v-for="menu in menus">
            <v-list-tile avatar v-bind:key="menu.name">
              <v-list-tile-avatar>
                <img v-bind:src="menu.image" class="no-radius">
              </v-list-tile-avatar>
              <v-list-tile-content>
                <v-list-tile-title>
                {{menu.name}}
                <span class="menu-price">{{menu.price}}€</span>
                </v-list-tile-title>
                <v-list-tile-sub-title>{{menu.description}}</v-list-tile-sub-title>
              </v-list-tile-content>
              <v-list-tile-action @click="addToCart(menu)">
                <v-btn icon class="add-cart-btn">
                  <v-icon>add</v-icon>
                </v-btn>
              </v-list-tile-action>
            </v-list-tile>
            <v-divider></v-divider>
          </template>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import { getMenusAction } from '../api/menus';

export default {
  data: () => ({
    menus: [],
    isLoading: true,
  }),

  mounted() {
    this.isLoading = true;

    this.menus = getMenusAction().then((response) => {
      this.isLoading = false;
      this.menus = response;
    });
  },

  methods: {
    addToCart(menu) {
      this.$store.dispatch('addToCart', menu);
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .no-radius {
    border-radius: 0 !important;
  }

  .menu-price {
    float: right;
    font-weight: bold;
  }

  .add-cart-btn {
    border: 1px solid #2196F3;
    padding: 4px;
    border-radius: 0;
  }

  .full-width {
    width: 100%;
  }
</style>
