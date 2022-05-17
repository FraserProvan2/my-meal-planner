<template>
  <div class="h-100">
    <div v-if="this.meal" class="meal-plan-item">
      <a :href="'/meals/'+this.meal.id">{{ this.meal.name }}</a>
    </div>
    <div class="meal-plan-item no-item" v-else></div>
  </div>
</template>

<script>
export default {
  props: ["meal"],
}
</script>

<style>

</style>