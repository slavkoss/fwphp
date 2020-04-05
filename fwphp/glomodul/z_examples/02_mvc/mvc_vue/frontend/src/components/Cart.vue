<template>
  <div>
    <div class="ml-3 mt-3">
      <h4>Votre panier</h4>
    </div>
    <div dense v-if='items.length > 0'>
      <v-list>
        <v-list-tile 
          v-for='item in items'
          v-bind:data="item.name"
          v-bind:key="item.id"
        >
          <v-list-tile-action>
            <v-btn icon @click="deleteItem(item)">
              <v-icon class='blue--text'>close</v-icon>
            </v-btn>
          </v-list-tile-action>

          <v-list-tile-content>
            <v-list-tile-title>
              {{item.quantity}} x {{item.name}}
              <span class='pull-right'>{{item.quantity * item.price}}€</span>
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>

      <v-divider></v-divider>
      <div class="ml-3 mt-3">
        <strong>TOTAL</strong>
        <span class='pull-right mr-3'>{{cartCountPrice}}€</span>
      </div>
    </div>

    <div v-else class="red--text ml-3 mt-3">
      Aucun produit dans le panier
    </div>
  </div>
</template>

<script>
export default {
  props: ['items'],

  methods: {
    deleteItem(item) {
      this.$store.dispatch('deleteFromCart', item);
    },
  },

  computed: {
    cartCountPrice() {
      if (this.items) {
        let price = 0;
        this.items.map((m) => {
          price += m.price * m.quantity;
          return m;
        });
        return price;
      }
      return 0;
    },
  },
};
</script>

<style scoped>
</style>
