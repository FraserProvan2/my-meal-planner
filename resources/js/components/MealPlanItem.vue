<template>
  <div class="h-100">
    <div v-if="this.meal" class="meal-plan-item shadow-sm">
      <a :href="'/meals/'+this.meal.id">{{ this.getTruncatedTitle(this.meal.name) }}</a>
    </div>
    <div class="meal-plan-item no-item" v-else></div>
  </div>
</template>

<script>
export default {
  props: ["meal"],
  methods: {
    getTruncatedTitle(title) {
      let max = 26;
      if(title.length > max) {
        return title.substr(0, max) + '...';
      }
      return title;
    }
  }
}
</script>

<style>

</style>