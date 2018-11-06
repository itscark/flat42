<template>
  <div >
    <form autocomplete="off">
        <input v-model="newItem.name" type="text" id="name" placeholder="Name...">

        <input v-model="newItem.quantity" type="number" id="quantity" placeholder="Quantity">


        <div role="group" aria-label="Buttons">
            <button @click="createItem()" type="button" :disabled="isDisabled"><i  aria-hidden="true"></i>Add new item</button>
        </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newItem: {
        name: "",
        quantity: null
      }
    };
  },
  methods: {
    createItem() {
      this.$emit("createEvent", this.newItem);
    }
  },
  computed: {
    isDisabled() {
      if (this.newItem.name.length < 3 || this.newItem.quantity < 1) {
        return true;
      }
      return false;
    }
  }
};
</script>

