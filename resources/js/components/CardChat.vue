<template>
    <div class="card">
      <h2>{{ title }}</h2>
      <p>{{ content }}</p>
      <div></div>
    </div>
  </template>
<script>
  export default {
    props: {
      title: {
        type: String,
        required: true,
      },
      content: {
        type: String,
        required: true,
      },
    },
};

</script>
<style scoped>
    .card {
      border: 1px solid #ccc;
      padding: 16px;
      margin: 8px;
      border-radius: 4px;
  }
</style>
