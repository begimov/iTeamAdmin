<template>
  <div>
    <span>{{ item.value }}</span>
  </div>
</template>

<script>
export default {
  props: { item: { required: true } }
}
</script>

<style>
.v-autocomplete-list-item {
  cursor: pointer;
  background-color: #fff;
  padding: 10px;
  border-bottom: 1px solid #ddd;
  border-left: 1px solid #ddd;
  border-right: 1px solid #ddd;
}
.v-autocomplete-list-item:hover {
  background-color: #eee;
}
</style>
