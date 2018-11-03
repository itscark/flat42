<template>
<div>
    <div>
      <form autocomplete="off">
          <label for="name">{{ item.name }}</label>
          <input @change="inputChanged()" type="text" id="name" v-model="item.name">

          <label for="quantity">{{ item.quantity }}</label>
          <input @change="inputChanged()" type="number" id="quantity" v-model="item.quantity">


          <div role="group" aria-label="Buttons">
              <button @click="updateItem()" type="button"  :disabled="isDisabled"><i aria-hidden="true"></i> Update</button>
              <button @click="deleteItem()" type="button" ><i aria-hidden="true"></i> Delete</button>
          </div>
      </form>
    </div>
</div>
</template>


<script>
export default {
  props: {
    item: {}
  },
  data() {
    return {
      isDisabled: true
    };
  },
  methods: {
    deleteItem() {
      this.$emit("deleteEvent", this.item.id);
    },
    updateItem() {
      this.isDisabled = true;
      this.$emit("updateEvent", this.item);
    },
    inputChanged() {
      if (this.item.name.length < 3 || this.item.quantity < 1) {
        this.isDisabled = true;
      } else {
        this.isDisabled = false;
      }
    }
  }
};
</script>
