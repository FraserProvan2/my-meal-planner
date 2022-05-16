<template>
  <div v-if="this.plan">
      <a href="">{{ this.plan.name }}</a>
  </div>
</template>

<script>
export default {
    props: ["plan"]
}
</script>

<style>

</style>