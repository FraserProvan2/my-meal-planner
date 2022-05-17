<template>
  <div class="h-100">
    <div v-if="this.meal" class="meal-plan-item pt-3 px-2">
      <a :href="'/meals/'+this.meal.id">{{ this.meal.name }}</a>
    </div>
    <div class="meal-plan-item" v-else></div>
  </div>
</template>

<script>
export default {
  props: ["meal"],
}
</script>

<style>

</style>